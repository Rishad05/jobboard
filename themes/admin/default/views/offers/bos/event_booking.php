	<!-- SUB-HEADER SECTION -->
	<section class="sub_header_sec">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<div class="sub_header">
						<h2>Event Registration</h2>
					</div>
					<div class="breadcrumb_menu">
						<ul class="list-inline">
							<li><a href="index.html">Home</a></li>
							<li><span>Event Registration</span></li>
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
				
				<div class="col-md-12">
					<div class="section_area contact_form event_book_ing">
						<div class="section_title">
							<h2>Event book for</h2>
							<h4><?= $info->title; ?></h4>
						</div>
						<?php if($message) { ?>
							<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								<?= $message; ?>
							</div>
						<?php } ?>
						<?php if($error)  { ?>
							<div class="alert alert-danger alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								<?= $error; ?>
							</div>
						<?php } ?>
						<div class="section_content"> 
							<?= form_open('home/event_booking/'.$info->event_id, 'class="form_singel"') ?>
							<div class="form-row mb-3">
								<div class="col">
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="designation" value="Prof">
										<label class="form-check-label">Prof.</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Dr.">
										<label class="form-check-label">Dr.</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Md./Mr.">
										<label class="form-check-label">Md./Mr.</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Ms">
										<label class="form-check-label">Ms</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Member BOS">
										<label class="form-check-label">Member BOS</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Senior Fellow">
										<label class="form-check-label">Senior Fellow</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Non Member">
										<label class="form-check-label">Non Member</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Foreign Delegate">
										<label class="form-check-label">Foreign Delegate</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input"  name="designation" value="Resident">
										<label class="form-check-label">Resident</label>
									</div>

								</div>
							</div>

							<div class="form-row mb-3">
								<div class="col-md-6"> 
									<?= form_input('name',set_value('name'),'class="form-control" placeholder="Family name*"') ?>
									<?= '<div class="error">'. form_error('name') .'</div>'; ?>
								</div>
								<div class="col-md-6"> 
									<?= form_input('giver_name',set_value('giver_name'),'class="form-control" placeholder="Giver name"') ?>
									<?= '<div class="error">'. form_error('giver_name') .'</div>'; ?>
								</div>
							</div>							  
							<div class="form-row mb-3">
								<div class="col-md-6"> 
									<?= form_input('post',set_value('post'),'class="form-control" placeholder="Post"') ?>
									<?= '<div class="error">'. form_error('post') .'</div>'; ?>
								</div>
								<div class="col-md-6"> 
									

									<?= form_textarea('address',set_value('address'),'class="form-control" placeholder="Mailing Address" rows="2"') ?>
									<?= '<div class="error">'. form_error('address') .'</div>'; ?>
								</div>
							</div>							
							<div class="form-row mb-3">
								<div class="col-md-6">
									<?= form_input('city',set_value('city'),'class="form-control" placeholder="City"') ?>
									<?= '<div class="error">'. form_error('city') .'</div>'; ?>
								</div>
								<div class="col-md-6 country_dropdown">
									
							      	<!-- <?= form_input('country',set_value('country'),'class="form-control" placeholder="Country"') ?>
							      	<?= '<div class="error">'. form_error('country') .'</div>'; ?>
							      -->										<!-- <i class="fas fa-sort-down"></i> -->
							      <select class="form-control" name="country" placeholder="Country">

							      	<option value="Country">Country</option>
							      	<option value="Bangladesh">Bangladesh</option>
							      	<option value="India">India</option>
							      	<option value="Saudi">Saudi arab</option>
							      </select> 
							  </div>
							</div>
							
							<div class="form-row mb-3">
								<div class="col-md-6">
									
									<?= form_input('phone',set_value('phone'),'class="form-control" placeholder="Phone"') ?>
									<?= '<div class="error">'. form_error('phone') .'</div>'; ?>
								</div>
								<div class="col-md-6">
									

									<?= form_input('cell_phone',set_value('cell_phone'),'class="form-control" placeholder="Cell Phone*"') ?>
									<?= '<div class="error">'. form_error('cell_phone') .'</div>'; ?>
								</div>
							</div>
							
							<div class="form-row mb-3">
								<div class="col-md-6"> 
									<?= form_input('email',set_value('email'),'class="form-control" placeholder="E-mail*"') ?>
									<?= '<div class="error">'. form_error('email') .'</div>'; ?>
								</div>
							</div>
							<div class="form-row mb-3">
								<h4>Accompanying Person(s) :</h4>
								<div class="col-md-12 mb-3">
									

									<?= form_input('accompanying_person',1,'class="form-control" placeholder="1"') ?>
									<?= '<div class="error">'. form_error('accompanying_person') .'</div>'; ?>
								</div>
								  <!-- <div class="col-md-12">
								      <input type="text" class="form-control" placeholder="2">
								  </div> -->
								</div>
								<div class="form-row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary">Register Now</button>
									</div>
								</div>
								<?= form_close(); ?>
							</div>
						</div>
					</div>

					<!-- <div class="col-md-12">
						<div class="section_area contact_info">
							<div class="section_title">
								<h2>Visit To Us</h2>
							</div>
							<div class="section_content">
								<h4>Bangladesh Orthopaedic Society</h4>
								<p>National Institute of Traumatology & Orthopaedic Rehabilitation (NITOR)</p>
								<p>Sher-e-Bangla Nagar, Dhaka - 1207, Bangladesh</p>
								<p>Contact: <a href="mailto:bos_bdortho@yahoo.com">bos_bdortho@yahoo.com</a></p>
								<ul class="social_link list-inline">
									<li><a href="" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="" target="_blank"><i class="fab fa-youtube"></i></a></li>
									<li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
				<!-- FULL WIDTH CONTENT AREA END -->

				<!-- LOGO AREA -->
				
				<!-- LOGO AREA END -->
			</div>
		<!-- <div class="container-full">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2726044644965!2d90.36765371486857!3d23.773305084578045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae74ea4205%3A0xc1572f17a9baaa0!2sNational+Institute+of+Traumatology+%26+Orthopaedic+Rehabilitation!5e0!3m2!1sen!2sbd!4v1557475928628!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div> -->
	</div>
	<!-- CONTENT SECTION END -->



	<style type="text/css">
	.col.country_dropdown i {

		position: absolute;
		bottom: 22px;
		right: 10px;

	}
	.col.country_dropdown {

		position: relative;

	}
	.country_dropdown select.form-control {
		margin-top: 3px;
	}
	
	.event_book_ing textarea.form-control {
		height: 55px;
	}
</style>