<aside class="main-sidebar sidebar-primary elevation-4">


    <div class="sidebar">
        <div class="bg-dark row">
            <div class="col-md-12">
            <center>
                <h1 class="text-center text-white">XPAT</h1>
            </center>
            </div>
        </div>
        <img src="<?=base_url('support/img/logo/ict.jpg')?>" class="img-fluid">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
            <!-- <li class="nav-item has-treeview menu-open">

                <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                    </a>
                </li>

                </ul>

            </li> -->

            <?php
                    // $data=array('userTyp'=>$this->main_model->getUserTyp());
                    // $list =  $this->main_model->getUserTyp($this->session->user_id);
                    // foreach ($list as $key) {
                    //   $data=array('userTyp'=>$key->name);
                    // }
                    $this->load->view('includes/developer/navigation',array('userTyp' => 'admin'));
                    echo date('m/d/Y H:i:s')."<br>";
                    echo "DATABASE: ".$this->db->database;
                    ?>
            
            </ul>

        </nav>
        
    </div>

  </aside>