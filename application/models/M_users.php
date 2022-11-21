<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_users extends CI_Model
{
   private $table = "users";
   //private $table2 = "user_jabatan";
   //private $table3 = "auth";

   function main()
   {
      parent::__construct();        
   }

   function get()
   {
      return $this->db->get($this->table)->result();
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
      $this->db->where('ID', $id);
      $this->db->update($this->table, $data);
      return $this->db->affected_rows();
   }

   function delete($id)
   {
      $this->db->delete($this->table, array("id" => $id));
      return $this->db->affected_rows();
   }

   function auth($username)
   {

      $query = $this
            ->db
            ->where('username', $username)
            ->get($this->table);
         if($query->num_rows() == 1){
            return $query->row_array();
         }else{
            return FALSE;
         }
   }
}