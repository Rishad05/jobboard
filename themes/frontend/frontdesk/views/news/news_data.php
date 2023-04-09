	<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>News</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="<?php echo base_url(); ?>">Home</a></li>

							<li><span>News</span></li>

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

			<!-- FULL WIDTH CONTENT AREA -->

			<div class="row content_holder clearfix">

				<!-- LATEST NEWS SECTION -->

						<div class="section_area news_sec news_page">

							<div class="section_content">

								<div class="row clearfix news_boxes">

									<?php foreach ($info as $key => $value) { ?>

									<div class="col-md-4">

										<div class="news_box">

											<div class="news_img">
												<a href="<?php echo base_url('news/details/'.$value->id); ?>">
													<img src="<?php echo base_url('uploads/news/'.$value->image); ?>" alt="POST IMAGE" class="w-100">
												</a>

											</div>

											<div class="news_content">

												<h3 class="news_title"><a href="<?php echo base_url('news/details/'.$value->id); ?>"><?php echo $value->title; ?></a></h3>
												<span><?php echo $this->tec->hrld($value->created_at); ?></span>
												<p class="news_desc">
													<?php  
													echo substr($value->short_description, 0, 150) . '...'; 
													?>
												</p>

												<a href="<?php echo base_url('news/details/'.$value->id); ?>" class="more_link">View More</a>

											</div>

										</div>

									</div>

									 <?php } ?>

								</div>

							</div>

						</div>

					<!-- LATEST NEWS SECTION END -->

			</div>

			<!-- FULL WIDTH CONTENT AREA END -->



			<!-- LOGO AREA -->

			

			<!-- LOGO AREA END -->

		</div>

	</div>

	<!-- CONTENT SECTION END -->