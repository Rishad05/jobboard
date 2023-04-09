<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
  <div class="row">  
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
        <script>        
         tinymce.init({
            selector: "textarea",theme: "modern",width: 680,height: 300,
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true , 
            relative_urls: false,
          remove_script_host : false,
            external_filemanager_path:"<?=base_url();?>resources/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "<?=base_url();?>resources/filemanager/plugin.min.js"}
         }); 
        </script>  
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">
            <?= lang('enter_info'); ?>
          </h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/jobboard/add", 'class="validation"'); ?> 
            <div class="row">
              <div class="col-md-6"> 
                 <div class="form-group">
                    <label for="companey_id">Company Name<samp class="required-star">*</samp></label>
                    <?php
                    $category = $this->site->whereRows('users','group_id',3); 
                    $cat[''] = "Select Client";
                    foreach ($category as $value) {
                      $cat[$value->id] = $value->first_name .' '.$value->last_name;
                    }
                    ?>
                    <?= form_dropdown('companey_id',$cat, set_value('companey_id'), 'class="form-control tip" id="companey_id" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="positions">Position<samp class="required-star">*</samp></label>
                    <?= form_input('positions', set_value('positions'), 'class="form-control tip" id="positions" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="vacancy">#Vacancy<samp class="required-star">*</samp></label>
                    <?= form_input('vacancy', set_value('vacancy'), 'class="form-control tip" id="vacancy" required="required"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="locations">Job Locations<samp class="required-star">*</samp></label>
                    <?= form_input('locations', set_value('locations'), 'class="form-control tip" id="locations" required="required"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="last_date">Last Date / Dedline<samp class="required-star">*</samp></label>
                    <?= form_input('last_date', set_value('last_date'), 'class="form-control tip datepicker" id="last_date" required="required"'); ?>
                  </div>  
                  <div class="form-group">
                    <label for="descriptions">Job Descriptions / Responsibility </label>
                    <?php
                    $descriptions = '';
                    if(isset($_POST['descriptions'])){
                      $descriptions = $_POST['descriptions'];
                    }
                    ?>
                    <?= form_textarea('descriptions', $descriptions, 'class="form-control tip" id="descriptions"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="education_experience">Edutcation & Experience Requirement </label>
                    <?php
                    $education_experience = '';
                    if(isset($_POST['education_experience'])){
                      $education_experience = $_POST['education_experience'];
                    }
                    ?>
                    <?= form_textarea('education_experience',  $education_experience, 'class="form-control tip" id="education_experience"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="additional_requirement">Additional Requirement </label>
                    <?php
                    $additional_requirement = '';
                    if(isset($_POST['additional_requirement'])){
                      $additional_requirement = $_POST['additional_requirement'];
                    }
                    ?>
                    <?= form_textarea('additional_requirement', $additional_requirement, 'class="form-control tip" id="additional_requirement"'); ?>
                  </div>  
                  <div class="form-group">
                  <label for="minimum_requirement">Minimum Requirement</label>
                    <?php
                    $minimum = $this->site->whereRows('minimum_requirement','status',1,'ASC');  
                    foreach ($minimum as $key => $value) {
                      echo '<label for="additional_requirement">'.$value->title.'</label>'.
                        form_checkbox('minimum_requirement', $value->id,'','class="checkbox"'); 
                    }
                    ?>
                  </div>
              </div>  
            </div>
            <div class="form-group">
              <?= form_submit('news_add', 'Submit', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>