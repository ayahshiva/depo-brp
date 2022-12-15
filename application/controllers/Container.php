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
        header('Content-Type: application/json');
        $list = $this->M_container->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        
        foreach ($list as $item) {

            $html ='';
            if($item->stok == '1' OR $item->stok == '2'){
                $html = '<span class="badge bg-primary">Proses In</span>';
            }elseif($item->stok == '3'){
                $html = '<span class="badge bg-success">In Stok</span>';
            }elseif($item->stok == '4' OR $item->stok == '5'){
                $html = '<span class="badge bg-warning">Proses Out</span>';
            }elseif($item->stok == '6'){
                $html = '<span class="badge bg-danger">Out</span>';
            }

            $no++;
            $row = array();
            
            $row[] = $no.".";
            $row[] = $item->nama;
            $row[] = $item->no_cont;
            $row[] = $item->size;
            $row[] = $item->tipe;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_container->count_all(),
            "recordsFiltered" => $this->M_container->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
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