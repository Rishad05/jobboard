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
                                    <h1 style="color:#ffffff">Contact Us<br>
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
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- SUB-HEADER SECTION  END-->
      <section class="content_section About_us_section contact_page_main mt-5 mb-3">
         <div class="container">
            <?php if($error)  { ?>
           <div class="alert alert-danger alert-dismissable">
             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
             <h4><i class="icon fas fa-ban"></i>
               <?= lang('error'); ?>
             </h4>
             <?= $error; ?>
           </div>
           <?php } if($warning) { ?>
           <div class="alert alert-warning alert-dismissable">
             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
             <h4><i class="icon fas fa-warning"></i>
               <?= lang('warning'); ?>
             </h4>
             <?= $warning; ?>
           </div>
           <?php } if($message) { ?>
           <div class="alert alert-success alert-dismissable">
             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
             <h4> <i class="icon fas fa-check"></i>
               <?= lang('Success'); ?>
             </h4>
             <?= $message; ?>
           </div>
           <?php } ?>
            <div class="row">
               <aside class="col-lg-4 col-md-4 col-sm-4 pull-left">
                  <div class="sc-contact-detail tg-contactus  ">
                     <div class="contact-detail-main">
                        <div class="tg-sectionhead">
                           <div class="tg-sectiontitle text-left">
                              <h2>Contact Details</h2>
                           </div>
                           <div class="tg-description text-left">
                              <p>
                                 Please find our contact information below.
                              </p>
                           </div>
                        </div>
                        <ul class="tg-contactinfo">
                           <li>
                              <span class="tg-infotitle">Office Address&nbsp;:</span>
                              <address><?=$Settings->address?>
                              </address>
                           </li>
                           <li>
                              <span class="tg-infotitle">Phone&nbsp;:</span>
                              <div class="tg-detailbox">
                                 <span class="tg-phone"><?=$this->Settings->tel?></span>
                                 <span class="tg-fax"><?=$this->Settings->phone_number?></span>
                              </div>
                           </li>
                           <li>
                              <span class="tg-infotitle">Email&nbsp;:</span>
                              <div class="tg-detailbox">
                                 <span class="tg-email">
                                 <a href="mailto:<?=$this->Settings->default_email?>"><?=$this->Settings->default_email?></a>
                                 </span>
                                 <!-- <span class="tg-support">
                                 <a href="mailto:support@frontdeskbd.com">support@frontdeskbd.com</a>
                                 </span> -->
                              </div>
                           </li>
                        </ul>
                        <div class="tg-follow">
                           <span class="tg-infotitle">follow&nbsp;:</span>
                           <div class="footer_social_icon about_social_icon" >
                              <a href="<?=$this->Settings->facebook?>" class="fb_social">
                              <i class="fab fa-facebook-f"></i>
                              </a>
                              <!-- <a href="<?=$this->Settings->twitter?>" class="tw_social">
                              <i class="fab fa-twitter"></i>
                              </a> -->
                              <a href="<?=$this->Settings->linkedin?>" class="in_social">
                              <i class="fab fa-linkedin-in"></i>
                              </a> 
                           </div>
                        </div>
                     </div>
                  </div>
               </aside>
               <div class="col-lg-8 col-md-8 col-sm-8">
                  <div class="sc-contact-form tg-contactus  ">
                     <div id="tg-content" class="tg-content">
                        <div class="tg-sectionhead">
                           <div class="tg-sectiontitle text-left">
                              <h2>Keep In Touch</h2>
                           </div>
                           <div class="tg-description text-left">
                              <p> Frontdesk Bangladesh Limited is a full service management consultancy offering focused expertise in human resource management.
                              Based Dhaka, Bangladesh, the firm delivers comprehensive human resource management solutions and services nationwide, all benchmarked with professional best practices. </p>
                           </div>
                           <div class="section_area contact_form abou_dtl_titl_form">
                              <div class="section_content">
                                 <?=form_open_multipart("", 'class="validation"');?>
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
                                    <div class="form-row mb-3">
                                       <div class="col-md-12">
                                          <div class="upload-btn-wrapper cont_us_up_btns">
                                             <button class="btn">Upload a file</button>
                                             <input type="file" name="userfile" /> <label>Attach CV (only doc|docx|pdf file)</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-row">
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
               </div>
            </div>
         </div>
      </section>
      <section class="g_map_full">
        <div class="container-fluid">
          <div class="row">

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.201226365482!2d90.4096860149825!3d23.81144248455934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c6fff189fb1f%3A0x7500a9126e541678!2sHouse%23%20363%2C%20492%2F5%20Lane%20-%209%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1567767733140!5m2!1sen!2sbd" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

          </div>
        </div>
      </section>