<div class="container-fluid">
<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Manage Clients
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

<div class="container-fluid">
    <div id="clientContent">

      <div id="gen_info">
        <h4 id="name">Name : Armando Gabriel Nieve</h4>
        <h6 id="birthdate">Date of Birth: 1997-05-13</h6>
        <h6 id="gender">Gender: Male</h6>
        <h6 id="contact">Contact #: 09777593138</h6>
        <h6 id="address">Address: Lim Del Rosario Sts., Digos City</h6>
      </div>
      <hr>
      <button class="btn btn-primary" id="btnMoreInfo">Click to view answered questions</button>
      <button class="btn btn-primary" id="btnAnalyze">Click to put remarks</button>

      <div id="questions" hidden>
      </div>

      <div id="analyze" hidden>
        <form action="" id="analyzeForm">
          <div class="form-group">
            <label for="remark">Remarks: </label>
            <textarea name="remark" id="remark" cols="30" rows="5" class="form-control" placeholder="Put your remarks"></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Save</button>
        </form>
      </div>
    </div>
    
</div>