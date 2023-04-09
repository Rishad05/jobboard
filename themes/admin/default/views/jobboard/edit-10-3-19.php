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
          <div class="col-lg-12"> <?= form_open_multipart("admin/jobboard/edit/{$info->id}", 'class="validation"'); ?> 
            <div class="row">
              <div class="col-md-6"> 
                 <div class="form-group">
                    <label for="companey_id">Company Name<samp class="required-star">*</samp></label>
                    <?php
                    $company = $this->site->whereRows('company','status',1); 
                    $cm[''] = "Select company";
                    foreach ($company as $value) {
                      $cm[$value->id] = $value->name;
                    }
                    ?>
                    <?= form_dropdown('companey_id',$cm, set_value('companey_id',$info->companey_id), 'class="form-control tip" id="companey_id" required="required"'); ?>
                  </div>
                  <div class="form-group">
                  <label for="job_category">Job Category <samp class="required-star">*</samp></label><br>
                    <?php
                    $job_category = $this->site->selectQuery('job_category'); 
                    $cat[''] = 'Select Category'; 
                    foreach ($job_category as $key => $value) {
                      $cat[$value->id] = $value->name;
                    }
                    ?>
                    <?= form_dropdown('job_category',$cat, set_value('job_category',$info->job_category_id), 'class="form-control tip select2" id="job_category" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="job_type">Job Type <samp class="required-star">*</samp></label><br>
                    <?php
                    $job_type = $this->site->selectQuery('job_type');  
                    $ty[''] = 'Select Job Type';
                    foreach ($job_type as $key => $value) {
                        $ty[$value->id] = $value->name; 
                    }
                    ?>
                    <?= form_dropdown('job_type',$ty, set_value('job_type',$info->job_type_id), 'class="form-control tip select2" id="job_type" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="positions">Position<samp class="required-star">*</samp></label>
                    <?= form_input('positions', set_value('positions',$info->positions), 'class="form-control tip" id="positions" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="vacancy">#Vacancy<samp class="required-star">*</samp></label>
                    <?= form_input('vacancy', set_value('vacancy',$info->vacancy), 'class="form-control tip" id="vacancy" required="required"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="location">Job Locations<samp class="required-star">*</samp></label>
                    <?= form_input('location', set_value('location',$info->location), 'class="form-control tip" id="location" required="required"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="last_date">Last Date / Dedline<samp class="required-star">*</samp></label>
                    <?= form_input('last_date', set_value('last_date',$info->last_date), 'class="form-control tip datepicker" id="last_date"'); ?>
                  </div>  
                  <div class="form-group">
                    <label for="experience">Experience Requirement </label> 
                    <?= form_input('experience', set_value('experience',$info->experience), 'class="form-control tip" id="experience" required="required"'); ?> 
                  </div>
                  <div class="form-group">
                    <label for="descriptions">Job Description / Responsibility </label> 
                    <?= form_textarea('descriptions', $info->descriptions, 'class="form-control tip" id="descriptions"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="education_experience">Education Requirement <samp class="required-star">*</samp> </label> 
                    <?= form_textarea('education_experience',$info->education_experience, 'class="form-control tip" id="education_experience"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="additional_requirement">Additional Requirement </label> 
                    <?= form_textarea('additional_requirement', $info->additional_requirement, 'class="form-control tip" id="additional_requirement"'); ?>
                  </div>  
                  <div class="form-group">
                    <label for="minimum_requirement">Minimum Requirement</label>
                    <?php
                    $deco = json_decode($info->minimum_requirement); 

                    $minimum = $this->site->whereRows('minimum_requirement','status',1,'ASC');  
                    foreach ($minimum as $key => $value) { 
                      if(in_array($value->id, $deco)){
                        $select = true;
                      }else{
                        $select = false;
                      }
                      echo '<label for="additional_requirement">'.$value->title.'</label>'.
                        form_checkbox('minimum_requirement[]', $value->id,$select,'class="checkbox"'); 
                    }
                    ?>
                  </div> 
                  <div class="form-group">
                    <input type="checkbox" name="home_page" value="1" id="home_page" <?php if($info->home_page){ echo "checked";}else{echo '';} ?> />
                    <label for="home_page">Home Page</label>
                    
                      
                  </div> 
                  <div class="form-group">
                    <?php if ($info->featured_image) {?>
                      <img src="<?=base_url('uploads/jobs/' . $info->featured_image)?>" width="250"><br>
                    <?php }?>
                    <label for="userfile">Profile Image (jpeg|png|jpg)</label>
                    <input type="file" name="userfile">
                    <span>Standard image size 350px X 250px</span>
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