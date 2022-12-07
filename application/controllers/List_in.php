<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_in extends CI_Controller 
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

		$role = $this->session->userdata('role');
		if($role !== 'mgmt' AND $role !== 'spv' AND $role !== 'admin' AND $role !== 'finance' AND $role !== 'mlo'){
			redirect(site_url());
		}
	}
    
    public function get_list_in()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $this->db->select('*, move_in.id as idmovein, mlo.id as id_mlo, mlo.nama as namamlo, vessel.id as id_vessel, vessel.nama as namavessel')
                 ->from('move_in')
                 ->join('mlo', 'move_in.id_mlo = mlo.id', 'left')
                 ->join('vessel', 'move_in.id_vessel = vessel.id', 'left')
                 ->order_by('move_in.id', 'desc');
        $query = $this->db->get();
        $data = array();
        $no = 1;
        foreach ($query->result() as $key => $value) {

            $this->db->select('*')
                 ->from('detil_move_in')
                 ->where('id_move_in', $value->idmovein);
            $jmlh = $this->db->get()->num_rows();

            if($value->jumlah != $jmlh )
            {
                $jumlah = "<span style='color: red'>".$value->jumlah."</span>";
            }
            else
            {
                $jumlah = "<span style='color: green'>".$value->jumlah."</span>";
            }
         
            $row = array();
            $row[] = $no++;
            $row[] = date('d-m-Y', strtotime($value->tanggal));
            $row[] = $value->namamlo;
            $row[] = $value->namavessel;
            $row[] = $value->no_voyage;
            $row[] = $jumlah;
            $row[] = "
                        <a href='list_in/view_list_in/$value->idmovein' class='btn btn-sm btn-primary' title='View Detail'><i class='bi bi-eye'></i></a>
                        <a href='list_in/edit_list_in/$value->idmovein' class='btn btn-sm btn-success' title='Edit'><i class='bi bi-pencil'></i></a>
                        <a href='list_in/add_container/$value->idmovein' class='btn btn-sm btn-warning' title='Tambah Container'><i class='bi bi-clipboard-plus'></i></a>
                        <a href='list_in/delete_container/$value->idmovein' class='btn btn-sm btn-danger' title='Hapus Container'><i class='bi bi-clipboard-minus'></i></a>
                     ";

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

    public function get_ajax_mlo()
    {
 		// Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->M_mlo->getAjax($searchTerm);

      echo json_encode($response);
    }

    public function index()
    {
    	$data['mlo'] = $this->M_mlo->get();
    	$data['vessel'] = $this->M_vessel->get();

    	$this->load->view('include/header');
    	$this->load->view('include/navbar');
    	$this->load->view('include/sidebar');
    	$this->load->view('page/movein/list_in', $data);
    	$this->load->view('include/footer');
    }

    function add_list_in()
    {
    	$input = $this->input->post(NULL, TRUE);
    	$data = array(
    			'tanggal' => $input['tanggal'],
    			'id_mlo' => $input['id_mlo'],
    			'id_vessel' => $input['id_vessel'],
    			'no_voyage' => $input['no_voyage'],
    			'jumlah' => $input['jumlah']
    		);
    	$this->M_move_in->insert($data);
		$this->session->set_flashdata('simpan', 'Data telah disimpan');
		redirect('list_in', 'refresh');	
    }

    function view_list_in()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_in->get_by_id($id);
        $data['listContainer'] = $this->M_move_in->list_container($id);
        $data['jumlah_real'] = $this->M_move_in->jumlah_real($id);
        
        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/movein/view_list_in', $data);
        $this->load->view('include/footer');
    }

    function edit_list_in()
    {
        $id = $this->uri->segment(3);
        $data['get_by_id'] = $this->M_move_in->get_by_id($id);
        $data['mlo'] = $this->M_mlo->get();
        $data['vessel'] = $this->M_vessel->get();

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/movein/edit_list_in', $data);
        $this->load->view('include/footer');

    }

    function update_list_in()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $data = array(
            'id_mlo' => $input['id_mlo'],
            'id_vessel' => $input['id_vessel'],
            'no_voyage' => $input['no_voyage'],
            'jumlah' => $input['jumlah']
        );

        $this->M_move_in->update($id, $data);
        $this->session->set_flashdata('edit', 'Data telah diubah');
        redirect('list_in', 'refresh');
    }

    function add_container()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_in->get_by_id($id);
        $data['listContainer'] = $this->M_move_in->list_container($id);
        $data['jumlah_real'] = $this->M_move_in->jumlah_real($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/movein/add_container', $data);
        $this->load->view('include/footer');
    }

    function simpan_container()
    {
        $input = $this->input->post(NULL, TRUE);

        foreach($input['no_container'] as $key => $value)
        {
            $this->db->select('no_cont');
            $this->db->where('no_cont', $value);
            $sum = $this->db->get('container')->num_rows();
            $row = $this->db->get('container')->row();

            if($sum < 1)
            {
                $input_baru = array('id_mlo' => $input['id_mlo'], 'no_cont' => $value, 'size' => $input['size'][$key], 'tipe' => $input['tipe'][$key], 'stok' => 1);
                $this->M_container->insert($input_baru);

                $this->db->select('id, no_cont');
                $this->db->where('no_cont', $value);
                $kueri = $this->db->get('container')->result();
                    foreach ($kueri as $baris) 
                    {
                        $data = array(
                                                'id_move_in'=>$input['id_move_in'], 
                                                'id_container'=>$baris->id, 
                                                'st_cont'=>$input['status'][$key],
                                              );
                        $this->M_move_in->insert_detil($data);
                    }
            }
            else
            {
                $data = array('stok', 1);
                $this->db->where('id_container', $row->id_container);
                $this->db->update('container', $data);

                $this->db->select('id', 'no_cont');
                $this->db->where('no_cont', $value);
                $result = $this->db->get('container')->result();
                foreach ($result as $row) 
                {
                    $data = array(
                                    'id_move_in' => $input['id_move_in'],
                                    'id_container' => $row->id
                                  );
                    $this->M_move_in->insert_detil($data);
                }
            }
        }

        $data = array('st' => '1');
        $this->M_move_in->update($input['id_move_in'], $data);
        redirect('list_in/view_list_in/'.$input['id_move_in'], 'refresh');
    }

    function delete_container()
    {
        $id = $this->uri->segment(3);
        $data['view'] = $this->M_move_in->get_by_id($id);
        $data['listContainer'] = $this->M_move_in->list_container($id);
        $data['jumlah_real'] = $this->M_move_in->jumlah_real($id);

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/sidebar');
        $this->load->view('page/movein/delete_container', $data);
        $this->load->view('include/footer');
    }

    function hapus_container()
    {
        $id_move_in = $this->input->post('id_move_in');
        $hapus = $this->input->post('hapus');
        $total = count($hapus);

        if( ! empty($hapus))
        {
            for($i=0; $i < $total; $i++)
            {
                $this->db->where('id_container', $hapus[$i]);
                $this->db->delete('detil_move_in');
            }
        }

        $kueri = $this->db->select('*')->where('id', $id_move_in)->get('move_in');
        $result = $kueri->row();

        $jumlahlama = $result->jumlah;
        $jumlahbaru = $jumlahlama - $total;

        $data = array(
                'id' => $id_move_in,
                'jumlah' => $jumlahbaru
                );
        $this->db->where('id', $id_move_in);
        $this->db->update('move_in', $data);

        redirect('list_in/view_list_in/'.$id_move_in);
    }
}