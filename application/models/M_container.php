<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_container extends CI_Model
{
    var $table = 'container';
    var $column_order = array('namamlo','nomorcontainer' ,'sizecontainer', 'tipecontainer', 'tglmasuk', 'kodebayar'); 
    var $column_search = array('namamlo','nomorcontainer' ,'sizecontainer', 'tipecontainer', 'tglmasuk', 'kodebayar');
    var $order = array('idcontainer' => 'ASC');

   function __construct()
   {
       parent::__construct();
   }

   private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
            $i = 0;
     
            foreach ($this->column_search as $item) // looping awal
            {
                if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
                {
                 
                    if($i===0) // looping awal
                    {
                        $this->db->group_start(); 
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
 
                    if(count($this->column_search) - 1 == $i) 
                        $this->db->group_end(); 
                }
            $i++;
            }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
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
        //$stok = array('3','4','5');
        $this->db->select('*, emkl.nama as namaemkl, vessel.nama as namavessel')
                 ->from('container')
                 ->where('container.no_cont', $noCont)
                 //->where_in('container.stok', $stok)
                 ->join('detil_move_in', 'container.id = detil_move_in.id_container', 'left')
                 ->join('move_in','detil_move_in.id_move_in = move_in.id','left')
                 //->join('mlo','move_in.id_mlo = mlo.id','left')
                 ->join('vessel', 'move_in.id_vessel = vessel.id')
                 ->join('detil_payment_in', 'container.id = detil_payment_in.id_container','left')
                 ->join('payment_in', 'detil_payment_in.ID_payment_in = payment_in.id','left')
                 ->join('emkl', 'payment_in.id_emkl = emkl.id', 'left')
                 ->order_by('detil_move_in.id', 'DESC');
        return $this->db->get()->result();

    }


    function cariMVot($noCont)
    {
        //$stok = array('3','4','5');
        $this->db->select('*, emkl.nama as namaemkl, vessel.nama as namavessel')
                 ->from('container')
                 ->where('container.no_cont', $noCont)
                 //->where_in('container.stok', $stok)
                 ->join('detil_move_out', 'container.id = detil_move_out.id_container', 'left')
                 ->join('move_out','detil_move_out.id_move_out = move_out.id','left')
                 ->join('emkl','move_out.id_emkl = emkl.id','left')
                 ->join('vessel', 'move_out.id_vessel = vessel.id')
                 ->join('detil_payment_out', 'container.id = detil_payment_out.id_container','left')
                 ->join('payment_out', 'detil_payment_out.ID_payment_out = payment_out.id','left')
                 ->order_by('detil_move_out.id', 'DESC');
        return $this->db->get()->result();

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
}