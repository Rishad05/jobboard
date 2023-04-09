
<!-- SUB-HEADER SECTION -->
   <section class="sub_header_sec">
      <div class="tg-innerpagebanner tg-haslayout">
         <div class="tg-pagetitle tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll" >
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <div class="page-title-wrap">
                        <div class="titlebar-sc-wrap">
                           <p>
                           </p>
                           <div class="sc-boxed-call-to-cation  ">
                              <div class="tg-titleandbtns">
                                 <h1 style="color:#ffffff">Gallery<br>
                                 </h1>
                                 <div class="tg-btnsbox">
                                 </div>
                              </div>
                           </div>
                           <p></p>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="tg-breadcrumb">
                        <li class="first-item">
                        <a href="<?= base_url();?>">Home</a></li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="last-item">Gallery</li>
                    </ol>
                </div>
            </div>
         </div>
      </div>
   </section>
   <!-- SUB-HEADER SECTION  END-->




    <!-- CONTENT SECTION -->
    <div class="content_area">

        <div class="container">

            <!-- WITH SIDEBAR CONTENT AREA -->

            <div class="row content_holder clearfix">

                <div class="col-md-12">
                    <div class="gallery_album">
                        <div class="main_gallery">
                        </div> 
                        <!-- <?= form_open('home/gallery', 'id="gelery_serch_form"'); ?>
                            <div class="Gallery_page_filter">
                                <?php  
                                    $arr[''] = 'All Images';
                                    foreach ($album as $key => $value) {
                                        $arr[$value->id] = $value->title;
                                    } 
                                  ?>
                                <?= form_dropdown('album', $arr, $gid, 'id="album" class="form-control input-tip select2 select" onchange="image_show_gellary_wise()"');  ?>
                            </div>
                        <?= form_close(); ?>  -->
                        <div class="section_content">
                            <ul class="row clearfix list-inline album_list">
                                <?php foreach ($album as $key => $value) {  ?>
                                <li class="col-md-3 album_item"><a href="<?php echo base_url('gallery/album/'.$value->id); ?>"><img src="<?php echo base_url('uploads/gallery/'.$value->thumb_image); ?>" alt="Image 01" class="img_gell_main"/></a><p><?php echo $value->title; ?></p></li>
                                <?php } ?>  
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="section_area gallery_album">
                        <div class="row"> 
                                <?php if($images){
                                foreach ($images as $key => $gallery) { ?>
                                <div class="col-md-4">
                                    <div class="post_content">
                                        <a href="<?= base_url('uploads/gallery/'.$gallery->file); ?>" data-lightbox="example-set"><img src="<?= base_url('uploads/gallery/'.$gallery->file); ?>" alt="post_1" class="w-100"/></a>
                                    </div> 
                                </div>
                            <?php   }
                            } ?>  
                            <?php echo $links; ?>
                        </div>
                    </div> -->
                </div> 
            </div> 
        </div>
    </div>
    <!-- CONTENT SECTION END -->
    <script type="text/javascript">
        function image_show_gellary_wise() {
            var id = $('#album').val();
            window.location = '<?= base_url("gallery/index") ?>/'+id;
            //document.getElementById("gelery_serch_form").submit();
        }
    </script> 
<script type="text/javascript" src="<?= $frontend_assets ?>light-box/js/lightbox-plus-jquery.min.js"></script>