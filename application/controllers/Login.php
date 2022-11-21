<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		// Helper
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date_helper');
		$this->load->helper('email_helper');
		$this->load->library('form_validation');
		//$this->load->helper('whatsapp_helper');
		//$this->load->helper('browserinfo_helper');
		//$this->load->helper('ipaddress_helper');
		

		//Library
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');

		//Model
		$this->load->model('M_users');
	}

	function index()
	{
		
		$this->load->view('include/header.php');
		$this->load->view('page/login.php');
		$this->load->view('include/footer.php');
		
	}

	function auth()
	{
		$username= $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$result = $this->M_users->auth($username);
		if($result == TRUE){
			$data_admin = array(
				'ID' => $result['ID'],
				'username' => $result['username'],
				'password' => $result['password'],
				'email' => $result['email'],
				'role' => $result['role'],
				'display_name' => $result['display_name'],
				'status' => $result['status']
			);
			$this->session->set_userdata($data_admin);

			$stored_hash = $this->session->userdata('password');
			if($this->bcrypt->check_password($password, $stored_hash)){
				redirect(site_url('dashboard'));
			}else{
				$this->session->set_flashdata('error', 'Username dan/atau Password Salah');
				redirect(site_url('login'));
			}
		}else{
			$this->session->set_flashdata('none', 'Username belum terdaftar');
			redirect(site_url('login'));
		}
	}

	function Logout()
	{		
		$ID = $this->session->userdata('ID');
		$data = array('status'=>'0');
				
		$this->db->where('ID', $ID);
		$this->db->update('users',$data);

		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('display_name');
		//$this->session->unset_userdata('remember_token');

		redirect(site_url());
	}
}
