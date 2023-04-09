<!-- SUB-HEADER SECTION -->
	<section class="sub_header_sec">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<div class="sub_header">
						<h2>Training Programme</h2>
					</div>
					<div class="breadcrumb_menu">
						<ul class="list-inline">
							<li><a href="index.html">Home</a></li>
							<li><span>Training Programme</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SUB-HEADER SECTION  END-->

	<!-- CONTENT SECTION -->
	<div class="content_area">
		<?php $status = $this->site->checksitebar(array('slug'=>'training')); ?>
		<div class="container">
			<!-- WITH SIDEBAR CONTENT AREA -->
			<div class="row content_holder clearfix">
				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
					<!-- LATEST NEWS SECTION -->

						<div class="section_area news_sec news_page">

							<div class="section_content">

								<div class="row clearfix news_boxes">

									<?php foreach ($info as $key => $value) {  ?>

									<div class="col-md-6">

										<div class="news_box">

											<div class="news_img">
												<a href="<?= base_url('training/details/'.$value->id); ?>">
													<img src="<?= base_url('uploads/training/'.$value->image); ?>" alt="POST IMAGE" class="w-100">
												</a>

											</div>

											<div class="news_content">

												<h3 class="news_title"><a href="<?= base_url('training/details/'.$value->id); ?>"><?= $value->title; ?></a></h3>
												<span></span>
												<p class="news_desc">
													 <?= $value->description; ?>
												</p>
												<p class="tran_meta">
													<span><i class="fas fa-calendar-alt"></i> <?= date('d F', strtotime($value->start_date)).' - '. date('d F Y', strtotime($value->end_date)); ?> </span>
													<span><i class="fas fa-clock"></i> Total Dayes : <?= $value->total_hours; ?></span>
												</p> 
												<a href="<?= base_url('training/details/'.$value->id); ?>" class="more_link">View More</a>

											</div>

										</div>

									</div>
									
									 <?php } ?>

									 

								</div>

							</div>

						</div>

					<!-- LATEST NEWS SECTION END -->
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