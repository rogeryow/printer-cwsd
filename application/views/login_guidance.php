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
    <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Guidance</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to Guidance Account</p>

        <form action="" id="guidanceLoginForm">
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8">
                Go <a href="<?=base_url()?>">Back</a> / <a href="<?=base_url('main/guidanceRegister')?>">Register</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

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
