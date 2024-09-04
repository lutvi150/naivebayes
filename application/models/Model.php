<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    public function get_data($table, $orderby, $order)
    {
        $this->db->from($table);
        $this->db->order_by($orderby, $order);
        return $this->db->get();
    }
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function get_where_data($table, $where, $key, $orderby, $order)
    {
        $this->db->from($table);
        $this->db->where($where, $key);
        $this->db->order_by($orderby, $order);
        return $this->db->get();
    }
    public function update_data($table, $data, $where, $key)
    {
        $this->db->where($where, $key);
        $this->db->update($table, $data);
    }
    public function get_where_data_2($table, $where, $orderby, $order)
    {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($orderby, $order);
        return $this->db->get();
    }
    public function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
    public function count_sample($id_sample)
    {
        $this->db->from('table_anak');
        $this->db->where('id_sample', $id_sample);
        return $this->db->count_all_results();
    }
    // for chart js
    public function hitung_siwa($jenis_kelamin)
    {
        $this->db->from('table_anak');
        $this->db->where('jenis_kelamin', $jenis_kelamin);
        return $this->db->count_all_results();
    }
    public function hitung_siap($status)
    {
        $this->db->from('table_anak');
        $this->db->where('keterangan', $status);
        return $this->db->count_all_results();
    }
    public function hitung_emosional($field, $value)
    {
        $this->db->from('table_anak');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_kemampuan_anak.' . $field, $value);
        return $this->db->count_all_results();
    }
}

/* End of file Database.php */
