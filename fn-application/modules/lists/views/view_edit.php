
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>studies/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="study_title">Title</label>
                <small class="form-text text-muted">Please enter study title</small>
                <div class="input-group">

                  <input type="hidden" name="study_id" value="<?php echo $study[0]->study_id; ?>" />
                  <input type="hidden" name="o_study_file" value="<?php echo $study[0]->study_link; ?>" />

                  <input type="text" name="study_title" value="<?php echo ucwords( $study[0]->study_title ); ?>" class="form-control" id="study_title" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_cat">Category</label>
                <small class="form-text text-muted">Please enter study title</small>
                <div class="input-group">
                  <select name="study_cat" id="study_cat" class="form-control select2">
                    <option value="">Select Category</option>
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
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="study_year">Year</label>
                <small class="form-text text-muted">Please select year</small>
                <div class="input-group">
                  <select name="study_year" id="study_year" class="form-control select2">
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
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_adviser">Adviser</label>
                <small class="form-text text-muted">Please select adviser</small>
                <div class="input-group">
                  <select name="study_adviser" id="study_adviser" class="form-control select2">
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
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="study_file">Upload Study</label>
                <small class="form-text text-muted">File must be .zip format.</small>
                <div class="input-group col-xs-12">
                  <input type="file" name="study_file" id="study_file" accept=".zip" class="file-upload-default" />
                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image" disabled />
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload Zip File</button>
                  </span>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_pro">Proponents</label>
                <small class="form-text text-muted">Please type proponents and press enter</small>
                  <input type="text" name="study_pro" value="<?php echo $study[0]->study_proponents; ?>" class="form-control tags" id="study_pro" />
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_abs">Abstract</label>
                <small class="form-text text-muted">Please type study abstract</small>
                  <textarea name="study_abs" class="form-control texteditor" id="study_abs"><?php echo html_entity_decode( $study[0]->study_abstract ); ?></textarea>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Update Study <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
