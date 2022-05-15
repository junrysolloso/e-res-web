
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>categories/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="cat_name">Program Name</label>
                <small class="form-text text-muted">Please enter program name</small>
                <input type="hidden" name="category_id" value="<?php echo $category[0]->category_id; ?>">
                <input type="text" name="cat_name" value="<?php echo ucfirst( $category[0]->category_name ); ?>" class="form-control" id="cat_name" required />
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Update Program <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
