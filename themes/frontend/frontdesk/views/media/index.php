 
<!--page_titlebar Section End-->

<div class="content_area">
    <!--Like What you see section Start-->
    <div class="like_what_you_see_section">
        <div class="container gallery_boxes">
            <div class="row">
                <?php if($galleries){
                    foreach ($galleries as $key => $gallery) { ?>
                    <div class="col-md-4">
                        <div class="post_content">
                            <a href="<?= base_url('uploads/gallery/'.$gallery->file_name); ?>" data-lightbox="example-set"><img src="<?= base_url('uploads/gallery/'.$gallery->file_name); ?>" alt="post_1" class="w-100"/></a>
                        </div>
                    </div>
                <?php   }
                } ?> 
            </div>
        </div>
    </div>
    <!--Like What you see section End-->
</div> 
<!--  Info Icon Section End-->
<!--LIGHTBOX JS-->
<script type="text/javascript" src="<?= $frontend_assets ?>light-box/js/lightbox-plus-jquery.min.js"></script>