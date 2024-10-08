<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Costume extends CI_Model
{

    public function get_data_anak_spefisik($id_anak)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_anak', $id_anak);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    public function get_data_anak($id_sample, $jenis)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_sample', $id_sample);
        $this->db->where('table_anak.jenis_data', $jenis);
        $this->db->order_by('table_anak.id_anak', 'desc');
        return $this->db->get()->result();
    }
    public function get_data_prop_likehood($id_sample, $bykey, $key, $keterangan, $jenis_data)
    {
        $this->db->from('table_anak');
        $this->db->where('id_sample', $id_sample);
        $this->db->where('keterangan', $keterangan);
        $this->db->where('jenis_data', $jenis_data);
        $this->db->where($key, $bykey);
        return $this->db->count_all_results();
    }
    public function count_by($id_sample, $field, $key, $jenis)
    {
        $this->db->from('table_anak');
        $this->db->where('id_sample', $id_sample);
        $this->db->where('jenis_data', $jenis);
        $this->db->where($field, $key);
        return $this->db->count_all_results();
    }
    public function count_join_ortu_by($id_sample, $key, $field, $keterangan, $jenis)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_sample', $id_sample);
        $this->db->where('keterangan', $keterangan);
        $this->db->where('jenis_data', $jenis);
        $this->db->where($field, $key);
        $this->db->order_by('table_anak.id_anak', 'desc');
        return $this->db->count_all_results();
    }
    public function training_count_join_ortu_by($id_sample, $where, $keterangan)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_sample', $id_sample);
        $this->db->where('keterangan', $keterangan);
        $this->db->where($where);
        $this->db->where('jenis_data', 0);
        $this->db->order_by('table_anak.id_anak', 'desc');
        return $this->db->count_all_results();
    }
    public function tes($id_sample, $where, $keterangan)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_sample', $id_sample);
        $this->db->where('keterangan', $keterangan);
        $this->db->where($where);
        $this->db->where('jenis_data', 0);
        $this->db->order_by('table_anak.id_anak', 'desc');
        return $this->db->get()->result();
    }
    public function get_data_anak_analisis($id_data)
    {
        $this->db->from('table_anak');
        $this->db->where('id_sample', $id_data);
        $this->db->where('jenis_data', 1);
        $this->db->select('id_anak');
        return $this->db->get()->result();
    }
    public function get_data_acuration($where)
    {
        $this->db->from('table_anak');
        $this->db->join('table_orang_tua', 'table_anak.id_anak = table_orang_tua.id_anak', 'left');
        $this->db->join('table_kemampuan_anak', 'table_anak.id_anak = table_kemampuan_anak.id_anak', 'left');
        $this->db->where('table_anak.id_sample', 3);
        $this->db->where($where);
        $this->db->where('jenis_data', 1);
        $this->db->order_by('table_anak.id_anak', 'desc');
        return $this->db->count_all_results();
    }
    function count_anak($id_sample, $where)
    {
        $this->db->from('table_anak');
        $this->db->where('id_sample', $id_sample);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
}

/* End of file Costume.php */
