<div class="card shadow-sm pb-2">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table class="table ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Title</th>
            <th><i class="mdi mdi-file-tree icon-sm align-self-center text-primary mr-3"></i>Department</th>
            <th><i class="mdi mdi-teach icon-sm align-self-center text-primary mr-3"></i>Adviser</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ( $studies as $row ):?>
            <tr>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0">
                      <a href="<?php echo base_url() .'lists/abstract?id='. $row->study_id; ?>" style="text-decoration: none;">
                        <?php echo ucwords( $row->study_title ); ?>
                      </a> 
                    </p>
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
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
