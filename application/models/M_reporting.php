<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_reporting extends CI_Model
{
    var $table = 'reporting_mv_in';
    var $table2 = 'reporting_mv_out';
    var $table3 = 'reporting_stok_list';
    //var $table2 = 'view_container';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function mv_in($tanggal_awal, $tanggal_akhir, $id_mlo)
    {
        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);

        return $this->db->get($this->table)->result();
    }

    function mv_out($tanggal_awal, $tanggal_akhir, $id_mlo)
    {
        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);

        return $this->db->get($this->table2)->result();
    }

    function s_list($tanggal, $id_mlo)
    {
        $this->db->where('date_in <=', $tanggal);
        $this->db->where('id_mlo', $id_mlo);
        return $this->db->get($this->table3)->result();
    }
}