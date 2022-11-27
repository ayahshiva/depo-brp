<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxrequest extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_users');
	}

	function tabel_user()
	{
		$data = $row = array();

		$datauser = $this->M_users->getRows($this->input->post());

		$i = $this->input->post('start');
		foreach($datauser as $user){
			$i++;
			$data[] = array(
						$i, 
						$user->display_name, 
						$user->username, 
						$user->email, 
						$user->role, 
						date('d-m-Y', strtotime($user->last_login)),
						"<button type='button' class='btn btn-success btn-sm text-white' title='edit' 
							data-bs-target='#formEditUser' 
							data-bs-toggle='modal' 
							data-id='$user->ID'
							data-display_name='$user->display_name'
							data-username='$user->username'
							data-email='$user->email'
							data-role='$user->role'>
							<i class='bi bi-pencil-square'></i>
						 </button>
						 <a href='#' onclick='hapus($user->ID)' class='btn btn-danger btn-sm text-white hapus' title='hapus'>
						 	<i class='bi bi-trash'></i>
						 </a>
						"
					);
		}

		$output = array(
				"draw" => $this->input->post('draw'),
				"recordsTotal" => $this->M_users->countAll(),
				"recordsFiltered" => $this->M_users->countFiltered($_POST),
				"data" => $data,
		);

		echo json_encode($output);
	}
}