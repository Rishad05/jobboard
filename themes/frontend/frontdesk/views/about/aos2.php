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
      <div class="row case_active">
        <div class="col-xl-3">
          <?php if ($clients) {
            $clientsCount = sizeof($clients);
            $incemrnt = 0;
            foreach ($clients as $key => $client) {
              $incemrnt++;?>
              <div class="single_case popular_content">
                <div class="case_img">
                  <img src="<?=base_url('uploads/company/') . $client->logo;?>" alt="case_1"/>
                </div>
              </div>
              <?php if ($incemrnt == 2) {
                $incemrnt = 0;
                echo '</div>';
                if ($clientsCount != ($key + 1)) {
                  echo '<div class="col-xl-3 ' . $key . $clientsCount . '">';
                }
              }

            }}?>
          </div>
        </div>
      </div>
      <div class="section_area contact_form abou_dtl_titl_form col-md-12" id="ideaform_aospage">
       <h3 class="text-center mt-2 mb-5">Have an idea? Let’s do something great together!</h3>
       <?php if ($message) { ?>
         <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <h4>    <i class="icon fa fa-check"></i> <?=lang('Success');?></h4>
          <?= $message; ?>
        </div>
      <?php }?>
      <div class="section_content">
        <?=form_open("aos2/", 'class="validation"');?>
        <div class="form-row mb-3">
         <div class="col">
          <?=form_input('name', set_value('name'), 'class="form-control tip" id="name" placeholder="Full Name"');?>
          <?= '<div class"error">'. form_error('name') .'</div>'; ?> 
        </div>
        <div class="col">
          <?=form_input('email', set_value('email'), 'class="form-control tip" id="email"  placeholder="Email"');?>
          <?= '<div class"error">'. form_error('email') .'</div>'; ?> 
        </div>
      </div>
      <div class="form-row mb-3">
       <div class="col">
        <?=form_input('phone', set_value('phone'), 'class="form-control tip" id="phone" placeholder="Phone"');?>
        <?= '<div class"error">'. form_error('phone') .'</div>'; ?> 
      </div>
      <div class="col">
        <?=form_input('subject', set_value('subject'), 'class="form-control tip" id="subject" placeholder="Subject"');?>
        <?= '<div class"error">'. form_error('subject') .'</div>'; ?> 
      </div>
    </div>
    <div class="form-row mb-3">
     <div class="col-md-12">
      <?=form_textarea('message', set_value('message'), 'class="form-control tip" id="message" rows="3" placeholder="Message" ');?>
      <?= '<div class"error">'. form_error('message') .'</div>'; ?> 
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

