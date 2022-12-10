<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_move_out extends CI_Model
{
    var $table = 'move_out';
    var $table2 = 'detil_move_out';
    var $table3 = 'container';
    var $table4 = 'view_move_out';

    var $column_order = array('tanggal','nama_emkl','nama_vessel','no_voyage', 'jumlah', NULL);
    var $column_search = array('tanggal','nama_emkl','nama_vessel','no_voyage', 'jumlah');
    var $oder = array('id_move_out' => 'DESC'); 
    
    function __construct()
    {
       parent::__construct();
       $this->load->database();
    }

    function _get_datatables_query()
    {
        $this->db->from($this->table4);

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
        $this->db->from($this->table4);
        return $this->db->count_all_results();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    function update($id, $data)
    {
         $this->db->where('id', $id);
         $this->db->update($this->table, $data);
         return $this->db->affected_rows();
    }


    function get_by_id($id)
    {
        //return $this->db->get_where($this->table, ['id' => $id])->row();
        $this->db->select('*, move_out.id as id_move_out, emkl.id as id_emkl, emkl.nama as nama_emkl, vessel.id as id_vessel, vessel.nama as nama_vessel')
                 ->from('move_out')
                 ->join('emkl', 'move_out.id_emkl = emkl.id', 'left')
                 ->join('vessel', 'move_out.id_vessel = vessel.id', 'left')
                 ->where('move_out.id', $id);
        return $this->db->get()->row();
    }

    function list_container($id)
    {
        $this->db->select('*, detil_move_out.id as id_detil, container.id as id_container, move_out.id as id_move_out')
                 ->from('detil_move_out')
                 ->join('container', 'detil_move_out.id_container = container.id', 'left')
                 ->join('move_out', 'detil_move_out.id_move_out = move_out.id')
                 ->where('move_out.id', $id);

        return $this->db->get()->result();
    }

    function jumlah_container()
    {
        $q = "  SELECT 
                    move_out.id id_move_out,
                    COUNT(detil_move_out.id_container) jumlahcontainer 
                FROM
                    detil_move_out
                LEFT JOIN
                    move_out
                ON
                    detil_move_out.id_move_out = move_out.id
                GROUP BY
                    detil_move_out.id_move_out
              ";

        return $this->db->query($q)->result();
    }

    function jumlah_real($id)
    {
        $this->db->select('*')
                 ->from('detil_move_out')
                 ->where('id_move_out', $id);
        return $this->db->get()->num_rows();
    }

    function get_voyage()
    {
        $this->db->select('no_voyage');
        $this->db->order_by('id', 'DESC');
        $this->db->group_by('no_voyage');
        $this->db->limit(15);
        return $this->db->get($this->table)->result();
    }

    function get_vessel($no_voyage)
    {
        //return $this->db->get_where('move_in',['no_voyage' => $no_voyage])->results();
        $this->db->select('*');
        $this->db->join('vessel', 'move_out.id_vessel = vessel.id', 'left');
        $this->db->where('no_voyage', $no_voyage);
        $this->db->group_by('vessel.id');
        return $this->db->get($this->table)->result();
    }

    function simpan_payment_out($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
}