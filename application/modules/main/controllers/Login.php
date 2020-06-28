<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'login_model'=>'login_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function loginDeveloper()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $res = $this->login_mdl->loginDeveloper($email, $password);

        if($res)
        {
            $newdata = array(
                'admin_id'  => $res[0]->admin_id,
                'email' => $this->input->post('email'),
                'firstname' => $res[0]->firstname,
                'lastname' => $res[0]->lastname,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($newdata);
        }

        echo json_encode(array('res' => $res));
    }
    public function loginAdmin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $res = $this->login_mdl->loginAdmin($username, $password);
        if($res)
        {
            $newdata = array(
                'id'  => $res[0]->id,
                'username' => $this->input->post('username'),
                'firstname' => $res[0]->firstname,
                'lastname' => $res[0]->lastname,
                'username' => $res[0]->username,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($newdata);
        }

        echo json_encode(array('res' => $res));
    }
   
}
