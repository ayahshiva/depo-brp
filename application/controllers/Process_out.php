
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_out extends CI_Controller 
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
        $this->load->model('M_process_out');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function get_process_out()
	{
		header('Content-Type: application/json');
        $list = $this->M_process_out->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $item) {

        	$stok = '';
        	if($item->stok == '4')
        	{
        		$stok = "<span class='badge bg-warning'>Process Out</span>";
        	}
        	else if($item->stok == '5')
        	{
        		$stok = "<span class='badge bg-warning'>Process Out</span>";
        	}
        	else if($item->stok == '6')
        	{
        		$stok = "<span class='badge bg-danger'>Out</span>";	
        	}

        	$tanggal = '';
        	if($item->date_out == '0000-00-00')
        	{
        		$tanggal = "-";
        	}
        	else
        	{
        		$tanggal = date('d-m-Y', strtotime($item->date_out));
        	}

        	$waktu = '';
        	if($item->time_out == '00:00:00')
        	{
        		$waktu = "-";
        	}
        	else
        	{
        		$waktu = date('H:i', strtotime($item->time_out));
        	}

            $no++;
            $row = array();
            
            $row[] = $no;
            $row[] = $item->no_container;
            $row[] = $tanggal;
            $row[] = $waktu;
            $row[] = $item->truck_out;
            $row[] = $item->kode;
            $row[] = $stok;
            $row[] = "
                      	<a href='process_out/update_process_out/$item->id_detil_out' class='btn btn-sm btn-success' title='Update'>
                      		<i class='bi bi-pencil'></i>
                      	</a>
                     ";

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_process_out->count_all(),
            "recordsFiltered" => $this->M_process_out->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
	}

	function index()
	{
		$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/moveout/process_out');
    	$this->load->view('include/footer');
	}

	function update_process_out()
	{
		$id = $this->uri->segment(3);
		$data['update'] = $this->M_process_out->get_by_id($id);

		$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/moveout/update_process_out', $data);
    	$this->load->view('include/footer');
	}

	function simpan_update_container()
	{
		$input = $this->input->post(NULL, TRUE);
		$id_container = $input['id_container'];
		$id_detil_out = $input['id_detil_out'];

		$data = array(
						'time_out' => $input['time_out'],
						'date_out' => $input['date_out'],
						'truck_out' => $input['truck_out'],
					  );
		$this->M_process_out->update_detil($id_detil_out, $data);

		$data2 = array('stok' => '6');
		$this->M_process_out->update_container($id_container, $data2);

		$this->session->set_flashdata('edit', 'Data telah diupdate');
		redirect('process_out', 'refresh');
	}
}