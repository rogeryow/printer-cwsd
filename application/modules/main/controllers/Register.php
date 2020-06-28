<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'register_model'=>'register_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }

    public function registerUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $res = $this->register_mdl->registerAdmin($email, $password);

        echo json_encode(array('res' => $res));
    }

}
