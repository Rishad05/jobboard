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
                              <h1 style="color:#ffffff">Ongoing Training<br>
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
                  <li class="last-item">Ongoing Training</li>
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
         <aside class="col-lg-3 col-md-4 col-sm-4 pull-left widget_main">
            <div class="widget_section">
               <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link <?php if($this->uri->segment(3) == 'first'){echo 'active';} ?> " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home">
                    Basic Training
                  </a>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'secend'){echo 'active';} ?>" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" >
                    Introductory & Onboarding Training for Pharma Sales Forces
                  </a>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'third'){echo 'active';} ?>" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" >
                    Leadership & Field Coaching Training for Pharma Field Managers
                  </a>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'fourth'){echo 'active';} ?>" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" >
                    Assessment Center
                  </a>
                </div>
            </div>
            <br/>
            <div class="widget_section">
               <div class="widget_contact">
                  <h5>Always Ready To Help!</h5>
                  <P>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</P>
                  <div class="hr_hifen"></div>
                  <a href="<?= base_url('contacts')?>">Contact Now</a>
               </div>
            </div>
         </aside>
         <div class="col-lg-9 col-md-8 col-sm-8 mt-3">
           <div class="row">
              <div class="col-md-12">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show <?php if($this->uri->segment(3) == 'first'){echo 'active show';} ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="about_Our_Mission">
                        <h3 class="main_title">
                           Basic Training
                        </h3>
                        <p class="main_decs">           
                          <!-- <strong></strong> -->
                          <ul>
                            <li class="course_info">Basic Selling Skills Training Course (BSSTC)</li>
                            <li class="course_info">Advance Selling Skills Training Course (ASSTC)</li>
                            <li class="course_info">Communication & Negotiation Skills</li>
                            <li class="course_info">Segmentation and Targeting (S&T)</li>
                            <li class="course_info">Key Account Management (KAM)</li>
                            <li class="course_info">Pharma Sales Territory Management, Etiquette & Grooming</li>
                          </ul>
                        </p>
                        <!-- <img width="100%" src="<?php echo base_url('uploads/SALEC.jpg'); ?>" alt="Services" /> -->
                    </div>
                  </div>
                  <div class="tab-pane fade <?php if($this->uri->segment(3) == 'secend'){echo 'active show';} ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="about_Our_Mission">
                        <h3 class="main_title">
                           Introductory & Onboarding Training for Pharma Sales Forces
                        </h3>
                        <p class="main_decs">
                          <ul>
                            <li class="course_info">Field Training for Fresher’s: Attachment with respective Co. Field Officers.</li>
                            <li class="course_info">Anatomy, Physiology & Other system of Human body</li>
                            <li class="course_info">Microbiology, Human diseases and other medical part</li>
                            <li class="course_info">Company Products, Marketing & Sales strategy (collaboration with respective Company).</li>
                          </ul>
                        </p>
                        <!-- <img width="100%" src="<?php echo base_url('uploads/SALEd.jpg'); ?>" alt="Services" /> -->
                    </div>
                  </div>
                  <div class="tab-pane fade <?php if($this->uri->segment(3) == 'third'){echo 'active show';} ?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="about_Our_Mission">
                        <h3 class="main_title">
                           Leadership & Field Coaching Training for Pharma Field Managers
                        </h3>
                        <p class="main_decs">  
                          <ul>
                            <li class="course_info">Basic Leadership</li>
                            <li class="course_info">Situational Leadership</li>
                            <li class="course_info">Field Coaching
                              <ul>
                                <li>Self-Development</li>
                                <li>Team Development</li>
                                <li>Business Developmen</li>                 
                              </ul>
                            </li>
                            <li class="course_info">Presentation Skills & Negotiation Skills</li>
                          </ul>
                        </p>
                        <!-- <img width="100%" src="<?php echo base_url('uploads/LEADERSHIP.jpg'); ?>" alt="Services" /> -->
                    </div>
                  </div>
                  <div class="tab-pane fade <?php if($this->uri->segment(3) == 'fourth'){echo 'active show';} ?>" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="about_Our_Mission">
                        <h3 class="main_title">
                           Assessment Center
                        </h3>
                        <p class="main_decs">  
                          <ul>
                            <li class="course_info">Assessment for Existing team to identify improvement area</li>
                            <li class="course_info">Assessment center for new joiners for the best fit.</li>
                          </ul>                        
                        </p>
                        <!-- <img width="100%" src="<?php echo base_url('uploads/field.jpg'); ?>" alt="Services" /> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
         </div>
   </div>   
</div>

</section>