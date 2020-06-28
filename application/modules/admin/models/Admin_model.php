<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    var $table = 'administrator';
    var $view = 'tbl_bets';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function load_data()
    {
        $query = $this->db->get($this->view);
        return $query->result(); 
    }
    public function count_filtered()
    {
        $query = $this->db->get($this->view);
        return $query->num_rows();
    
    }
    public function count_all()
    {
      $this->db->from($this->table);
      return $this->db->count_all_results();
  
    }
    public function save($data)
    {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }
    public function update($where,$data)
    {
      $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
      $this->db->where('pk_school_id', $id);
      $this->db->delete($this->table);
    }
}