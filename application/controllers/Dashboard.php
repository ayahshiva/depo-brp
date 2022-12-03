<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_users');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function index()
	{
		$this->load->view('include/header.php');
		$this->load->view('include/navbar.php');
		$this->load->view('include/sidebar.php');
		$this->load->view('page/dashboard/dashboard');
		$this->load->view('include/footer');
	}
}
