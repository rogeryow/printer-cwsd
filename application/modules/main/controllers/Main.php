<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'main_model'=>'main_mdl',
            'sdh_model'=>'sdh_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    private function checkSession()
    {
        
    }
    public function index()
    {
        $data['template_type']="admin_login";
		$this->load->view('includes/templates',$data);
    }
    public function stranded(){
        $data['questions'] = $this->sdh_mdl->load_questions();

        $data['vw_questions'] = $this->sdh_mdl->load_vw_questions();
        $data['barangays'] = $this->sdh_mdl->get_barangay(8002);
        $data['reasons'] = $this->sdh_mdl->get_reasons(4);
		$data['template_type']="form";
		$this->load->view('includes/templates',$data);
    }
    public function pickup()
    {
        $data['barangays'] = $this->sdh_mdl->get_barangay(8002);
        $data['vehicles'] = $this->sdh_mdl->get_vehicles();
        $data['reasons'] = $this->sdh_mdl->get_reasons(4);
		$data['template_type']="pickup";
		$this->load->view('includes/templates',$data);
    }
    public function developerMode()
    {
        $data['template_type']="developer_login";
		$this->load->view('includes/templates',$data);
    }
    
    public function get_barangays_digos(){
        echo json_encode($this->sdh_mdl->get_barangay(8002));
    }
    public function adminMode()
    {
        $data['template_type']="admin_login";
		$this->load->view('includes/templates',$data);
    }
    public function teacherMode()
    {
        $data['template_type']="teacher_login";
		$this->load->view('includes/templates',$data);   
    }
    public function guidanceMode(){
        $data['template_type']="guidance_login";
		$this->load->view('includes/templates',$data);
    }

    public function adminRegister(){
        $data['template_type']="admin_register";
		$this->load->view('includes/templates',$data);
    }
    public function teacherRegister(){
        $data['template_type']="teacher_register";
		$this->load->view('includes/templates',$data);
    }

    public function guidanceRegister(){
        $data['template_type']="guidance_register";
		$this->load->view('includes/templates',$data);
    }


    public function logoutDeveloper()
    {
        $session = array('username','email','firstname','lastname','logged_in');
        $this->session->unset_userdata($session);
        redirect('');
    }

    public function logoutAdmin()
    {
        $session = array('username','email','firstname','lastname','logged_in');
        $this->session->unset_userdata($session);
        redirect('');
    }
    
    
}
