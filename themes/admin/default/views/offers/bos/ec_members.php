<!-- SUB-HEADER SECTION -->
 	<section class="sub_header_sec">
 		<div class="container">
 			<div class="row clearfix">
 				<div class="col-md-12 text-center">
 					<div class="sub_header">
 						<h2>Executive Committee</h2>
 					</div>
 					<div class="breadcrumb_menu">
 						<ul class="list-inline">
 							<li><a href="index.html">Home</a></li>
 							<li><span>Executive Committee</span></li>
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
 				<!-- LATEST NEWS SECTION -->
 				<div class="col-md-12">
 					<div class="section_area committee_table">
 						<div class="section_title">
 							<h2>Executive Committee of Bangladesh Orthopaedic Society </h2>
 						</div>

 						<div class="filter_area">
 							<!-- <select class="form-control input-tip select2 select">
 								<option>Session One</option>
 								<option>Session Two</option>
 								<option>Session Three</option>
 							</select> --> 
 							<?= form_open('home/ec_members', 'id="ec_serch_form"'); ?>
							<div class="select_box">
								 <?php  
								 	$arr[''] = 'All Members';
								 	foreach ($years_info as $key => $value) {
								 		$arr[$value->years] = $value->years;
								 	} 
								  ?>
								<?= form_dropdown('years', $arr, $this->Settings->executive_committee_years, 'id="payment_status" class="form-control input-tip select2 select" onchange="searchYearWiseEC()" style="width:100%;"');  ?>
							</div>
							<?= form_close(); ?> 
 						</div>
 						
 					</div>
 					
 				</div>
 				<div class="col-md-12 section_area news_sec news_page">
 					<div class="section_content">
 						<div class="row clearfix  committee_list">
 							<div class="col-md-12">
 								<table id="customers"> 
 								<?php  //print_r($info); 
 								foreach ($info as $key => $value) { 
 									$row = count($value['members_info'])+1;
 								?>
 									<tr>
 										<th rowspan="<?php echo $row; ?>"><?= $value['designation']; ?></th> 
 										 
 									</tr>
 									<?php  foreach ($value['members_info'] as $key => $value2) {  ?>
 									<tr>  
 										<td><?= $value2->name; ?></td>
 										<td>Mob:- <?= $value2->phone_number; ?><br>Res:- <?= $value2->res_phone; ?></td>
 										<td>
 											<?php if($value2->photo){ ?>
 											<img width="100px" class="table_img" src="<?= base_url('uploads/avatars/'.$value2->photo); ?>">
 											<?php }else{ ?>
 												<img width="100px" class="table_img" src="<?= base_url('uploads/blank.png'); ?>">
 											<?php } ?>
 										</td>
 									</tr> 
 								<?php }

 								} ?>
 									 
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
 	<!-- CONTENT SECTION END -->


 	<script type="text/javascript">
		function searchYearWiseEC() {
			//alert('dd');
			document.getElementById("ec_serch_form").submit();
		}
	</script>