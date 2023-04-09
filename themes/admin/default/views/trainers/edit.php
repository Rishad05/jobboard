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
          <div class="col-lg-12"> <?=form_open_multipart("admin/trainers/edit/{$info->id}", 'class="validation"');?>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="name">Trainer Name<samp class="required-star">*</samp></label>
                    <?=form_input('name', set_value('name', $info->name), 'class="form-control tip" id="name" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone<samp class="required-star">*</samp></label>
                    <?=form_input('phone', set_value('phone', $info->phone), 'class="form-control tip" id="phone" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="phone">Email<samp class="required-star">*</samp></label>
                    <?=form_input('email', set_value('email', $info->email), 'class="form-control tip" id="email" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation Holds<samp class="required-star">*</samp></label>
                    <?=form_input('designation', set_value('designation', $info->designation), 'class="form-control tip" id="designation" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="Group name">Bio </label>
                    <?=form_textarea('description', $info->details, 'class="form-control tip" id="description"');?>
                  </div>
                  <div class="form-group">
                    <?php if ($info->image) {?>
                      <img src="<?=base_url('uploads/trainer/' . $info->image)?>" width="250"><br>
                    <?php }?>
                    <label for="userfile">Profile Image (jpeg|png|jpg)</label>
                    <input type="file" name="userfile"> 
                  </div>
              </div>
            </div>
            <div class="form-group">
              <?=form_submit('news_add', 'Update Now', 'class="btn btn-primary"');?>
            </div>
            <?php echo form_close(); ?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
