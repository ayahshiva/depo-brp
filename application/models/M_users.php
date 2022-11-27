<?php

defined('BASEPATH') or exit('No direct script access allowed');


class M_users extends CI_Model
{

   function __construct()
   {
      parent::__construct();        

      $this->table = 'users';
      $this->column_order = array(null, 'display_name', 'username', 'email', 'role', 'last_login', null);
      $this->column_search = array('display_name', 'username', 'email');
      $this->order = array('ID'=> 'ASC');
   }

   public function getRows($postData)
   {
      $this->_get_datatables_query($postData);
      if($postData['length'] != 1){
         $this->db->limit($postData['length'], $postData['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }

   public function countAll()
   {
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }

   public function countFiltered($postData)
   {
      $this->_get_datatables_query($postData);
      $query = $this->db->get();
      return $query->num_rows();
   }

   private function _get_datatables_query($postData)
   {
      $this->db->from($this->table);
      $i=0;
      foreach($this->column_search as $item){
         if($postData['search']['value']){
            if($i===0){
               $this->db->group_start();
               $this->db->like($item, $postData['search']['value']);
            }else{
               $this->db->or_like($item, $postData['search']['value']);
            }
            if(count($this->column_search) -1 == $i){
               $this->db->group_end();
            }
         }
         $i++;
      }

      if(isset($postData['order'])){
         $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
      }elseif(isset($this->order)){
         $order = $this->order;
         $this->db->order_by(key($order), $order[key($order)]);
      }
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