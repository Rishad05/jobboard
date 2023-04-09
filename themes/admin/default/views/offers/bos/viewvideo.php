		<!-- SUB-HEADER SECTION -->
	<section class="sub_header_sec">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<div class="sub_header">
						<h2>Videos</h2>
					</div>
					<div class="breadcrumb_menu">
						<ul class="list-inline">
							<li><a href="<?= base_url(); ?>">Home</a></li>
							<li><span>Videos</span></li>
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
					<?php //print_r($videos); ?>
					<div class="section_area news_single_content">
						<div class="section_content">
							<div class="row">
								<?php foreach ($videos as $key => $video) { ?>
								<div class="col-md-6 Publications_section">
								 	 <div class="card">

									   	<?php   
									   	$cid = explode("?v=",$video->embed_video)[1];

									   	?>

									   	<iframe width="100%" height="400" src="https://www.youtube-nocookie.com/embed/<?php echo $cid; ?>?start=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									    <div class="card-body">	
									      <h5 class="card-title"> <?= $video->title; ?></h5>
									      <p class="card-text"><?= $video->description; ?></p>									     
							   		 	</div>
							  		</div>
							 	</div>
							 	<?php } ?>
							 	<!-- <div class="col-md-6 Publications_section">
								 	 <div class="card">
									   <a class="videopopup" data-toggle="modal" data-target="#myVideoModal"> <img class="card-img-top" src="<?php echo $frontend_assets; ?>images/videos/video01.jpg" alt="Book image"> </a>
									    <div class="card-body">
									      <h5 class="card-title">31st Annual Congress BOSCON 2018</h5>
									      <p class="card-text">Harry Potter has no idea how famous he is. That’s because he’s being raised by his miserable aunt and uncle who are terrified Harry will learn that he’s really a wizard, just as his parents were. But everything changes when Harry is summoned to attend an infamous school for wizards, and he begins to discover some clues about his illustrious birthright....</p>									   
							   		 	</div>
							  		</div>
							 	</div>

							 	<div class="col-md-6 Publications_section">
								 	 <div class="card">
									    <a class="videopopup" data-toggle="modal" data-target="#myVideoModal"> <img class="card-img-top" src="<?php echo $frontend_assets; ?>images/videos/video01.jpg" alt="Book image"></a>
									    <div class="card-body">
									      <h5 class="card-title">31st Annual Congress BOSCON 2018</h5>
									      <p class="card-text">Harry Potter has no idea how famous he is. That’s because he’s being raised by his miserable aunt and uncle who are terrified Harry will learn that he’s really a wizard, just as his parents were. But everything changes when Harry is summoned to attend an infamous school for wizards, and he begins to discover some clues about his illustrious birthright....</p>									      
							   		 	</div>
							  		</div>
							 	</div>

							 	<div class="col-md-6 Publications_section">
								 	 <div class="card">
									    <a class="videopopup" data-toggle="modal" data-target="#myVideoModal"> <img class="card-img-top" src="<?php echo $frontend_assets; ?>images/videos/video01.jpg" alt="Book image"> </a>
									    <div class="card-body">
									      <h5 class="card-title">31st Annual Congress BOSCON 2018</h5>
									      <p lass="card-text">Harry Potter has no idea how famous he is. That’s because he’s being raised by his miserable aunt and uncle who are terrified Harry will learn that he’s really a wizard, just as his parents were. But everything changes when Harry is summoned to attend an infamous school for wizards, and he begins to discover some clues about his illustrious birthright....</p>									      
							   		 	</div>
							  		</div>
							 	</div>
 -->

 

							</div>







						</div>
					</div>
					<!-- NEWS SINGLE CONTENT SECTION END -->
				</div>
				<div class="col-md-4">
					 
				</div>
			</div>
			<!-- WITH SIDEBAR CONTENT AREA END -->

			<!-- LOGO AREA -->
			
			<!-- LOGO AREA END -->
		</div>
	</div>
	<!-- CONTENT SECTION END -->
