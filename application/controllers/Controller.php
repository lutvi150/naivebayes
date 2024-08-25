<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('Model', 'model');
    }
    public function index()
    {

        $data[] = null;
        if ($this->session->userdata('login') == true) {
            redirect('naivebayes');
        } else {
            $this->load->view('login', $data, FALSE);
        }
    }
    function auth()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required' => 'username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required' => 'password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation_failed',
                'message' => $this->form_validation->error_array()
            ];
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->model->get_where_data_2('table_user', ['username' => $username, 'password' => hash('sha256', $password)], 'id', 'asc')->row();
            if ($data) {
                $ses = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'login' => true,
                ];
                $this->session->set_userdata($ses);

                $response = [
                    'status' => 'success',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'username atau password salah'
                ];
            }
        }
        echo json_encode($response);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('controller');
    }
    function account_reset()
    {
        $username = 'admin';
        $password = 'admin';
        $data = $this->model->get_where_data('table_user', 'username', $username, 'id', 'asc')->row_array();
        $insert = [
            'username' => $username,
            'password' => hash('sha256', $password),
        ];
        if ($data) {
            $result = $this->model->update_data('table_user', $insert, 'username', 'admin',);
            $response = [
                'status' => 'update data',
                'result' => $result,
            ];
        } else {
            $result = $this->model->insert('table_user', $insert);
            $response = [
                'status' => 'insert data',
                'result' => $result,
            ];
        }
        echo json_encode($response);
    }
}
        
    /* End of file  Controller.php */
