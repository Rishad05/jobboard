<!-- SUB-HEADER SECTION -->
	<style type="text/css">
		
		.trainer_info {
		  padding: 20px;
		  box-shadow: 0 0 20px #ddd;
		}
		.trainer_img {
		  float: left;
		  width: 110px;
		  margin-right: 20px;
		  overflow: hidden;
		}
		.trainer_contact {
		  overflow: hidden;
		}
		.trainer_contact p {
		  margin-bottom: 5px;
		}
		.trainer_name {
		    color: #008c44;
		    font-size: 20px;
		    font-weight: 700;
		}
		.trainer_contact_info p {
		    color: #999;
		}
		.tran_meta span {
		  color: #999;
		  padding-right: 10px;
		}
		.news_single_content .tran_meta {
		  color: #999;
		  font-size: 14px;
		}
		.tran_title {
		  color: #000;
		  font-size: 25px;
		  font-weight: 700;
		  margin-bottom: 20px;
		}
	</style>
	<section class="sub_header_sec">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<div class="sub_header">
						<h2>Training Details</h2>
					</div>
					<div class="breadcrumb_menu">
						<ul class="list-inline">
							<li><a href="index.html">Home</a></li>
							<li><span>Training Details</span></li>
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
			<?php $status = $this->site->checksitebar(array('slug'=>'training_details')); ?>
			<!-- WITH SIDEBAR CONTENT AREA -->
			<div class="row content_holder clearfix">
				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
					<!-- NEWS SINGLE CONTENT SECTION -->
					<div class="section_area news_single_content">
						<div class="section_content">
							<div class="news_img_holder training_detail_s">
								<img src="<?= base_url('uploads/training/'.$info->image); ?>" alt="News Image" class="training_detail_s_image">
								
							</div>

							<h3 class="tran_title"><?= $info->title; ?></h3>
							<p class="tran_meta">
								<span><i class="fas fa-calendar-alt"></i> <?= date('d F', strtotime($info->start_date)).' - '. date('d F Y', strtotime($info->end_date)); ?></span> </br>
								<span>Total Dayes : <?= $info->total_class; ?></span></br>
								<span>Total Hours : <?= $info->total_hours; ?></span></br>
								<span>Class Schedule : <?= $info->class_schedule; ?></span></br>
								<span>Venue : <?= $info->venue; ?></span></br>
								 
							</p>
							<h4>Training Objectives</h4>
							<p> <?= $info->course_objectives; ?></p>
							<h4>Training Outline</h4>
							<p> <?= $info->course_outline; ?></p>
							<div class="sharethis-inline-share-buttons"></div>
							<h4>Instructor</h4>
							 <?php 
							 if($trainers){ 
							 	$trainers = $trainers;
							 }else{
							 	$trainers = array();
							 }
							 if($trainers){
							 foreach ($trainers as $key => $value) { 
							 ?>

								<div class="trainer_info">
									<?php if($value->image){ ?>
									<div class="trainer_img">
										<img width="200px" src="<?= base_url('uploads/trainer/'.$value->image); ?>" alt="img">
									</div>
									<?php }else{ ?>
										<div class="trainer_img">
										<img width="200px" src="<?= base_url('uploads/blank.png'); ?>" alt="img">
									</div>
									<?php } ?>
									<div class="trainer_contact">
										<h4 class="trainer_name"><?= $value->name; ?></h4>
										<p><?= $value->details; ?></p>
										 
									</div>
								</div>
							<?php } 
						}?>
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

	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d26dd0947eb1a0012ad361c&product='inline-share-buttons' async='async'></script>