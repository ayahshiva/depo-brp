<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_container extends CI_Model
{
    var $table = 'container';
    var $table2 = 'view_container';
    var $table3 = 'view_cari_in';
    var $table4 = 'view_cari_out';

    var $column_order = array(null, 'id_mlo','no_cont','size','tipe', null);
    var $column_search = array('id_mlo','no_cont','size','tipe');
    var $oder = array('id'=>'asc'); 

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function _get_datatables_query()
    {
        $this->db->join('mlo', 'container.id_mlo = mlo.id', 'left');
        $this->db->order_by('container.stok', 'ASC');
        $this->db->from($this->table);

        $i = 0;
        foreach($this->column_search as $item)
        {
            if ($this->input->post('search')['value'])
            {
                if ($i === 0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $this->input->post('search')['value']);
                }
                else
                {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }

                if(count($this->column_search) -1 == $i)
                    $this->db->group_end();
            }
        $i++;
        }

        if ($this->input->post('order')) 
        {
            $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        }
        else if (isset($this->order)) 
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function proses_in()
    {   
        $stok = array('1','2');
        $this->db->where_in('stok', $stok)->from($this->table);
        return $this->db->count_all_results();
    }

    public function in_stok()
    {
        $this->db->where('stok', '3')->from($this->table);
        return $this->db->count_all_results();
    }

    public function proses_out()
    {
        $stok = array('4', '5');
        $this->db->where_in('stok', $stok)->from($this->table);
        return $this->db->count_all_results();
    }

    public function out()
    {
        $this->db->where('stok', '6')->from($this->table);
        return $this->db->count_all_results();
    }

    function nomorContainer($no_cont)
    {
        $this->db->like('no_cont', $no_cont, 'both');
        $this->db->order_by('no_cont', 'ASC');
        $this->db->limit(10);
        return $this->db->get('container')->result();
    }

    function cariMVin($noCont)
    {
        $this->db->select('
            detil_move_in.date_in as date_in, 
            emkl.nama as nama_emkl,
            payment_in.kode as kode,
            payment_in.do_number as do_number,
            payment_in.no_voyage,
            vessel.nama as nama_vessel');
        $this->db->join('container','detil_move_in.id_container = container.id', 'left');
        $this->db->join('detil_payment_in', 'detil_move_in.id_container = detil_payment_in.id_container', 'left');
        $this->db->join('payment_in', 'detil_payment_in.id_payment_in = payment_in.id', 'left');
        $this->db->join('emkl', 'payment_in.id_emkl = emkl.id');
        $this->db->join('vessel', 'payment_in.id_vessel = vessel.id');
        $this->db->where('container.no_cont', $noCont);        
        //$this->db->where('container.stok', '3');
        $this->db->group_by('payment_in.id_emkl');
        return $this->db->get('detil_move_in')->result();
    }


    function cariMVot($noCont)
    {
        $this->db->select('
                detil_move_out.date_out as date_out,
                emkl.nama as nama_emkl,
                payment_out.kode as kode,
                payment_out.do_number as do_number,
                payment_out.no_voyage as no_voyage,
                vessel.nama as nama_vessel
            ');
        $this->db->join('container','detil_move_out.id_container = container.id', 'left');
        $this->db->join('detil_payment_out', 'detil_move_out.id_container = detil_payment_out.id_container', 'left');
        $this->db->join('payment_out', 'detil_payment_out.id_payment_out = payment_out.id', 'left');
        $this->db->join('emkl', 'payment_out.id_emkl = emkl.id');
        $this->db->join('move_out', 'payment_out.id_move_out = move_out.id', 'left');
        $this->db->join('vessel', 'move_out.id_vessel = vessel.id');
        $this->db->where('container.no_cont', $noCont);    
        $this->db->group_by('payment_out.id_emkl');
        return $this->db->get('detil_move_out')->result();
    }


    function chartbar()
    {
        $query = "  SELECT 
                        mlo.nama namamlo,
                        COUNT(mlo.id) jumlahcontainer 
                    FROM 
                        container
                    LEFT JOIN 
                        mlo
                    ON 
                        container.id_mlo = mlo.id
                    GROUP BY
                        container.id_mlo
                ";
        return $this->db->query($query);
    }

    function insert($input_baru)
    {
      $this->db->insert($this->table, $input_baru);
      return $this->db->affected_rows();
    }

    function get_container($id_move_in)
    {
        $this->db->where('detil_move_in.id_move_in', $id_move_in);
        $this->db->join('container', 'detil_move_in.id_container = container.id', 'left');
        $this->db->where('container.stok', '1');
        $this->db->order_by('container.id', 'ASC');
        return $this->db->get('detil_move_in')->result();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    function get_stok($no_cont)
    {
        $this->db->like('no_cont', $no_cont, 'both');
        $this->db->where('stok', '3');
        $this->db->order_by('no_cont', 'ASC');
        $this->db->limit(10);
        return $this->db->get('container')->result();
    }
    
    function get_container_out($id_move_out)
    {
        $this->db->select('*');
        $this->db->join('detil_move_out', 'container.id = detil_move_out.id_container');
        $this->db->where('container.stok', '4');
        $this->db->where('detil_move_out.id_move_out', $id_move_out);
        return $this->db->get('container')->result();
    }
}