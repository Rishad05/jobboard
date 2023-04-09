<!-- SUB-HEADER SECTION -->
 	<section class="sub_header_sec">
 		<div class="container">
 			<div class="row clearfix">
 				<div class="col-md-12 text-center">
 					<div class="sub_header">
 						<h2>Feedback</h2>
 					</div>
 					<div class="breadcrumb_menu">
 						<ul class="list-inline">
 							<li><a href="index.html">Home</a></li>
 							<li><span>Feedback</span></li>
 						</ul>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- SUB-HEADER SECTION  END-->

 	<!-- CONTENT SECTION -->
 	<div class="content_area"> 
	<?php $status = $this->site->checksitebar(array('slug'=>'feedback')); ?>
 		<div class="container">
 			<!-- WITH SIDEBAR CONTENT AREA -->
 			<div class="row content_holder clearfix">
 				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
 					<!-- NEWS SINGLE CONTENT SECTION -->
 					<div class="section_area contact_form feedback_form">
 						<div class="section_title">
 							<h2>Feedback Your Opinion</h2>
 						</div>
 						<div class="section_content">
 							<form class="form_singel">

 								<div class="form-row mb-3">
 									<div class="col">
 										<input type="text" class="form-control" placeholder="First name">
 									</div>
 								</div>
 								<div class="form-row mb-3">
 									<div class="col">
 										<input type="text" class="form-control" placeholder="Last name">
 									</div>
 								</div>

 								<div class="form-row mb-3">
 									<div class="col">
 										<input type="email" class="form-control" placeholder="Email">
 									</div>
 								</div>

 								<div class="form-row mb-5">
 									<div class="col-md-12">
 										<textarea class="form-control" id="" rows="3" placeholder="Message"></textarea>
 									</div>
 								</div>

 								<div class="form-row">
 									<div class="col-md-12">
 										<button type="button" class="btn btn-primary">Submit</button>
 									</div>
 								</div>
 							</form>
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