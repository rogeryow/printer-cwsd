
<footer style="display: none">Copyright &copy <?=date('Y')?> <?=getenv('SITENAME')?> by <a href="#">Nexus</a><?php echo  (ENVIRONMENT === 'development') ?  'Framework Version <strong>' . CI_VERSION .' Build:001 </strong>' : '' ?></footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<script src="<?=s_url?>plugins/jquery/jquery.min.js"></script>
<script src="<?=s_url?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?=s_url?>plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<?php $this->loader_model->js_pluginLoader($this->uri->segment(1))?>

<script src="<?=s_url?>js/adminlte.min.js" type="text/javascript"></script>

<?php
    $data['template_type']=$template_type;
    $data['category']=$this->uri->segment(1);
    $this->loader_model->js_loader($data['category'])
?>
</body>
</html>
