 		<style>
 			[class*="js-conveyor-"] ul {
 				display: inline-block;
 				opacity: 0.5;
 			}

 			[class*="js-conveyor-"] ul li {
 				padding: 0 15px;
 				line-height: 35px;
 				font-size: 16px;
 			}
 		</style>



 		<!--SLIDER SECTION-->
 		<div class="pogoSlider tg-homeslidervone tg-homeslider tg-haslayout pogoSlider--dirCenterHorizontal" id="js-main-slider">

 			<?php
				$sliders = $this->site->whereRows('slider', 'status', 1, 'ASC');
				if ($sliders) {
					foreach ($sliders as $key => $slider) {
				?>
 					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500">
 						<div class="slider_pro_image">
 							<img class="w-100" src="<?= base_url('uploads/slider/' . $slider->image); ?>" alt="LOGO">
 						</div>
 						<div class="container">
 							<div class="row">
 								<div class="col-md-12">
 									<div class="tg-slidercontent">
 										<!-- <?= $slider->description; ?> -->
 										<!--  <a class="btn btn-success tg-btn" target="_self" href="<?= base_url('services'); ?>">Our
 		                            Services</a> -->
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>

 			<?php
					}
				}
				?>
 		</div>

 		<!-- BREAKING NEWS -->
 		<!-- <section class="breaking_mews_sec">
 		    <div class="container-fluid">
 		        <div class="row">
 		            <div class="col-md-2 col-sm-2 news_label">
 		                <span>FDB Updates</span>
 		            </div>
 		            <div class="col-md-10 col-sm-10 ticker_content">
 		                <div id="outer">
 		                    <div class="js-conveyor-example">
 		                        <ul>
 		                            <?php
										if ($tickerValueJob) {
											echo '<a class="jb_news_tkr" href=""><span>Jobs:  </span></a>';
											foreach ($tickerValueJob as $key => $jobValues) {
												echo '<a class="jb_news_dts" href="' . base_url('jobs/details/' . $jobValues->id) . '"><span> ' . $jobValues->positions . '...    </span></a>';
											}
											echo '<a href=""><span class="ns_bar_ticker">|</span></a>';
										}
										if ($tickerValues) {
											echo '<a class="nw_jb_news_tkr" href=""><span>News: </span></a>';
											foreach ($tickerValues as $key => $ticker) {
												if ($ticker->slug) {
													echo '<a class="jb_news_dts" href="' . base_url('news/details/' . $ticker->slug) . '"><span>' . $ticker->title . '...   </span></a>';
												} else {
													echo '<a class="jb_news_dts" href="' . base_url('news/news_details/' . $ticker->id) . '"><span>' . $ticker->title . '...   </span></a>';
												}
											}
											echo '<a href=""><span class="ns_bar_ticker">|</span></a>';
										}
										?>

 		                        </ul>
 		                    </div>
 		                </div>

 		            </div>
 		        </div>
 		    </div>
 		</section> -->
 		<!-- Call Action -->


 		<!-- 			<div class="container">    
    <div class="wrap">
    <div class="js-conveyor-example">
  <ul>
    <li>
      <span>Horizontal Ticker Animation In jQuery</span>
    </li>
    <li>
      <a href="#">
        <span>I am a <b>hyperlink</b></span>
      </a>
    </li>
    <li>
      <span>Conveyor Ticker</span>
    </li>
    <li>
      <span>A Simple jQuery plugin</span>
    </li>
  </ul>
</div>
</div>
</div> -->


 		<?php if (isset($_SESSION['member_id'])) { ?>
 			<section class="call_action_sec">
 				<div class="container">
 					<div class="row align-items-center">
 						<div class="col-md-8">
 							<h4>Looking for a job?</h4>
 							<p>Upload your Resume and build a career with us!</p>
 						</div>
 						<div class="col-md-4 text-right">
 							<a href="<?= base_url('jobs') ?>" class="btn btn-light white_btn">Apply Now</a>
 						</div>
 					</div>
 				</div>
 			</section>
 		<?php } ?>
 		<!-- Welcome Section -->
 		<section class="welcome_sec section_area">
 			<div class="container">
 				<div class="row align-items-center">
 					<div class="col-md-6">
 						<div class="section_title">
 							<h2 style="color:black">Welcome to Bitopi Group</h2>
 						</div>
 						<div class="section_content">
 							<p>We are GOLDEN INFOTECH, one of BD's leading companies for design & develop digital products.
 								We develop custom softwares, web and mobile applications led by our veterans! Our core
 								mission is your company’s drive for success in digital transformation and focused
 								unparalleled quality, effective communication, and transparent pricing.</p>
 							<p>Every product needs a team of passionate people who will give it their best and GOLDEN
 								INFOTECH teams are motivated all the way to ensure that. We help enterprises to accelerate
 								the adoption of new technologies, and enhance their business. We envision GOLDEN INFOTECH to
 								become the respected technology solutions for startups and existing enterprises.</p>
 						</div>
 					</div>
 					<div class="col-md-6">
 						<img src="<?= $frontend_assets; ?>/images/welcome_img.jpg" class="welcome_img img_shadow rounded w-100" alt="Welcome">
 					</div>
 				</div>
 			</div>
 		</section>

 		<!-- Services Section -->
 		<!-- <section class="services_sec section_area">
 		    <div class="container">
 		        <div class="row align-items-center">
 		            <div class="col-md-6">
 		                <div class="section_title">
 		                    <h2>We Serve Everywhere</h2>
 		                </div>
 		                <div class="section_content">
 		                    <p>Regardless of size, geography, or industry, you need visionary leaders and talented
 		                        individuals at all levels of your organization to secure growth, profitability, and
 		                        performance. We help you manage your workforce at every step of the employment life cycle for
 		                        better business results. From talent evaluation, leadership assessment, performance and
 		                        compensation management to workforce planning, we support your HR strategy.</p>
 		                    <a href="<?= base_url('services') ?>" class="btn btn-outline-primary mb-5">View All</a>
 		                </div>
 		            </div>
 		            <div class="col-md-6">
 		                <div class="row service_case_active case_arrow">
 		                    <?php if ($services) {
									$div = 0;
									$serviceCount = sizeof($services); ?>
 		                    <div class="col-xl-6">
 		                        <?php foreach ($services as $key => $service) {
										$div++; ?>
 		                        <div class="single_case popular_content">
 		                            <div class="service_box">
 		                                <div class="service_icon">
 		                                    <?php if ($service->icon) { ?>
 		                                    <span class="tg-planicon"> <?= $service->icon; ?></span>
 		                                    <?php } ?>
 		                                </div>
 		                                <div class="service_title">
 		                                    <h3><a
 		                                            href="<?= base_url('services/details/' . strtolower(str_replace(' ', '_', $service->title))); ?>"><?= $service->title ?>
 		                                        </a></h3>
 		                                </div>
 		                                <div class="service_content">
 		                                    <p><?= $service->short_descriptions ?></p>
 		                                </div>
 		                            </div>
 		                        </div>
 		                        <?php if ($div == 2) {
											$div = 0;
											echo '</div>';
											if ($serviceCount != $key + 1) {
												echo '<div class="col-xl-6">';
											}
										}
									} ?>
 		                    </div>
 		                    <?php } ?>
 		                </div>
 		            </div>
 		        </div>
 		    </div>
 		</section> -->

 		<!-- Training Section -->
 		<!-- Counter Section -->
 		<!-- Training Section -->

 		<!-- Counter Section -->

 		<!-- Current Jobs section -->
 		<section class="Current_Jobs_section">
 			<div class="container">
 				<div class="row">
 					<div class="col-md-12">
 						<div class="section_title text-center">
 							<h2 style="color:black;">Current Jobs</h2>
 						</div>
 					</div>
 				</div>
 				<div class="row current_job_case_active case_arrow ">
 					<?php if ($jobs) {
							foreach ($jobs as $key => $job) { ?>
 							<div class="col-lg-4">
 								<div class="current_jb_sec">
 									<img src="<?= base_url('uploads/jobs/' . $job->featured_image); ?>" class="w-100" alt="Jobs">
 									<div class="current_jb_info">
 										<h4 style="color:black;"><?= $job->positions; ?></h4>
 										<p><i class="fas fa-building"></i> Industry: <?= $job->industry; ?> </p>
 										<p><i class="fas fa-map-marker-alt"></i> Location:
 											<?= $job->location ? $job->location : ''; ?></p>
 										<?php $mre = json_decode($job->minimum_requirement);
											$minrequ = $this->site->whereIn('minimum_requirement', 'id', $mre);
											?>
 										<p><i class="fas fa-graduation-cap"></i> Qualification: <?php if ($minrequ) {
																										$dddd = '';
																										foreach ($minrequ as $key => $minreq) {
																											$dddd .= $minreq->title . ', ';
																										}
																										echo substr(trim($dddd), 0, -1);
																									} ?></p>
 										<a href="<?= base_url('jobs/details/' . $job->id); ?>" class="btn  btn_Apply_now" style="background-color:black; color:white">Apply
 											Now</a>
 									</div>
 								</div>
 							</div>
 						<?php }
						} else { ?>
 						<div class="col-lg-12 text-center">
 							<p>No Job Found!</p>
 						</div>
 					<?php } ?>
 				</div>
 				<!-- <div class="row">
			<?php if ($jobs) {
				foreach ($jobs as $key => $job) { ?>
					<div class="col-lg-4 col-md-4">
						<div class="current_jb_sec"> 
							<img src="<?= base_url('uploads/jobs/' . $job->featured_image); ?>" class="w-100" alt="Jobs">
							<div class="current_jb_info">
								<h4><?= $job->positions; ?></h4>
								<p><i class="fas fa-building"></i> Industry : <?= $job->industry; ?> </p>
								<p><i class="fas fa-map-marker-alt"></i> Location : <?= $job->location ? $job->location : ''; ?></p>
								<?php $mre = json_decode($job->minimum_requirement);
								$minrequ = $this->site->whereIn('minimum_requirement', 'id', $mre);
								?>
								<p><i class="fas fa-graduation-cap"></i> Qualification :  <?php if ($minrequ) {
																								$dddd = '';
																								foreach ($minrequ as $key => $minreq) {
																									$dddd .= $minreq->title . ', ';
																								}
																								echo substr(trim($dddd), 0, -1);
																							} ?> </p>
								<a href="<?= base_url('jobs/details/' . $job->id); ?>" class="btn btn-primary btn_Apply_now">Apply Now</a>
							</div>
						</div>
					</div>
				<?php }
			} else { ?> 
				<div class="col-lg-12 text-center"><p>No Job Found!</p></div>
			<?php } ?>
		</div> -->
 				<div class="row">
 					<div class="col-md-12 text-center">
 						<?php if ($jobs) {  ?>
 							<a href="<?= base_url('jobs') ?>" class="btn  btn_View_all text-center" style="background-color:black; color:white">
 								View All Jobs
 							</a>
 						<?php } ?>
 					</div>
 				</div>
 			</div>
 		</section>
 		<!-- <section class="Our_partners_section">
 		    <div class="container">
 		        <div class="row">
 		            <div class="col-md-12">
 		                <div class="section_title text-center">
 		                    <h2>Our Partners</h2>
 		                </div>
 		            </div>
 		        </div>
 		        <div class="row case_active case_arrow ">
 		            <div class="col-xl-3">
 		                <?php if ($clients) {
								$clientsCount = sizeof($clients);
								$incemrnt = 0;
								foreach ($clients as $key => $client) {
									$incemrnt++; ?>
 		                <div class="single_case popular_content">
 		                    <div class="case_img">
 		                        <img src="<?= base_url('uploads/company/') . $client->logo; ?>" alt="case_1" />
 		                    </div>
 		                </div>
 		                <?php if ($incemrnt == 2) {
										$incemrnt = 0;
										echo '</div>';
										if ($clientsCount != ($key + 1)) {
											echo '<div class="col-xl-3 ' . $key . $clientsCount . '">';
										}
									}
								}
							} ?>
 		            </div>
 		        </div>
 		</section> -->
 		<!-- FDB News Section -->

 		<!-- Testimonial -->


 		<!-- Testimonial -->




 		<!-- Testimonial -->
 		<!-- <section class="testimonial-section2">
			<div class="row text-center">
				<div class="col-12">
					<div class="section_title text-center">
								<h2>Testimonial</h2>
							</div>
				</div>
			</div>
			<div id="testim" class="testim">
				<div class="wrap">

					<span id="right-arrow" class="arrow right "></span>
					<span id="left-arrow" class="arrow left  "></span>
					<ul id="testim-dots" class="dots">
	                    <li class="dot active"></li>
	                    <li class="dot"></li>
	                    <li class="dot"></li>
	                    <li class="dot"></li>
	                    <li class="dot"></li>
	            	</ul>
	            <div id="testim-content" class="cont">                    
	            	<div class="active">
	            		<div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg" alt=""></div>
	            		<div class="h4">Kellie</div>
	            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
	            	</div>

	            	<div>
	            		<div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>
	            		<div class="h4">Jessica</div>
	            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
	            	</div>

	            	<div>
	            		<div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>
	            		<div class="h4">Kellie</div>
	            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
	            	</div>

	            	<div>
	            		<div class="img"><img src="https://image.ibb.co/kL6AES/Top_SA_Nicky_Oppenheimer.jpg" alt=""></div>
	            		<div class="h4">Jessica</div>
	            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
	            	</div>

	            	<div>
	            		<div class="img"><img src="https://image.ibb.co/gUPag7/image.jpg" alt=""></div>
	            		<div class="h4">Kellie</div>
	            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
	            	</div>

		        </div>
		        </div>
		    </div>
	    
		</section> -->
 		<!-- Testimonial -->





 		<!-- Modal -->
 		<div id="myModal001" class="modal fade" role="dialog">
 			<div class="modal-dialog">

 				<!-- Modal content-->
 				<div class="modal-content  home_modal_pop">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal">&times;</button>

 					</div>
 					<div class="modal-body">
 						<h4 class="sub_title">Basic Training</h4>
 						<ul>
 							<li class="course_info"><a href="#">Basic Selling Skills Training Course (BSSTC)</a></li>
 							<li class="course_info"><a href="#">Advance Selling Skills Training Course (ASSTC)</a></li>
 							<li class="course_info"><a href="#">Communication & Negotiation Skills</a></li>
 							<li class="course_info"><a href="#">Segmentation and Targeting (S&T)</a></li>
 							<li class="course_info"><a href="#">Key Account Management (KAM)</a></li>
 							<li class="course_info"><a href="#">Pharma Sales Territory Management, Etiquette & Grooming</a>
 							</li>
 						</ul>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 					</div>
 				</div>

 			</div>
 		</div>
 		<!-- Modal -->
 		<div id="myModal002" class="modal fade" role="dialog">
 			<div class="modal-dialog">

 				<!-- Modal content-->
 				<div class="modal-content home_modal_pop">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body">
 						<h4 class="sub_title">Introductory & Onboarding Training for Pharma Sales Forces</h4>
 						<ul>
 							<li class="course_info"><a href="#">Field Training for Fresher’s: Attachment with respective Co.
 									Field Officers. </a></li>
 							<li class="course_info"><a href="#">Anatomy, Physiology & Other system of Human body</a></li>
 							<li class="course_info"><a href="#">Microbiology, Human diseases and other medical part</a></li>
 							<li class="course_info"><a href="#">Company Products, Marketing & Sales strategy (collaboration
 									with respective Company).</a></li>
 						</ul>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 					</div>
 				</div>

 			</div>
 		</div>
 		<!-- Modal -->
 		<div id="myModal003" class="modal fade" role="dialog">
 			<div class="modal-dialog">

 				<!-- Modal content-->
 				<div class="modal-content home_modal_pop">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body">
 						<h4 class="sub_title">Leadership & Field Coaching Training for Pharma Field Managers</h4>
 						<ul>
 							<li class="course_info"><a href="#">Basic Leadership </a></li>
 							<li class="course_info"><a href="#">Situational Leadership </a></li>
 							<li class="course_info"><a href="#">Field Coaching </a>
 								<ul>
 									<li><a href="#">Self-Development</a></li>
 									<li><a href="#">Team Development</a></li>
 									<li><a href="#">Business Development</a></li>
 								</ul>
 							</li>
 							<li class="course_info"><a href="#">Presentation Skills & Negotiation Skills</a></li>
 						</ul>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 					</div>
 				</div>

 			</div>
 		</div>
 		<!-- Modal -->
 		<div id="myModal004" class="modal fade" role="dialog">
 			<div class="modal-dialog">

 				<!-- Modal content-->
 				<div class="modal-content home_modal_pop">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body">
 						<h4 class="sub_title">Assessment Center</h4>
 						<ul>
 							<li class="course_info"><a href="#">Assessment for Existing team to identify improvement area</a>
 							</li>
 							<li class="course_info"><a href="#">Assessment center for new joiners for the best fit.</a></li>
 						</ul>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 					</div>
 				</div>

 			</div>
 		</div>

 		<!-- <div class="col-lg-3 col-md-12 training_course mt-5" >
											<h4 class="sub_title">Basics</h4>
											<ul>
												<li class="course_info"><a href="#">Comprehensive Basic Sales Training</a></li>
												<li class="course_info"><a href="#">Advance Sales Training</a></li>
												<li class="course_info"><a href="#">Communication & Negotiation Skills</a></li>
												<li class="course_info"><a href="#">Segmentation and Targeting (S&T) and Key Account Management</a></li>
												<li class="course_info"><a href="#">Self Development</a></li>
												<li class="course_info"><a href="#">Soft Skill Development</a></li>
											</ul>
											<h4 class="sub_title">Advance & Leadership</h4>
											<ul>
												<li class="course_info"><a href="#">Basic Leadership</a></li>
												<li class="course_info"><a href="#">Situational Leadership</a></li>
												<li class="course_info"><a href="#">Field Coaching</a></li>
												<li class="course_info"><a href="#">Comprehensive Leadership</a></li>
												<li class="course_info"><a href="#">Business Planning & Development</a></li>
												<li class="course_info"><a href="#">Sales Strategy & Customer Loyalty</a></li>
												<li class="course_info"><a href="#">cost reduction/revenue enhancement programs</a></li>
												<li class="course_info"><a href="#">Functional Skill Development</a></li>
												<li class="course_info"><a href="#">Team Building</a></li>	
											</ul>
										</div>

										<div class="col-lg-3 col-md-12 training_course mt-5">
											<h4 class="sub_title">Specialized (For Pharmaceuticals Beginners)</h4>
											<ul>
												<li class="course_info"><a href="#">Onboarding Training with </a>
													<ul>
														<li><a href="#">Begins with Field Attachment </a></li>
														<li><a href="#">Human Body System, Disease & Medical Part</a></li>
														<li><a href="#">Company Product & Competitor's product</a></li>
														<li><a href="#">Basic Selling Skills</a></li>
													</ul>
												</li>
											</ul>
											<h4 class="sub_title">Assessment Center</h4>
											<ul>
												<li class="course_info"><a href="#">Assessment for Existing team to identify improvement area</a></li>
												<li class="course_info"><a href="#">Assessment center for new joiners for the best fit.</a></li>
											</ul>

									 <h4 class="sub_title">Ongoing Tranings</h4>
									
									</div> -->