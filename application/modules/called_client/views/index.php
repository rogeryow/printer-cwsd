<div class="container-fluid">
<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Clients Called
            </h3>
            <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
                </div>
          </div>
          <div class="card-body">
            <div class="table-responsive" id="clientsT"></div>            
          </div>
          <!-- /.card -->
        </div>
</div>

<form action="" id="actionForm">
      <div class="form-group">
        <label for="">Select Action</label>
        <select name="service" id="service" class="form-control">
          <?php foreach($services as $service): ?>
              <option value="<?=$service->id?>"><?=$service->service?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button class="btn btn-primary btn-block">Save</button>
    </form>
