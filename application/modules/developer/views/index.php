<div class="container-fluid">
<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Manage Accounts
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-group-tab" data-toggle="pill" href="#vert-tabs-group" role="tab" aria-controls="vert-tabs-group" aria-selected="true">Group</a>
                  <a class="nav-link" id="vert-tabs-users-tab" data-toggle="pill" href="#vert-tabs-users" role="tab" aria-controls="vert-tabs-users" aria-selected="false">Users</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">

                <div class="tab-content" id="vert-tabs-tabContent">

                  <div class="tab-pane text-left fade show active" id="vert-tabs-group" role="tabpanel" aria-labelledby="vert-tabs-group-tab">
                     <h4>
                         Groups <i class="fa fa-users"></i>
                        <button class="btn btn-success btn-sm float-right" id=""><i class="fa fa-recycle"></i></button>
                        <button class="btn btn-primary btn-sm float-right" id="addGroup" style="margin-right: 5px;"><i class="fa fa-users"></i></button> 
                    </h4>
                    
                     <hr>
                     <div class="table-responsive" id="groupT"></div>
                  </div>
                  
                  <div class="tab-pane fade" id="vert-tabs-users" role="tabpanel" aria-labelledby="vert-tabs-users-tab">
                     <h4>
                         Users <i class="fa fa-users"></i>
                         <button class="btn btn-success btn-sm float-right"><i class="fa fa-recycle"></i></button>
                        <button class="btn btn-primary btn-sm float-right" style="margin-right: 5px;" id="addUsers"><i class="fa fa-user-plus"></i></button> 
                    </h4><hr>
                    <div class="table-responsive" id="usersT"></div>
                  </div>

                </div>

              </div>
            </div>
            
          </div>
          <!-- /.card -->
        </div>
</div>

<div class="container-fluid">
    <form action="" id="groupForm">
        <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="float-right">
        <button class="btn btn-primary">Save</button>
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

    </form>
    <form action="" id="usersForm">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">Firstname</span>
            </div>
            <input type="text" name="firstname" id="firstname" class="form-control">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">Lastname</span>
            </div>
            <input type="text" name="lastname" id="lastname" class="form-control">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-user"></i> Username</span>
            </div>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-key"></i> Password</span>
            </div>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">Confirm Password</span>
            </div>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-email"></i> Email</span>
            </div>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-email"></i> Group</span>
            </div>
            <select name="group_id" id="group_id" class="form-control">
              <?php
                foreach($groups as $group):
              ?>
                <option value="<?=$group->id?>"><?=$group->name?></option>
              <?php endforeach; ?>
            </select>
        </div>

        <div class="float-right">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>