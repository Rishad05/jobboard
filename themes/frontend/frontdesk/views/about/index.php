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
                        <a href="<?= base_url(); ?>">Home</a></li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="last-item">About Us</li>
                    </ol>
                </div>
            </div>
         </div>
      </div>
   </section>
   <!-- SUB-HEADER SECTION  END-->
   <section class="content_section About_us_section mt-5 mb-5">
      <div class="container">
         <div class="row">
            <?php $this->load->view($this->frontend_theme.'about/sidebar'); ?>
            <div class="col-lg-9 col-md-8 col-sm-8 mt-3"> 
               <?= $about->content ? $about->content : ''; ?> 
            </div>
         </div>   
      </div>
   </section>