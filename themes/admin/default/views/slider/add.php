<?php (defined('BASEPATH')) OR exit('No direct script access allowed');?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
  <div class="row">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      
        <script>        
         tinymce.init({
            selector: "textarea",theme: "modern",width: 680,height: 300,
            plugins: [
                 "advlist autolink link lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| link unlink anchor | forecolor backcolor  | print preview code ",
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
            <?=lang('enter_info');?>
          </h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/slider/add", 'class="validation"'); ?>

            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="Group name">Title<samp class="required-star">*</samp></label>
                    <?=form_input('title', set_value('title'), 'class="form-control tip" id="title" required="required"');?>
                  </div>
                  <div class="form-group">
                    <label for="Group name">Order By </label>
                    <?=form_input('order_by', set_value('order_by'), 'class="form-control tip" id="order_by" ');?>
                  </div>
                  <div class="form-group">
                    <label for="Group name">Link </label>
                    <?=form_input('link', set_value('link'), 'class="form-control tip" id="link" ');?>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <?=form_textarea('description', set_value('description'), 'class="form-control tip" id="description"');?>
                  </div>
                  <div class="form-group">
                    <label for="short_description">Upload Image (jpg|png|jpeg)</label>
                    <input type="file" name="userfile"> 
                    <span>Standard image size 1920px X 700px </span>
                  </div>

              </div>
              </div>
              <div class="form-group">
              <?=form_submit('news_add', 'Add Now', 'class="btn btn-primary"');?>
            </div>
            </div>

            <?php echo form_close(); ?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
