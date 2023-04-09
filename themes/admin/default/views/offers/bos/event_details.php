<!-- SUB-HEADER SECTION -->
 	<section class="sub_header_sec">
 		<div class="container">
 			<div class="row clearfix">
 				<div class="col-md-12 text-center">
 					<div class="sub_header">
 						<h2>Event Details</h2>
 					</div>
 					<div class="breadcrumb_menu">
 						<ul class="list-inline">
 							<li><a href="<?php echo base_url(); ?>">Home</a></li>
 							<li><span>Event Details</span></li>
 						</ul>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- SUB-HEADER SECTION  END-->

 	<!-- CONTENT SECTION -->
 	<div class="content_area">
 		<div class="container">
 			<!-- WITH SIDEBAR CONTENT AREA -->
 			<div class="row content_holder clearfix">
 				<div class="col-md-8">
 					<!-- NEWS SINGLE CONTENT SECTION -->
 					<div class="section_area news_single_content">
 						<div class="section_content">
 							<h2><?php echo $info->title; ?></h2>
 							<div class="news_img_holder">
 								<img src="<?php echo base_url('uploads/event/'.$info->event_img); ?>" alt="News Image" class="w-100">
 								
 							</div>
 							
 							<div class="sub_header">
 								<h2><?php echo $info->title; ?></h2>
 							</div>
 							<p></p><?php echo $info->details; ?></p>
 							<div class="sharethis-inline-share-buttons"></div>
 						</div> 
 						
 					</div>
 					<!-- NEWS SINGLE CONTENT SECTION END -->
 				</div>
 				<div class="col-md-4">
 					 <?php $this->tec->right_bar(); ?>
 				</div>
 			</div>
 			<!-- WITH SIDEBAR CONTENT AREA END -->

 			<!-- LOGO AREA -->
 			
 			<!-- LOGO AREA END -->
 		</div>
 	</div>
 	<!-- CONTENT SECTION END -->

 	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d26dd0947eb1a0012ad361c&product='inline-share-buttons' async='async'></script>