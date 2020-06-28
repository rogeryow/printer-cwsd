<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sc_printer extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sc_printer_model','person');
    }

    public function index() {
        $data['main_content'] = 'sc_printer/index';
        $data['page_name'] = 'Senior Citizen ID Printer';
        $data['template_type'] = 'admin';
        $this->load->view('includes/templates', $data);
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->id;
            $row[] = $person->sc_id;
            $row[] = $person->family_name;
            $row[] = $person->given_name;
            $row[] = $person->middle_initial;
            $row[] = $person->date_of_birth;
            $row[] = $person->gender;
            $row[] = $person->age;
            $row[] = $person->civil_status;
            $row[] = $person->purok;
            $row[] = $person->barangay;
            $row[] = $person->signature;
            $row[] = $person->picture;
            $row[] = $person->qr_code;
            $row[] = $person->printed;

            $checker = '';

            if(
                empty($person->sc_id) || 
                empty($person->family_name) ||
                empty($person->given_name) ||
                empty($person->middle_initial) ||
                empty($person->date_of_birth) ||
                empty($person->gender) ||
                empty($person->age) ||
                empty($person->civil_status) ||
                empty($person->purok) ||
                empty($person->barangay)
            ) {
                $checker .= '<span class="custom-badge badge badge-danger">Missing fields</span>';
            }

            if(empty($person->picture)) {
                $checker .= '<span class="custom-badge badge badge-danger">No picture</span>';
            }
            if(empty($person->signature)) {
                $checker .= '<span class="custom-badge badge badge-danger">No signature</span>';
            }
            if(empty($person->qr_code)) {
                $checker .= '<span class="custom-badge badge badge-danger">No QR code</span>';
            }

            if(empty($checker) && empty($person->printed)) {
                $checker .= '<span class="custom-badge badge badge-success">Ready to print</span>';
            }

            if(empty($checker) && isset($person->printed)) {
                $checker .= '<span class="custom-badge badge badge-info">Printed on ' . $person->printed . '</span>';   
            }

            $checker .= '<button type="button" class="btn-right btn btn-block btn-success"><i class="fa fa-arrow-right"></i></button>';
            $row[] = $checker;

            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->person->count_all(),
                "recordsFiltered" => $this->person->count_filtered(),
                "data" => $data,
        );

        echo json_encode($output);
    }

}
