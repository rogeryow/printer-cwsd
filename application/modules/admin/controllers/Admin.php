<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            // 'login_model'=>'login_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function index()
    {
        $data['template_type']="admin_login";
		$this->load->view('includes/templates',$data);
    }
}
