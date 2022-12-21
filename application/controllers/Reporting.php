<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('M_reporting');
		$this->load->model('M_mlo');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function mv_in()
	{
		$data['mlo'] = $this->M_mlo->get();

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('page/reporting/mv_in', $data);
		$this->load->view('include/footer');
	}

	function get_mv_in()
	{
		$tanggal_awal = $this->input->post('tanggal_awal', TRUE);
		$tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
		$id_mlo = $this->input->post('id_mlo');

		$data['mlo'] = $this->M_mlo->get_mlo($id_mlo);
		$data['get_mv_in'] = $this->M_reporting->mv_in($tanggal_awal, $tanggal_akhir, $id_mlo);
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
		$this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'GP');
        $data['gp20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'GP');
        $data['gp40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'HC');
        $data['hc40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'OP');
        $data['op20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'OP');
        $data['op40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'FR');
        $data['fr20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'FR');
        $data['fr40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'RF');
        $data['rf20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_in.date_in >=', $tanggal_awal);
        $this->db->where('detil_move_in.date_in <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'RF');
        $data['rf40'] = $this->db->count_all_results('container');

		if(isset($_POST['preview']))
		{
			$this->load->view('page/reporting/view_mv_in', $data);
		}
		else if(isset($_POST['save']))
		{
			$this->load->view('page/reporting/get_mv_in', $data);
		}			
	}

    function mv_out()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/mv_out', $data);
        $this->load->view('include/footer');
    }

    function get_mv_out()
    {
        $tanggal_awal = $this->input->post('tanggal_awal', TRUE);
        $tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
        $id_mlo = $this->input->post('id_mlo');

        $data['mlo'] = $this->M_mlo->get_mlo($id_mlo);
        $data_data = $data['get_mv_out'] =  $this->M_reporting->mv_out($tanggal_awal, $tanggal_akhir, $id_mlo);
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        foreach ($data_data as $key => $value) {
            $id_vessel_in = $value->id_vessel_in;
            $id_vessel_out = $value->id_vessel_out;
            $id_emkl = $value->id_emkl;

            $this->db->where('id', $id_vessel_out);
            $v_o = $this->db->get('vessel');
            $r_o = $v_o->row();
            $data['ves_ot'] = $r_o->nama;

            $this->db->where('id', $id_emkl);
            $emkl = $this->db->get('emkl');
            $emkl2 = $emkl->row();
            $data['nama_emkl'] = $emkl2->nama;

            $this->db->where('id', $id_vessel_in);
            $ves = $this->db->get('vessel');
            $v = $ves->row();
            $data['nama_vessel'] = $v->nama;
        }

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'GP');
        $data['gp20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'GP');
        $data['gp40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'HC');
        $data['hc40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'OP');
        $data['op20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'OP');
        $data['op40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'FR');
        $data['fr20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'FR');
        $data['fr40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'RF');
        $data['rf20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_out','container.id = detil_move_out.id_container' ,'left');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('detil_move_out.date_out >=', $tanggal_awal);
        $this->db->where('detil_move_out.date_out <=', $tanggal_akhir);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'RF');
        $data['rf40'] = $this->db->count_all_results('container');

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_mv_out', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_mv_out', $data);
        }           
    }

    function s_list()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/s_list', $data);
        $this->load->view('include/footer');
    }

    function get_s_list()
    {
        $tanggal = $this->input->post('tanggal', TRUE);        
        $id_mlo = $this->input->post('id_mlo');

        $data['nama'] = $this->M_mlo->get_mlo($id_mlo);
        $data_s_list =$data['get_s_list'] = $this->M_reporting->s_list($tanggal, $id_mlo);
        $data['tanggal'] = $tanggal;

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'GP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['gp20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'GP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['gp40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'HC');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['hc40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'OP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['op20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'OP');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['op40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'FR');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['fr20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'FR');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['fr40'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '20');
        $this->db->where('container.tipe', 'RF');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['rf20'] = $this->db->count_all_results('container');

        $this->db->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left');
        $this->db->where('detil_move_in.date_in <=', $tanggal);
        $this->db->where('container.size', '40');
        $this->db->where('container.tipe', 'RF');
        $this->db->where('container.id_mlo', $id_mlo);
        $this->db->where('container.stok', '3');
        $data['rf40'] = $this->db->count_all_results('container');        

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_s_list', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_s_list', $data);
        }           
    }

    function mlo_invoicing()
    {
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/reporting/mlo_invoicing', $data);
        $this->load->view('include/footer');
    }

    function get_mlo_invoicing()
    {
        $tanggal_awal = $this->input->post('tanggal_awal', TRUE);
        $tanggal_akhir = $this->input->post('tanggal_akhir', TRUE);
        $id_mlo = $this->input->post('id_mlo');

        $data['nama'] = $this->M_mlo->get_mlo($id_mlo);
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['invoicing'] =  $this->M_reporting->mlo_invoicing($tanggal_awal, $tanggal_akhir, $id_mlo);

        if(isset($_POST['preview']))
        {
            $this->load->view('page/reporting/view_mlo_invoicing', $data);
        }
        else if(isset($_POST['save']))
        {
            $this->load->view('page/reporting/get_mlo_invoicing', $data);
        } 

    }
}