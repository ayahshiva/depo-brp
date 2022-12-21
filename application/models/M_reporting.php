<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_reporting extends CI_Model
{
    var $table = 'container';
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
        $this->db->select('
                container.id as id_container, container.no_cont as no_container, container.size as size, container.tipe as tipe, container.stok as stok, container.id_mlo as id_mlo,
                detil_move_in.id as id_detil_in, detil_move_in.date_in as date_in, detil_move_in.time_in as time_in, detil_move_in.kondisi as kondisi, detil_move_in.truck_in as truck_in, detil_move_in.grade as grade, detil_move_in.cleaning as cleaning, detil_move_in.payload as payload, detil_move_in.tare as tare, detil_move_in.st_cont as status,
                mlo.nama as nama_mlo,
                move_in.id_vessel as id_vessel, vessel.nama as nama_vessel, move_in.no_voyage as no_voyage,
                payment_in.id_emkl as id_emkl, emkl.nama as nama_emkl
            ');
        $this->db->join('detil_move_in','container.id = detil_move_in.id_container','left');
        $this->db->join('mlo','container.id_mlo = mlo.id','left');
        $this->db->join('move_in','detil_move_in.id_move_in = move_in.id', 'left');
        $this->db->join('vessel', 'move_in.id_vessel = vessel.id','left');
        $this->db->join('payment_in', 'move_in.id = payment_in.id_move_in', 'left');
        $this->db->join('emkl', 'payment_in.id_emkl = emkl.id', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->group_by('detil_move_in.id');
        $this->db->order_by('detil_move_in.id', 'ASC');

        return $this->db->get($this->table)->result();
    }

    function mv_out($tanggal_awal, $tanggal_akhir, $id_mlo)
    {
        $this->db->select('
                container.id as id_container, container.no_cont as no_container, container.size as size, container.tipe as tipe, container.stok as stok, container.id_mlo as id_mlo,
                detil_move_in.id as id_detil_in, detil_move_in.date_in as date_in, detil_move_in.time_in as time_in, detil_move_in.kondisi as kondisi, detil_move_in.truck_in as truck_in, detil_move_in.grade as grade, detil_move_in.cleaning as cleaning, detil_move_in.payload as payload, detil_move_in.tare as tare, detil_move_in.st_cont as status,
                mlo.nama as nama_mlo,
                detil_move_out.date_out as date_out, detil_move_out.time_out as time_out, detil_move_out.seal_number as seal_number, detil_move_out.truck_out as truck_out,
                move_out.id_vessel as id_vessel_out, move_out.id_emkl as id_emkl, 
                move_in.id_vessel as id_vessel_in,
                payment_out.do_number as do_number
            ');
        $this->db->join('detil_move_out', 'container.id = detil_move_out.id_container','left');
        $this->db->join('detil_move_in','container.id = detil_move_in.id_container','left');
        $this->db->join('mlo', 'container.id_mlo = mlo.id', 'left');
        $this->db->join('move_out', 'detil_move_out.id_move_out = move_out.id', 'left');
        $this->db->join('payment_out', 'move_out.id = payment_out.id_move_out', 'left');
        $this->db->join('move_in','detil_move_in.id_move_in = move_in.id', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->group_by('detil_move_out.id');
        $this->db->order_by('detil_move_out.id', 'ASC');

        return $this->db->get($this->table)->result();
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