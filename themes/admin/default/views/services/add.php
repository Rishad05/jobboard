<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
  <div class="row">   
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">
            <?= lang('enter_info'); ?>
          </h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12"> <?= form_open_multipart("admin/services/add", 'class="validation"'); ?> 
            <div class="row">
              <div class="col-md-6">  
                  <div class="form-group">
                    <label for="title">Title<samp class="required-star">*</samp></label>
                    <?= form_input('title', set_value('title'), 'class="form-control tip" id="title" required="required"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="order_by">Order BY </label>
                    <?= form_input('order_by', set_value('order_by'), 'class="form-control tip" id="order_by" '); ?>
                  </div>    
                  <div class="form-group">
                    <label for="short_descriptions">Short Descriptions </label>
                    <?php
                    $short_descriptions = '';
                    if(isset($_POST['short_descriptions'])){
                      $short_descriptions = $_POST['short_descriptions'];
                    }
                    ?>
                    <?= form_textarea('short_descriptions', $short_descriptions, 'class="form-control tip" id="short_descriptions"'); ?>
                  </div> 
                  <div class="form-group">
                    <label for="editor">Descriptions </label>
                    <?php
                    $descriptions = '';
                    if(isset($_POST['descriptions'])){
                      $descriptions = $_POST['descriptions'];
                    }
                    ?>
                    <?= form_textarea('descriptions', $descriptions, 'class="form-control tip" id="editor"'); ?>
                  </div>
                  <div class="form-group">
                    <label for="userfile">Icon<span class="required-star">*</span> (Font Awesame) <a target="_blank" href="https://fontawesome.com/icons?d=gallery&m=free">Link</a></label>
                    <?= form_input('icon', '', 'class="form-control tip" id="icon" required="required" placeholder="<i class=\'fas fa-icon\'></i> "'); ?> 
                  </div>
                  <div class="form-group">
                    <label for="home_page">Home Page</label>
                    <input type="checkbox" name="home_page" value="1" id="home_page" />    
                  </div>
                  <div class="form-group">
                      <?= lang('status', 'status'); ?><span class="required-star">*</span>
                      <?php
                      $opt = array(1 => lang('active'), 0 => lang('inactive'));
                      echo form_dropdown('status', $opt, set_value('status'), 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" required="required"');
                      ?>
                  </div>    
                  <div class="form-group">
                    <label for="userfile">Featured Image (jpeg|png|jpg)</label>
                    <input type="file" name="userfile" id="userfile"> 
                    <span>Standard image size 350px X 200px </span>
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
<script>        
 tinymce.init({
    selector: "#editor",theme: "modern",width: 680,height: 300,
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