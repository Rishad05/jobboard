	<!-- SUB-HEADER SECTION -->
	<section class="sub_header_sec">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<div class="sub_header">
						<h2>Publications Details</h2>
					</div>
					<div class="breadcrumb_menu">
						<ul class="list-inline">
							<li><a href="index.html">Home</a></li>
							<li><span>Publications Details</span></li>
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
				<div class="col-md-12">
					<!-- NEWS SINGLE CONTENT SECTION -->
					<div class="section_area news_single_content">
						<div class="section_content">
							<div class="row">
								<div class="col-md-4 Publications_section">
								 	 <div class="card">
									    <img class="card-img-top" src="<?php echo base_url('uploads/books/'.$info->covar_photo); ?>" alt="Book image">
									    <div class="card-body">
									      <h5 class="card-title"> <?php echo $info->title ?></h5>
									      <p class="card-text"><?php echo $info->description; ?></p>									     
							   		 	</div>
							  		</div>
							 	</div>

							 	<div class="col-md-8">							 		
							 		 <embed src="<?php echo base_url('uploads/books/'.$info->file); ?>" type="application/pdf" scrolling="auto" height="900px" width="100%" />
							 	</div>



								

							</div>







						</div>
					</div>
					<!-- NEWS SINGLE CONTENT SECTION END -->
				</div>
				
			</div>
			<!-- WITH SIDEBAR CONTENT AREA END -->

			<!-- LOGO AREA -->
			
			<!-- LOGO AREA END -->
		</div>
	</div>
	<!-- CONTENT SECTION END -->
