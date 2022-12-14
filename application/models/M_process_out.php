<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_process_out extends CI_Model
{
    var $table = 'view_process_out';
    var $table2 = 'container';
    var $table3 = 'detil_move_out';

    var $column_order = array(null, 'no_container','date_out','time_out', 'truck_out', 'kode', NULL);
    var $column_search = array('no_container','date_out','time_out', 'truck_out', 'kode');
    var $oder = array('id_detil_out'=>'ASC'); 

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function _get_datatables_query()
    {
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

    function update_detil($id_detil_out, $data)
    {
        $this->db->where('id', $id_detil_out);
        $this->db->update($this->table3, $data);
        return $this->db->affected_rows();
    }

    function update_container($id_container, $data2)
    {
        $this->db->where('id', $id_container);
        $this->db->update($this->table2, $data2);
        return $this->db->affected_rows();   
    }

    function get_by_id($id)
    {   
        $this->db->where('id_detil_out', $id);
        $this->db->join('detil_move_out', 'view_process_out.id_detil_out = detil_move_out.id', 'left');        
        return $this->db->get($this->table)->row();
    }
}