
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>advisers/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="adviser_name">Faculty Full Name</label>
                <small class="form-text text-muted">Please enter faculty full name</small>
                <input type="text" name="adviser_name" class="form-control" id="adviser_name" required />
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_name">Username</label>
                <small class="form-text text-muted">User unique username, contain letters and numbers, and must not contain spaces, special characters, or emoji</small>
                <input type="text" name="user_name" class="form-control" id="user_name" minlength="4" required />
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_pass">Password</label>
                <small class="form-text text-muted">User password must be 6-8 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji</small>
                <input type="password" name="user_pass" minlength="6" class="form-control" id="user_pass" required />
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Submit Faculty <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
