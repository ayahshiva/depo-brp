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

        //$stok = array('3','4','5');
        // $query = $this->db->where_not_in('stok', $stok)->get('container');
        $this->db->select('*, mlo.nama as namamlo')
                 ->from('container')
                 ->join('mlo', 'container.id_mlo = mlo.id', 'left')
                 //->where_in('container.stok', $stok)
                 ->order_by('container.stok', 'asc');
        $query = $this->db->get();
        $data = array();
        $no = 1;
        foreach ($query->result() as $key => $value) {
            
            $html ='';
            if($value->stok == '1' OR $value->stok == '2'){
                $html = '<span class="badge bg-primary">Proses In</span>';
            }elseif($value->stok == '3'){
                $html = '<span class="badge bg-success">In Stok</span>';
            }elseif($value->stok == '4' OR $value->stok == '5'){
                $html = '<span class="badge bg-warning">Proses Out</span>';
            }elseif($value->stok == '6'){
                $html = '<span class="badge bg-danger">Out</span>';
            }
            $row = array();
            $row[] = $no++;
            $row[] = $value->namamlo;
            $row[] = $value->no_cont;
            $row[] = $value->size;
            $row[] = $value->tipe;
            $row[] = $html;

            $data[] = $row;
            
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
		$this->load->view('page/masterdata/container');
		$this->load->view('include/footer');
    }

}