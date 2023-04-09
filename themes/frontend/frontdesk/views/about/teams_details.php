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
                                 <h1 style="color:#ffffff"><?= $teams->name ? $teams->name : ''; ?><br>
                                 </h1>
                                 <div class="tg-btnsbox">
                                 </div>
                              </div>
                           </div> 
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
                            <a href="<?=base_url('')?>">Home </a></li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="0-item">
                            <a href="<?=base_url('teams')?>">About Team</a></li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="last-item"><?= $teams->name ?></li>
                    </ol>
                </div>
            </div>
         </div> 
      </div>
   </section>
   <!-- SUB-HEADER SECTION  END-->
   <section class="content_section About_us_section about_team_details mt-5 mb-5">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="about_team_detls">
                  <img src="<?= base_url('uploads/teams/').$teams->image; ?>" class="w-100"/>
               </div>
               <div class="about_team_detls_map mt-3"> 
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.201226365482!2d90.4096860149825!3d23.81144248455934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c6fff189fb1f%3A0x7500a9126e541678!2sHouse%23%20363%2C%20492%2F5%20Lane%20-%209%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1567767733140!5m2!1sen!2sbd" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
             
               </div>
               <div class="about_team_side_contact_info">
                  <ul class="tg-contactinfo">
                     <li>
                      <span class="te_m_contact">
                            <i class="fab fa-telegram-plane"></i>
                          </span>
                          <address>
                            <?= $teams->address ?> 
                          </address>
                     </li>
                     <li>
                        <div class="tg-detailbox">                          
                           <span class="tg-phone">
                            <span class="te_m_contact">
                            <i class="fas fa-phone-volume"></i>
                          </span>
                           <?= $teams->cell ? $teams->cell : ''; ?></span>
                           <span class="tg-fax">
                           <span class="te_m_contact">
                            <i class="fas fa-fax"></i>
                          </span>
                        <?= $teams->tel ? $teams->tel : ''; ?></span>
                        </div>
                     </li>
                     <li>
                        <div class="tg-detailbox">
                           <span class="tg-email">
                            <span class="te_m_contact">
                              <i class="fas fa-envelope"></i>
                            </span>
                            <a href="mailto:<?= $teams->email?>"><?= $teams->email ? $teams->email : ''; ?></a>
                           </span>
                           <span class="tg-support">
                            <span class="te_m_contact">
                              <i class="fas fa-heartbeat"></i>
                            </span>
                            <a href="mailto:support@frontdeskbd.com">info@frontdeskbd.com</a>
                           </span>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="about_team_section">
                  <div class="about_team_dts_title">
                     <h3 class="main_title">
                        <?= $teams->name ? $teams->name : ''; ?>
                        <span class="about_team_dts_social">
                           <div class="footer_social_icon about_social_icon" >
                              <a target="_balank" href="<?= $teams->facebook ? $teams->facebook : ''; ?>" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                             <!--  <a target="_balank" href="<?= $teams->twitter ? $teams->twitter : ''; ?>" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a> -->
                              <a target="_balank" href="<?= $teams->linkedin ? $teams->linkedin : ''; ?>" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <!-- <a target="_balank" href="<?= $teams->googleplus ? $teams->googleplus : ''; ?>" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a> -->
                           </div>
                        </span>
                     </h3>
                     <p> <?= $teams->designation ? $teams->designation : ''; ?></p>
                  </div>
                  <?= $teams->descriptions ? $teams->descriptions : ''; ?>
               </div>
               
            </div>
         </div>   
      </div>

   </section>