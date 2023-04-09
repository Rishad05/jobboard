<!--        page_titlebar Section Start-->

<div class="page_titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center">
                <h2 class="page_titlebar_heading"><?= $page_title; ?></h2>
                <ul class="breadcumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i> <?= lang('home'); ?></a></li>
                    <?php
                    foreach ($bc as $b) {
                        if ($b['link'] === '#') {
                            echo '<li class="active">' . $b['page'] . '</li>';
                        } else {
                            echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                        }
                    }
                    ?> 
                </ul>
            </div>
        </div>
    </div>
</div>
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
                <!-- <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_1.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_1.jpg" alt="post_1" class="w-100"/></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_2.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_2.jpg" alt="post_2" class="w-100"/></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_3.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_3.jpg" alt="post_3" class="w-100"/></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_3.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_3.jpg" alt="post_1" class="w-100"/></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_1.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_2.jpg" alt="post_2" class="w-100"/></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post_content">
                        <a href="<?= $frontend_assets ?>img/Post_1.jpg" data-lightbox="example-set"><img src="<?= $frontend_assets ?>img/Post_1.jpg" alt="post_3" class="w-100"/></a>
                    </div>
                </div> -->


            </div>
        </div>
    </div>
    <!--Like What you see section End-->
</div>

<!--        Info Icon Section Start-->
<div class="info_icon_area content_info">
    <div class="info_icon_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-truck-moving"></i>
                    <h2>Quick Services</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-hourglass-half"></i>
                    <h2>24/7 Support</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-user-alt"></i>
                    <h2>User Friendly</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-handshake"></i>
                    <h2>Easy Solution </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Info Icon Section End-->
<!--LIGHTBOX JS-->
<script type="text/javascript" src="<?= $frontend_assets ?>light-box/js/lightbox-plus-jquery.min.js"></script>