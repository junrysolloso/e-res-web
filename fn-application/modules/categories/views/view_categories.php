<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table shadow-sm ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Count</th>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Program Name</th>
            <th class="text-right">
              <a href="<?php echo base_url(); ?>categories/add" class="btn btn-primary" style="text-transform: capitalize;"><i class="mdi mdi-plus"></i> New Program</a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach( $categories as $row ): ?>
            <tr>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo $i; ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0">
                      <a href="<?php echo base_url(); ?>categories/list/?id=<?php echo $row->category_id; ?>" style="text-decoration: none;">
                        <?php echo strtoupper( $row->category_name ); ?>
                      </a>
                    </p>
                  </div>
                </div>
              </td>
              <td class="text-right">
                <a href="<?php echo base_url(); ?>categories/edit/?id=<?php echo $row->category_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
                <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
                  <!-- <form action="<?php echo base_url(); ?>categories/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->category_id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form> -->
                <?php endif; ?>
              </td>
            </tr>
          <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
