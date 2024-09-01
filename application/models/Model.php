<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

	function get_data($table, $orderby, $order)
	{
		$this->db->from($table);
		$this->db->order_by($orderby, $order);
		return $this->db->get();
	}
	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	function get_where_data($table, $where, $key, $orderby, $order)
	{
		$this->db->from($table);
		$this->db->where($where, $key);
		$this->db->order_by($orderby, $order);
		return $this->db->get();
	}
	function update_data($table, $data, $where, $key)
	{
		$this->db->where($where, $key);
		$this->db->update($table, $data);
	}
	function get_where_data_2($table, $where, $orderby, $order)
	{
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($orderby, $order);
		return $this->db->get();
	}
	function delete_data($table, $where)
	{
		$this->db->delete($table, $where);
		return $this->db->affected_rows();
	}
	function count_sample($id_sample)
	{
		$this->db->from('table_anak');
		$this->db->where('id_sample', $id_sample);
		return $this->db->count_all_results();
	}
}
                        
/* End of file Database.php */
