
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_in extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		//header('Content-Type: application/json');

		//Load Model
		$this->load->model('M_move_in');
		$this->load->model('M_mlo');
		$this->load->model('M_vessel');
        $this->load->model('M_container');
        $this->load->model('M_payment_in');
        $this->load->model('M_emkl');
        $this->load->model('M_process_in');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	function get_process_in()
	{
		header('Content-Type: application/json');
        $list = $this->M_process_in->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $item) {

        	$stok = '';
        	if($item->stok == '1')
        	{
        		$stok = "<span class='badge bg-warning'>Process in</span>";
        	}
        	else if($item->stok == '2')
        	{
        		$stok = "<span class='badge bg-warning'>Process in</span>";
        	}
        	else if($item->stok == '3')
        	{
        		$stok = "<span class='badge bg-success'>In Stok</span>";	
        	}

        	$tanggal = '';
        	if($item->date_in == '0000-00-00')
        	{
        		$tanggal = "-";
        	}
        	else
        	{
        		$tanggal = date('d-m-Y', strtotime($item->date_in));
        	}

        	$waktu = '';
        	if($item->time_in == '00:00:00')
        	{
        		$waktu = "-";
        	}
        	else
        	{
        		$waktu = date('H:i', strtotime($item->time_in));
        	}

            $no++;
            $row = array();
            
            $row[] = $no;
            $row[] = $item->no_container;
            $row[] = $waktu;
            $row[] = $tanggal;
            $row[] = $item->truck_in;
            $row[] = $item->kode;
            $row[] = $stok;
            $row[] = "
            			<a href='process_in/update_process_in/$item->id_detil_in' class='btn btn-sm btn-success' title='Update'><i class='bi bi-pencil'></i></a>
                     ";

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_process_in->count_all(),
            "recordsFiltered" => $this->M_process_in->count_filtered(),
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
    	$this->load->view('page/movein/process_in');
    	$this->load->view('include/footer');
	}

	function update_process_in()
	{
		$id = $this->uri->segment(3);
		$data['update'] = $this->M_process_in->get_by_id($id);

		$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/movein/update_process_in', $data);
    	$this->load->view('include/footer');
	}

	function simpan_update_container()
	{
		$input = $this->input->post(NULL, TRUE);
		$id_container = $input['id_container'];
		$id_detil_in = $input['id_detil_in'];

		$data = array(
						'time_in' => $input['time_in'],
						'date_in' => $input['date_in'],
						'truck_in' => $input['truck_in'],
						'kondisi' => $input['kondisi'],
						'grade' => $input['grade'],
						'cleaning' => $input['cleaning'],
					  );
		$this->M_process_in->update_detil($id_detil_in, $data);

		$data2 = array('stok' => '3');
		$this->M_process_in->update_container($id_container, $data2);

		$this->session->set_flashdata('edit', 'Data telah diupdate');
		redirect('process_in', 'refresh');
	}


}