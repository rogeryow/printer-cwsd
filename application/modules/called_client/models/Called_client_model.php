<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Called_client_model extends CI_Model
{

    var $clientTable = 'gen_info';
    var $vw_Called_client = 'vw_called_client';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function load_data()
    {
        $query = $this->db->get($this->vw_Called_client);
        return $query->result(); 
    }
    public function load_client($info_id){
        $this->db->where('info_id', $info_id);
        $query = $this->db->get($this->vw_Called_client);
        return $query->result(); 
    }
    public function count_filtered()
    {
        $query = $this->db->get($this->vw_Called_client);
        return $query->num_rows();
    }
    public function count_all()
    {
      $this->db->from($this->clientTable);
      return $this->db->count_all_results();
    }
    public function load_question_answered($id)
    {
      $this->db->where('info_id', $id);
      $query = $this->db->get('vw_answered_questions');
      return $query->result(); 
    }
    public function load_services(){
      $query = $this->db->get('service');
      return $query->result(); 
    }
    public function save($data)
    {
      $this->db->insert('service_rendered', $data);
      return $this->db->insert_id();
    }
    public function update($where, $data)
    {
        $this->db->update($data, $where);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
      $this->db->where('pk_school_id', $id);
      $this->db->delete($this->table);
    }
}