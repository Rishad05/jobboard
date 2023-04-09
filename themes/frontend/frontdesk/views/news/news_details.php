	<!-- SUB-HEADER SECTION -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>News Details</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>News Details</span></li>

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
							<p><?php echo $this->tec->hrld($info->created_at); ?></p>
							<div class="news_img_holder">

								<img src="<?php echo base_url('uploads/news/'.$info->image); ?>" alt="News Image" class="w-100">

							</div>
							 
							

							<p> 
								<?php echo $info->short_description; ?>
							</p>
 

							<p>
								<?php echo $info->description; ?>
							</p>

						</div>
                        <div class="sharethis-inline-share-buttons"></div>
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
    <style type="text/css">
    	.popup_overlay, .popup_popup {
		    position: inherit !important;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		}
    </style>
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d26dd0947eb1a0012ad361c&product='inline-share-buttons' async='async'></script>