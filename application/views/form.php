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
                STRANDED DIGOSEÑOS HELPLINE
                <img src="<?=base_url("support/img/logo/SDHLOGO.png")?>" width="80px;" alt="" class="img-responsive"></h2>
                <p class="text-center">
                    Kani nga survey gipahigayon sa syudad para maka kuha ug datus/impormasyon aron sa pag plano og unsay saktong aksyon na himoon sa City Government of Digos para makatabang sa mga na-stranded na Digoseño.
                </p>
                <br>
                <form action="" id="strandedForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Firstname </label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname " >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lastname </label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname " >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middlename (Optional) </label>
                                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middlename ">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Gender </label>
                                <select name="gender" id=""class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Birthdate </label>
                                <input class="form-control" type="date" name="DOB" id="DOB" placeholder="Birthdate " >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contact # (+63) </label>
                                <input class="form-control" type="text" name="contact" id="contact" placeholder="9123456789" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="">Barangay </label>
                            <select name="barangay" id="barangay" class="form-control">
                                <?php
                                    foreach($barangays as $brgy){
                                        echo "<option value='".$brgy->brgy_id."'>".$brgy->brgy_name."</option>";
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">Purok </label>
                            <input type="text" name="purok_sitio" id="purok_sitio" class="form-control" placeholder="Purok " >
                        </div>
                        <!-- dynamic part xD -->
                        
                        

                        <div class="col-md-12">
                            <h4>Primary Questions </h4>
                            <!-- <div class="form-group form-inline">
                                <label for="">1. Residente ka ba sa Digos? </label>
                                <select name="" id="" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div> -->
                        </div>
                        <?php echo $vw_questions;?>

                        <div class="col-md-12">
                            <input type="checkbox" name="" id="validation_to_check"> I hereby certify that all the information given are true and correct.
                        </div>
    <br><br>
                        <div class="col-md-12 " style="padadding-top:10px">
                            <button class="btn btn-primary" type="submit" id="btnSubmitForm"  disabled>SUBMIT <i class="fa fa-save"></i></button>
                        </div>
                    </div> <!-- end row -->
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
