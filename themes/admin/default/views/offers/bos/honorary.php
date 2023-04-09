<!-- SUB-HEADER SECTION -->
<section class="sub_header_sec">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 text-center">
				<div class="sub_header">
					<h2>List of Honorary</h2>
				</div>
				<div class="breadcrumb_menu">
					<ul class="list-inline">
						<li><a href="index.html">Home</a></li>
						<li><span>List of Honorary</span></li>
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
		<div class="content_holder clearfix">
			<!-- LATEST NEWS SECTION -->
			<div class="row title_area">
				<div class="col-md-4">
					<div class="section_area committee_table">
						<div class="section_title">
							<h2>List of Honorary</h2>
						</div>
					</div>
				</div>
				<div class="col-md-8 role_of_honory_filter_box">
					<!-- <div class="section_area section_title">
						<h2>Filter By Session</h2>
					</div> -->
					<?= form_open('home/honorary', 'id="honorary_serch_form"'); ?>
						<div class="role_of_honory_select_box select_box">
							 <?php  
							 	$arr[''] = 'All Members';
							 	$info = $this->site->wheres_rows('honorary_members', NULL);
							 	foreach ($info as $key => $value) {
							 		$arr[$value->years] = $value->years;
							 	}
							  ?>
							<?= form_dropdown('years', $arr, set_value('years'), 'id="payment_status" class="form-control input-tip select2 select" onchange="searchYears()" style="width:100%;"');  ?>
						</div>
					<?= form_close(); ?> 
				</div>
			</div>
			<?php //print_r($infohonorary); ?>
			<div class="col-md-12 section_area news_sec news_page">
				<div class="section_content">
					<div class="row clearfix  committee_list">
						<div class="col-md-12 table-responsive">
							<table class="table">
								<thead class="thead-light">
									<tr>
										<th>SL No.</th>
										<th>Year</th>
										<th>President</th>
										<th>Picture</th>
										<th>Secretary General</th>
										<th>Picture</th>
									</tr>
								</thead>
								<?php foreach ($infohonorary as $key => $value) { ?>
									<tr>
										<td><?= $value->order_by; ?></td>
										<td><?= $value->years; ?></td>
										<td><?= $value->president_name; ?></td>
										<td>
											<?php if($value->president_photo){ ?>
												<img class="table_img" src="<?= base_url('uploads/avatars/'.$value->president_photo); ?>">
											<?php }else{ ?>
												<img class="table_img" src="<?= base_url('uploads/blank.png'); ?>">
											<?php } ?>
										</td>
										<td><?= $value->secretary_name; ?></td>
										<td>
											<?php if($value->secretary_photo){ ?>
												<img class="table_img" src="<?= base_url('uploads/avatars/'.$value->secretary_photo); ?>">
											<?php }else{ ?>
												<img class="table_img" src="<?= base_url('uploads/blank.png'); ?>">
											<?php } ?>
										</td>
									</tr>
								<?php  } ?>

							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- LATEST NEWS SECTION END -->
		</div>
		<!-- FULL WIDTH CONTENT AREA END -->

		<!-- LOGO AREA -->

		<!-- LOGO AREA END -->
	</div>
</div>
<script type="text/javascript">
	function searchYears() {
		//alert('dd');
		document.getElementById("honorary_serch_form").submit();
	}
</script>