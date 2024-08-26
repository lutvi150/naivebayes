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
        $data['content'] = 'Dashboard';
        $this->menu($data);
    }
    function menu($data)
    {
        $this->load->view('header', $data, FALSE);
        $this->load->view($data['content'], $data);
        $this->load->view('footer', $data, FALSE);
    }
    function naivebayes()
    {
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'data_tabel';
        $data['data'] = $this->model->get_data('data', 'id_data', 'desc')->result();
        // echo json_encode($data);
        // exit;
        $this->menu($data);
    }
    function store_data_name()
    {
        $this->form_validation->set_rules('nama_data', 'Nama Data', 'trim|required', [
            'required' => 'Nama Data tidak boleh kosong'
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
                'message' => $this->form_validation->error_array()
            ];
        }
        echo json_encode($response);
    }
    function config_data($id_data)
    {
        $data['title'] = 'Naive Bayes';
        $data['content'] = 'data_sample';
        $data['pendidikan'] = ['SMA', 'S1'];
        $data['pekerjaan'] = ['PETANI', 'GURU', 'PERAWAT', 'IRT'];
        $data['id_data'] = $id_data;
        $data['nama_sample'] = $this->model->get_where_data('data', 'id_data', $id_data, 'id_data', 'desc')->row();
        $data['data_anak'] = $this->costume->get_data_anak($id_data);
        // echo json_encode($data);
        // exit;
        $this->menu($data);
    }
    function delete_data()
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
    function store_anak()
    {

        $this->form_validation->set_rules('nama_anak', 'Nama Anak', 'trim|required', [
            'required' => 'Nama Anak tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin Anak', 'trim|required', [
            'required' => 'Jenis Kelamin Anak tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('umur', 'Umur Anak', 'trim|required|numeric', [
            'required' => 'Umur Anak tidak boleh kosong',
            'numeric' => 'Umur Anak harus berupa angka'
        ]);
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required', [
            'required' => 'Nama Ayah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required', [
            'required' => 'Nama Ibu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'trim|required', [
            'required' => 'Pekerjaan Ayah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'trim|required', [
            'required' => 'Pekerjaan Ibu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'trim|required', [
            'required' => 'Pendidikan Ibu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'trim|required', [
            'required' => 'Pendidikan Ayah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nst', 'NST', 'trim|required|numeric', [
            'required' => 'NST Tidak boleh kosong',
            'numeric' => 'NST harus berupa angka'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', [
            'required' => 'keterangan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation_failed',
                'message' => $this->form_validation->error_array()
            ];
        } else {
            $insert_anak = [
                'nama_anak ' => strtoupper($this->input->post('nama_anak')),
                'id_sample' => $this->input->post('id_sample'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'umur' => $this->input->post('umur'),
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
            if ($id_anak) {
                $this->model->insert('table_orang_tua', $insert_orang_tua);
            }
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
            ];
        }


        echo json_encode($response);
    }
    function edit_anak() {}
    function delete_anak()
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
    function analisis()
    {
        $start = microtime(true);
        $id_sample = 3;
        $probilitas = $this->probilitas($id_sample);
        echo json_encode([
            'id_sample' => $id_sample,
            'probabilitas' => $probilitas,
            'time_execution' => microtime(true) - $start,
        ]);
    }
    function probilitas($id_sample)
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
                ]
            ]
        ];
        // $probabilitas_like_hood=
        return $response;
    }
}
        
    /* End of file  Naivebayes.php */
