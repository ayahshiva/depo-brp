<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('M_reporting');
		$this->load->model('M_mlo');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function mv_in()
	{
		$data['mlo'] = $this->M_mlo->get();

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/reporting/mv_in', $data);
		$this->load->view('include/footer');
	}

	function get_mv_in()
	{
		$tanggal_awal = $this->input->post('tanggal_awal', TRUE);
		$tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
		$id_mlo = $this->input->post('id_mlo');

		$data['mlo'] = $this->M_mlo->get_mlo($id_mlo);
		$data['get_mv_in'] = $this->M_reporting->mv_in($tanggal_awal, $tanggal_akhir, $id_mlo);
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;

		$this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'GP');
        $data['gp20'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'GP');
        $data['gp40'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'HC');
        $data['hc40'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'OP');
        $data['op20'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'OP');
        $data['op40'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'FR');
        $data['fr20'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'FR');
        $data['fr40'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'RF');
        $data['rf20'] = $this->db->count_all_results('reporting_mv_in');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('date_in >=', $tanggal_awal);
        $this->db->where('date_in <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'RF');
        $data['rf40'] = $this->db->count_all_results('reporting_mv_in');

		if(isset($_POST['preview']))
		{
			$this->load->view('page/reporting/view_mv_in', $data);
		}
		else if(isset($_POST['save']))
		{
			$this->load->view('page/reporting/get_mv_in', $data);
		}			
	}

    function mv_out()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/mv_out', $data);
        $this->load->view('include/footer');
    }

    function get_mv_out()
    {
        $tanggal_awal = $this->input->post('tanggal_awal', TRUE);
        $tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
        $id_mlo = $this->input->post('id_mlo');

        $data['mlo'] = $this->M_mlo->get_mlo($id_mlo);
        $data['get_mv_out'] = $data_data =  $this->M_reporting->mv_out($tanggal_awal, $tanggal_akhir, $id_mlo);
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'GP');
        $data['gp20'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'GP');
        $data['gp40'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'HC');
        $data['hc40'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'OP');
        $data['op20'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'OP');
        $data['op40'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'FR');
        $data['fr20'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'FR');
        $data['fr40'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '20');
        $this->db->where('tipe', 'RF');
        $data['rf20'] = $this->db->count_all_results('reporting_mv_out');

        $this->db->where('id_mlo', $id_mlo);
        $this->db->where('tgl_keluar >=', $tanggal_awal);
        $this->db->where('waktu_keluar <=', $tanggal_akhir);
        $this->db->where('size', '40');
        $this->db->where('tipe', 'RF');
        $data['rf40'] = $this->db->count_all_results('reporting_mv_out');

        foreach ($data_data as $key => $value) {
            $id_vessel = $value->vessel_in;

            $this->db->where('id', $id_vessel);
            $this->db->limit('1');
            $query = $this->db->get('vessel');
            $row = $query->row();

            $data['nama_vessel'] = $row->nama;

            $tgl1 = strtotime($value->tgl_masuk);
            $tgl2 = strtotime($value->tgl_keluar);
            $days = $tgl2 - $tgl1;
            $totaldays = floor($days / (60*60*24));
            $data['storage'] = $totaldays;

        }

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_mv_out', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_mv_out', $data);
        }           
    }

    function s_list()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/s_list', $data);
        $this->load->view('include/footer');
    }

    function get_s_list()
    {
        $tanggal = $this->input->post('tanggal', TRUE);        
        $id_mlo = $this->input->post('id_mlo');

        $data['nama'] = $this->M_mlo->get_mlo($id_mlo);
        $data_s_list =$data['get_s_list'] = $this->M_reporting->s_list($tanggal, $id_mlo);
        $data['tanggal'] = $tanggal;

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'GP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['gp20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'GP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['gp40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'HC');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['hc40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'OP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['op20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'OP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['op40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'FR');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['fr20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'FR');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['fr40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'RF');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['rf20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'RF');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['rf40'] = $this->db->count_all_results('container');        

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_s_list', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_s_list', $data);
        }           
    }

    function mlo_invoicing()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/mlo_invoicing', $data);
        $this->load->view('include/footer');
    }

    function get_mlo_invoicing()
    {
        $tanggal_awal = $this->input->post('tanggal_awal', TRUE);
        $tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
        $id_mlo = $this->input->post('id_mlo');

        $data['nama'] = $this->M_mlo->get_mlo($id_mlo);
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['invoicing'] =  $this->M_reporting->mlo_invoicing($tanggal_awal, $tanggal_akhir, $id_mlo);

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_mlo_invoicing', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_mlo_invoicing', $data);
        } 

    }
}