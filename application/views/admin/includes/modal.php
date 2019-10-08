<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo site_url('user/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <br>
      <div class="modal-body">
        Profile.
        <div class="icon-field">
          <input type="text" id="UserID" value = "<?php echo $this->session->userdata('UserID'); ?>" style="width:300px;" class="green-field form-control" name="UserID" placeholder="UserID" required maxlength="40" disabled/>
        </div>
        <br>
        <div class="icon-field">
          <input type="password" id="password" style="width:300px;" class="green-field form-control" name="password" placeholder="Password" required maxlength="40" autofocus />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="updateProfile" class="btn btn-primary" href="#">Save</a>
      </div>
    </div>
  </div>
</div>
<!-- Company -->
<div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit company name</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <br>
      <div class="modal-body">
        CompanyName.
          <input type="text" id="cid" style="visibility: hidden;width:300px;" class="green-field form-control" name="cid" placeholder="UserID" required maxlength="40" disabled/>
        <div class="icon-field">
          <input type="text" id="cname" style="width:300px;" class="green-field form-control" name="cname" placeholder="CompanyName" required maxlength="100" autofocus />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="updateCName" class="btn btn-primary" href="#">Save</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add company name</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <br>
      <div class="modal-body">
        CompanyName.
        <div class="icon-field">
          <input type="text" id="acname" style="width:300px;" class="green-field form-control" name="cname" placeholder="CompanyName" required maxlength="100" autofocus />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="addCName" class="btn btn-primary" href="#">Add</a>
      </div>
    </div>
  </div>
</div>
<!-- User -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <br>
      <div class="modal-body">
          <input type="text" id="aid" style="visibility: hidden;width:300px;" class="green-field form-control" name="aid" placeholder="" required maxlength="40" disabled/>
        <div class="icon-field">
          <input type="text" id="eUID" class="green-field form-control" name="eUID" placeholder="UserID" required maxlength="40" autofocus />
        </div>
        <br>
        <br>
        <div class="icon-field">
          <input type="text" id="eEmail" class="green-field form-control" name="eEmail" placeholder="Email" required maxlength="40" autofocus />
        </div>
        <br>
        <div class="icon-field">
          <select id="ecompanyName" class="green-field form-control">
            <?php for($i = 0; $i < count($companies); $i++) {?>
              <tr>
                <option value="<?php echo $companies[$i]->companyName?>"><?php echo $companies[$i]->companyName?></option>
              </tr>
            <?php } ?>
          </select>
          <!-- <input type="text" id="aCompany" class="green-field form-control" name="aCompany" placeholder="Company" required maxlength="40" autofocus /> -->
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="updateUser" class="btn btn-primary" href="#">Save</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <br>
      <div class="modal-body">
        <div class="icon-field">
          <input type="text" id="aUID" class="green-field form-control" name="aUID" placeholder="UserID" required maxlength="40" autofocus />
        </div>
        <br>
        <div class="icon-field">
          <input type="password" id="aPassword" class="green-field form-control" name="aPassword" placeholder="Password" required maxlength="40" autofocus />
        </div>
        <br>
        <div class="icon-field">
          <input type="text" id="aEmail" class="green-field form-control" name="aEmail" placeholder="Email" required maxlength="40" autofocus />
        </div>
        <br>
        <div class="icon-field">
          <select id="companyName" class="green-field form-control">
            <?php for($i = 0; $i < count($companies); $i++) {?>
              <tr>
                <option value="<?php echo $companies[$i]->companyName?>"><?php echo $companies[$i]->companyName?></option>
              </tr>
            <?php } ?>
          </select>
          <!-- <input type="text" id="aCompany" class="green-field form-control" name="aCompany" placeholder="Company" required maxlength="40" autofocus /> -->
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="addUserB" class="btn btn-primary" href="#">Add</a>
      </div>
    </div>
  </div>
</div>