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
                              <h1 style="color:#ffffff">FDB Offers<br>
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
                  <li class="last-item">FDB Offers</li>
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
               <div class="nav flex-column nav-pills fbd_offers_main_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <?php
                  
                  if($offers){ 
                    foreach ($offers as $key => $offer) { ?> 
                  <a class="nav-link <?php if($this->uri->segment(3) == $offer->id){echo 'active';} ?> " id="v-pills<?= $offer->id ?>-tab" data-toggle="pill" href="#v-pills-<?= $offer->id ?>" role="tab" aria-controls="v-pills-<?= $offer->id ?>">
                   <span class="icon_home_tra_pg"><i class="fas fa-chevron-right"></i> </span>  <?= $offer->title ?>
                  </a>
                <?php } } ?>  
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
                  <?php if($offers){ 
                    foreach ($offers as $key => $offer) { ?> 
                  <div class="tab-pane fade show <?php if($this->uri->segment(3) == $offer->id){echo 'active show';} ?>" id="v-pills-<?= $offer->id ?>" role="tabpanel" aria-labelledby="v-pills-<?= $offer->id ?>-tab">
                    <div class="about_Our_Mission">
                        <h3 class="main_title">
                           <?= $offer->title ? $offer->title : ""; ?>
                        </h3>
                        <p class="main_decs">           
                           <?= $offer->content ? $offer->content : ""; ?>
                        </p> 
                    </div>
                  </div>
                 <?php } } ?> 
                </div>
              </div>
            </div>
    
         </div>
   </div>   
</div>

</section>