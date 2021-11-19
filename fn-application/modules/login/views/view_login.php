<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper auth p-0 theme-two">
      <div class="row">
        <div class="col-12 col-md-12 h-100 bg-login">
          <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
            <div class="card shadow" style="border-radius: 20px;">
              <div class="card-body text-center">

                <form action="" method="post">
                  <h3 class="mr-auto mt-2">Let's get started</h3>
                  <p class="mb-5 mr-auto">Please enter your details below to login</p>

                  <?php if ( validation_errors() ): ?>
                  <div class="alert alert-fill-danger" role="alert">
                    <i class="mdi mdi-alert-circle-outline"></i>
                    All fields is required.
                  </div>
                  <?php endif; ?>

                  <?php if( $this->session->tempdata( 'alert' ) ): ?>
                  <div class="alert alert-fill-<?php echo $this->session->tempdata( 'class' ); ?>" role="alert">
                    <i class="mdi mdi-alert-circle-outline"></i>
                    <?php echo $this->session->tempdata( 'alert' ); ?>
                  </div>
                  <?php endif; ?>

                  <div class="form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="user_pass" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">SIGN IN</button>
                  </div>
                  <div class="wrapper mt-5 text-gray" style="text-align: center !important;">
                    <p class="footer-text"><?php credits( 'co' ); ?></p>
                    <p><?php credits( 'cr' ); ?></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>