<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_reporting extends CI_Model
{
    var $table = 'reporting_mv_in';
    var $table2 = 'reporting_mv_out';
    var $table3 = 'reporting_stok_list';
    var $table4 = 'reporting_mlo_invoicing';

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
        $this->db->select('
                container.no_cont as no_cont, container.size as size, container.tipe as tipe,
                detil_move_in.kondisi as kondisi, detil_move_in.payload as payload, detil_move_in.cleaning as cleaning, detil_move_in.date_in as date_in, detil_move_in.truck_in as truck_in,
                vessel.nama as nama_vessel,
                payment_in.no_voyage as no_voyage,
                emkl.nama as nama_emkl
            ');
        $this->db->join('container', 'detil_move_in.id_container = container.id', 'left');
        $this->db->join('detil_payment_in', 'detil_move_in.id_container = detil_payment_in.id_container' ,'left');
        $this->db->join('payment_in', 'detil_payment_in.id_payment_in = payment_in.id', 'left');
        $this->db->join('vessel', 'payment_in.id_vessel = vessel.id');
        $this->db->join('emkl', 'payment_in.id_emkl = emkl.id', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $this->db->order_by('detil_move_in.date_in', 'ASC');
        return $this->db->get('detil_move_in')->result();
    }

    function mlo_invoicing($tanggal_awal, $tanggal_akhir, $id_mlo)
    {
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('id_mlo', $id_mlo);
        return $this->db->get($this->table4)->result();
    }
}