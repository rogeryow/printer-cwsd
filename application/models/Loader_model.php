<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loader_model extends CI_Model{

    public function css_loader($uri_string)
    {
        echo '<link href="'.s_url.'mycss/datatable.css" rel="stylesheet" type="text/css" />';
        
        echo '<link href="'.s_url.'/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />';
        // echo '<link href="' . s_url . 'libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />';
        
        $dt_tables=array(
        "developer","admin","clients","called_client");

        if (in_array($uri_string,$dt_tables)) 
        {
            echo '<link href="' . s_url . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="' . s_url . 'plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />';
            // echo '<link href="' . s_url . 'plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />';

            //DATA TABLES SCRIPT
            // echo '<link href="' . s_url . 'plugins/datatables/buttons/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />';
            // echo '<link href="' . s_url . 'plugins/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="' . s_url . 'plugins/datatables-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />';
        }
    } 

    public function js_pluginLoader($uri_string)
    {
        // echo '<script src="' . s_url . 'libs/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>';
        $chart = array(
            'section_performance'
        );
        if(in_array($uri_string,$chart)){
            echo '<script src="'.s_url.'plugins/flot/jquery.flot.js"></script>
            <script src="'.s_url.'plugins/flot-old/jquery.flot.resize.min.js"></script>
            <script src="'.s_url.'plugins/flot-old/jquery.flot.pie.min.js"></script>';
        }
        $dt_tables=array(
        "developer","admin","clients","called_client");
        
        if (in_array($uri_string,$dt_tables)) 
        {
            echo '<script src="' . s_url . 'plugins/moment/moment.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'plugins/daterangepicker/daterangepicker.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'plugins/summernote/summernote-bs4.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js" type="text/javascript" defer></script>';

            //DATA TABLES SCRIPT
            echo '<script src="' . s_url . 'plugins/datatables/jquery.dataTables.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'plugins/datatables-bs4/js/dataTables.bootstrap4.js" type="text/javascript" defer></script>';
            // echo '<script src="' . s_url . 'plugins/datatables/buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>';
            // echo '<script src="' . s_url . 'plugins/datatables/buttons/js/buttons.bootstrap4.min.js" type="text/javascript"></script>';
            // echo '<script src="' . s_url . 'plugins/datatables/buttons/js/buttons.colVis.min.js" type="text/javascript"></script>';

            // echo '<script src="' . s_url . 'js/demo.js" type="text/javascript"></script>';
        }

    }
    public function js_loader($uri_string)
    {
        echo '<script src="'.s_url.'/plugins/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>';

        
        if(uri_string() =='' || uri_string() == 'sdh/stranded')
        {
            echo '<script src="'.s_url.'myjs/module/sdh/sdh.js" type="module" defer></script>';
        }

        if(uri_string() =='' || uri_string() == 'main/pickup' || uri_string() == 'main/stranded')
        {
            echo '<script src="'.s_url.'myjs/module/sdh/sdh.js" type="module" defer></script>';
        }

        if(uri_string() == 'admin'){
            echo '<script src="'.s_url.'myjs/module/main.js" type="module" defer></script>';
        }

        if(uri_string() == 'admin/profile'){
            echo '<script src="'.s_url.'myjs/module/developer/developer.js" type="module" defer></script>';
        }

        if(uri_string() == 'developer'){
            echo '<script src="'.s_url.'myjs/module/developer/developer.js" type="module" defer></script>';
        }

        if(uri_string() == "clients"){
            echo '<script src="'.s_url.'myjs/module/clients/clients.js" type="module" defer></script>';
        }
        if(uri_string() == "called_client"){
            echo '<script src="'.s_url.'myjs/module/called_client/called_client.js" type="module" defer></script>';
        }
    }

    public function loadMdl($models) 
    {
        foreach($models as $mdlk=>$mdlv)
        {
            $this->load->model($mdlk,$mdlv);
        }
    }

    
}
