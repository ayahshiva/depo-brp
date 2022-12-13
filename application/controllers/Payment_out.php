<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_out extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		//header('Content-Type: application/json');

		//Load Model
		$this->load->model('M_move_out');
		$this->load->model('M_mlo');
		$this->load->model('M_vessel');
        $this->load->model('M_container');
        $this->load->model('M_payment_out');
        $this->load->model('M_emkl');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function get_payment_out()
	{        
		header('Content-Type: application/json');
        $list = $this->M_payment_out->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $item) {

            $kode = '';

            if($item->kode =='')
            {
                $kode = "<a class='btn btn-sm btn-info' href='payment_out/generate_code/$item->id_pay_out' title='Generate Code'>Generate</a>";
            }
            else
            {
                $kode = $item->kode;
            }

            $metode = '';
            if($item->metode == '')
            {
                $metode = "<a href='payment_out/update_payment_out/$item->id_pay_out' class='btn btn-sm btn-success' title='Update Payment'>Update</a>";
            }
            else
            {
                $metode = $item->metode;
            }

            $no++;
            $row = array();
            
            $row[] = $no;
            $row[] = $item->do_number;
            $row[] = $item->invoice;
            $row[] = $item->nama_emkl;
            $row[] = $item->nama_vessel;
            $row[] = $item->no_voyage;
            $row[] = $metode;
            $row[] = $kode;
            $row[] = "
                            <a href='payment_out/view_payment_out/$item->id_pay_out' class='btn btn-sm btn-primary' title='View Detail'><i class='bi bi-eye'></i></a>
                            <a href='payment_out/edit_payment_out/$item->id_pay_out' class='btn btn-sm btn-success' title='Edit'><i class='bi bi-pencil'></i></a>
                            <a href='payment_out/add_container_payment_out/$item->id_pay_out' class='btn btn-sm btn-warning' title='Input Container'><i class='bi bi-clipboard-plus'></i></a>
                          ";

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_payment_out->count_all(),
            "recordsFiltered" => $this->M_payment_out->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }


	public function index()
	{
		$data['mlo'] = $this->M_mlo->get();
    	$data['vessel'] = $this->M_vessel->get();
    	//$data['payment_out'] = $this->M_payment_out->get_all();

    	$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/moveout/payment_out', $data);
    	$this->load->view('include/footer');
	}

    function tambah_payment_out()
    {
        $data['voyage'] = $this->M_move_out->get_voyage();
        $data['emkl'] = $this->M_emkl->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/tambah_payment_out', $data);
        $this->load->view('include/footer');
    }

    function get_vessel()
    {
        $no_voyage = $this->input->post('id');
        $data = $this->M_move_out->get_vessel($no_voyage);
        echo json_encode($data);
    }

    function get_mlo()
    {
        $no_voyage = $this->input->post('id');
        $data = $this->M_move_out->get_mlo($no_voyage);
        echo json_encode($data);
    }

    function get_id_move_out()
    {
        $id = $this->input->post('id');
        $data = $this->M_move_out->get_id_move_out($id);
        echo json_encode($data);
    }

    function simpan_payment_out()
    {
        $input = $this->input->post(NULL, TRUE);
        $tanggal = date('Y-m-d');

        //get id_move_out
        $this->db->where('id_emkl', $input['id_emkl']);
        $this->db->where('id_vessel', $input['id_vessel']);
        $this->db->where('no_voyage', $input['no_voyage']);
        $query = $this->db->get('move_out');
        $result = $query->row();
        $id_move_out = $result->id;

        if($input['jumlah'] > $result->jumlah)
        {
            $this->session->set_flashdata('besar', 'Jumlah yang di-input melebihi jumlah pada List In');
            redirect('payment_out/tambah_payment_out', 'refresh');
        }
        else
        {
            $data = array(
                    'id_move_out' => $id_move_out,
                    'tanggal' => $tanggal,
                    'id_emkl' => $input['id_emkl'],
                    'no_voyage' => $input['no_voyage'],
                    'do_number' => $input['do_number'],
                    'jumlah' => $input['jumlah']
                );
            $this->M_payment_out->simpan_payment_out($data);
            $this->session->set_flashdata('simpan', 'data telah disimpan');
            redirect('payment_out', 'refresh');
        }

    }

    function generate_code()
    {
        $this->load->helper('string');

        $id = $this->uri->segment(3);
        $kode = random_string('numeric', 8);
        $data = array('kode' => $kode);
        $this->M_payment_out->update($id, $data);
        redirect('payment_out', 'refresh');
    }

    function update_payment_out()
    {
        $id = $this->uri->segment(3);
        $data['get_payment'] = $this->M_payment_out->get_by_id($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/update_payment_out', $data);
        $this->load->view('include/footer');
    }

    function simpan_update_payment_out()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id_payment'];

        $data = array(
                    'tanggal' => $input['tanggal'],
                    'invoice' => $input['invoice'],
                    'metode' => $input['metode'],
                    'status' => '3',
                );
        $this->M_payment_out->update($id, $data);
        $this->session->set_flashdata('payment', 'Data payment telah di-update');
        redirect('payment_out', 'refresh');
    }

    function edit_payment_out()
    {
        $id = $this->uri->segment(3);
        $data['edit'] = $this->M_payment_out->get_by_id($id);
        $data['emkl'] = $this->M_emkl->get();
        $data['voyage'] = $this->M_move_out->get_voyage();
        $data['mlo'] = $this->M_mlo->get();
        $data['vessel'] = $this->M_vessel->get();
        $data['get_payment'] = $this->M_payment_out->get_by_id($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/edit_payment_out', $data);
        $this->load->view('include/footer');
    }

    function simpan_edit_payment_out()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id_payment'];

        //get id_move_out
        //$this->db->where('id_emkl', $input['id_emkl']);
        $this->db->where('id_pay_out', $id);
        //$this->db->where('no_voyage', $input['no_voyage']);
        $query = $this->db->get('view_payment_out');
        $result = $query->row();
        $id_move_out = $result->id_move_out;

        $move_out = array('id_vessel' => $input['id_vessel'], 'no_voyage'=>$input['no_voyage']);
        $this->db->where('id', $id_move_out);
        $this->db->update('move_out', $move_out);

        $data = array(                    
                    'id_emkl' => $input['id_emkl'],
                    'no_voyage' => $input['no_voyage'],
                    'do_number' => $input['do_number'],
                    'jumlah' => $input['jumlah'],
                );
        $this->M_payment_out->update($id, $data);
        $this->session->set_flashdata('edit', 'Data telah diedit');
        redirect('payment_out', 'refresh');
    }

    function view_payment_out()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_payment_out->get_view_id($id);
        $data['container'] = $this->M_payment_out->list_container($id);
        $data['jumlah_real'] = $this->M_payment_out->jumlah_real($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/view_payment_out', $data);
        $this->load->view('include/footer');
    }

    function add_container_payment_out()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $query = $this->db->get('payment_out')->row();
        $result = $query;
        $id_move_out = $result->id_move_out;

        $data['view'] = $this->M_payment_out->get_view_id($id);
        $data['listContainer'] = $this->M_payment_out->list_container($id);
        $data['jumlah_real'] = $this->M_payment_out->jumlah_real($id);
        $data['container'] = $this->M_container->get_container_out($id_move_out);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/add_container_payment_out', $data);
        $this->load->view('include/footer');
    }

    function simpan_container()
    {
        $input = $this->input->post(NULL, TRUE);
        $id_payment_out = $input['id_payment_out'];
        $id_container = $input['id_container'];

        foreach ($id_container as $key => $value) {
            
            $detil_payment = array('id_payment_out'=>$id_payment_out, 'id_container'=>$value);
            $this->M_payment_out->insert_detil_payment($detil_payment);

            $id = $value;
            $data = array('stok'=>'5');
            $this->M_container->update($id, $data);
        }

        $id = $id_payment_out;
        $data = array('status' => '2');
        $this->M_payment_out->update($id, $data);

        $this->session->set_flashdata('simpan', 'Data telah disimpan');
        redirect('payment_out/view_payment_out/'.$id_payment_out, 'refresh');

    }
}