 

 	<!-- SUB-HEADER SECTION -->
 	<section class="sub_header_sec">
 		<div class="container">
 			<div class="row clearfix">
 				<div class="col-md-12 text-center">
 					<div class="sub_header">
 						<h2>Events</h2>
 					</div>
 					<div class="breadcrumb_menu">
 						<ul class="list-inline">
 							<li><a href="index.html">Home</a></li>
 							<li><span>Events</span></li>
 						</ul>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- SUB-HEADER SECTION  END-->

 	<!-- CONTENT SECTION -->
 	<div class="content_area">
 		<?php 
 		$status = $this->site->checksitebar(array('slug'=>'events')); ?>
 		<div class="container">
 			<!-- FULL WIDTH CONTENT AREA -->
 			<div class="row content_holder clearfix">
 				<!-- LATEST NEWS SECTION -->
 				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?> section_area news_sec ">
 					<div class="section_content">
 						<div class="row clearfix news_boxes">
 							<?php  
 							foreach ($info as $key => $value) { 
 							?>
 							 <div class="col-md-12">
								<div class="news_box clearfix">
									<div class="news_img">
										<img src="<?= base_url('uploads/event/'.$value->event_img); ?>" alt="POST IMAGE" class="w-100">
									</div>
									<div class="news_content">
										<span><i class="fas fa-calendar-alt"></i></i> <?php echo $this->tec->hrld($value->start_date.' '.$value->start_time); ?></span>
										<h3 class="news_title"><a href="<?php echo base_url('event/event_details/'.$value->event_id); ?>"><?= $value->title; ?></a></h3>
										
										<p class="news_desc"><?php 
										 
												echo substr($value->details, 0, 150) . '...';  
										?> 	
										</p>
										<a href="<?php echo base_url('event/event_details/'.$value->event_id); ?>" class="more_link btn btn-primary btn_small">View More</a>
										<a href="<?php echo base_url('home/event_booking/'.$value->event_id); ?>" class="more_link btn btn-primary btn_small">Register this Event</a>
									</div>
								</div>
							</div>
 							<?php } ?>
 						</div>
 					</div>
 				</div>

 				<?php if($status != 'no'){ ?>
				<div class="col-md-4">

					 <?php echo $this->tec->right_bar(); ?>

				</div> 
				<?php } ?>
 				<!-- LATEST NEWS SECTION END -->
 			</div>
 			<!-- FULL WIDTH CONTENT AREA END -->

 			<!-- LOGO AREA -->

 			<!-- LOGO AREA END -->
 		</div>

				
 	</div>
 	<!-- CONTENT SECTION END -->

 	