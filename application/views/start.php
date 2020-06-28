<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=strtoupper(getenv('SITENAME'))." | ";echo (empty($page_name))?"":ucwords($page_name)?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="<?=s_url?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/adminlte.min.css" rel="stylesheet" type="text/css" />

        <?php echo $this->loader_model->css_loader($this->uri->segment(1));?>
       
    </head>
    <body class="">
    <div class="row">
    <!-- /.login-logo -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="text-center">
                <img src="<?=base_url("support/img/logo/digos.png")?>" width="80px;" alt="" class="img-responsive">
                PICK UP STRANDED DIGOSEÑOS HELPLINE
                <img src="<?=base_url("support/img/logo/SDHLOGO.png")?>" width="80px;" alt="" class="img-responsive"></h2>
                <p class="text-center">
                    Kani nga survey gipahigayon sa syudad para maka kuha ug datus/impormasyon aron sa pag plano og unsay saktong aksyon na himoon sa City Government of Digos para makatabang sa mga na-stranded na Digoseño.
                </p>
                <br>
                <a href="<?=base_url("main/stranded")?>" class="btn btn-primary btn-block btn-lg">
                    Stranded <i class="fa fa-desktop"></i>
                </a>
                <a href="<?=base_url("main/pickup")?>" class="btn btn-danger btn-block btn-lg">
                    Pickup Stranded <i class="fa fa-user"></i>
                </a>
            
            </div>
            <center>
                <img src="<?=base_url("support/img/logo/ict.jpg");?>" width="100px;" alt="" class="img-responsive">
                <img src="<?=base_url("support/img/logo/cdrrmc.png");?>" width="100px;" alt="" class="img-responsive">
                <img src="<?=base_url("support/img/logo/smart.png");?>" width="100px;" alt="" class="img-responsive">
                <img src="<?=base_url("support/img/logo/CIO.jpg");?>" width="100px;" alt="" class="img-responsive">
            </center>
        </div>
        </div>

    </div>
    <!-- /.login-box -->
</body>
    <footer style="display: none">Copyright &copy <?=date('Y')?> <?=getenv('SITENAME')?> by <a href="#">Nexus</a><?php echo  (ENVIRONMENT === 'development') ?  'Framework Version <strong>' . CI_VERSION .' Build:001 </strong>' : '' ?></footer>
    <script src="<?=s_url?>plugins/jquery/jquery.min.js"></script>

    <?php $this->loader_model->js_pluginLoader($this->uri->segment(1))?>
    
    <script src="<?=s_url?>plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="<?=s_url?>js/adminlte.min.js" type="text/javascript"></script>

    <?php
        $data['template_type']=$template_type;
        $data['category']=$this->uri->segment(1);
        $this->loader_model->js_loader($data['category'])
    ?>

</html>