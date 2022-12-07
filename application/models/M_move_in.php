<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_move_in extends CI_Model
{
    var $table = 'move_in';
    var $table2 = 'detil_move_in';
    var $table3 = 'container';
    
    function __construct()
    {
       parent::__construct();
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
}