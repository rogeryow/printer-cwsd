<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    
    public function loginDeveloper($email, $password)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('admin_devs');
        $res = $query->result();

        if($res)
        {
            if(password_verify($password, $res[0]->password)): return $res; else: return false; endif;
        }
        else
        {
            return false;
        }
    }
    public function loginAdmin($username, $password)
    {
        $this->db->where('username',$username);
        $query = $this->db->get('vw_user_info');
        $res = $query->result();

        if($res)
        {
            if(password_verify($password, $res[0]->password)): return $res; else: return false; endif;
        }
        else
        {
            return false;
        }
    }
    
}