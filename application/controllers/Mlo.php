<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlo extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_mlo');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function get_data_mlo()
    {
        $list = $this->M_mlo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->alamat;
            $row[] = $field->telp;
            $row[] = "
            			<button type='button' class='btn btn-sm btn-info text-white' data-bs-target='#formEditMLO' 
							data-bs-toggle='modal' title='Ubah Data' data-id='$field->id' data-nama='$field->nama', data-alamat='$field->alamat' data-telp='$field->telp'>
            				<i class='bi bi-pencil-square'></i>
            			</button>						
						<a href='#' onclick='hapusmlo($field->id)' class='btn btn-danger btn-sm text-white hapusmlo' title='Hapus Data'>
						 	<i class='bi bi-trash'></i>
						 </a>
            		 ";
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_mlo->count_all(),
            "recordsFiltered" => $this->M_mlo->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function index()
	{
		$data['mlo'] = $this->M_mlo->get();
		$data['jumlahMLO'] = $this->M_mlo->count_all();

		$this->load->view('include/header.php');
		$this->load->view('include/navbar.php');
		$this->load->view('include/sidebar.php');
		$this->load->view('page/masterdata/mlo', $data);
		$this->load->view('include/footer');
	}

	function add_mlo()
	{
		$input = $this->input->post(NULL, TRUE);
		$created_at = date('Y-m-d H:i:s');
		$data = array(
			'nama' => $input['nama'],
			'alamat' => $input['alamat'],
			'telp' => $input['telp'],
			'created_at' => $created_at,
		);
		$this->M_mlo->insert($data);
		$this->session->set_flashdata('simpan', 'Data telah disimpan');
		redirect('mlo', 'refresh');
	}

	function update_mlo()
	{
		$id = $this->input->post('id');
		$updated_at = date('Y-m-d H:i:s');
		$input = $this->input->post(null, true);
		$data = array(
			'nama' => $input['nama'],
			'alamat' => $input['alamat'],
			'telp' => $input['telp'],
			'updated_at' => $updated_at,
		);

		$this->M_mlo->update($id, $data);
		$this->session->set_flashdata('edit', 'Data user telah diubah');
		redirect('mlo', 'refresh');
	}

	function hapus_mlo()
	{
		$id = $this->uri->segment(3);

		$this->M_mlo->delete($id);
		$this->session->set_flashdata('hapus', 'Data user telah dihapus');
		redirect('mlo', 'refresh');
	}

}