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
                                <h1 style="color:#ffffff">Training<br>
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
                         <a href="<?=base_url('')?>">Home </a></li>
                         <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                     <li class="0-item"> Training </li> 
                 </ol>
             </div>
         </div>
      </div>
    </div>
</section>
<section class="content_section training_main_section mt-5 mb-5">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				<div class="tg-sectiontitle text-center">
                    <h3>Life Changing Training </h3>
                 </div>
                 <div class="tg-description text-center">
                    To strengthen employees’ expertise, FDB ensures life changing training session which enhances people knowledge, networking power, perception etc. These training sessions help people to grow and make better persons than yesterday.                           
                 </div>
  			</div>
  		</div>
  		<div class="row mt-5">
  			<div class="col-lg-3 col-md-4 col-sm-4">
       <div class="widget_section trai_widget fbd_offers_main">
        <h3 class="sub_title" >FDB Offers</h3>
      <ul>
      <?php 
          $offers = $this->site->whereRows('fdb_offers','status',1,'ASC');
          if($offers){ 
            foreach ($offers as $key => $offer) { ?>
            <li class="widget_link">
            <span class="icon_home_tra_pg"><i class="fas fa-chevron-right"></i> </span>
            <a href="<?= base_url('fdb_offers/index/'.$offer->id)?>"><?= $offer->title ?></a></li>   
          </a>
        <?php } } ?>    
      </ul>
   </div>
   <div class="widget_section">
      <div class="widget_contact">
         <h5>We are Here to HELP!</h5>
         <P>Connect with nation's enormous service community Frontdesk Bangladesh Limited Getting in Touch is easy Free Registration here.</P>
         <div class="hr_hifen"></div>
         <a href="<?=base_url('contacts')?>">Contact Now</a>
      </div>
   </div>   
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8">
          <div class="row">
            <?php if($allTraining){?>
            <?php foreach ($allTraining as $key => $training) { ?>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="traning_secs_contant">
                  <div class="traning_secs_imgs">
                    <?php if($training->image){?>
                      <?php if($training->slug){ ?>
                      <a href="<?=base_url('training/details/' . $training->slug);?>"> 
                      <img src="<?= base_url('uploads/training/'.$training->image); ?>" class="w-100" alt="Training"></a>
                    <?php } else { ?>
                      <a href="<?=base_url('training/detail/' . $training->id);?>"> 
                      <img src="<?= base_url('uploads/training/'.$training->image); ?>" class="w-100" alt="Training"></a>
                    <?php } ?>
                  <?php } ?>  
                  </div> 
                  <div class="traning_titles_main">
                    <?php if($training->slug){ ?>
                    <h4><a href="<?=base_url('training/details/' . $training->slug);?>"><?= $training->title; ?></a></h4>
                    <?php } else { ?>
                      <h4><a href="<?=base_url('training/detail/' . $training->id);?>"><?= $training->title; ?></a></h4>
                      <?php } ?>
                    <div class="training_time_cal">
                      <p><span class="f_icon_section"><i class="far fa-calendar-alt"></i></span><?= date('M d, Y', strtotime($training->start_date)); ?> </p>
                      <p><span class="f_icon_section"><i class="fas fa-map"></i></span> <?= $training->venue; ?></p>
                    </div>
                    <div class="hr_divs"></div>
                    <div class="traning_details">
                      <?php if($training->slug){ ?>
                        <a href="<?=base_url('training/details/' . $training->slug);?>" class="btn btn-outline-primary btn_Read_more">Read More</a>
                      <?php } else { ?>
                        <a href="<?=base_url('training/detail/' .  $training->id);?>" class="btn btn-outline-primary btn_Read_more">Read More</a>
                      <?php } ?>
                      
                      <!-- <a href="<?= base_url('training/detail/'. $training->id);?>"> Detail</a> -->
                      <!-- <a href="<?= base_url('training/details/'.strtolower(
                                              str_replace(' ','_',$training->title) ));?>"> Detail</a> -->
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php } ?> 
          </div>
          <div class="row mt-5 mb-4">
              <div class="col-lg-12">
                 <nav aria-label="Page navigation example">
                  <?=$this->pagination->create_links();?>
                </nav>
              </div>
            </div> 
        </div>       







  			<!--
  			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  				<div class="traning_secs_contant">
  					<div class="traning_secs_imgs">
  						<img src="<?= $frontend_assets; ?>images/training/001.jpg" class="w-100" alt="Training">
  						<span class="traning_tags free ">Free</span>
  						<span class="traning_tags buy_now action">Buy Now</span>
  					</div>
  					<div class="traning_prices">
  						<span class="ammount_money">
  							
  							<p class="starting">starting</p>
  						</span>
  					</div>
  					<div class="traning_titles_main">
  						<h4><a href="#">Make A Deal With Your Future</a></h4>
  						<div class="training_time_cal">
  							<p><span class="f_icon_section"><i class="far fa-calendar-alt"></i></span> November 1, 2017</p>
  							<p><span class="f_icon_section"><i class="fas fa-map"></i></span> Dhaka / Bangladesh</p>
  						</div>
  						<div class="hr_divs"></div>
  						<div class="traning_details">
  							<a href="<?= base_url('training/details') ?>"> Detail</a>
  						</div>
  					</div>

  				</div>
  			</div>

  			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  				<div class="traning_secs_contant">
  					<div class="traning_secs_imgs">
  						<img src="<?= $frontend_assets; ?>images/training/002.jpg" class="w-100" alt="Training">
  						<span class="traning_tags free action">Free</span>
  						<span class="traning_tags buy_now">Buy Now</span>
  					</div>
  					<div class="traning_prices">
  						
  					</div>
  					<div class="traning_titles_main">
  						<h4><a href="#">Building on the Best</a></h4>
  						<div class="training_time_cal">
  							<p>
  								<span class="f_icon_section"><i class="far fa-calendar-alt"></i></span> 
  							November 20, 2017</p>
  							<p><span class="f_icon_section"><i class="fas fa-map"></i></span> 
  							Dhaka / Bangladesh</p>
  						</div>
  						<div class="hr_divs"></div>
  						<div class="traning_details">
  							<a href="<?= base_url('training/details') ?>"> Detail</a>
  						</div>
  					</div>

  				</div>
  			</div>

  			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  				<div class="traning_secs_contant">
  					<div class="traning_secs_imgs">
  						<img src="<?= $frontend_assets; ?>images/training/003.jpg" class="w-100" alt="Training">
  						<span class="traning_tags free ">Free</span>
  						<span class="traning_tags buy_now">Buy Now</span>
  					</div>
  					<div class="traning_prices">
  						<span class="ammount_money"> 
  							<p class="starting">starting</p>
  						</span>
  					</div>
  					<div class="traning_titles_main">
  						<h4><a href="#">Breakthrough Performance</a></h4>
  						<div class="training_time_cal">
  							<p><span class="f_icon_section"><i class="far fa-calendar-alt"></i></span> July 21, 2017</p>
  							<p><span class="f_icon_section"><i class="fas fa-map"></i></span> Dhaka / Bangladesh</p>
  						</div>
  						<div class="hr_divs"></div>
  						<div class="traning_details">
  							<a href="<?= base_url('training/details') ?>"> Detail</a>
  						</div>
  					</div>

  				</div>
  			</div>

  			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  				<div class="traning_secs_contant">
  					<div class="traning_secs_imgs">
  						<img src="<?= $frontend_assets; ?>images/training/004.jpg" class="w-100" alt="Training">
  						<span class="traning_tags free action">Free</span>
  						<span class="traning_tags buy_now">Buy Now</span>
  					</div>
  					<div class="traning_prices">
  						<span class="ammount_money"> 
  							<p class="starting">starting</p>
  						</span>
  					</div>
  					<div class="traning_titles_main">
  						<h4><a href="#">Be Extraordinary</a></h4>
  						<div class="training_time_cal">
  							<p><span class="f_icon_section"><i class="far fa-calendar-alt"></i></span> November 11, 2017</p>
  							<p><span class="f_icon_section"><i class="fas fa-map"></i></span> Dhaka / Bangladesh</p>
  						</div>
  						<div class="hr_divs"></div>
  						<div class="traning_details">
  							<a href="<?= base_url('training/details') ?>"> Detail</a>
  						</div>
  					</div>

  				</div>
  			</div> -->
  		</div>
  	</div>
</section>