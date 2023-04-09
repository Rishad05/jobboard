<!-- SUB-HEADER SECTION -->
<section class="sub_header_sec">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 text-center">
				<div class="sub_header">
					<h2>Publications</h2>
				</div>
				<div class="breadcrumb_menu">
					<ul class="list-inline">
						<li><a href="index.html">Home</a></li>
						<li><span>Publications</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- SUB-HEADER SECTION  END-->

<!-- CONTENT SECTION -->
<div class="content_area">
	<?php $status = $this->site->checksitebar(array('slug'=>'publication')); ?>
	<div class="container">
		<!-- WITH SIDEBAR CONTENT AREA -->
		<div class="row content_holder clearfix">
			<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
				<!-- NEWS SINGLE CONTENT SECTION -->
				<div class="section_area news_single_content">
					<div class="section_content">
						<?= form_open('home/publication/','id="publication_form"') ?>
						<div class="publication_title">
							<div class="publication_search col-md-12"> 
								<level>Search by : </level>
								<?php 
								$yer[''] = 'All';
								foreach ($years as $key => $value) {
									$yer[$value->publication_year] = $value->publication_year;
								}
								?>
								<?= form_dropdown('publication_year', $yer, set_value('publication_year'), 'class="form-control tip select2" onchange="yearwise()"') ?>
							</div>
						</div>
						<br>
						<div id="searchresult"></div>
						<div class="row pub_area_main">
							<?php  
							foreach ($info as $key => $value) {  ?>
								<div class="col-md-12 Publications_section"> 
									<div class="card clearfix">
										<a class="card_img">
											<img class="card-img-top" src="<?php echo base_url('uploads/books/'.$value->covar_photo); ?>" alt="Book image">
										</a>
										<div class="card-body">
											 
												<h5 class="card-title"> <?php echo $value->title; ?></h5>
											 
											<p class="card-text"><?php  

											echo substr($value->description, 0, 600) . '...';  

											?></p>
											<?php if($value->file){ ?>
											<a href="<?php echo base_url('home/viewbook/'.$value->id); ?>" class="btn btn-primary stretched-link" target="_blank">View Journal </a>
											<?php }else{ ?>
											<a href="<?php echo $value->journal_url; ?>" class="btn btn-primary stretched-link" target="_blank">View Journal</a>
											<?php } ?>
											<!-- <a href="<?php echo base_url('home/viewbook/'.$value->id); ?>" class="btn btn-primary stretched-link" download>Download</a> -->
											<?php if($value->file){ ?>
											<a href="<?php echo base_url('uploads/books/'.$value->file); ?>" class="btn btn-primary stretched-link" download>Download</a>
											<?php } ?>
										</div>
									</div>
								</div> 
							<?php } ?>
							<?= $links; ?>
						</div>







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

<script type="text/javascript">
	function searchPublication() {
		var keyword = $('#search_publication').val();
		alert(val);

		var url = '<?php echo base_url("home/searchpublication") ?>/'+btoa(keyword);
			//alert(url);
			$('#searchresult').load(url, function(e){

			})
		} 
		
	</script>

	<script type="text/javascript">
		function yearwise() {
			//alert('dd');
			document.getElementById("publication_form").submit();
		}
	</script>