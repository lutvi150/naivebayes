<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Naivebayes extends CI_Controller
{

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
        $data['content'] = 'naivebayes';
        $this->menu($data);
    }
}
        
    /* End of file  Naivebayes.php */
