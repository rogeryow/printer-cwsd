<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'clients_model'=>'clients_mdl',
            'sdh/sdh_model' => 'sdh_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function index()
    {
        $data['main_content']='clients/index';
        $data['page_name']="Clients";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }
    public function load_client($id){
        echo json_encode($this->clients_mdl->load_client($id));
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

    public function save(){
        $data = array(
            'info_id'        => $this->input->post('info_id'),
            'remark'        => $this->input->post('remark'),
        );

        $this->clients_mdl->save($data);
        echo json_encode(array('status' => TRUE));

    }
    
}
