<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
        
        <title>STRANDED DIGOSEÑOS HELPLINE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="<?=s_url?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?=s_url?>css/adminlte.min.css" rel="stylesheet" type="text/css" />

        <?php echo $this->loader_model->css_loader($this->uri->segment(1));?>
       <style>
           .questions{
               margin-bottom: 10px;
           }
           .hdnfamilymember input{
               margin-left: 5px;
           }
       </style>
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
                <form action="" id="pickupForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="plate">PLATE #</label>
                                <input type="text" name="plate_no" id="plate_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vehicle_id">Vehicle Type</label>
                                <select name="vehicle_id" id="vehicle_id" class="form-control">
                                    <option value="0" selected disabled>Select Vehicle</option>
                                    <?php
                                        foreach($vehicles as $vehicle){
                                            echo "<option value='".$vehicle->id."'>".$vehicle->vehicle." - ".$vehicle->no_passenger." Person/s Allowed</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>

                        <div class="col-md-12">
                            <label for=""><u>DRIVER</u></label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Firstname </label>
                                <input type="text" name="firstname" id="firstname" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lastname </label>
                                <input type="text" name="lastname" id="lastname" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middlename (Optional) </label>
                                <input type="text" name="middlename" id="middlename" class="form-control">
                            </div>
                        </div>

                        <div class="container row" id="passengers">
                            
                        </div> <!-- end row -->
                        <div class="col-md-12">
                            <!-- <input type="checkbox" name="" id="validation_to_check"> I hereby certify that all the information given are true and correct. -->
                        </div>
                        <br><br>
                        <div class="col-md-12 " style="padadding-top:10px">
                            <button class="btn btn-primary" type="submit" id="btnSubmitForm" >SUBMIT <i class="fa fa-save"></i></button>
                        </div>
                </form>
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
