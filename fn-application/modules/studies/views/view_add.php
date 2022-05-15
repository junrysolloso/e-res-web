
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>studies/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="study_title">Title</label>
                <small class="form-text text-muted">Please enter thesis study title</small>
                <input type="text" name="study_title" class="form-control" id="study_title" required />
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_cat">Program</label>
                <small class="form-text text-muted">Please select program</small>
                <select name="study_cat" id="study_cat" class="form-control select2" required>
                  <option value="">Select program</option>
                  <?php foreach( $categories as $value ): ?>
                    <option value="<?php echo $value->category_id; ?>"><?php echo strtoupper( $value->category_name ); ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="study_year">Year</label>
                <small class="form-text text-muted">Please select year</small>
                <select name="study_year" id="study_year" class="form-control select2" required>
                  <option value="">Select year</option>
                  <?php 
                    $base_year = intval( date( 'Y' ) );
                    $offset    = $base_year - 2009;
                    for ( $i = 0; $i < $offset; $i++ ):
                  ?>
                  <option value="<?php echo ( $base_year - $i ); ?>"><?php echo ( $base_year - $i ); ?></option>
                  <?php endfor; ?>
                </select>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_adviser">Faculty</label>
                <small class="form-text text-muted">Please select faculty</small>
                <select name="study_adviser" id="study_adviser" class="form-control select2" required>
                  <option value="">Select faculty</option>
                  <?php foreach( $advisers as $value ): ?>
                    <option value="<?php echo $value->adviser_id; ?>"><?php echo ucwords( $value->adviser_name ); ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="study_file">Upload Study</label>
                <small class="form-text text-muted">File must be PDF format</small>
                <div class="input-group col-xs-12">
                  <input type="file" name="study_file" id="study_file" accept=".pdf" class="file-upload-default" />
                  <input type="text" class="form-control file-upload-info" disabled />
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload PDF File</button>
                  </span>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_pro">Proponents</label>
                <small class="form-text text-muted">Please type proponents and press enter</small>
                <input type="text" name="study_pro" class="form-control tags" id="study_pro" />
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_abs">Abstract</label>
                <small class="form-text text-muted">Please type study abstract</small>
                <textarea maxlength="3000" name="study_abs" class="form-control texteditor" rows="25" id="study_abs" style=" font-size: 0.9em; line-height: 1.2em;"></textarea>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="study_pro">Keywords</label>
                <small class="form-text text-muted">Please type keywords and press enter</small>
                <input type="text" name="study_keywords" class="form-control tags" id="study_keywords" />
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Submit Thesis Study <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
