<style>.table tr td {padding: 13px 15px;}</style>
<div class="container-scroller auth theme-one pr-lg-5 pl-lg-5 pt-5 pb-5" style="background: #FAFBFC;">
  <div class="auto-form-wrapper">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="text-center d-flex flex-column align-items-center mb-5">
            <img class="lazy rounded-circle" width="100" height="100" src="<?php echo base_url(); ?>fn-uploads/placeholder.jpg" data-src="<?php echo base_url(); ?>fn-uploads/djemfcst-logo.png" alt="Don Jose Memorial Fundation College of Science and Technology" >
            <h1><strong>E-RES WEB</strong></h1>
            <p>E-RES WEB based platform for electronic research archives of DJEMFCST</p>
            <div class="form-group col-lg-6 col-md-9 col-sm-12 m-0 p-0">
              <div class="input-group">
                <input type="text" name="search-field" onmouseover="this.focus();" id="search-field" class="form-control" placeholder="Type to search">
                <div class="input-group-append">
                  <span class="input-group-text" style="cursor: pointer; ">
                    <i class="mdi mdi-magnify-plus mdi-18px mdi-close-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow-sm pb-2" style="border-radius: 12px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4" style="border-radius: 6px;">
                    <div class="card-body p-3">
                      <form action="" method="get">
                        <div class="row">
                          <div class="col-md-3 pb-4 align-items-center my-auto">
                            <div class="media">
                              <div class="media-body">
                                <div class="form-group m-0">
                                  <label for="year">Year</label>
                                  <small class="form-text text-muted">Please select year to filter</small>
                                  <div class="input-group">
                                    <select name="year" id="year" class="form-control select2">
                                      <option value="">Select Year</option>
                                      <?php $base_year = intval( date( 'Y' ) ); for ( $i = 0; $i < 20; $i++ ): ?>
                                        <?php $year = ( $base_year - ( $i + 1 ) ) .' - '. ( $base_year - $i ); ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                      <?php endfor; ?>
                                    </select>
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 pb-4 my-auto">
                            <div class="media">
                              <div class="media-body">
                                <div class="form-group m-0">
                                  <label for="category">Department</label>
                                  <small class="form-text text-muted">Please select department to filter</small>
                                  <div class="input-group">
                                    <select name="category" id="category" class="form-control select2">
                                      <option value="">Select Department</option>
                                      <?php foreach( $categories as $value ): ?>
                                        <option value="<?php echo $value->category_id; ?>"><?php echo ucwords( $value->category_name ); ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 pb-4 my-auto">
                            <div class="media">
                              <div class="media-body">
                                <div class="form-group m-0">
                                  <label for="adviser">Adviser</label>
                                  <small class="form-text text-muted">Please adviser to filter</small>
                                  <div class="input-group">
                                    <select name="adviser" id="adviser" class="form-control select2">
                                      <option value="">Select Adviser</option>
                                      <?php foreach( $advisers as $value ): ?>
                                        <option value="<?php echo $value->adviser_id; ?>"><?php echo ucwords( $value->adviser_name ); ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 pb-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-info btn-block mr-1" style="margin-top: 42px;">Filter</button>
                            <a href="<?php echo base_url(); ?>lists" class="btn btn-primary btn-block ml-1" style="margin-top: 42px;">All</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table class="table ctm-table bg-white data-table">
                      <thead>
                        <tr>
                          <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Title</th>
                          <th><i class="mdi mdi-calendar-check icon-sm align-self-center text-primary mr-3"></i>Year</th>
                          <th><i class="mdi mdi-file-tree icon-sm align-self-center text-primary mr-3"></i>Category</th>
                          <th><i class="mdi mdi-teach icon-sm align-self-center text-primary mr-3"></i>Adviser</th>
                          <th><i class="mdi mdi-account-group-outline icon-sm align-self-center text-primary mr-3"></i>Proponents</th>
                          <th><i class="mdi mdi-text icon-sm align-self-center text-primary mr-3"></i>Abstract</th>
                          <th><i class="mdi mdi-download icon-sm align-self-center text-primary mr-3"></i>Download</th>
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
                            <td>
                              <div class="media">
                                <i class="mdi mdi-text icon-sm align-self-center text-primary mr-3"></i>
                                <div class="media-body my-auto">
                                  <p class="mb-0"><a href="<?php echo base_url() .'lists/abstract?id='. $row->study_id; ?>" style="text-decoration: none;">View Abstract</a></p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="media">
                                <i class="mdi mdi-download icon-sm align-self-center text-primary mr-3"></i>
                                <div class="media-body my-auto">
                                  <p class="mb-0">
                                    <?php if ( $this->session->userdata( 'user_id' ) ): ?>
                                      <a href="<?php echo base_url() .'fn-uploads/lists/'. $row->study_link; ?>" style="text-decoration: none;">Download Study</a>
                                    <?php else: ?>
                                      <a href="<?php echo base_url(); ?>login" style="text-decoration: none;">Login to Download</a>
                                    <?php endif;?>
                                  </p>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
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
