<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Naivebayes extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('Model', 'model');
        $this->load->model('Costume', 'costume');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard';
        $data['anak'] = (object) [
            'jumlah_anak' => 16,
            'laki' => 3,
            'perempuan' => 4,
            'anak_belum_siap' => 14,
        ];
        $this->menu($data);
    }
    public function menu($data)
    {
        $this->load->view('header', $data, false);
        $this->load->view($data['content'], $data);
        $this->load->view('footer', $data, false);
    }
    public function naivebayes($jenis)
    {
        $data['jenis_data'] = $jenis;
        $start = microtime(true);
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'data_tabel';
        $data['data'] = $this->model->get_data('data', 'id_data', 'desc')->result();
        if ($data['data']) {
            $data['status'] = 'already_exist';
            foreach ($data['data'] as $key => $value) {
                $data['result'][] = (object) [
                    'nama_data' => $value->nama_data,
                    'tanggal_hitung' => $value->tanggal_hitung,
                    'jumlah_data' => $this->model->count_sample($value->id_data),
                    'id_data' => $value->id_data,
                ];
            }
        } else {
            $data['status'] = 'not_exist';
        }
        $end = microtime(true) - $start;
        $response = [
            'data' => $data,
            'time' => $end,
        ];
        // echo json_encode($response);
        // exit;
        $this->menu($data);
    }
    public function store_data_name()
    {
        $this->form_validation->set_rules('nama_data', 'Nama Data', 'trim|required', [
            'required' => 'Nama Data tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == true) {
            $insert = [
                'nama_data' => $this->input->post('nama_data'),
                'tanggal_hitung' => (date('Y-m-d H:i:s')),
                'jumlah_data' => 0,
            ];
            if ($this->input->post('type') == 'add') {
                $data = $this->model->insert('data', $insert);
                $message = 'Data berhasil disimpan';
            } else {
                $data = $this->model->update_data('data', $insert, 'id_data', $this->input->post('id_data'));
                $message = 'Data berhasil diubah';
            }
            $response = [
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => 'validation_failed',
                'message' => $this->form_validation->error_array(),
            ];
        }
        echo json_encode($response);
    }
    public function config_data($id_data, $jenis)
    {
        $data['jenis'] = $jenis;
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'data_sample';
        $data['pendidikan'] = ['SMA', 'S1'];
        $data['pekerjaan'] = ['PETANI', 'GURU', 'PERAWAT', 'IRT'];
        $data['id_data'] = $id_data;
        $data['nama_sample'] = $this->model->get_where_data('data', 'id_data', $id_data, 'id_data', 'desc')->row();
        $data['analisis'] = $this->analisis($id_data);
        $data['data_anak'] = $this->data_anak($id_data, $data['analisis']);
        $this->model->update_data('data', ['data_analisis' => json_encode($data['analisis'])], 'id_data', $id_data);
        // echo json_encode($data);
        // exit;
        $this->menu($data);
    }
    public function data_anak($id_sample, $data_analisis)
    {
        $data = $this->costume->get_data_anak($id_sample);
        if ($data) {
            foreach ($data as $key => $value) {

                $result[] = $value;
                $value->{'kesiapan'} = $this->make_analisis_naivebayes($value->nst);
            }
            $response = [
                'status' => 'data_exist',
                'result' => $result,
            ];
        } else {
            $response = [
                'status' => 'not_exist',
            ];
        }
        return $response;
    }
    public function delete_data()
    {
        $id_data = $this->input->post('id_data');
        $data = $this->model->delete_data('data', ['id_data' => $id_data]);
        $response = [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
            'data' => $data,
        ];
        echo json_encode($response);
    }
    // anak
    public function store_anak()
    {

        $this->form_validation->set_rules('nama_anak', 'Nama Anak', 'trim|required', [
            'required' => 'Nama Anak tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin Anak', 'trim|required', [
            'required' => 'Jenis Kelamin Anak tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('umur', 'Umur Anak', 'trim|required|numeric', [
            'required' => 'Umur Anak tidak boleh kosong',
            'numeric' => 'Umur Anak harus berupa angka',
        ]);
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required', [
            'required' => 'Nama Ayah tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required', [
            'required' => 'Nama Ibu tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'trim|required', [
            'required' => 'Pekerjaan Ayah tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'trim|required', [
            'required' => 'Pekerjaan Ibu tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'trim|required', [
            'required' => 'Pendidikan Ibu tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'trim|required', [
            'required' => 'Pendidikan Ayah tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('nst', 'NST', 'trim|required|numeric', [
            'required' => 'NST Tidak boleh kosong',
            'numeric' => 'NST harus berupa angka',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', [
            'required' => 'keterangan tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation_failed',
                'message' => $this->form_validation->error_array(),
            ];
        } else {
            $insert_anak = [
                'nama_anak ' => strtoupper($this->input->post('nama_anak')),
                'id_sample' => $this->input->post('id_sample'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'umur' => $this->input->post('umur'),
                'jenis_data' => 0,
                'nst' => $this->input->post('nst'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $id_anak = $this->model->insert('table_anak', $insert_anak);
            $insert_orang_tua = [
                'id_anak' => $id_anak,
                'nama_ayah' => strtoupper($this->input->post('nama_ayah')),
                'nama_ibu' => strtoupper($this->input->post('nama_ibu')),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
                'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            ];
            $kemampuan_anak = [
                'id_anak' => $id_anak,
                'emosional' => 'Y',
                'kognitif' => 'Y',
                'sosial' => 'Y',
                'calistung' => 'Y',
            ];
            if ($id_anak) {
                $this->model->insert('table_orang_tua', $insert_orang_tua);
                $this->model->insert('table_kemampuan_anak', $kemampuan_anak);
            }
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ];
        }

        echo json_encode($response);
    }
    public function get_kemampuan_anak()
    {
        $id_anak = $this->input->post('id_anak');
        $data = $this->model->get_where_data('table_kemampuan_anak', 'id_anak', $id_anak, 'id_kemampuan', 'desc')->row();
        $response = [
            'status' => 'success',
            'data' => $data,
        ];

        echo json_encode($response);
    }
    public function update_foto_anak()
    {
        $id_anak = $this->input->post('id_anak');
        $upload_config = [
            'path' => 'uploads/foto_anak/',
            'name' => 'foto_anak',
        ];
        $upload = $this->upload_image($upload_config);
        if ($upload['status'] == 'failed') {
            $response = [
                'status' => 'failed',
                'message' => $upload['error'],
            ];
        } else {
            $check_foto = $this->model->get_where_data('table_anak', 'id_anak', $id_anak, '', 'desc')->row();
            if ($check_foto->foto_anak != '') {
                $status_foto = ['status' => 'hapus file tidak ada'];
                if (file_exists($check_foto->foto_anak)) {
                    unlink($check_foto->foto_anak);
                    $status_foto = ['status' => 'hapus'];
                }
            } else {
                $status_foto = ['status' => 'tidak_ada'];
            }
            $update = [
                'foto_anak' => 'uploads/foto_anak/' . $upload['data']['file_name'],
            ];
            $this->model->update_data('table_anak', $update, 'id_anak', $id_anak);
            $response = [
                'status' => 'success',
                'data' => $upload['data'],
                'status_foto' => $status_foto,
                'message' => 'Foto berhasil di perbarui',
            ];
        }
        echo json_encode($response);
    }
    // use for upload image produk
    public function upload_image($config)
    {

        $config['upload_path'] = $config['path'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($config['name'])) {
            $response = ['status' => 'failed', 'error' => $this->upload->display_errors()];
        } else {
            $data = $this->upload->data();
            $response = [
                'status' => 'success',
                'data' => $data,
            ];
        }
        return $response;
    }
    public function edit_kemampuan_anak()
    {
        $id_anak = $this->input->post('id_anak');
        $kemampuan_anak = [
            'id_anak' => $id_anak,
            'emosional' => $this->input->post('emosional'),
            'kognitif' => $this->input->post('kognitif'),
            'sosial' => $this->input->post('sosial'),
            'calistung' => $this->input->post('calistung'),
        ];
        $this->model->update_data('table_kemampuan_anak', $kemampuan_anak, 'id_anak', $id_anak);
        $response = [
            'status' => 'success',
            'data' => $this->input->post(),
            'message' => 'Data kemampuan anak berhasil di perbarui',
        ];
        echo json_encode($response);
    }
    public function edit_anak() {}
    public function delete_anak()
    {
        $id = $this->input->post('id');
        $delete_data_anak = $this->model->delete_data('table_anak', ['id_anak' => $id]);
        $delete_data_orang_tua = $this->model->delete_data('table_orang_tua', ['id_anak' => $id]);
        $response = [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ];
        echo json_encode($response);
    }
    // function analisis
    public function analisis($id_sample)
    {
        $start = microtime(true);
        $probilitas = $this->probilitas($id_sample);
        $data_testing = $this->data_testing($id_sample);
        $response = [
            'time_execution' => microtime(true) - $start,
            'id_sample' => $id_sample,
            // 'probabilitas' => $probilitas,
            'data_testing' => $data_testing,
        ];
        return $response;
        // echo json_encode([
        //     'time_execution' => microtime(true) - $start,
        //     'id_sample' => $id_sample,
        //     'probabilitas' => $probilitas,
        //     'data_testing' => $data_testing,
        // ]);
    }
    public function data_testing($id_sample)
    {
        // jumlah anak di dalam kelas
        $count_anak = $this->model->get_where_data('table_anak', 'id_sample', $id_sample, 'id_anak', 'desc')->num_rows();
        // jumlah anak siap
        $count_anak_siap = $this->costume->count_by($id_sample, 'keterangan', 'SIAP');
        //jumlah anak tidak siap
        $count_anak_tidak = $this->costume->count_by($id_sample, 'keterangan', 'BELUM');
        // laki-laki siap
        $_l_s = $this->costume->get_data_prop_likehood($id_sample, 'L', 'jenis_kelamin', 'SIAP');
        // perempuan siap
        $_p_s = $this->costume->get_data_prop_likehood($id_sample, 'P', 'jenis_kelamin', 'SIAP');
        // laki-laki belum siap
        $_l_b = $this->costume->get_data_prop_likehood($id_sample, 'L', 'jenis_kelamin', 'BELUM');
        // perempuan belum siap
        $_p_b = $this->costume->get_data_prop_likehood($id_sample, 'P', 'jenis_kelamin', 'BELUM');
        // 5 tahun siap
        $_5_s = $this->costume->get_data_prop_likehood($id_sample, '5', 'umur', 'SIAP');
        // 6 tahun siap
        $_6_s = $this->costume->get_data_prop_likehood($id_sample, '6', 'umur', 'SIAP');
        // 5 tahun belum siap
        $_5_b = $this->costume->get_data_prop_likehood($id_sample, '5', 'umur', 'BELUM');
        // 6 tahun belum siap
        $_6_b = $this->costume->get_data_prop_likehood($id_sample, '6', 'umur', 'BELUM');

        // emosional y siap
        $_y_s_e = $this->costume->count_join_ortu_by($id_sample, 'Y', 'emosional', 'SIAP');
        // emosional t siap
        $_t_s_e = $this->costume->count_join_ortu_by($id_sample, 'T', 'emosional', 'SIAP');
        // emosional y belum siap
        $_y_b_e = $this->costume->count_join_ortu_by($id_sample, 'Y', 'emosional', 'BELUM');
        // emosional t belum siap
        $_t_b_e = $this->costume->count_join_ortu_by($id_sample, 'T', 'emosional', 'BELUM');

        // kognitif y siap
        $_y_s_k = $this->costume->count_join_ortu_by($id_sample, 'Y', 'kognitif', 'SIAP');
        // kognitif t siap
        $_t_s_k = $this->costume->count_join_ortu_by($id_sample, 'T', 'kognitif', 'SIAP');
        // kognitif y belum siap
        $_y_b_k = $this->costume->count_join_ortu_by($id_sample, 'Y', 'kognitif', 'BELUM');
        // kognitif t belum siap
        $_t_b_k = $this->costume->count_join_ortu_by($id_sample, 'T', 'kognitif', 'BELUM');

        // sosial y siap
        $_y_s_s = $this->costume->count_join_ortu_by($id_sample, 'Y', 'sosial', 'SIAP');
        // sosial t siap
        $_t_s_s = $this->costume->count_join_ortu_by($id_sample, 'T', 'sosial', 'SIAP');
        // sosial y belum siap
        $_y_b_s = $this->costume->count_join_ortu_by($id_sample, 'Y', 'sosial', 'BELUM');
        // sosial t belum siap
        $_t_b_s = $this->costume->count_join_ortu_by($id_sample, 'T', 'sosial', 'BELUM');

        // calistung y siap
        $_y_s_c = $this->costume->count_join_ortu_by($id_sample, 'Y', 'calistung', 'SIAP');
        // calistung t siap
        $_t_s_c = $this->costume->count_join_ortu_by($id_sample, 'T', 'calistung', 'SIAP');
        // calistung y belum siap
        $_y_b_c = $this->costume->count_join_ortu_by($id_sample, 'Y', 'calistung', 'BELUM');
        // calistung t belum siap
        $_t_b_c = $this->costume->count_join_ortu_by($id_sample, 'T', 'calistung', 'BELUM');

        $response = [
            'atribut_kelas' => [
                'siap' => $count_anak_siap,
                'belum_siap' => $count_anak_tidak,
            ],
            'atribut_jenis_kelamin' => [
                'siap' => [
                    'laki_laki' => $_l_s,
                    'perempuan' => $_p_s,
                ],
                'belum_siap' => [
                    'laki_laki' => $_l_b,
                    'perempuan' => $_p_b,
                ],
            ],
            'atribut_usia' => [
                'siap' => [
                    '5' => $_5_s,
                    '6' => $_6_s,
                ],
                'belum_siap' => [
                    '5' => $_5_b,
                    '6' => $_6_b,
                ],
            ],
            'atribut_emosional' => [
                'y' => [
                    'siap' => $_y_s_e,
                    'belum_siap' => $_y_b_e,
                ],
                't' => [
                    'siap' => $_t_s_e,
                    'belum_siap' => $_t_b_e,
                ],
            ],
            'atribut_kognitif' => [
                'y' => [
                    'siap' => $_y_s_k,
                    'belum_siap' => $_y_b_k,
                ],
                't' => [
                    'siap' => $_t_s_k,
                    'belum_siap' => $_t_b_k,
                ],
            ],
            'atribut_sosial' => [
                'y' => [
                    'siap' => $_y_s_s,
                    'belum_siap' => $_y_b_s,
                ],
                't' => [
                    'siap' => $_t_s_s,
                    'belum_siap' => $_t_b_s,
                ],
            ],
            'atribut_calistung' => [
                'y' => [
                    'siap' => $_y_s_c,
                    'belum_siap' => $_y_b_c,
                ],
                't' => [
                    'siap' => $_t_s_c,
                    'belum_siap' => $_t_b_c,
                ],
            ],
            'probabilitas_kelas' => [
                'siap' => $count_anak_siap . "/" . $count_anak,
                'belum_siap' => $count_anak_tidak . "/" . $count_anak,
                'siap_count' => round(($count_anak_siap == 0 ? 0 : $count_anak_siap / $count_anak), 4),
                'belum_siap_count' => round(($count_anak_tidak == 0 ? 0 : $count_anak_tidak / $count_anak), 4),
            ],
            'probabilitas_jenis_kelamin' => [
                'laki_laki' => [
                    'jenis_kelamin' => 'laki-laki',
                    'siap' => $_l_s . "/" . $count_anak_siap,
                    'belum_siap' => $_l_b . "/" . $count_anak_tidak,
                    'siap_count' => round(($_l_s == 0 ? 0 : $_l_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_l_b == 0 ? 0 : $_l_b / $count_anak_tidak), 4),
                ],
                'perempuan' => [
                    'jenis_kelamin' => 'perempuan',
                    'siap' => $_p_s . "/" . $count_anak_siap,
                    'belum_siap' => $_p_b . "/" . $count_anak_tidak,
                    'siap_count' => round(($_p_s == 0 ? 0 : $_p_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_p_b == 0 ? 0 : $_p_b / $count_anak_tidak), 4),
                ],
            ],
            'probabilitas_usia' => [
                '5' => [
                    'keterangan' => '5 Tahun',
                    'siap' => $_5_s . "/" . $count_anak_siap,
                    'belum_siap' => $_5_b . "/" . $count_anak_tidak,
                    'siap_count' => round(($_5_s == 0 ? 0 : $_5_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_5_b == 0 ? 0 : $_5_b / $count_anak_tidak), 4),
                ],
                '6' => [
                    'keterangan' => '6 Tahun',
                    'siap' => $_6_s . "/" . $count_anak_siap,
                    'belum_siap' => $_6_b . "/" . $count_anak_tidak,
                    'siap_count' => round(($_6_s == 0 ? 0 : $_6_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_6_b == 0 ? 0 : $_6_b / $count_anak_tidak), 4),
                ],
            ],
            'probabilitas_emosional' => [
                'y' => [
                    'keterangan' => 'Ya',
                    'siap' => $_y_s_e . "/" . $count_anak_siap,
                    'belum_siap' => $_y_b_e . "/" . $count_anak_tidak,
                    'siap_count' => round(($_y_s_e == 0 ? 0 : $_y_s_e / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_y_b_e == 0 ? 0 : $_y_b_e / $count_anak_tidak), 4),
                ],
                't' => [
                    'keterangan' => 'Tidak',
                    'siap' => $_t_s_e . "/" . $count_anak_siap,
                    'belum_siap' => $_t_b_e . "/" . $count_anak_tidak,
                    'siap_count' => round(($_t_s_e == 0 ? 0 : $_t_s_e / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_t_b_e == 0 ? 0 : $_t_b_e / $count_anak_tidak), 4),
                ],
            ],
            'probabilitas_kognitif' => [
                'y' => [
                    'keterangan' => 'Ya',
                    'siap' => $_y_s_k . "/" . $count_anak_siap,
                    'belum_siap' => $_y_b_k . "/" . $count_anak_tidak,
                    'siap_count' => round(($_y_s_k == 0 ? 0 : $_y_s_k / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_y_b_k == 0 ? 0 : $_y_b_k / $count_anak_tidak), 4),
                ],
                't' => [
                    'keterangan' => 'Tidak',
                    'siap' => $_t_s_k . "/" . $count_anak_siap,
                    'belum_siap' => $_t_b_k . "/" . $count_anak_tidak,
                    'siap_count' => round(($_t_s_k == 0 ? 0 : $_t_s_k / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_t_b_k == 0 ? 0 : $_t_b_k / $count_anak_tidak), 4),
                ],
            ],
            'probabilitas_sosial' => [
                'y' => [
                    'keterangan' => 'Ya',
                    'siap' => $_y_s_s . "/" . $count_anak_siap,
                    'belum_siap' => $_y_b_s . "/" . $count_anak_tidak,
                    'siap_count' => round(($_y_s_s == 0 ? 0 : $_y_s_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_y_b_s == 0 ? 0 : $_y_b_s / $count_anak_tidak), 4),
                ],
                't' => [
                    'keterangan' => 'Tidak',
                    'siap' => $_t_s_s . "/" . $count_anak_siap,
                    'belum_siap' => $_t_b_s . "/" . $count_anak_tidak,
                    'siap_count' => round(($_t_s_s == 0 ? 0 : $_t_s_s / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_t_b_s == 0 ? 0 : $_t_b_s / $count_anak_tidak), 4),
                ],
            ],
            'probabilitas_calistung' => [
                'y' => [
                    'keterangan' => 'Ya',
                    'siap' => $_y_s_c . "/" . $count_anak_siap,
                    'belum_siap' => $_y_b_c . "/" . $count_anak_tidak,
                    'siap_count' => round(($_y_s_c == 0 ? 0 : $_y_s_c / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_y_b_c == 0 ? 0 : $_y_b_c / $count_anak_tidak), 4),
                ],
                't' => [
                    'keterangan' => 'Tidak',
                    'siap' => $_t_s_c . "/" . $count_anak_siap,
                    'belum_siap' => $_t_b_c . "/" . $count_anak_tidak,
                    'siap_count' => round(($_t_s_c == 0 ? 0 : $_t_s_c / $count_anak_siap), 4),
                    'belum_siap_count' => round(($_t_b_c == 0 ? 0 : $_t_b_c / $count_anak_tidak), 4),
                ],
            ],
        ];

        // echo json_encode($response);
        // exit;
        return $response;
    }

    public function probilitas($id_sample)
    {
        $count_anak = $this->model->get_where_data('table_anak', 'id_sample', $id_sample, 'id_anak', 'desc')->num_rows();
        // gender
        $count_laki = $this->costume->count_by($id_sample, 'jenis_kelamin', 'L');
        $count_perempuan = $this->costume->count_by($id_sample, 'jenis_kelamin', 'P');
        // status keterangan
        $count_anak_siap = $this->costume->count_by($id_sample, 'keterangan', 'SIAP');
        $count_anak_tidak = $this->costume->count_by($id_sample, 'keterangan', 'BELUM');

        $probabilitas_pior = [
            'siap' => $count_anak_siap / $count_anak,
            'tidak' => $count_anak_tidak / $count_anak,
        ];

        $l_usia = [
            '6_siap' => $this->costume->get_data_prop_likehood($id_sample, '6', 'umur', 'SIAP') / $count_anak_siap,
            '5_tidak' => $this->costume->get_data_prop_likehood($id_sample, '5', 'umur', 'BELUM') / $count_anak_siap,
        ];
        $l_gender = [
            'p_siap' => $this->costume->get_data_prop_likehood($id_sample, 'P', 'jenis_kelamin', 'SIAP') / $count_perempuan,
            'p_tidak' => $this->costume->get_data_prop_likehood($id_sample, 'P', 'jenis_kelamin', 'BELUM') / $count_perempuan,
            'l_siap' => $this->costume->get_data_prop_likehood($id_sample, 'L', 'jenis_kelamin', 'SIAP') / $count_laki,
            'l_tidak' => $this->costume->get_data_prop_likehood($id_sample, 'L', 'jenis_kelamin', 'BELUM') / $count_laki,
        ];
        // pendidikan
        $pendidikan_ibu = [
            'sma_siap' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ibu', 'SIAP') / $count_anak_siap,
            'sma_tidak' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ibu', 'BELUM') / $count_anak_tidak,
            's1_siap' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ibu', 'SIAP') / $count_anak_siap,
            's1_tidak' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ibu', 'BELUM') / $count_anak_tidak,
        ];

        $pendidikan_ayah = [
            'sma_siap' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ayah', 'SIAP') / $count_anak_siap,
            'sma_tidak' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ayah', 'BELUM') / $count_anak_tidak,
            's1_siap' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ayah', 'SIAP') / $count_anak_siap,
            's1_tidak' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ayah', 'BELUM') / $count_anak_tidak,
        ];
        // pekerjaan
        $pekerjaan_ibu = [
            'guru_siap' => $this->costume->count_join_ortu_by($id_sample, 'GURU', 'pekerjaan_ibu', 'SIAP') / $count_anak_siap,
            'guru_tidak' => $this->costume->count_join_ortu_by($id_sample, 'GURU', 'pekerjaan_ibu', 'BELUM') / $count_anak_tidak,
            'irt_siap' => $this->costume->count_join_ortu_by($id_sample, 'IRT', 'pekerjaan_ibu', 'SIAP') / $count_anak_siap,
            'irt_tidak' => $this->costume->count_join_ortu_by($id_sample, 'IRT', 'pekerjaan_ibu', 'BELUM') / $count_anak_tidak,
        ];

        $pekerjaan_ayah = [
            'sma_siap' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ayah', 'SIAP') / $count_anak_siap,
            'sma_tidak' => $this->costume->count_join_ortu_by($id_sample, 'SMA', 'pendidikan_ayah', 'BELUM') / $count_anak_tidak,
            's1_siap' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ayah', 'SIAP') / $count_anak_siap,
            's1_tidak' => $this->costume->count_join_ortu_by($id_sample, 'S1', 'pendidikan_ayah', 'BELUM') / $count_anak_tidak,
        ];
        $response = [
            'prop_pior' => $probabilitas_pior,
            'like_hood' => [
                'usia' => $l_usia,
                'gender' => $l_gender,
                'pendidikan' => [
                    'ibu' => $pendidikan_ibu,
                    'ayah' => $pendidikan_ayah,
                ],
                'pekerjaan' => [
                    'ibu' => $pekerjaan_ibu,
                    'ayah' => $pekerjaan_ayah,
                ],
            ],
        ];
        // $probabilitas_like_hood=
        return $response;
    }
    public function test_for_data()
    {
        $id_anak = $this->input->post('id_anak');
        $id_data = $this->input->post('id_data');
        $get_data_anak = $this->costume->get_data_anak_spefisik($id_anak);
        $get_data = $this->model->get_where_data('data', 'id_data', $id_data, 'id_data', 'desc')->row();
        $data_sample = [
            'nama' => $get_data_anak->nama_anak,
            'jenis_kelamin' => $get_data_anak->jenis_kelamin,
            'umur' => $get_data_anak->umur,
            'emosional' => $get_data_anak->emosional,
            'kognitif' => $get_data_anak->kognitif,
            'sosial' => $get_data_anak->sosial,
            'calistung' => $get_data_anak->calistung,
        ];
        $response = [
            'status' => 'success',
            'data_anak' => $data_sample,
            'data_analisisi' => json_decode($get_data->data_analisis),
        ];
        echo json_encode($response);
    }
    public function get_data_anak_spesifik()
    {
        $id_anak = $this->input->post('id_anak');
        $data_anak = $this->costume->get_data_anak_spefisik($id_anak);
        $nst = $data_anak->nst;
        $kesiapan = $this->model->get_where_data('table_kemampuan_anak', 'id_anak', $id_anak, 'id_kemampuan', 'desc')->row();
        $siap = $this->likelihood($nst, 55);
        $tidak_siap = $this->likelihood($nst, 45);
        $posterior = $this->probilitas_akhir($id_anak);
        $response = [
            'status' => 'success',
            'data' => $data_anak,
            'analisis' => $posterior->prediksi,
            // use here
            'kesiapan' => $kesiapan,
        ];
        echo json_encode($response);
    }
    public function make_analisis_naivebayes($nst)
    {

        $siap = $this->likelihood($nst, 55);
        $tidak_siap = $this->likelihood($nst, 45);
        $posterior = $this->posterior($siap, $tidak_siap);
        return $response = [
            '1' => 'P(' . $nst . '|SIAP)=' . $siap,
            '2' => 'P(' . $nst . '|TIDAK SIAP)=' . $tidak_siap,
            '3' => 'P(SIAP|' . $nst . ')=' . $posterior,
        ];
    }
    public function likelihood($x, $mean)
    {
        $pi = pi();
        $e = exp(1);
        $stdDev = 0.5;
        $expPart = exp(- (($x - $mean) ** 2) / (2 * ($stdDev ** 2)));
        $result = (1 / (5 * sqrt(2 * $pi))) * $expPart;
        return $result;
    }
    public function posterior($siap, $tidak_siap)
    {
        $a1 = $siap;
        $a2 = 0.8235;
        $b1 = $tidak_siap;
        $b2 = 0.1765;
        $numerator = $a1 * $a2;
        $denominator = ($a1 * $a2) + ($b1 * $b2);
        $result = $numerator == 0 ? 0 : ($numerator / $denominator);
        $persen = $result * 100;
        return $persen;
    }
    public function prediksi()
    {
        $data_anak = $this->costume->get_data_anak_analisis();
        foreach ($data_anak as $key => $value) {
            $result[] = $this->probilitas_akhir($value->id_anak);
        }
        $data['prediksi'] = $result;
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'prediksi';
        $this->menu($data);
        // echo json_encode($result);
    }
    public function probilitas_akhir($id_anak)
    {
        $start = microtime(true);
        $id_sample = 3;
        $s_training = $this->model->count_data('table_anak', ['jenis_data' => 0, 'keterangan' => 'SIAP']);
        $b_training = $this->model->count_data('table_anak', ['jenis_data' => 0, 'keterangan' => 'BELUM']);
        $training = $this->model->count_data('table_anak', ['jenis_data' => 0]);
        $p_s = $s_training / $training;
        $p_b = $b_training / $training;
        // likelihood umur
        $data_anak = $this->costume->get_data_anak_spefisik($id_anak);
        $p_s_umur = $this->costume->training_count_join_ortu_by($id_sample, ['umur' => $data_anak->umur], 'SIAP');
        $p_b_umur = $this->costume->training_count_join_ortu_by($id_sample, ['umur <=' => $data_anak->umur], 'BELUM');
        // likelihood gender
        $p_s_gender = $this->costume->training_count_join_ortu_by($id_sample, ['jenis_kelamin' => $data_anak->jenis_kelamin], 'SIAP');
        $p_b_gender = $this->costume->training_count_join_ortu_by($id_sample, ['jenis_kelamin' => $data_anak->jenis_kelamin], 'BELUM');
        // likelihood pendidikan ayah
        $p_s_pendidikan_ayah = $this->costume->training_count_join_ortu_by($id_sample, ['pendidikan_ayah' => $data_anak->pendidikan_ayah], 'SIAP');
        $p_b_pendidikan_ayah = $this->costume->training_count_join_ortu_by($id_sample, ['pendidikan_ayah' => $data_anak->pendidikan_ayah], 'BELUM');
        // likelihood pendidikan ibu
        $p_s_pendidikan_ibu = $this->costume->training_count_join_ortu_by($id_sample, ['pendidikan_ibu' => $data_anak->pendidikan_ibu], 'SIAP');
        $p_b_pendidikan_ibu = $this->costume->training_count_join_ortu_by($id_sample, ['pendidikan_ibu' => $data_anak->pendidikan_ibu], 'BELUM');
        // likelihood pekerjaan ayah
        $p_s_pekerjaan_ayah = $this->costume->training_count_join_ortu_by($id_sample, ['pekerjaan_ayah' => $data_anak->pekerjaan_ayah], 'SIAP');
        $p_b_pekerjaan_ayah = $this->costume->training_count_join_ortu_by($id_sample, ['pekerjaan_ayah' => $data_anak->pekerjaan_ayah], 'BELUM');
        // likelihood pekerjaan ibu
        $p_s_pekerjaan_ibu = $this->costume->training_count_join_ortu_by($id_sample, ['pekerjaan_ibu' => $data_anak->pekerjaan_ibu], 'SIAP');
        $p_b_pekerjaan_ibu = $this->costume->training_count_join_ortu_by($id_sample, ['pekerjaan_ibu' => $data_anak->pekerjaan_ibu], 'BELUM');
        //nst
        $p_s_nst = $this->costume->training_count_join_ortu_by($id_sample, ['nst' => $data_anak->nst], 'SIAP');
        $p_b_nst = $this->costume->training_count_join_ortu_by($id_sample, ['nst' => $data_anak->nst], 'BELUM');
        $search =
            [
                // 'time_execute' => microtime(true) - $start,

                'probilitas_prior' => [
                    'p_siap' => $p_s,
                    'p_belum' => $p_b,
                ],
                'umur' => [
                    'p_siap' => $p_s_umur / $s_training,
                    'p_belum' => $p_b_umur / $b_training,
                ],
                'gender' => [
                    'p_siap' => $p_s_gender / $s_training,
                    'p_belum' => $p_b_gender / $b_training,
                ],
                'p_ayah' => [
                    'p_siap' => $p_s_pendidikan_ayah / $s_training,
                    'p_belum' => $p_b_pendidikan_ayah / $b_training,
                ],
                'p_ibu' => [
                    'p_siap' => $p_s_pendidikan_ibu / $s_training,
                    'p_belum' => $p_b_pendidikan_ibu / $b_training,
                ],
                'kerja_ayah' => [
                    'p_siap' => $p_s_pekerjaan_ayah / $s_training,
                    'p_belum' => $p_b_pekerjaan_ayah / $b_training,
                ],
                'kerja_ibu' => [
                    'p_siap' => $p_s_pekerjaan_ibu / $s_training,
                    'p_belum' => $p_b_pekerjaan_ibu / $b_training,
                ],
                'nst' => [
                    'p_siap' => $p_s_nst / $s_training,
                    'p_belum' => $p_b_nst / $b_training,
                ],
            ];
        $result['siap'] = 1;
        $result['belum'] = 1;
        foreach ($search as $key => $value) {
            $result['siap'] *= $value['p_siap'];
            $result['belum'] *= $value['p_belum'];
        }
        $prediksi = $result['siap'] > $result['belum'] ? 'SIAP' : 'BELUM';

        $response = (object) [
            'data_anak' => $data_anak,
            'prediksi' => $prediksi,
            'probabilitas' => [
                'siap' => $result['siap'],
                'belum' => $result['belum'],
            ],
            'persentase' => $this->posterior($result['siap'], $result['belum']),
            'search' => $search,
        ];
        return $response;
    }
    public function update_jenis_data()
    {
        $id_anak = $this->input->post('id_anak');
        $check = $this->costume->get_data_anak_spefisik($id_anak);
        $update_jenis = $check->jenis_data == 0 ? 1 : 0;
        $this->model->update_data('table_anak', ['jenis_data' => $update_jenis], 'id_anak', $id_anak);
        $response = [
            'status' => 'success',
        ];
        echo json_encode($response);
    }
    public function akurasi()
    {
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'akurasi';
        $tp = 13;
        $tn = 3;
        $fp = 0;
        $fn = 1;
        $akurasi = ($tp + $tn) / ($tp + $tn + $fp + $fn);
        $response = [
            'tp' => $tp,
            'tn' => $tn,
            'fp' => $fp,
            'fn' => $fn,
            'akurasi' => ['real' => $akurasi, 'perentase' => $akurasi * 100],
        ];
        $data['tp'] = $tp;
        $data['tn'] = $tn;
        $data['fp'] = $fp;
        $data['fn'] = $fn;
        $data['akurasi'] = ['real' => $akurasi, 'persentase' => round($akurasi * 100, 2)];
        // echo json_encode();
        $this->menu($data);
    }
}

/* End of file  Naivebayes.php */
