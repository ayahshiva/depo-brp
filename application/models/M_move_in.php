<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_move_in extends CI_Model
{
    var $table = 'move_in';
    var $table2 = 'detil_move_in';
    var $table3 = 'container';
    var $table4 = 'view_move_in';

    var $column_order = array('tanggal','mlo_nama','vessel_nama','no_voyage', 'jumlah', NULL);
    var $column_search = array('tanggal','mlo_nama', 'vessel_nama', 'no_voyage', 'jumlah');
    var $oder = array('id'=>'DESC'); 
    
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



    function get_by_id($id)
    {
        //return $this->db->get_where($this->table, ['id' => $id])->row();
        $this->db->select('*, move_in.id as id_move_in, mlo.id as id_mlo, mlo.nama as namamlo, vessel.id as id_vessel, vessel.nama as namavessel')
                 ->from('move_in')
                 ->join('mlo', 'move_in.id_mlo = mlo.id', 'left')
                 ->join('vessel', 'move_in.id_vessel = vessel.id', 'left')
                 ->where('move_in.id', $id);
        return $this->db->get()->row();
    }

    function list_container($id)
    {
        $this->db->select('*, detil_move_in.id as iddetil, container.id as idcontainer, move_in.id as idmovein')
                 ->from('detil_move_in')
                 ->join('container', 'detil_move_in.id_container = container.id', 'left')
                 ->join('move_in', 'detil_move_in.id_move_in = move_in.id')
                 ->where('move_in.id', $id);

        return $this->db->get()->result();
    }

    function jumlah_container()
    {
        $q = "  SELECT 
                    move_in.id idmovein,
                    COUNT(detil_move_in.id_container) jumlahcontainer 
                FROM
                    detil_move_in
                LEFT JOIN
                    move_in
                ON
                    detil_move_in.id_move_in = move_in.id
                GROUP BY
                    detil_move_in.id_move_in
              ";

        return $this->db->query($q)->result();
    }

    function jumlah_real($id)
    {
        $this->db->select('*')
                 ->from('detil_move_in')
                 ->where('id_move_in', $id);
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

    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    function insert_detil($data)
    {
        $this->db->insert($this->table2, $data);
        return $this->db->affected_rows();
    }

    function update($id, $data)
    {
         $this->db->where('id', $id);
         $this->db->update($this->table, $data);
         return $this->db->affected_rows();
    }

    function delete($id)
    {
        $this->db->delete($this->table, array("id" => $id));
        return $this->db->affected_rows();
    }

    function get_vessel($no_voyage)
    {
        //return $this->db->get_where('move_in',['no_voyage' => $no_voyage])->results();
        $this->db->select('*');
        $this->db->join('vessel', 'move_in.id_vessel = vessel.id', 'left');
        $this->db->where('no_voyage', $no_voyage);
        return $this->db->get($this->table)->result();
    }

    function get_mlo($no_voyage)
    {
        //return $this->db->get_where('move_in',['no_voyage' => $no_voyage])->results();
        $this->db->select('*, move_in.id as idmovein');
        $this->db->join('mlo', 'move_in.id_mlo = mlo.id', 'left');
        $this->db->where('no_voyage', $no_voyage);
        return $this->db->get($this->table)->result();
    }

    function get_id_move_in($id)
    {
        //return $this->db->get_where('move_in',['no_voyage' => $no_voyage])->results();
        $this->db->select('*');
        $this->db->where('no_voyage', $id);
        return $this->db->get($this->table)->result();
    }
}