<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Costume extends CI_Model
{

	function get_data_anak_spefisik($id_anak)
	{
		$this->db->from('table_anak');
		$this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
		$this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
		$this->db->where('table_anak.id_anak', $id_anak);
		$this->db->limit(1);
		return $this->db->get()->row();
	}
	function get_data_anak($id_sample)
	{
		$this->db->from('table_anak');
		$this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
		$this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
		$this->db->where('table_anak.id_sample', $id_sample);
		$this->db->order_by('table_anak.id_anak', 'desc');
		return $this->db->get()->result();
	}
	function get_data_prop_likehood($id_sample, $bykey, $key, $keterangan)
	{
		$this->db->from('table_anak');
		$this->db->where('id_sample', $id_sample);
		$this->db->where('keterangan', $keterangan);
		$this->db->where($key, $bykey);
		return $this->db->count_all_results();
	}
	function count_by($id_sample, $field, $key)
	{
		$this->db->from('table_anak');
		$this->db->where('id_sample', $id_sample);
		$this->db->where($field, $key);
		return $this->db->count_all_results();
	}
	function count_join_ortu_by($id_sample,  $key, $field, $keterangan)
	{
		$this->db->from('table_anak');
		$this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
		$this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
		$this->db->where('table_anak.id_sample', $id_sample);
		$this->db->where('keterangan', $keterangan);
		$this->db->where($field, $key);
		$this->db->order_by('table_anak.id_anak', 'desc');
		return $this->db->count_all_results();
	}
}
                        
/* End of file Costume.php */
