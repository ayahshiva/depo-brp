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
		$data['proses_in'] = $this->M_container->proses_in();
		$data['in_stok'] = $this->M_container->in_stok();
		$data['proses_out'] = $this->M_container->proses_out();
		$data['out'] = $this->M_container->out();

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/dashboard/dashboard', $data);
		$this->load->view('include/footer');
	}

	public function nomorContainer()
	{
		if (isset($_GET['term'])) {
            $result = $this->M_container->nomorContainer($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->no_cont;
                echo json_encode($arr_result);
            }
        }
	}

	public function pencarian()
	{
		$data['noCont'] = $noCont = $this->input->post('no_cont', true);

		$this->db->join('mlo', 'container.id_mlo = mlo.id','left');
		$this->db->where('container.no_cont', $noCont);
		$q = $this->db->get('container');
		$r = $q->row();
		$data['data'] = $r;

		$data['mvin'] = $this->M_container->cariMVin($noCont);
		$data['mvot'] = $this->M_container->cariMVot($noCont);
		
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/dashboard/pencarian', $data);
		$this->load->view('include/footer');
	}

	function chartbar()
	{
		$data = $this->M_container->chartbar()->result();
		echo json_encode($data);
	}
}
