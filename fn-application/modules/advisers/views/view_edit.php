
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>advisers/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="adviser_name">Adviser Full Name</label>
                <small class="form-text text-muted">Please enter adviser full name</small>
                <div class="input-group">
                  <input type="hidden" name="adviser_id" value="<?php echo $adviser[0]->adviser_id; ?>">
                  <input type="text" name="adviser_name" value="<?php echo ucwords( $adviser[0]->adviser_name ); ?>" class="form-control" id="adviser_name" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Update Adviser <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
