<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<section class="content">
  <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
  <div class="row">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      
        <script>        
         tinymce.init({
            selector: ".my-editor",theme: "modern",width: 680,height: 300,
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
        <?php //echo $info->short_description; ?>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/news/edit/".$info->id, 'class="validation"'); ?>

            <div class="row">
              <div class="col-md-8"> 
                 <div class="form-group">
                    <label for="Group name">Title<samp class="required-star">*</samp></label>
                    <?= form_input('title', $info->title, 'class="form-control tip" id="title" required="required"'); ?>
                  </div>  
              </div> 
              <div class="col-md-4">
                <div class="form-group">
                    <label for="Group name">Category<samp class="required-star">*</samp></label>
                    <?php
                    $category = $this->site->wheres_rows('news_category', null); 
                    $cat[''] = "Select Category";
                    foreach ($category as $value) {
                      $cat[$value->id] = $value->title;
                    }
                    ?>
                    <?= form_dropdown('category',$cat, $info->category_id, 'class="form-control tip" id="category" required="required"'); ?>
                </div>  
              </div>
              <div class="col-md-8"> 
                  <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <?= form_textarea('short_description', $info->short_description, 'class="form-control tip " id="short_description"'); ?>
                  </div>  
              </div>
              <div class="col-md-8"> 
                  <div class="form-group">
                    <label for="description">Description</label>
                    <?= form_textarea('description', $info->description, 'class="form-control tip my-editor" id="description"'); ?>
                  </div> 
              </div>
              <div class="col-md-8"> 
                  <div class="form-group">
                    <label for="Gender">Status <samp class="required-star">*</samp></label>
                    <select name="status" class=" form-control tip select" >
                      <option <?php if($info->status  =='1'){ echo 'selected="selected"';} ?>  value="1">Published</option>
                      <option <?php if($info->status  =='0'){ echo 'selected="selected"';} ?>  value="0">Draft</option>
                    </select>
                  </div> 
              </div>
              <div class="col-md-8"> 
                 <div class="form-group">
                    <label for="home_page">Home Page</label>
                    <input type="checkbox" name="home_page" value="1" id="home_page" <?php if($info->home_page){ echo "checked";}else{echo '';} ?> />  
                  </div>  
              </div>
              <div class="col-md-8"> 
                <?php if($info->thumbnail){ ?>
                  <div>
                    <img width="200px" src="<?php echo base_url('uploads/news/'.$info->thumbnail); ?>">
                  </div>
                <?php } ?>
                <label for="thumbnail">Upload Thumbnail Image(jpg|png|jpeg)</label>
                <input type="file" name="thumbnail"> 
                <span>Standard image size 350px X 230px</span>
            </div>
              <div class="col-md-8"> 
                <?php if($info->image){ ?>
                  <div>
                    <img width="200px" src="<?php echo base_url('uploads/news/'.$info->image); ?>">
                  </div>
                <?php } ?>
                <label for="userfile">Upload Featured Image(jpg|png|jpeg)</label>
                <input type="file" name="userfile"> 
                <span>Standard image size 1200px X 400px</span> 
            </div>

            </div>
            <div class="form-group">
              <?= form_submit('news_update', 'Update Now', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
