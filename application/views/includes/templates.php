<?php

if($template_type=="developer") 
{
    $this->load->view('includes/header');

    $this->load->view('includes/developer/nav');
    $this->load->view('includes/developer/sidebar');
    
    $this->load->view('includes/main');
    $this->load->view('includes/footer');
}

if($template_type=="admin") 
{
    $this->load->view('includes/header');

    $this->load->view('includes/admin/nav');
    $this->load->view('includes/admin/sidebar');
    
    $this->load->view('includes/main');
    $this->load->view('includes/footer');
}


elseif($template_type=="start")
{
    $this->load->view('start');
}
elseif($template_type=="form")
{
    $this->load->view('form');
}
elseif($template_type=="pickup")
{
    $this->load->view('pickup');
}
elseif($template_type=="developer_login")
{
    $this->load->view('login_developer');
}
elseif($template_type=="admin_login")
{
    $this->load->view('login_admin');
}
elseif($template_type=="teacher_login")
{
    $this->load->view('login_teacher');
}
elseif($template_type=="guidance_login")
{
    $this->load->view('login_guidance');
}

elseif($template_type=="admin_register")
{
    $this->load->view('register_admin');
}

elseif($template_type=="teacher_register")
{
    $this->load->view('register_teacher');
}
elseif($template_type=="guidance_register")
{
    $this->load->view('register_guidance');
}
