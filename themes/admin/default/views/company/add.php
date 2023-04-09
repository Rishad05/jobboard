<?php (defined('BASEPATH')) OR exit('No direct script access allowed');?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">
            <?=lang('enter_info');?>
          </h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/company/add", 'class="validation"'); ?>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="name">Company Name<samp class="required-star">*</samp></label>
                    <?=form_input('name', set_value('name'), 'class="form-control tip" id="name" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone <samp class="required-star">*</samp></label>
                    <?=form_input('phone', set_value('phone'), 'class="form-control tip" id="phone" required="required" ');?>
                  </div>
                  <div class="form-group">
                    <label for="phone">Email<samp class="required-star">*</samp></label>
                    <?=form_input('email', set_value('email'), 'class="form-control tip" id="email" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="content"><?= $this->lang->line("Order By"); ?></label>  
                    <?= form_input('order_by', set_value('order_by'), 'class="form-control" id="order_by"'); ?> 
                  </div>
                  <div class="form-group">
                    <label for="address">Address </label>
                    <?=form_input('address', set_value('address'), 'class="form-control tip" id="address" ');?>
                  </div>  
                  <div class="form-group">
                    <label for="Gender">Status <samp class="required-star">*</samp></label>
                    <select name="status" class=" form-control tip select" required="required">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="userfile">Profile Image (jpeg|png|jpg)</label>
                    <input type="file" name="userfile"> 
                    <span>Standard image size 255px X 160px</span>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <?=form_submit('news_add', 'Add Now', 'class="btn btn-primary"');?>

            </div>
            <?php echo form_close(); ?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
