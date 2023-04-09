<style type="text/css">
  section.vid_section {
  position: relative;
  background-color: black;
  height: 100vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

section.vid_section video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

section.vid_section .container {
  position: relative;
  z-index: 2;
}

section.vid_section .overlay-wcs {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.5;
  z-index: 1;
}
.aoss_main{
  overflow: hidden;
}
.aoss_main .aso_apps_clien .main_title {
    text-transform: uppercase;
    font-size: 30px;
}
.aoss_main .abou_dtl_titl_form .btn.btn-primary:hover {
    color: 
#ddd;
background:
#fff;
    background-color: rgb(255, 255, 255);
box-shadow: 0 0 10px
    #c4bfbf;
}
.imgs_aoss1 img {
    float: right;
}
</style>
<!-- SUB-HEADER SECTION -->
<!-- <section class="sub_header_sec">
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
                              <h1 style="color:#ffffff"><?= $about->title ? $about->title : ''; ?> <br>
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
                     <a href="<?= base_url(); ?>">Home</a>
                  </li>
                  <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                  <li class="last-item">About Us</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!-- SUB-HEADER SECTION  END-->
<section class="vid_section">
  <div class="overlay-wcs"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="http://lexcollective.com.au/wp-content/uploads/2018/09/lexhome.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1></h1>
        <p class="lead mb-0"></p>
      </div>
    </div>
  </div>
</section>
<section class="content_section About_us_section aoss_main mt-5 mb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <?= $about->content ? $about->content : ''; ?> 
            <div class="about_team_section">
               <h3 class="main_title mt-5">
                  PARTNERS
               </h3>
               <div class="row">
                <?php 
                  foreach ($companies as $key => $company) { ?>
                   <div class="col-md-3">
                       <div class="key_partner">
                          <img width="100%" src="<?php echo base_url('uploads/company/'.$company->logo); ?>" alt="Services Map" />
                       </div>
                    </div>


                <?php
                  }

                ?>

                   
               </div>
            </div>
            <div class="section_area contact_form abou_dtl_titl_form">
               <h3 class="text-center mt-2 mb-5">Have an idea? Let’s do something great together!</h3>
               <div class="section_content">
                  <?=form_open("aos2/", 'class="validation"');?>
                  <div class="form-row mb-3">
                     <div class="col">
                        <?=form_input('name', set_value('name'), 'class="form-control tip" id="name" required="required" placeholder="Full Name"');?>
                     </div>
                     <div class="col">
                        <?=form_input('email', set_value('email'), 'class="form-control tip" id="email" required="required" placeholder="Email"');?>
                     </div>
                  </div>
                  <div class="form-row mb-3">
                     <div class="col">
                        <?=form_input('phone', set_value('phone'), 'class="form-control tip" id="phone" required="required" placeholder="Phone"');?>
                     </div>
                     <div class="col">
                        <?=form_input('subject', set_value('subject'), 'class="form-control tip" id="subject" required="required" placeholder="Subject"');?>
                     </div>
                  </div>
                  <div class="form-row mb-3">
                     <div class="col-md-12">
                        <?=form_textarea('message', set_value('message'), 'class="form-control tip" id="message" rows="3" placeholder="Message" ');?>
                     </div>
                  </div>
                  <div class="form-row text-center">
                     <div class="col-md-12">
                        <?=form_submit('news_add', 'Send', 'class="btn btn-primary"');?>
                     </div>
                  </div>
                  <?=form_close();?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

