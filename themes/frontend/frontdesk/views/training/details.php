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
                                <h1 style="color:#ffffff"><?=$trainers->title ? $trainers->title : '';?><br>
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
		            <li class="0-item">
		                <a href="<?=base_url('training');?>">Training</a></li>
                    <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
		            <li class="last-item"><?=$trainers->title ? $trainers->title : '';?></li> 
		        </ol>
              </div>
           </div>
        </div>
     </div>
</section>
<section class="content_section About_us_section mt-5 mb-5">
	<div class="container">
		<div class="row">
			<aside class="col-lg-3 col-md-4 col-sm-4 pull-left widget_main">
       <div class="widget_section"> 

          <ul>
            <?php foreach ($sitebarTraining as $key => $value) {  ?>
              <li class="widget_link <?php if($value->slug == $this->uri->segment(3)){echo 'active';} ?>"><a href="<?= base_url('training/details/'.$value->slug); ?>"><?= $value->title; ?></a></li>
              <?php } ?>
             
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
			</aside>
			<div class="col-lg-9 col-md-8 col-sm-8 mt-3">
				<div class="about_section_main">
					<h3 class="main_title">
						Introduction
					</h3>
					<p class="main_decs">
						<?=$trainers->description ? $trainers->description : '';?>
					</p>
					<p class="tran_meta">
					    <?php if($trainers->participant){ ?>
					    <span>Participant : <?= $trainers->participant; ?> </span> </br>
					    
					    <?php } if($trainers->venue){ ?>
						    <span>Venue : <?=$trainers->venue ? $trainers->venue : '';?></span></br> 
						<?php } ?>
						<span>Date : <?=date('d F', strtotime($trainers->start_date)) . ' - ' . date('d F Y', strtotime($trainers->end_date));?></span> </br>
            <?php if($trainers->total_class){ ?>
						<span>Total Days : <?=$trainers->total_class ? $trainers->total_class : '';?></span></br>
            <?php } if($trainers->total_hours){ ?>
						<span>Total Hours : <?= $trainers->total_hours;?></span></br>
            <?php } if($trainers->class_schedule){ ?>
						<span>Training Schedule : <?= $trainers->class_schedule ? $trainers->class_schedule : '';?></span></br>
            <?php }  ?>
					</p>
					<?php if($trainers->course_objectives){ ?>
          <h4>Training Objectives</h4>
          <?php } ?>
					<p> <?= $trainers->course_objectives ? $trainers->course_objectives : '' ;?></p>
					<?php if($trainers->course_outline) { ?>
            <h4>Training Outline</h4>
          <?php } ?>
					<p><?=$trainers->course_outline ? $trainers->course_outline : '';?></p>
				</div>

				<div class="share_icon_btns">
					<div class="share-icon">

						   <div class="tg-follow">
                        <span class="tg-infotitle">Share With&nbsp;:</span>  
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5db1961558fa269f"></script> 
                         <div class="addthis_inline_share_toolbox"></div>

                      	<!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d7f66f3ab6f1000123c8f21&product=inline-share-buttons' async='async'></script>
                       <div class="sharethis-inline-share-buttons"></div> -->
                       <!-- <div class="footer_social_icon about_social_icon" >

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
                       </div> -->
                    </div>

						</div>
				</div>

			</div>
		</div>
	</div>
</section>