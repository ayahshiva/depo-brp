<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Container extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		//Load Model
		$this->load->model('M_container');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}
    
    public function get_container()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $stok = array('3','4','5');
        // $query = $this->db->where_not_in('stok', $stok)->get('container');
        $this->db->select('*, mlo.nama as namamlo')
                 ->from('container')
                 ->join('mlo', 'container.id_mlo = mlo.id', 'left')
                 ->where_in('container.stok', $stok)
                 ->order_by('container.id', 'asc');
        $query = $this->db->get();
        $data = [];
        $no = 1;
        foreach ($query->result() as $key => $value) {
            $data[] = array(
                $no++,
                $value->namamlo,
                $value->no_cont,
                $value->size,
                $value->tipe,
                "<button type='button' class='btn btn-sm btn-primary' title='lihat detail'><i class='bi bi-eye'></i></button>
                <button type='button' class='btn btn-sm btn-success' title='Edit'><i class='bi bi-pencil-square'></i></button>
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
		$this->load->view('include/header.php');
		$this->load->view('include/navbar.php');
		$this->load->view('include/sidebar.php');
		$this->load->view('page/masterdata/container');
		$this->load->view('include/footer');
    }

}