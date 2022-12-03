<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_users');
		$this->load->model('M_container');
		$this->load->model('M_mlo');
		$this->load->model('M_emkl');
		$this->load->model('M_vessel');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function index()
	{
		$data['jumlahContainer'] = $this->M_container->count_all();
		$data['jumlahMLO'] = $this->M_mlo->count_all();
		$data['jumlahEMKL'] = $this->M_emkl->count_all();

		$this->load->view('include/header.php');
		$this->load->view('include/navbar.php');
		$this->load->view('include/sidebar.php');
		$this->load->view('page/dashboard/dashboard', $data);
		$this->load->view('include/footer');
	}
}
