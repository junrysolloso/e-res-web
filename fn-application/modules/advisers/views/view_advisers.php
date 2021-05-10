<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table shadow-sm ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Count</th>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Adviser Name</th>
            <th class="text-right">
              <a href="<?php echo base_url(); ?>advisers/add" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Adviser</a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach( $advisers as $row ): ?>
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
                    <p class="mb-0"><?php echo ucwords( $row->adviser_name ); ?></p>
                  </div>
                </div>
              </td>
              <td class="text-right">
                <a href="<?php echo base_url(); ?>advisers/edit?id=<?php echo $row->adviser_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
                <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
                  <form action="<?php echo base_url(); ?>advisers/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->adviser_id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
