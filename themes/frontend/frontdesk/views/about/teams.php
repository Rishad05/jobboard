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
                                 <h1 style="color:#ffffff">About Teams<br>
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
                        <li class="last-item">About Teams</li>
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
               <div class="about_team_section">
                  <h3 class="main_title">
                     Our Professionals
                  </h3>
                  <p class="main_decs"> 
                   Frontdesk Bangladesh Limited is a full service management consultancy offering focused expertise in human resource management.

                  Based Dhaka, Bangladesh, the firm delivers comprehensive human resource management solutions and services nationwide, all benchmarked with professional best practices. We advise, design and execute a wide range of consulting & outsourcing solutions that enable clients to cultivate talent to drive organizational and personal performance and growth.

                  </p>
               </div>
              

               <?php for($i=0;$i<=count($groupArr);$i++){?>
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="main_title">
                     <?php if(isset($groupArr[$i]->group_name)){echo $groupArr[$i]->group_name;}?>
                  </h3>
                  </div>
                  <?php if($teams){
                     foreach ($teams as $key => $teamArr) {
                       if(isset($groupArr[$i]->id) && $key == $groupArr[$i]->id){
                     foreach($teamArr as $team){ 
                        
                        ?>
                        <div class="col-md-6 col-lg-3 col-sm-6">
                           <div class="about_team_mumber">
                              <div class="about_team_mumber_img">
                                 <a href="<?=base_url('teams/details/' . strtolower( str_replace(' ', '_', $team->name)));?>" class="abt_img_a">
                                    <?php if($team->image){ ?> 
                                    <img src="<?= base_url('uploads/teams/').$team->image; ?>" class="w-100"/>
                                 <?php } ?>
                                 </a>
                              </div>
                              <div class="about_team_mumber_info">
                                 <a href="<?=base_url('teams/details/' . strtolower( str_replace(' ', '_', $team->name)));?>">
                                    <h5><?= $team->name ? $team->name : ''; ?></h5>
                                 </a>
                                 <p><?= $team->designation ? $team->designation : ''; ?></p>
                                 <div class="footer_social_icon about_social_icon" >
                                    <a target="_balank" href="<?= $team->facebook ? $team->facebook : ''; ?>" class="fb_social">
                                       <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <!-- <a target="_balank" href="<?= $team->twitter ? $team->twitter : ''; ?>" class="tw_social">
                                       <i class="fab fa-twitter"></i>
                                    </a> -->
                                    <a target="_balank" href="<?= $team->linkedin ? $team->linkedin : ''; ?>" class="in_social">
                                       <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <!-- <a target="_balank" href="<?= $team->googleplus ? $team->googleplus : ''; ?>" class="google_social">
                                       <i class="fab fa-google-plus-g"></i>
                                    </a> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php }
                  } } }?>
                  <!-- <div class="col-md-6 col-lg-4 col-sm-6">
                     <div class="about_team_mumber">
                        <div class="about_team_mumber_img">
                           <a href="<?= base_url('teams/details');?>" class="abt_img_a">
                              <img src="<?= $frontend_assets; ?>images/team/002.jpg" class="w-100"/>
                           </a>
                        </div>
                        <div class="about_team_mumber_info">
                           <a href="<?= base_url('teams/details');?>">
                              <h5>Arif Iftekhar</h5>
                           </a>
                           <p>Managing Director</p>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="#" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="#" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-sm-6">
                     <div class="about_team_mumber">
                        <div class="about_team_mumber_img">
                           <a href="<?= base_url('teams/details');?>" class="abt_img_a">
                              <img src="<?= $frontend_assets; ?>images/team/003.jpg" class="w-100"/>
                           </a>
                        </div>
                        <div class="about_team_mumber_info">
                           <a href="<?= base_url('teams/details');?>">
                              <h5>Md. Atiqur Rahman</h5>
                           </a>
                           <p>Chief Operating Officer</p>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="#" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="#" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-sm-6">
                     <div class="about_team_mumber">
                        <div class="about_team_mumber_img">
                           <a href="<?= base_url('teams/details');?>" class="abt_img_a">
                              <img src="<?= $frontend_assets; ?>images/team/004.jpg" class="w-100"/>
                           </a>
                        </div>
                        <div class="about_team_mumber_info">
                           <a href="<?= base_url('teams/details');?>">
                              <h5>Sushanta Paul</h5>
                           </a>
                           <p>Key Account Manager (HRO)</p>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="#" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="#" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-sm-6">
                     <div class="about_team_mumber">
                        <div class="about_team_mumber_img">
                           <a href="<?= base_url('teams/details');?>" class="abt_img_a">
                              <img src="<?= $frontend_assets; ?>images/team/005.jpg" class="w-100"/>
                           </a>
                        </div>
                        <div class="about_team_mumber_info">
                           <a href="<?= base_url('teams/details');?>">
                              <h5>Md. Bahar Uddin Chowdhury </h5>
                           </a>
                           <p>Assistant Manager, Accounts</p>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="#" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="#" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-sm-6">
                     <div class="about_team_mumber">
                        <div class="about_team_mumber_img">
                           <a href="<?= base_url('teams/details');?>" class="abt_img_a">
                              <img src="<?= $frontend_assets; ?>images/team/006.jpg" class="w-100"/>
                           </a>
                        </div>
                        <div class="about_team_mumber_info">
                           <a href="<?= base_url('teams/details');?>">
                              <h5>Zinia Afroz Rumpa</h5>
                           </a>
                           <p>Recruitment Associate</p>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="#" class="fb_social">
                                 <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="tw_social">
                                 <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="in_social">
                                 <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="#" class="google_social">
                                 <i class="fab fa-google-plus-g"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
            <?php }?>

               

                <div class="row">
                  <div class="col-md-12">
                     <h3 class="main_title">
                     FDB Team Members
                  </h3>
                  </div>
                  <div class="col-md-12">
                     <img width="100%" src="<?php echo base_url('uploads/teams.png'); ?>" />
                  </div>
               </div>
               <!-- <div class="row mt-5 mb-4">
                  <div class="col-lg-12">
                     <nav aria-label="Page navigation example">
                       <ul class="pagination justify-content-center">
                         <li class="page-item disabled">
                           <a class="page-link" href="#" tabindex="-1">Previous</a>
                         </li>
                         <li class="page-item"><a class="page-link" href="#">1</a></li>
                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                         <li class="page-item"> <a class="page-link" href="#">Next</a></li>
                       </ul>
                     </nav>
                  </div>
               </div> -->
            </div>
         </div>   
      </div>

   </section>