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
          <?php
           if(isset($_REQUEST['id'])){
              $id =  $_REQUEST['id'];
           }else{
              $id = NULL;
           } 
          ?>
        <div class="box-body">
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/gallery_managment/add/".$id, 'class="validation"'); ?> 
            <div class="row gallery_Managmer">
             
              <?php
              if(!$album){
                $album = array();
              }
               foreach ($album as $value) { ?>
                <div class="fullwrap_gallery col-md-2">
                  <a href="<?php echo base_url('admin/gallery_managment/albumdelete/'.$value->id); ?>" onClick="return confirm('You are going to delete this photo, please click ok delete.')" title="Delete" class="tip btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> 
                  
                  <a class="wrap_gallery" href="<?php echo base_url('admin/gallery_managment?id='.$value->id); ?>">
                  <img src="<?php echo base_url('uploads/gallery/thumb/'.$value->thumb_image); ?>"><br>                  
                  </a>
                 <span class="wrap_gallery_"> </span>
                  <span class="title_gallery"><?= $value->title; ?></span>
                </div>

              
               <?php 
               }
               //print_r($album);
                $popUp = '"'.site_url('admin/gallery_managment/add_album/').'"'; 
                ?>
                <a class='top-add-butto' onclick='popUp(<?= $popUp ?>)' href='javascript:;' title='Add Album'><i class="fa fa-plus" aria-hidden="true"></i></a>
                
                <div class="col-md-12 photos_gallery">
                <?php foreach ($data as $key => $value) {  ?>
                    
                    <span class="gallery_photo_holder"><a href="<?php echo base_url('admin/gallery_managment/delete/'.$value->id); ?>" onClick="return confirm('You are going to delete this photo, please click ok delete.')" title="Delete" class="tip btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>  

                    <img width="100px" src="<?php echo base_url('uploads/gallery/'.$value->file); ?>"></span>

                    
                 
                <?php } ?>
               
                </div>
              <div class="col-md-6"> 
                  
                  <div class="form-group">
                    <label for="short_description">Upload More File (PDF)</label>
                    <input type="file" name="userfile[]" multiple>
                    <span>Standard Size 850px X 850px</span>
                  </div>
              </div>  
            </div>
            <div class="form-group">
              <?= form_submit('news_add', 'Add Now', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
