<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    
    public function registerAdmin($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('administrator');
        $res = $query->result();

        if($res)
        {
            $data = array(
                'administrator_id'   => $res[0]->administrator_id,
                'username'           => 'administrator',
                'password'           => password_hash($password, PASSWORD_DEFAULT),
                'admin_devs_id'      => $res[0]->admin_devs_id
            );
            $this->db->insert('administrator_reg', $data);
            return $res;
            // $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    public function registerTeacher($id_number, $email, $password)
    {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('teacher');
        $res = $query->result();

        if($res)
        {
            $data = array(
                'id_number'   => $id_number,
                'username'    => 'teacher',
                'password'    => password_hash($password, PASSWORD_DEFAULT),
                'email'       => $email
            );
            $this->db->insert('teacher_reg', $data);
            return $res; 
            // $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    public function registerGuidance($id_number, $email, $password)
    {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('guidance');
        $res = $query->result();

        if($res)
        {
            $data = array(
                'id_number'   => $id_number,
                'username'    => 'guidance',
                'password'    => password_hash($password, PASSWORD_DEFAULT),
                'email'       => $email
            );
            $this->db->insert('guidance_reg', $data);
            return $res; 
            // $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }
  
}