<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model{

    var $table = 'admin_devs';
    private $email = '';
    private $password = '';

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }
    public function set_email_password($email, $password){
        $this->email = $email;
        $this->password = $password;
        return $this->validate();
    }
    private function validate(){
        $this->db->where('email',$this->email);
        $query = $this->db->get('admin_devs');
        $res = $query->result();
        if($res){
            if(password_verify($this->password, $res[0]->password)): return $res; else: return false; endif;
        }else{
            return false;
        }
    }
}