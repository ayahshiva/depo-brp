<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	function get_data_user()
    {
        $list = $this->M_users->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->display_name;
            $row[] = $field->username;
            $row[] = $field->email;
            $row[] = $field->role;
            $row[] = $field->last_login;
            $row[] = "
            			<button type='button' class='btn btn-sm btn-info text-white' data-bs-target='#formEditUser' 
							data-bs-toggle='modal' data-id='$field->id' data-display_name='$field->display_name', data-username='$field->username' data-email='$field->email' data-role='$field->role'>
            				<i class='bi bi-pencil-square'></i>
            			</button>
						
						<a href='#' onclick='hapus($field->id)' class='btn btn-danger btn-sm text-white hapus' title='hapus'>
						 	<i class='bi bi-trash'></i>
						 </a>
            		 ";
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_users->count_all(),
            "recordsFiltered" => $this->M_users->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function index()
	{
		$data['user'] = $this->M_users->get();

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/masterdata/user', $data);
		$this->load->view('include/footer');
	}

	function add_user()
	{
		$input = $this->input->post(NULL, TRUE);
		$created_at = date('Y-m-d H:i:s');
		$password = $this->bcrypt->hash_password('login1234');
		$data = array(
			'username' => $input['username'],
			'password' => $password,
			'email' => $input['email'],
			'display_name' => $input['display_name'],
			'role' => $input['role'],
			'created_at' => $created_at,
		);
		$this->M_users->insert($data);
		$this->session->set_flashdata('simpan', 'Data User telah disimpan');
		redirect('user', 'refresh');
	}

	function update_user()
	{
		$id = $this->input->post('id');
		$input = $this->input->post(null, true);
		$data = array(
			'display_name' => $input['display_name'],
			'email' => $input['email'],
			'role' => $input['role'],
		);

		$this->M_users->update($id, $data);
		$this->session->set_flashdata('edit', 'Data user telah diubah');
		redirect('user', 'refresh');
	}

	function hapus_user()
	{
		$id = $this->uri->segment(3);

		$this->M_users->delete($id);
		$this->session->set_flashdata('hapus', 'Data user telah dihapus');
		redirect('user', 'refresh');
	}

	
}
