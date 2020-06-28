<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Developer_model extends CI_Model
{

    var $usersTable = 'users';
    var $groupTable = 'groups';
    var $vw_users = 'vw_user_info';
    var $vw_group = 'vw_group';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function load_data($type)
    {
        $query = '';

        if($type=="users")
        {
            $query = $this->db->get($this->vw_users);
        }else
        {
            $query = $this->db->get($this->groupTable);
        }
        return $query->result(); 
    }

    public function load_groups(){
      $query = $this->db->get('groups');
      return $query->result(); 
    }
    public function count_filtered($type)
    {
        $query = '';

        if($type=="users")
        {
            $query = $this->db->get($this->usersTable);
        }else
        {
            $query = $this->db->get($this->groupTable);
        }
        return $query->num_rows();
    
    }
    public function count_all($type)
    {
      $query = '';

        if($type=="users")
        {
            $this->db->from($this->usersTable);
        }else
        {
            $this->db->from($this->groupTable);
        }
      return $this->db->count_all_results();
  
    }


    public function save($data, $type)
    {
      if($type == "users")
      {
        $this->db->insert($this->usersTable, $data);
      }else
      {
        $this->db->insert($this->groupTable, $data);
      }
      return $this->db->insert_id();
    }

    public function saveUserGroup($data)
    {
        $this->db->insert('user_group', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data, $type)
    {
        if($type == "users")
        {
          $this->db->update($this->usersTable, $data, $where);

        }else
        {
          $this->db->update($this->groupTable, $data, $where);
        }
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
      $this->db->where('pk_school_id', $id);
      $this->db->delete($this->table);
    }
}