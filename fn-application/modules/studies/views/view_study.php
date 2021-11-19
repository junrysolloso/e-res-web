<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card mb-4 shadow-sm" style="border-radius: 6px;">
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
          <a href="<?php echo base_url() .'fn-uploads/studies/'. $study[0]->study_link; ?>" class="btn btn-info text-center text-sm-left d-sm-inline-block"><i class="mdi mdi-download"></i> Download Study</a>
          <a href="<?php echo base_url(); ?>studies" class="btn btn-primary text-center float-sm-right text-sm-right d-sm-inline-block"><i class="mdi mdi-arrow-left"></i> Back</a>
        </h4>
      </div>
    </div>
  </div>
</div>
