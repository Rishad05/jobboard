	<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>Gallery</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>Gallery</span></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- SUB-HEADER SECTION  END-->



	<!-- CONTENT SECTION -->

	<div class="content_area">


		<?php $status = $this->site->checksitebar(array('slug'=>'gallery')); ?>

		<div class="container">

			<!-- WITH SIDEBAR CONTENT AREA -->

			<div class="row content_holder clearfix">

				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">

					<!-- Gallery Album SECTION -->

					<div class="section_area gallery_album">

						<div class="section_title">

							<!-- <h2>See All Photos</h2> -->

						</div>
 
 						<?= form_open('home/gallery', 'id="gelery_serch_form"'); ?>
							<div class="Gallery_page_filter">
								 <?php  
								 	$arr[''] = 'All Images';
								 	foreach ($album as $key => $value) {
								 		$arr[$value->id] = $value->title;
								 	} 
								  ?>
								<?= form_dropdown('album', $arr, $gid, 'id="album" class="form-control input-tip select2 select" onchange="image_show_gellary_wise()"');  ?>
							</div>
						<?= form_close(); ?> 


						<!-- <div class="section_title">
							<h2>See From Our Albums</h2>
						</div> -->

						<div class="section_content">

							<ul class="row clearfix list-inline album_list">
								<?php foreach ($album as $key => $value) {  ?>
								<li class="col album_item"><a href="<?php echo base_url('home/gallery/'.$value->id); ?>"><img src="<?php echo base_url('uploads/gallery/thumb/'.$value->thumb_image); ?>" alt="Image 01" class="w-100"/></a><p><?php echo $value->title; ?></p></li>
								<?php } ?>  
							</ul>



						</div>

					</div>

					<!-- Gallery Album SECTION END -->



					<!-- Gallery Photos SECTION -->

					<div class="section_area gallery_album">

						<div class="section_content">

							<ul class="row clearfix list-inline photo_list">
								<?php foreach ($images as $key => $value) { ?>
								<li class="col-md-3 photo_item"><a href="<?php echo base_url('uploads/gallery/'.$value->file); ?>" data-lightbox="example-set"><img src="<?php echo base_url('uploads/gallery/'.$value->file); ?>" alt="Image 01" class="w-100"/></a></li> 
								<?php } ?>
							</ul>
							<?php echo $links; ?>
							<!-- <p class="text-center"><button type="button" class="btn btn-primary full-rounded btn-sm">View More Photos</button></p> -->



						</div>

					</div>

					<!-- Gallery Photos SECTION END -->

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

	<script type="text/javascript">
		function image_show_gellary_wise() {
			var id = $('#album').val();
			window.location = '<?php echo base_url("home/gallery") ?>/'+id;
			//document.getElementById("gelery_serch_form").submit();
		}
	</script>