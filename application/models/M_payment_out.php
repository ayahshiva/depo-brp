<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_payment_out extends CI_Model
{
    var $table = 'payment_out';
    var $table2 = 'detil_payment_out';
    var $table3 = 'container';
    var $table4 = 'view_payment_out';

    var $column_order = array(null, 'do_number','invoice','nama_emkl', 'nama_vessel', 'no_voyage','metode', 'kode', NULL);
    var $column_search = array('do_number','invoice','nama_emkl', 'nama_vessel', 'no_voyage','metode', 'kode');
    var $oder = array('id_pay_out'=>'DESC'); 

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


    function simpan_payment_out($data)
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
        $this->db->where('id_pay_out', $id);
        return $this->db->get($this->table4)->row();
    }

    function get_view_id($id)
    {
        return $this->db->where('id_pay_out', $id)->get($this->table4)->row();
    }

    function list_container($id)
    {
        $this->db->select('*, 
                            detil_payment_out.id as id1,
                            payment_out.id as id2,
                            container.id as id3
                        ');
        $this->db->join('payment_out', 'detil_payment_out.id_payment_out = payment_out.id', 'left');
        $this->db->join('container', 'detil_payment_out.id_container = container.id', 'left');
        $this->db->join('detil_move_out', 'container.id = detil_move_out.id_container', 'left');
        $this->db->where('detil_payment_out.id_payment_out', $id);
        return $this->db->get($this->table2)->result();
    }

    function jumlah_real($id)
    {
        $this->db->select('*')
                 ->from('detil_payment_out')
                 ->where('id_payment_out', $id);
        return $this->db->get()->num_rows();
    }

    function insert_detil_payment($detil_payment)
    {
        $this->db->insert($this->table2, $detil_payment);
        return $this->db->affected_rows();
    }

}