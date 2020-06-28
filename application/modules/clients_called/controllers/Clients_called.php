<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_called extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'clients/clients_model'=>'clients_mdl',
            'clients_called_model'=>'clients_called_mdl',
            'sdh/sdh_model' => 'sdh_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function index()
    {
        $data['main_content']='clients_called/index';
        $data['page_name']="Clients";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }

    public function load_table(){
        $output = array(
            "draw" => 1,
            "recordsTotal" => $this->clients_mdl->count_all(),
            "recordsFiltered" => $this->clients_mdl->count_filtered(),
            "data" => $this->clients_mdl->load_data(),
        );
        echo json_encode($output);
    }
    
    public function load_answered_questions($id){
        echo json_encode($this->clients_mdl->load_question_answered($id));
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
                    $insert = $this->clients_mdl->save($data, $type);
                }else
                {
                    // update existing
                    $insert = $this->clients_mdl->update(array("id" => $this->input->post('id')), $data, $type);
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
                $insert = $this->clients_mdl->save($data, $type);
            }else
            {
                // update existing
                $insert = $this->clients_mdl->update(array("id" => $this->input->post('id')), $data, $type);
            }
            echo json_encode(array('status' => TRUE));
        }

        
    }
    
}
