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
          <div class="col-lg-12"> <?php echo form_open("admin/consequence/edit/".$consequence->consequence_id); ?>
            <div class="row">
              <div class="col-md-6">
                <?php echo form_open("admin/company/add/"); ?>
                  <div class="form-group">
                      <label for="option_name">Title<samp class="required-star">*</samp></label>
                      <?= form_input('option_name', $consequence->option_name, 'class="form-control tip" id="first_name"'); ?>
                    </div>
                  <div class="form-group">
                      <label for="Gender">Status <samp class="required-star">*</samp></label>
                      <select name="active" class=" form-control tip select" >
                        <option <?php if($consequence->active  =='1'){ echo 'selected="selected"';} ?>  value="1">Active</option>
                        <option <?php if($consequence->active  =='0'){ echo 'selected="selected"';} ?>  value="0">Inactive</option>
                      </select>
                    </div>
              </div>
            </div>
            <div class="form-group">
              <?= form_submit('consequence', 'Update', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
