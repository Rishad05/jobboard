<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a> 

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
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">
            <?= lang('enter_info'); ?>
          </h3>
        </div>
        <style type="text/css">
          .redactor-editor.redactor-linebreaks {
                color: #000;
            }
          #select2-city-container {
              color: #fff;
          }
        </style> 
        <div class="box-body">
          <div class="col-lg-12"> 
            <?php echo form_open_multipart("admin/trainingprogram/edit/".$info->id); ?>
            <div class="row">
              <div class="col-md-8">
                  <div class="form-group">
                      <?= form_label('Title', 'Title'); ?> <samp class="required-star">*</samp>
                      <?= form_input('title', $info->title, 'class="form-control tip" id="title"'); ?>
                      <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                  </div> 

                  <div class="form-group">
                      <?= form_label('Short description', 'Short description'); ?> 
                      <?= form_input('description', $info->description, 'class="form-control tip" id="description"'); ?>
                      <?php echo form_error('description', '<div class="error">', '</div>'); ?>  
                  </div>   
                   <div class="form-group">
                      <?=form_label('Participant', 'Participant');?> <samp class="required-star">*</samp>
                      <?=form_input('participant', $info->participant, 'class="form-control tip" id="Participant"');?>
                      <?php echo form_error('Participant', '<div class="error">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                      <?= form_label('Start Date', 'Start Date'); ?> <samp class="required-star">*</samp>
                      <?= form_input('start_date',  date('dd-mm-YYYY', strtotime($info->start_date)), 'class="form-control tip datepicker" id="start_date"'); ?>
                      <?php echo form_error('start_date', '<div class="error">', '</div>'); ?>
                  </div> 
                  <div class="form-group">
                      <?= form_label('Start time', 'Start time'); ?> <samp class="required-star">*</samp>
                      <?= form_input('start_time',  $info->start_time, 'class="form-control tip timepicker" id="start_time"'); ?>
                      <?php echo form_error('start_time', '<div class="error">', '</div>'); ?>
                  </div>  
                  <div class="form-group">
                      <?= form_label('End Date', 'End Date'); ?> <samp class="required-star">*</samp>
                      <?= form_input('end_date', date('dd-mm-YYYY', strtotime($info->end_date)), 'class="form-control tip datepicker" id="end_date"'); ?>
                      <?php echo form_error('end_date', '<div class="error">', '</div>'); ?>
                  </div>  
                  <div class="form-group">
                      <?= form_label('End time', 'End time'); ?> <samp class="required-star">*</samp>
                      <?= form_input('end_time',  $info->end_time, 'class="form-control tip timepicker" id="end_time"'); ?>
                      <?php echo form_error('end_time', '<div class="error">', '</div>'); ?>
                  </div> 
                  <div class="form-group">
                      <?= form_label('Total hours', 'total_hours'); ?> 
                      <?= form_input('total_hours',  $info->total_hours, 'class="form-control tip" id="total_hours"'); ?>
                      <?php echo form_error('total_hours', '<div class="error">', '</div>'); ?>
                  </div> 
                  <div class="form-group">
                      <?= form_label('Total day', 'total_day'); ?> 
                      <?= form_input('total_class',  $info->total_class, 'class="form-control tip" id="total_class"'); ?>
                      <?php echo form_error('total_class', '<div class="error">', '</div>'); ?>
                  </div> 

                  <div class="form-group">
                      <?= form_label('Training schedule', 'class_schedule'); ?> 
                      <?= form_input('class_schedule',  $info->class_schedule, 'class="form-control tip" id="class_schedule"'); ?>
                      <?php echo form_error('class_schedule', '<div class="error">', '</div>'); ?>
                  </div> 
                   <div class="form-group">
                      <?= form_label('Venue', 'venue'); ?> <samp class="required-star">*</samp>
                      <?= form_input('venue',  $info->venue, 'class="form-control tip" id="venue"'); ?>
                      <?php echo form_error('venue', '<div class="error">', '</div>'); ?>
                  </div> 
                  
                  <div class="form-group">
                      <?= form_label('Trainging objectives', 'course_objectives'); ?>  
                      <?=form_textarea('course_objectives', $info->course_objectives, 'class="form-control tip"');?>
                      <!-- <?= form_input('course_objectives', $info->course_objectives , 'class="form-control tip" id="course_objectives"'); ?> -->
                      <?php echo form_error('course_objectives', '<div class="error">', '</div>'); ?>
                  </div> 
                    
                  <div class="form-group">
                      <?= form_label('Course outline', 'course_outline'); ?> 
                      <?= form_textarea('course_outline', $info->course_outline, 'class="form-control tip" id="description_edit_field"'); ?>
                      <?php echo form_error('course_outline', '<div class="error">', '</div>'); ?>
                  </div> 
                  <div class="form-group">
                      <?= form_label('Upload featured image', 'Upload featured image'); ?> 
                       <input type="file" name="userfile" id="file">
                       <span>Standard image size 400px X 270px</span> 
                  </div> 
                  <?php if($info->image){ ?>
                    <img width="200px;" src="<?= base_url('uploads/training/'.$info->image); ?>">
                  <?php } ?>
                  <div class="form-group"> 
                      <?= lang('status', 'status'); ?><samp class="required-star">*</samp> 
                      <?php 
                      $opt = array(1 => lang('Active'), 0 => lang('Deactive'));

                      echo form_dropdown('status', $opt, $info->status, 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" required="required" style="width:100%;"');

                      ?> 
                  </div> 

                  <div class="form-group"> 
                    <input type="checkbox" name="home_page" value="1" id="home_page" <?php if($info->home_page){ echo "checked";}else{echo '';} ?> />  
                    <label for="home_page"> Home Page</label>
                  </div>
                  
                  <div class="form-group">
                    <?=lang('Trainers', 'Trainers');?><samp class="required-star">*</samp>
                    <?php
                    $tra = array();
                    if($trainers){
                      foreach ($trainers as $key => $trainer) {
                        $tra[$trainer->id] = $trainer->name;
                      }
                    }
                    $ttr =  array(); 
                    if($ttrainer){
                      foreach ($ttrainer as $key => $tt) {
                        $ttr[$tt->trainer_id] = $tt->trainer_id;
                      } 
                    }
                    echo form_multiselect('trainer_id[]', $tra, $ttr, 'id="trainer_id" data-placeholder="' . lang("select") . ' ' . lang("trainer") . '" class="form-control input-tip select2" required="required" style="width:100%;"');
                    ?>
                    </div>
                  </div> 
            </div><br>
            <div class="form-group">
              <?= form_submit('add_now', 'Update Now', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close(); ?> 
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<link href="<?= $assets ?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>

<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('.datepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
    }); 
</script>
<style type="text/css">
  .custom_inpt {
    height: 90px !important;
}
.form_custom {
    padding: 0;
}
.form_custom_text textarea.txt_dynic_field {
    display: block;
    width: 100%;
    padding: 6px 12px;
    height: 35px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.form_custom.uploads input.form-control {
    padding: 6px 0 0 7px;
    height: 35px;
}
.Btn_add_more_field button {
    background-color: #007cdc;
    border: none;
    padding: 10px 12px;
    color: #fff;
}
</style>
<script type="text/javascript">
    function addMore(){
        var id = Math.random().toString(36).substring(7); 

        $('#dynamic_field').append('<div id="qu_'+id+'" class="form-row mb-3"><div class="col-md-4 form_custom"><input type="text" name="trainer_name[]" id="trainer_name" class="form-control input-tip select2" placeholder="Trainer Name"></div><div class="col-md-4 form_custom_text"><textarea class="txt_dynic_field" name="details[]" rows="3" placeholder="Trainer Details"></textarea></div><div class="col-md-3 form_custom uploads"><input class="form-control" type="file" name="trainer_image[]"></div><div class="col-md-1 Btn_add_more_field"><button type="button" onClick="removeFiled(\''+id+'\')" id="add_more_field"><i class="fa fa-times"></i></button></div></div>');
    }
    function removeFiled(id){

        $('#qu_'+id).html('');
    }

    function removeFiled2(id)
    {
      $('.dyfld_'+id).html('');
    }
</script>