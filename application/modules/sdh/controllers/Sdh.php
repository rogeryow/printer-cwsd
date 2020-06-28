<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdh extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'main/sdh_model'=>'sdh_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }
    public function validate_name($firstname, $lastname, $middlename){
        
        if(!empty($this->sdh_mdl->validate_name($firstname, $lastname, $middlename)))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function validate_pickup($firstname,$lastname){
        if(!empty($this->sdh_mdl->validate_pickup($firstname,$lastname))){
            return true;
        }else{
            return false;
        }
    }
    public function save_pickup(){
        $data = array(
            'lastname'           => $this->input->post('lastname'),
            'firstname'        => $this->input->post('firstname'),
            'middlename'        => $this->input->post('middlename'),
            'plate_no'        => $this->input->post('plate_no'),
            'vehicle_id'        => $this->input->post('vehicle_id'),
        );
        $insert = $this->sdh_mdl->save_pickup($data);
        $count = 1;
        while($count <= $this->input->post('total_passenger')){
            $data = array(
                'pickup_id'        => $insert,
                'lastname'        => $this->input->post('fam_'.$count.'_lastname'),
                'firstname'        => $this->input->post('fam_'.$count.'_firstname'),
                'address'        => $this->input->post('fam_'.$count.'_address'),
                'barangay'        => $this->input->post('fam_'.$count.'_barangay'),
            );
            $insert3 = $this->sdh_mdl->save_passenger($data);
            $count++;
        }
        echo json_encode(array("status" => TRUE, "id"=> $insert));
    }
    public function save()
    {
        if(!$this->validate_name($this->input->post('firstname'),
            $this->input->post('lastname'),
            $this->input->post('middlename'))){
                $data = array(
                    'lastname'           => $this->input->post('lastname'),
                    'firstname'        => $this->input->post('firstname'),
                    'middlename'        => $this->input->post('middlename'),
                    'gender'        => $this->input->post('gender'),
                    'DOB'        => $this->input->post('DOB'),
                    'contact'        => $this->input->post('contact'),
                    'addr'        => $this->input->post('addr'),
                    'purok_sitio'        => $this->input->post('purok_sitio'),
                    'brgy'        => $this->input->post('barangay'),
                );
            $insert = $this->sdh_mdl->save($data);
    
            $questions = $this->sdh_mdl->load_questions();
            $insert2 = "";
            foreach($questions as $question){
                
                if($question->q_id == 2){
                    $data = array(
                        'q_id'           => 2,
                        'info_id'        => $insert,
                        'ans_val'        => $this->input->post('Q_2_barangay').', '.$this->input->post('Q_2_city').', '.$this->input->post('Q_2_province')
                    );
                    $this->sdh_mdl->save_questions($data);
                }
                else if($question->q_id == 4){
                    if($question->q_id == 4 && $this->input->post('Q_4_2') == ''){
                        $data = array(
                            'q_id'           => $question->q_id,
                            'info_id'        => $insert,
                            'ans_val'        => $this->input->post('Q_4'),
                        );
                        $this->sdh_mdl->save_questions($data);
                    }
                    else{
                        $data = array(
                            'q_id'           => $question->q_id,
                            'info_id'        => $insert,
                            'ans_val'        => $this->input->post('Q_4_2'),
                        );
                        $this->sdh_mdl->save_questions($data);
                    }
                }else{
                    $data = array(
                        'q_id'           => $question->q_id,
                        'info_id'        => $insert,
                        'ans_val'        => $this->input->post('Q_'.$question->q_id),
                    );
                    $insert2 = $this->sdh_mdl->save_questions($data);
                }
                
    
                
                
                
            }
    
            $count = 1;
            $insert3 = "";
            while($count <= $this->input->post('total_fam')){
                $data = array(
                    'info_id'        => $insert,
                    'lastname'        => $this->input->post('fam_'.$count.'_lastname'),
                    'firstname'        => $this->input->post('fam_'.$count.'_firstname'),
                    'middlename'        => $this->input->post('fam_'.$count.'_middlename'),
                    'age'        => $this->input->post('fam_'.$count.'_age'),
                    'relationship'        => $this->input->post('fam_'.$count.'_relationship'),
                );
                $insert3 = $this->sdh_mdl->save_other_fam($data);
                $count++;
            }
            echo json_encode(array("status" => TRUE, "id"=> $insert, "info_id" => $insert2, "fam_id" => $insert3));
        }else{
            echo json_encode(array('status'=> FALSE));
        }
        
    }
    public function stranded(){
        $data['questions'] = $this->sdh_mdl->load_questions();

        $data['vw_questions'] = $this->sdh_mdl->load_vw_questions();
        $data['barangays'] = $this->sdh_mdl->get_barangay(8002);
        $data['reasons'] = $this->sdh_mdl->get_reasons(4);
		$data['template_type']="form";
		$this->load->view('includes/templates',$data);
    }
    public function get_barangays_digos(){
        echo json_encode($this->sdh_mdl->get_barangay(8002));
    }
    public function get_provinces(){
        echo json_encode($this->sdh_mdl->get_provinces());
    }
    public function get_cities($id){
        echo $id;
        echo json_encode($this->sdh_mdl->get_cities($id));
    }
    public function get_reasons(){
        echo json_encode($this->sdh_mdl->get_reasons(4));
    }
   
    
    
}
