	<!-- SUB-HEADER SECTION -->

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
		<?php $status = $this->site->checksitebar(array('slug'=>'notice_details')); ?>
		<div class="container">

			<!-- WITH SIDEBAR CONTENT AREA -->

			<div class="row content_holder clearfix">

				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">

					<!-- NEWS SINGLE CONTENT SECTION -->

					<div class="section_area news_single_content">

						<div class="section_content">

							<h3 class="notice_title"><?php  echo $info->title; ?></h3>
							
							<span class="notice_create_date"><?php echo $this->tec->hrld($info->created_at); ?></span> 
							<div class="notice_content">
							    <p><?php  echo $info->description; ?></p>
							    <a target="_blank" href="<?php echo base_url('uploads/notice/'.$info->file); ?>">Download here</a>
							</div>
							
							<?php 
							    $file = pathinfo($info->file);
							    if($file['extension'] == 'pdf'){ 
							?>
							 	<embed src="<?php echo base_url('uploads/notice/'.$info->file); ?>" type="application/pdf" scrolling="auto" height="900px" width="100%" /> 
							<?php }else{ ?>
							<img width="100%" src="<?php echo base_url('uploads/notice/'.$info->file); ?>">
							<?php } ?>

							 
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