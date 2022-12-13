<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_out extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		//header('Content-Type: application/json');

		//Load Model
		$this->load->model('M_mlo');
		$this->load->model('M_vessel');
        $this->load->model('M_container');
        $this->load->model('M_emkl');
        $this->load->model('M_move_out');

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}

	public function get_list_out()
    {
        header('Content-Type: application/json');
        $list = $this->M_move_out->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $item) {

            $this->db->select('*')
                 ->from('detil_move_out')
                 ->where('id_move_out', $item->id_move_out);
            $jmlh = $this->db->get()->num_rows();

            if($item->jumlah != $jmlh )
            {
                $jumlah = "<span style='color: red'>".$item->jumlah."</span>";
            }
            else
            {
                $jumlah = "<span style='color: green'>".$item->jumlah."</span>";
            }

            $no++;
            $row = array();
            
            $row[] = $no;
            $row[] = date('d-m-Y', strtotime($item->tanggal));
            $row[] = $item->nama_emkl;
            $row[] = $item->nama_vessel;
            $row[] = $item->no_voyage;
            $row[] = $jumlah;
            $row[] = "
                        <a href='list_out/view_list_out/$item->id_move_out' class='btn btn-sm btn-primary' title='View Detail'><i class='bi bi-eye'></i></a>
                        <a href='list_out/edit_list_out/$item->id_move_out' class='btn btn-sm btn-success' title='Edit' data-bs-target='#formEditListOut' data-bs-toggle='modal' data-id='$item->id_move_out', data-id_emkl='$item->id_emkl', data-id_vessel='$item->id_vessel', data-no_voyage='$item->no_voyage', data-jumlah='$item->jumlah'>
                        	<i class='bi bi-pencil'></i>
                        </a>
                        <a href='list_out/tambah_container/$item->id_move_out' class='btn btn-sm btn-warning' title='Tambah Container'><i class='bi bi-clipboard-plus'></i></a>
                        <a href='list_out/hapus_container/$item->id_move_out' class='btn btn-sm btn-danger' title='Hapus Container'><i class='bi bi-clipboard-minus'></i></a>
                     ";

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_move_out->count_all(),
            "recordsFiltered" => $this->M_move_out->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function index()
    {
    	$data['mlo'] = $this->M_mlo->get();
    	$data['vessel'] = $this->M_vessel->get();
    	$data['emkl'] = $this->M_emkl->get();

    	$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/moveout/list_out', $data);
    	$this->load->view('include/footer');
    }

    function add_list_out()
    {
    	$input = $this->input->post(NULL, TRUE);
    	$data = array(
    			'tanggal' => $input['tanggal'],
    			'id_emkl' => $input['id_emkl'],
    			'id_vessel' => $input['id_vessel'],
    			'no_voyage' => $input['no_voyage'],
    			'jumlah' => $input['jumlah']
    		);
    	$this->M_move_out->insert($data);
		$this->session->set_flashdata('simpan', 'Data telah disimpan');
		redirect('list_out', 'refresh');	
    }

    function update_list_out()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $data = array(
            'id_emkl' => $input['id_emkl'],
            'id_vessel' => $input['id_vessel'],
            'no_voyage' => $input['no_voyage'],
            'jumlah' => $input['jumlah']
        );

        $this->M_move_out->update($id, $data);
        $this->session->set_flashdata('edit', 'Data telah diubah');
        redirect('list_out', 'refresh');
    }

    function view_list_out()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_out->get_by_id($id);
        $data['listContainer'] = $this->M_move_out->list_container($id);
        $data['jumlah_real'] = $this->M_move_out->jumlah_real($id);
        
        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/view_list_out', $data);
        $this->load->view('include/footer');
    }

    function tambah_container()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_out->get_by_id($id);
        $data['listContainer'] = $this->M_move_out->list_container($id);
        $data['jumlah_real'] = $this->M_move_out->jumlah_real($id);
        $data['get_container'] = $this->M_container->get_stok();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/tambah_container', $data);
        $this->load->view('include/footer');
    }

    function simpan_container()
    {
    	$id_move_out = $this->input->post('id_move_out', TRUE);
    	$id_emkl = $this->input->post('id_emkl', TRUE);
    	$id_vessel = $this->input->post('id_vessel', TRUE);
    	$id_container = $this->input->post('id_container', TRUE);
    	$seal_no = $this->input->post('seal_no', TRUE);
    	$status = $this->input->post('status', TRUE);

    	foreach ($id_container as $key => $value) {
    		
    		$update_stok = array('stok' => '4');
    		$this->db->where('id', $value);
    		$this->db->update('container', $update_stok);

    		$data_detil = array(
    						'id_move_out' => $id_move_out,
    						'id_container' => $value,
    						'seal_number' => $seal_no[$key], 
    						'st_cont' => $status[$key],
    					); 
    		$this->db->insert('detil_move_out', $data_detil);
    	}

    	$ubah_status = array('st' => '1');
    	$this->db->where('id', $id_move_out);
    	$this->db->update('move_out', $ubah_status);

    	redirect('list_out/view_list_out/'.$id_move_out, 'refresh');
    }

    function hapus_container()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_out->get_by_id($id);
        $data['listContainer'] = $this->M_move_out->list_container($id);
        $data['jumlah_real'] = $this->M_move_out->jumlah_real($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/moveout/hapus_container', $data);
        $this->load->view('include/footer');
    }

    function hapus_container_id()
    {
    	$id_move_out = $this->input->post('id_move_out', TRUE);
    	$hapus = $this->input->post('hapus', TRUE);
    	$total = count($hapus);


    	if( ! empty($hapus))
        {
            for($i=0; $i < $total; $i++)
            {
                $this->db->where('id_container', $hapus[$i]);
                $this->db->delete('detil_move_out');
            }
        }

        // $kueri = $this->db->select('*')->where('id', $id_move_out)->get('move_out');
        // $result = $kueri->row();

        // $jumlahlama = $result->jumlah;
        // $jumlahbaru = $jumlahlama - $total;

        // $data = array(
        //         'id' => $id_move_out,
        //         'jumlah' => $jumlahbaru
        //         );
        // $this->db->where('id', $id_move_out);
        // $this->db->update('move_out', $data);

        redirect('list_out/view_list_out/'.$id_move_out);
    }

}