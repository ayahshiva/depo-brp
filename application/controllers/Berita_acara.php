<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_acara extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_container');
		$this->load->model('M_mlo');
		$this->load->model('M_vessel');
		$this->load->model('M_emkl');
		$this->load->model('M_move_in');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function index()
	{
		$data['mlo'] = $this->M_mlo->get();
		$data['vessel'] = $this->M_vessel->get();
		$data['emkl'] = $this->M_emkl->get();

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/movein/berita_acara', $data);
		$this->load->view('include/footer');
	}

	function view_berita_acara()
	{
		$data['tanggal_awal'] = $tanggal_awal = $this->input->post('tanggal_awal', TRUE);
		$data['tanggal_akhir']= $tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
		$data['id_emkl'] = $id_emkl = $this->input->post('id_emkl', TRUE);
		$data['id_mlo'] = $id_mlo = $this->input->post('id_mlo', TRUE);
		$data['id_vessel'] = $id_vessel = $this->input->post('id_vessel', TRUE);
		$data['no_voyage'] = $no_voyage = $this->input->post('no_voyage', TRUE);
		$data['do_number'] = $do_number = $this->input->post('do_number', TRUE);

		$data['nama_emkl'] = $this->M_emkl->get_by_id_emkl($id_emkl);

		$this->db->select('*');
		$this->db->from('view_berita_acara');
		$this->db->where('date_in >=', $tanggal_awal);
		$this->db->where('date_in <=', $tanggal_akhir);
		$this->db->where('id_emkl', $id_emkl);
		$this->db->where('id_vessel', $id_vessel);
		$this->db->where('no_voyage', $no_voyage);
		$this->db->where('do_number', $do_number);
		$query = $this->db->get();
		$data['hasil'] = $query->result();

		if(isset($_POST['cetak']))
		{
			$this->load->view('page/movein/view_berita_acara', $data);
		}
		else if(isset($_POST['excel']))
		{
			$this->load->view('page/movein/simpan_berita_acara', $data);	
		}

		
	}
}
    