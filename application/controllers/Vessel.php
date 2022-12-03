<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_vessel');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	public function get_vessel()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select('*')
                 ->from('vessel')
                 ->order_by('id', 'asc');
        $query = $this->db->get();
        $no = 1;
        foreach ($query->result() as $key => $value) {
            $data[] = array(
                $no++,
                $value->nama,
                "
                <button type='button' class='btn btn-sm btn-info text-white' data-bs-target='#formEditVessel'data-bs-toggle='modal' data-id='$value->id' data-nama='$value->nama'>
            		<i class='bi bi-pencil-square'></i>
            	</button>
						
				<a href='#' onclick='hapusvessel($value->id)' class='btn btn-danger btn-sm text-white hapusvessel' title='hapus'>
					<i class='bi bi-trash'></i>
				</a>
                "
            );
        }

        $result = array(
            "draw"=> $draw,
            "recordTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data 
        );
        echo json_encode($result);
        exit();
    }

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/masterdata/vessel');
		$this->load->view('include/footer');
	}

	function add_vessel()
	{
		$input = $this->input->post(NULL, TRUE);
		$created_at = date('Y-m-d H:i:s');
		$data = array(
			'nama' => $input['nama'],
			'created_at' => $created_at,
		);
		$this->M_vessel->insert($data);
		$this->session->set_flashdata('simpan', 'Data telah disimpan');
		redirect('vessel', 'refresh');
	}

	function update_vessel()
	{
		$id = $this->input->post('id');
		$updated_at = date('Y-m-d H:i:s');
		$input = $this->input->post(null, true);
		$data = array(
			'nama' => $input['nama'],
			'updated_at' => $updated_at,
		);

		$this->M_vessel->update($id, $data);
		$this->session->set_flashdata('edit', 'Data user telah diubah');
		redirect('vessel', 'refresh');
	}

	function hapus_vessel()
	{
		$id = $this->uri->segment(3);

		$this->M_vessel->delete($id);
		$this->session->set_flashdata('hapus', 'Data user telah dihapus');
		redirect('vessel', 'refresh');
	}
}