<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_users extends CI_Model
{
   var $table = 'users'; //nama tabel dari database
   var $column_order = array('display_name','username' ,'email', 'role', 'last_login'); //field yang ada di table user
   var $column_search = array('display_name','username','email', 'role'); //field yang diizin untuk pencarian 
   var $order = array('id' => 'ASC'); // default order 

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
 
   public function count_all()
   {
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }

   function get()
   {
      return $this->db->order_by('ID', 'ASC')->get($this->table)->result();
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