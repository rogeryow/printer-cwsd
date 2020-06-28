<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sdh_model extends CI_Model
{

  var $table = 'gen_info';
  var $view = 'vw_gen_info';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function save($data)
    {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }
    public function save_questions($data){
      $this->db->insert('q_ans', $data);
      return $this->db->insert_id();
    }
    public function save_other_fam($data){
      $this->db->insert('other_info', $data);
      return $this->db->insert_id();
    }
    public function update($where,$data)
    {
      $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_barangay($id){
        $this->db->where('zipcode', $id);
        $query = $this->db->get('barangay');
        return $query->result(); 
    }
    public function validate_name($firstname, $lastname, $middlename){
        $this->db->where('firstname', $firstname);
        $this->db->where('lastname', $lastname);
        $this->db->where('middlename', $middlename);
        $query = $this->db->get('gen_info');
        return $query->result(); 
      } 

    public function get_vehicles(){
        $query = $this->db->get('vehicle');
        return $query->result(); 
    }

    public function load_questions(){
        $this->db->order_by('q_order');
        $this->db->where('q_form', '1');
        $query = $this->db->get('questions');
        return $query->result(); 
    }

    public function get_reasons($id){
      $this->db->where('q_id', $id);
      $query = $this->db->get('q_select');
      return $query->result(); 
    }
    function load_vw_questions() {
        $html="";$cnt=0;
        $questions= $this->load_questions();
        foreach ($questions as $q){
            $cnt++;
            $sel= $this->proc_qtype($q,$cnt);
            $html.=$sel."<br>";
        }
        return $html;
        //return as html
    }//end function
    public function save_pickup($data)
    {
      $this->db->insert('pickup', $data);
      return $this->db->insert_id();
    }
    public function save_passenger($data)
    {
      $this->db->insert('passenger', $data);
      return $this->db->insert_id();
    }
    function proc_qtype($q,$cnt) {
        if($q->q_type=="yes or no"){
            return "
            <div class='col-md-12 questions'>
     
                    <label for='' style='margin-right: 5px'>{$cnt}.) {$q->question}  </label>
                    <input type='radio' name='Q_{$q->q_id}' id='Yes' class='Q_{$q->q_id}' value='Yes'> Yes
                    <input type='radio' name='Q_{$q->q_id}' id='No' class='Q_{$q->q_id}' value='No'> No
            </div>";
        }elseif ($q->q_type=="text"){
            return "
                <div class='col-md-12 questions form-inline'>
                <label for='' style='margin-right: 5px'>{$cnt}.) {$q->question}  </label>
                <div class='form-group'><input type='text' name='Q_{$q->q_id}' id='Q_{$q->q_id}' class='form-control' ></div>
                </div>
                ";
        }elseif ($q->q_type=="contact"){
            return "
                <div class='col-md-12 questions form-inline'>
                    <div class='form-group'>
                        <label for='' style='margin-right: 5px'>{$cnt}.) {$q->question}  </label>
                        <input type='text' name='Q_{$q->q_id}' id='Q_{$q->q_id}' class='form-control' placeholder='9191234455' >
                    </div>
                </div>
                ";
        }elseif ($q->q_type=="date"){
            return "
                <div class='col-md-12 questions form-inline'>
                    <div class='form-group'>
                        <label for='' style='margin-right: 5px'>{$cnt}.) {$q->question}  </label>
                        <input type='date' name='Q_{$q->q_id}' id='Q_{$q->q_id}' class='form-control' >
                    </div>
                </div>
                ";
        }elseif ($q->q_type=="selects"){
            $ret= "
            <div class='col-md-12 questions form-inline'>
                    <label for=''>{$cnt}.) {$q->question}   </label>
                    <select class='form-control' name='Q_{$q->q_id}' id='Q_{$q->q_id}'>";
                     $reasons= $this->get_reasons($q->q_id);
                            foreach($reasons as $reason){
                                $ret.= "<option value='".$reason->sel_id."'>".$reason->answer."</option>";
                            }
             $ret.="           
                    </select>
                    <div id='q42' hidden>
                        <input type='text' name='Q_{$q->q_id}_2' id='Q_4_2' class='form-control' style='width: 265px' placeholder='Speficy Others'>
                    </div>
            </div>
                ";

            return $ret;
        }elseif ($q->q_type=="multiple selects"){
            return "
            <div class='col-md-12 questions form-inline'>
                <div class='form-group'>
                    <label for=''>{$cnt}.) {$q->question}</label>
                    <div class='col-md-12'>
                        <input type='text' name='Q_{$q->q_id}_province' id='Q_{$q->q_id}_province' class='form-control' placeholder='Province'> 
                        <input type='text' name='Q_{$q->q_id}_city' id='Q_{$q->q_id}_city' class='form-control' placeholder='City'> 
                        <input type='text' name='Q_{$q->q_id}_barangay' id='Q_{$q->q_id}_barangay' class='form-control' placeholder='Barangay'>
                    </div>
                </div>
            </div>
                ";
        }elseif ($q->q_type=="comment"){
            return "
            <div class='col-md-12 questions'>
                    <label for=''>{$cnt}.) {$q->question}</label><br>
                    <textarea class='form-control' name='Q_{$q->q_id}' id='Q_{$q->q_id}' cols='30' rows='6' placeholder='Palihug kog butang sa imung dugang impormasyon nga ipahatod.'></textarea>
            </div>
                ";
        }elseif ($q->q_type=="checkbox"){
            return "
            <div class='col-md-12 questions'>
            
                <label class=''>
                    {$cnt}.)
                    </label>
                    <input type='checkbox' class='control-input icheck'  name='Q_{$q->q_id}' id='Q_{$q->q_id}' > 
                    <label>
                    {$q->question}
                </label>
                
            </div>
                ";
        }elseif ($q->q_type=="mod_yes_no")
        {
            $html="
            <div class='col-md-12 questions'>     
                    <label for='' style='margin-right: 5px'>{$cnt}.) {$q->question}  </label>
                    <input type='radio' name='Q_{$q->q_id}' id='Yes' class='Q_{$q->q_id}' value='Yes'> Yes
                    <input type='radio' name='Q_{$q->q_id}' id='No' class='Q_{$q->q_id}' value='No'> No
            </div>

            <div class='col-mod-12' id='SPACE_{$q->q_id}'>
                <div class='row' id='family_div' hidden>
                    <div class='container'>
                    <button type='button' class='btn btn-primary btn-sm' id='btn_add_family' ><i class='fa fa-plus'></i></button>
                    <button type='button' class='btn btn-danger btn-sm' id='btn_minus_family'><i class='fa fa-minus'></i></button>
                    </div>
                    <div class='col-md-12'>
                        <div class='form-group hdnfamilymember row' style='margin-top:10px'>
                            <input type='text' name='fam_1_firstname' id='' class='form-control col-md-3' placeholder='Firstname' >
                            <input type='text' name='fam_1_lastname' id='' class='form-control col-md-2' placeholder='Lastname' >
                            <input type='text' name='fam_1_middlename' id='' class='form-control col-md-2' placeholder='Middlename' >
                            <input type='number' name='fam_1_age' id='' class='form-control col-md-1' placeholder='Age' style='width: 100px' >
                            <input type='text' name='fam_1_relationship' id='' class='form-control col-md-3' placeholder='Relationship' >
                        </div>
                    </div>
                </div>
            </div>";
            return $html;
        }

    }//end function
    
   
}