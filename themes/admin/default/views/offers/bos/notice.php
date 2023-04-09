
	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2><?php echo $page_title; ?></h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="<?php echo base_url(); ?>">Home</a></li>

							<li><span><?php echo $page_title; ?></span></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- SUB-HEADER SECTION  END-->



	<!-- CONTENT SECTION -->

	<div class="content_area">
		<?php $status = $this->site->checksitebar(array('slug'=>'notice')); ?>
		<div class="container">

			<!-- WITH SIDEBAR CONTENT AREA -->

			<div class="row content_holder clearfix">

				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">

					<!-- NEWS SINGLE CONTENT SECTION -->

					<div class="section_area news_single_content">

						<div class="section_content">
							 <div class="section_area about_sec">
										<div class="section_title">
											<h2>Notice and Circular</h2>
										</div> 
										<div class="section_content">
											<ul class="notice_list list-inline">
												<?php foreach ($info as $value) { ?>
												<li class="single_notice_list">
													<div class="recent_notice_date">
														<span><!-- <i class="far fa-dot-circle"> --><i class="fas fa-calendar-alt"></i> 13 Jun,2019</span>
													</div>
													<a href="<?php echo base_url('notice/details/'.$value->id); ?>"><?php echo $value->title; ?></a>
												</li>
												<?php } ?>
											</ul>
										</div>
									</div>
						</div>

					</div>

					<!-- NEWS SINGLE CONTENT SECTION END -->

				</div>

				







				<?php if($status != 'no'){ ?>
				<div class="col-md-4">

					 <?php echo $this->tec->right_bar(); ?>

				</div> 
				<?php } ?>

			</div>

			<!-- WITH SIDEBAR CONTENT AREA END -->



			<!-- LOGO AREA -->

			

			<!-- LOGO AREA END -->

		</div>

	</div>

	<!-- CONTENT SECTION END -->