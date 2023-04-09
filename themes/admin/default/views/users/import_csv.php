<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">
            <?= lang('enter_info'); ?>
          </h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/management/impostcsv"); ?>
            <div class="row">
              <div class="col-md-6">
                <?php echo form_open("admin/management/impostcsv/"); ?>
                  <div class="form-group">
                    <input type="file" name="userfile">
                    <span>Import CSV file max size 1mb, <a href="<?= base_url('uploads/sample_member.csv') ?>">click here</a> to download CSV format</span><br>    
                  </div>
                  
              </div>
            </div>
            <div class="form-group">
              <?= form_submit('consequence', 'Add Now', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
