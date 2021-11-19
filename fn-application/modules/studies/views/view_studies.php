<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card mb-4 shadow-sm" style="border-radius: 6px;">
      <div class="card-body p-3">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-3 my-auto">
              <div class="form-group m-0">
                <label for="category">Department</label>
                <small class="form-text text-muted">Please select year to filter</small>
                <div class="row">
                  <div class="col-6">
                    <select name="from" id="year-from" class="form-control select2">
                      <option value="">From</option>
                      <?php $base_year = intval( date( 'Y' ) ); for ( $i = 0; $i < 20; $i++ ): ?>
                        <?php $year = ( $base_year - ( $i + 1 ) ); ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="to" id="year-to" class="form-control select2">
                      <option value="">To</option>
                      <?php $base_year = intval( date( 'Y' ) ); for ( $i = 0; $i < 20; $i++ ): ?>
                        <?php $year = ( $base_year - ( $i + 1 ) ); ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
              </div> 
            </div>
            <div class="col-md-3 my-auto">
              <div class="form-group m-0">
                <label for="category">Department</label>
                <small class="form-text text-muted">Please select department to filter</small>
                <select name="category" id="category" class="form-control select2">
                  <option value="">Select Department</option>
                  <?php foreach( $categories as $value ): ?>
                    <option value="<?php echo $value->category_id; ?>"><?php echo ucwords( $value->category_name ); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3 my-auto">
              <div class="form-group m-0">
                <label for="adviser">Adviser</label>
                <small class="form-text text-muted">Please adviser to filter</small>
                <select name="adviser" id="adviser" class="form-control select2">
                  <option value="">Select Adviser</option>
                  <?php foreach( $advisers as $value ): ?>
                    <option value="<?php echo $value->adviser_id; ?>"><?php echo ucwords( $value->adviser_name ); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3 d-flex align-items-center">
              <button type="submit" class="btn btn-info btn-block mr-1" style="margin-top: 42px;">Filter</button>
              <a href="<?php echo base_url(); ?>studies" class="btn btn-primary btn-block ml-1" style="margin-top: 42px;">All</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table shadow-sm ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Title</th>
            <th><i class="mdi mdi-calendar-check icon-sm align-self-center text-primary mr-3"></i>Year</th>
            <th><i class="mdi mdi-file-tree icon-sm align-self-center text-primary mr-3"></i>Department</th>
            <th><i class="mdi mdi-teach icon-sm align-self-center text-primary mr-3"></i>Adviser</th>
            <th><i class="mdi mdi-account-group-outline icon-sm align-self-center text-primary mr-3"></i>Proponents</th>
            <th class="text-right"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ( $studies as $row ):?>
            <tr>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo ucwords( $row->study_title ); ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div class="media">
                  <i class="mdi mdi-calendar-check icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo $row->study_year; ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div class="media">
                  <i class="mdi mdi-file-tree icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo ucwords( $row->category_name ); ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div class="media">
                  <i class="mdi mdi-teach icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo ucwords( $row->adviser_name ); ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div class="media">
                  <i class="mdi mdi-account-group-outline icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0">
                      <?php 
                        $proponents = explode(',', $row->study_proponents );
                        foreach ( $proponents as $val ) {
                          echo '<span class="badge badge-info mr-1">'. ucwords( $val ) .'</span>';
                        }
                      ?></p>
                  </div>
                </div>
              </td>
              <td class="text-right">
              <a href="<?php echo base_url(); ?>studies/abstract/?id=<?php echo $row->study_id; ?>" class="btn text-primary" style="display: inline-block;"><i class="mdi mdi-eye icon-sm"></i> View</a>

                <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
                  <a href="<?php echo base_url(); ?>studies/edit/?id=<?php echo $row->study_id; ?>" class="btn text-info"><i class="mdi mdi-grease-pencil "></i></a>
                  <form action="<?php echo base_url(); ?>studies/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->study_id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
