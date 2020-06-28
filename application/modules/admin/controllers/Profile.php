<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'profile_model'=>'profile_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    private function checkSession()
    {
        if(!$this->session->has_userdata('logged_in'))
        {
            redirect();
        }
    }
    public function index()
    {
        $this->checkSession();
        $data['main_content']='admin/profile';
        $data['page_name']="Admin";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }

    public function users_load_table(){
        $output = array(
            "draw" => 1,
            "recordsTotal" => $this->profile_mdl->count_all('users'),
            "recordsFiltered" => $this->profile_mdl->count_filtered('users'),
            "data" => $this->profile_mdl->load_data('users'),
        );
        echo json_encode($output);
    }

    public function group_load_table(){
        $output = array(
            "draw" => 1,
            "recordsTotal" => $this->profile_mdl->count_all('group'),
            "recordsFiltered" => $this->profile_mdl->count_filtered('group'),
            "data" => $this->profile_mdl->load_data('group'),
        );
        echo json_encode($output);
    }
    
    public function save($type){
        if($type == 'users'){
            $data = array(
                'id'        => $this->input->post('name'),
                'username'        => $this->input->post('username'),
                'email'        => $this->input->post('email'),
                'firstname'        => $this->input->post('firstname'),
                'lastname'        => $this->input->post('lastname'),
                'password'        => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'active'        => 1,
            );

            $insert = '';

            if($this->input->post('password') !== $this->input->post('confirm_password'))
            {
                echo json_encode(array('status' => FALSE));
            }else
            {
                if($this->input->post('id') == '')
                {
                    // add new
                    $insert = $this->profile_mdl->save($data, $type);
                }else
                {
                    // update existing
                    $insert = $this->profile_mdl->update(array("id" => $this->input->post('id')), $data, $type);
                }
                echo json_encode(array('status' => TRUE));
            }

        }else{
            $data = array(
                'name'        => $this->input->post('name'),
                'description'        => $this->input->post('description'),
            );

            $insert = '';

            if($this->input->post('password') !== $this->input->post('confirm_password')){
                
            }

            if($this->input->post('id') == '')
            {
                // add new
                $insert = $this->profile_mdl->save($data, $type);
            }else
            {
                // update existing
                $insert = $this->profile_mdl->update(array("id" => $this->input->post('id')), $data, $type);
            }
            echo json_encode(array('status' => TRUE));
        }

        
    }
    
}
