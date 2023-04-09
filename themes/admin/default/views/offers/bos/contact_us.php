<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>Contact Us</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>Contact Us</span></li>

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

				

				<div class="col-md-6">

					<div class="section_area contact_form contact_us_send">

						<div class="section_title">

							<h2>Contact & Feedback</h2>

						</div>

						<div class="section_content">
							  <?php if($message) { ?>
					            <div class="alert alert-success alert-dismissable">
					                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					                <?= $message; ?>
					            </div>
					            <?php } ?>
							<?= form_open('home/contact_us/', 'class="form_singel"') ?>
							<p class="text-right requr_text " style="color: #008c44; font-size: 13px;">*Required fields</p>							  
							<div class="form-row mb-3">
							    <div class="col"> 
							      <?= form_input('first_name',set_value('first_name'),'class="form-control" placeholder="First name*"') ?>
							      <?= '<div class"error">'. form_error('first_name') .'</div>'; ?> 
							    </div>

							  </div>

							  <div class="form-row mb-3">

							    <div class="col">
							    	<?= form_input('last_name',set_value('last_name'),'class="form-control" placeholder="Last name*"') ?> <?= '<div class"error">'. form_error('last_name') .'</div>'; ?> 

							    </div>

							  </div>

							  <div class="form-row mb-3">

							    <div class="col">
							    	<?= form_input('phone',set_value('phone'),'class="form-control" placeholder="Phone"') ?>
							       <?= '<div class"error">'. form_error('phone') .'</div>'; ?>
							    </div>

							  </div>

							  <div class="form-row mb-3">

							    <div class="col"> 
							      <?= form_input('email',set_value('email'),'class="form-control" placeholder="E-mail*"') ?>
							      <?= '<div class"error">'. form_error('email') .'</div>'; ?>
							    </div>

							  </div>

							  <div class="form-row mb-5">

							    <div class="col-md-12">

							     
							       <?= form_textarea('message',set_value('message'),'class="form-control" placeholder="Message" rows="3"') ?>
							        <?= '<div class"error">'. form_error('message') .'</div>'; ?>

							    </div>

							  </div>

							  <div class="form-row">

							    <div class="col-md-12">
 
							      <button type="submit" name="" class="btn btn-primary">Send Message</button>

							    </div>

							  </div>

							<?= form_close(); ?>

						</div>

					</div>

				</div>



				<div class="col-md-6">

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

				</div>

			</div>

			<!-- FULL WIDTH CONTENT AREA END -->



			<!-- LOGO AREA -->

			

			<!-- LOGO AREA END -->

		</div>

		<div class="container-full">

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2726044644965!2d90.36765371486857!3d23.773305084578045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae74ea4205%3A0xc1572f17a9baaa0!2sNational+Institute+of+Traumatology+%26+Orthopaedic+Rehabilitation!5e0!3m2!1sen!2sbd!4v1557475928628!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

		</div>

	</div>

	<!-- CONTENT SECTION END -->