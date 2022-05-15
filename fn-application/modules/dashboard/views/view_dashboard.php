<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-book-search text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Thesis Studies</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php $studies_count ? print( $studies_count ) : print( 0 ); ?><small>counts</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <a href="<?php echo base_url(); ?>studies" style="text-decoration: none;"><i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>View Details</a>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="menu-icon mdi mdi-teach text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Faculties</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php $advisers_count ? print( $advisers_count ) : print( 0 );?><small>counts</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <a href="<?php echo base_url(); ?>advisers" style="text-decoration: none;"><i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>View Details</a>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-file-tree text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Programs</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php $categories_count ? print( $categories_count ) : print( 0 ); ?><small>counts</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <a href="<?php echo base_url(); ?>categories" style="text-decoration: none;"><i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>View Details</a>
        </p>
      </div>
    </div>
  </div>
</div>
