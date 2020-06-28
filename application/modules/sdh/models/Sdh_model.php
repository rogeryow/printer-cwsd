<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sdh_model extends CI_Model
{

  var $table = 'gen_info';
  var $view = 'vw_gen_info';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function save($data)
    {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }
    public function save_pickup($data)
    {
      $this->db->insert('pickup', $data);
      return $this->db->insert_id();
    }
    public function save_passenger($data)
    {
      $this->db->insert('passenger', $data);
      return $this->db->insert_id();
    }
    public function save_questions($data){
      $this->db->insert('q_ans', $data);
      return $this->db->insert_id();
    }
    public function save_other_fam($data){
      $this->db->insert('other_info', $data);
      return $this->db->insert_id();
    }
    public function update($where,$data)
    {
      $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_provinces(){
      $query = $this->db->get('provinces');
        return $query->result(); 
    }
    public function get_cities($id){
      $this->db->where("id", $id);
      $query = $this->db->get('cities');
        return $query->result(); 
    }
    public function get_barangay($id){
        $this->db->where('zipcode', $id);
        $query = $this->db->get('barangay');
        return $query->result(); 
    }

    public function load_questions(){
        $query = $this->db->get('questions');
        return $query->result();
    }

    public function get_reasons($id){
      $this->db->where('q_id', $id);
      $query = $this->db->get('q_select');
      return $query->result(); 
    }

    public function validate_name($firstname, $lastname, $middlename){
      $this->db->where('firstname', $firstname);
      $this->db->where('lastname', $lastname);
      $this->db->where('middlename', $middlename);
      $query = $this->db->get('gen_info');
      return $query->result(); 
    }

    public function validate_pickup($firstname, $lastname){
      $this->db->where('firstname', $firstname);
      $this->db->where('lastname', $lastname);
      $query = $this->db->get('gen_info');
      return $query->result(); 
    }


   
}