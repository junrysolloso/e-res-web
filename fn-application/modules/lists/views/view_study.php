<div class="container-scroller auth theme-one pr-lg-5 pl-lg-5 pt-5 pb-5" style="background: #FAFBFC;">
  <div class="auto-form-wrapper">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="text-center d-flex flex-column align-items-center mb-5">
            <img class="lazy rounded-circle" width="100" height="100" src="<?php echo base_url(); ?>fn-uploads/placeholder.jpg" data-src="<?php echo base_url(); ?>fn-uploads/djemfcst-logo.png" alt="Don Jose Memorial Fundation College of Science and Technology" >
            <h1><strong>ERES WEB</strong></h1>
            <p>ERES Web Based Platform For Electronic Research Archives Of DJEMFCST</p>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card shadow-sm" style="border-radius: 6px;">
                <div class="card-body p-3">
                  <h2><?php echo ucwords( $study[0]->study_title ); ?></h2>
                  <h4><?php echo $study[0]->study_year; ?></h4>
                  <h4 class="mb-4 pb-4 border-bottom">
                    <?php 
                      $proponents = explode(',', $study[0]->study_proponents );
                      foreach ( $proponents as $val ) {
                        echo '<span class="badge badge-info mr-1">'. ucwords( $val ) .'</span>';
                      }
                    ?>
                  </h4>
                  <?php echo html_entity_decode( $study[0]->study_abstract ); ?>
                  <h4 class="border-top mt-4 pt-4">
                    <?php if ( $this->session->userdata( 'user_id' ) ): ?>
                      <a href="<?php echo base_url() .'fn-uploads/lists/'. $study[0]->study_link; ?>" class="btn btn-info text-center text-sm-left d-sm-inline-block"><i class="mdi mdi-download"></i> Download Study</a>
                    <?php else: ?>
                      <a href="<?php echo base_url(); ?>login" class="btn btn-info text-center text-sm-left d-sm-inline-block"><i class="mdi mdi-download"></i> Login to Download</a>
                    <?php endif; ?>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary text-center float-sm-right text-sm-right d-sm-inline-block"><i class="mdi mdi-arrow-left"></i> Back</a>
                  </h4>
                </div>
              </div>
            </div>
          </div>

        </div>
        <footer class="footer mt-5">
          <div class="container-fluid clearfix">
            <span class="text-muted text-center d-flex align-items-center flex-column"><?php credits( 'co' ); ?>. <?php credits( 'cr' ); ?></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
</div>
