<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_vessel extends CI_Model
{
	var $table = 'vessel';
	
    function __construct()
	{
	    parent::__construct();
	}

	function get()
	{
	    return $this->db->order_by('id', 'ASC')->get($this->table)->result();
	}

	function get_by_id($id)
	{
	    return $this->db->get_where($this->table, ['id' => $id])->row();
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

	function delete($id)
	{
	    $this->db->delete($this->table, array("id" => $id));
	    return $this->db->affected_rows();
	}
}

