<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=strtoupper(getenv('SITENAME'))." | ";echo (empty($page_name))?"":ucwords($page_name)?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="<?=s_url?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/adminlte.min.css" rel="stylesheet" type="text/css" />

        <?php echo $this->loader_model->css_loader($this->uri->segment(1));?>
       
    </head>
    <body class="hold-transition sidebar-mini layout-fixed" id="overall-wrapper">
    <div id="wrapper" style="background-color: #e8e8e8">


    