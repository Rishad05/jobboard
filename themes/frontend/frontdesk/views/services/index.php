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
                                    <h1 style="color:#ffffff">Service<br>
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
      <section class="content_section service mt-5 mb-5">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="tg-sectionhead">
                     <div class="tg-sectiontitle">
                        <h3>Your Business Always Need</h3>
                     </div>
                     <div class="tg-description text-center">
                        Regardless of size, geography, or industry, you need visionary leaders and talented individuals at all levels of your organization to secure growth, profitability, and performance. We help you manage your workforce at every step of the employment life cycle for better business results. From talent evaluation, leadership assessment, performance and compensation management to workforce planning, we support your HR strategy.                              
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php if($services){
                  foreach ($services as $key => $service) { ?>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-plan">
                           <figure class="tg-planimg"> 
                              <a href="<?= base_url('services/details/'.strtolower(
                                            str_replace(' ','_',$service->title) ));?>">
                              <img src="<?= base_url('uploads/services/'.$service->thumbnail); ?>" alt="Service Image"> 
                           </a>
                           </figure>
                           <div class="tg-plancontent">
                               <span class="tg-planicon"> <?= $service->icon ?></span>
                              <div class="tg-titledescription">
                                 <div class="tg-plantitle">
                                    <h3>
                                       <a href="<?= base_url('services/details/'.strtolower(
                                            str_replace(' ','_',$service->title) ));?>"><?= $service->title; ?></a>
                                    </h3>
                                 </div>
                                 <!-- <div class="tg-description"> <?= $service->short_descriptions?></div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php }
               } ?> 
            </div>
         </div>
      </section>