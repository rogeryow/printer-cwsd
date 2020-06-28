<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Called_Client extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'called_client_model'=>'Called_client_mdl',
            'sdh/sdh_model' => 'sdh_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function index()
    {
        $data['main_content']='called_client/index';
        $data['page_name']="Called_Client";
        $data['template_type']="admin";
        $data['services'] = $this->Called_client_mdl->load_services();
        // print_r($data['services']);
        $this->load->view('includes/templates',$data);
    }

    public function load_client($id){
        echo json_encode($this->Called_client_mdl->load_client($id));
    }

    public function load_table(){
        $output = array(
            "draw" => 1,
            "recordsTotal" => $this->Called_client_mdl->count_all(),
            "recordsFiltered" => $this->Called_client_mdl->count_filtered(),
            "data" => $this->Called_client_mdl->load_data(),
        );
        echo json_encode($output);
    }
    
    public function load_answered_questions($id){
        echo json_encode($this->Called_client_mdl->load_question_answered($id));
    }

    public function save(){
        $data = array(
            'info_id'        => $this->input->post('info_id'),
            'service'        => $this->input->post('service'),
        );

        $this->Called_client_mdl->save($data);
        echo json_encode(array('status' => TRUE));
    }
    
}
