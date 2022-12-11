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
}