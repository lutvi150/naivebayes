<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{

	public function __construct(Type $var = null)
	{
		parent::__construct();
		$this->load->model('Model', 'model');
		$this->load->model('Costume', 'costume');
	}
	public function index($jenis)
	{
		$data['title'] = 'Grafik';
		$data['content'] = 'grafik';
		$data['jenis'] = $jenis;
		$this->menu($data);
	}
	function menu($data)
	{
		$this->load->view('header', $data, FALSE);
		$this->load->view($data['content'], $data);
		$this->load->view('footer', $data, FALSE);
	}
	function jenis_kelamin()
	{
		$perempuan = $this->model->hitung_siwa('L');
		$laki = $this->model->hitung_siwa('P');
		// siap

		$siap = $this->model->hitung_siap('SIAP');
		$tidak_siap = $this->model->hitung_siap('BELUM');
		$oldlabel = ['Emosional', 'Kognitif', 'Sosial', 'Calistung'];
		$count = ['emosional', 'kognitif', 'sosial', 'calistung'];
		foreach ($count as $key => $value) {
			$label[] = $oldlabel[$key];
			$data[] = $this->model->hitung_emosional($value, 'Y');
		}
		$response = [
			'jenis_kelamin' => [
				'label' => ['Laki-laki', 'Perempuan'],
				'data' => [
					$laki,
					$perempuan
				]
			],
			'kesiapan' => [
				'label' => ['Siap', 'Tidak Siap'],
				'data' => [$siap, $tidak_siap]
			],
			'emosional' => [
				'label' => $label,
				'data' => $data
			]
		];
		echo json_encode($response);
	}
}
        
    /* End of file  Grafik.php */
