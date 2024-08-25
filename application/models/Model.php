<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    function get_data($table)
    {
        return $this->db->from($table)->get();
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
        $this->db->update($table, $data);
        $this->db->where($where, $key);
    }
    function get_where_data_2($table, $where, $orderby, $order)
    {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($orderby, $order);
        return $this->db->get();
    }
}
                        
/* End of file Database.php */
