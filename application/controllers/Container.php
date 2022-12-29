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
        $this->load->model('M_mlo');

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
            $row[] = $item->nama_mlo;
            $row[] = $item->no_container;
            $row[] = $item->size;
            $row[] = $item->tipe;
            $row[] = $html;
            $row[] = "
                        <a href='container/edit_container/$item->id_container' class='btn btn-sm btn-success' title='Edit'>
                            <i class='bi bi-pencil'></i>
                        </a>
                     ";

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

    public function edit_container()
    {
        $id = $this->uri->segment(3);
        $data['get_by_id'] = $this->M_container->get_by_id($id);
        $data['mlo'] = $this->M_mlo->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/masterdata/edit_container', $data);
        $this->load->view('include/footer');
    }

    function update_container()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $data = array(
            'id_mlo' => $input['id_mlo'],
            'no_cont' => $input['no_cont'],
            'size' => $input['size'],
            'tipe' => $input['tipe']
        );

        $this->M_container->update($id, $data);
        $this->session->set_flashdata('edit', 'Data telah diubah');
        redirect('container', 'refresh');
    }

}