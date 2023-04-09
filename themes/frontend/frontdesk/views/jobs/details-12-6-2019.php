<section class="sub_header_sec">
    <div class="tg-innerpagebanner tg-haslayout">
       <div class="tg-pagetitle tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll" >
          <div class="container">
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <div class="page-title-wrap">
                      <div class="titlebar-sc-wrap">
                         <p>
                         </p>
                         <div class="sc-boxed-call-to-cation  ">
                            <div class="tg-titleandbtns">
                               <h1 style="color:#ffffff">Jobs Details<br>
                               </h1>
                               <div class="tg-btnsbox">
                               </div>
                            </div>
                         </div>
                         <p></p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="clearfix"></div>
       <div class="container">
          <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                <li class="first-item">
                    <a href="<?=base_url('');?>">Home</a></li>
                    <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                <li class="last-item"><a href="<?=base_url('jobs');?>"> Current Jobs</a></li>
                <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                <li class="last-item"><?= $job->positions?></li>
            </ol>
             </div>
          </div>
       </div>
    </div>
</section>
<section class="Current_Jobs_full_section crt_jb_dtils">
	<div class="container">
		<?php if($error)  { ?>
		  <div class="alert alert-danger alert-dismissable">
		    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		    <h4><i class="icon fas fa-ban"></i>
		      <?= lang('error'); ?>
		    </h4>
		    <?= $error; ?>
		  </div>
		  <?php } if($warning) { ?>
		  <div class="alert alert-warning alert-dismissable">
		    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		    <h4><i class="icon fas fa-warning"></i>
		      <?= lang('warning'); ?>
		    </h4>
		    <?= $warning; ?>
		  </div>
		  <?php } if($message) { ?>
		  <div class="alert alert-success alert-dismissable">
		    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		    <h4> <i class="icon fas fa-check"></i>
		      <?= lang('Success'); ?>
		    </h4>
		    <?= $message; ?>
		  </div>
		  <?php }  ?>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="post_description">
				    <div class="single_job_listing">
				    <ul class="job-listing-meta meta">
				        <li class="job-type full-time"><?=$job->job_type_name ? $job->job_type_name : '';?></li>
				        <li class="location">
				        	<a class="google_map_link" href="#" target="_blank">
				        		<i class="fas fa-map-marker-alt"></i> <?=$job->location ? $job->location : '';?>
				        	</a>
				        </li>
				        <li class="date-posted">
				        	<span class=""><!-- <i class="far fa-clock"></i> --> Application Deadline:</span>
				        	<!-- <time datetime="2019-08-24"><?=$job->created_at ? $this->tec->timeago($job->created_at) : ''?> 
				        	</time>  -->
				        	<span class="calen"><i class="far fa-calendar-alt"></i></span> <?=$job->last_date ? date('D M d, Y', strtotime($job->last_date)) : '';?>
				        </li>
				    </ul>
				    <div class="company">
				         <!-- <img class="company_logo" src="<?=base_url('uploads/company/' . $job->company_logo);?>" alt=""> -->
				         <p class="name comp">
				            <!----------<a class="website" href="" target="_blank" rel="nofollow">Website</a>-------->
				            <!-- <i class="icon icon-building"></i><strong>Industry: </strong><?=$job->company_name;?> -->
				         </p>
				         <?php
							$mre = json_decode($job->minimum_requirement);
							$minrequ = $this->site->whereIn('minimum_requirement', 'id', $mre);
							?>
							<p class="name qlf">
								<i class="icon icon-graduation-cap"></i>
								<strong>Job Title: </strong> <?= $job->positions?></p>
							<p class="name qlf">
								<i class="icon icon-graduation-cap"></i>
								<strong>Education: </strong>
								<?php if ($minrequ) {
							$dddd = '';
							foreach ($minrequ as $key => $minreq) {
								$dddd .= $minreq->title . '/ ';
							}
							echo substr(trim($dddd), 0, -1);
							}?></p>
				         <p class="name exp"><i class="icon icon-certificate"></i><strong>Experience: </strong><?=$job->experience ? $job->experience : '';?></p>
				         <p class="name exp"><i class="icon icon-certificate"></i>
				         	<?php
				         	//if($job->job_category_id){
				         	 	$category = $this->site->whereRow('job_category','id',$job->job_category_id);
				         	//}
				         	?>
				         	<strong>Job Function: </strong><?= $category ? $category->name :'';?></p>
				    </div>
				    <div class="job_description">
				        <p><strong>Responsibilities:</strong></p>
				        <?=$job->descriptions ? $job->descriptions : '';?>
				        <p><strong>Education Requirement :</strong></p>
				        <?=$job->education_experience ? $job->education_experience : '';?>
				        <p><strong>Additional Requirement :</strong></p>
				        <?=$job->additional_requirement ? $job->additional_requirement : '';?>
				    </div>
				   </div>
				</div>
			</div>

			<div class=" col-sm-12"> 
				<?=form_open_multipart("", 'class="validation" id="form"');?>
					<input type="hidden" name="client_id" value="<?=$job->company_id;?>">
					<div id="form-div">
					<div class="row">
						<div class="form-group col-md-6"> 
		                    <label for="name">Your Name<samp class="required-star">*</samp></label>
		                    <?=form_input('name', set_value('name'), 'class="form-control tip" id="name" required="required"');?>
		                </div>
		                <div class="form-group col-md-6"> 
		                    <label for="dob">Date of Birth<samp class="required-star">*</samp></label>
		                    <!-- <?=form_input('dob', set_value('dob'), 'class="form-control datepicker" id="dob" required="required"');?> --> 
		                    <input type="date" name="dob" data-date-format="yyyy-mm-dd" class="form-control datepicker"  required="required" id="datepicker">
		                </div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
		                    <label for="email">Your Email<samp class="required-star">*</samp></label>
		                    <?=form_input('email', set_value('email'), 'class="form-control tip" id="email" required="required"');?>
		                </div>
		                <div class="form-group col-md-6">
		                    <label for="cell">Cell<samp class="required-star">*</samp></label>
		                    <?=form_input('cell', set_value('cell'), 'class="form-control tip" id="cell" required="required"');?>
		                </div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
		                    <label for="current_postion">Current Postion </label>
		                    <?=form_input('current_postion', set_value('current_postion'), 'class="form-control tip" id="current_postion"');?>
		                </div>
		                <div class="form-group col-md-6">
		                    <label for="current_organization">Current Organization</label>
		                    <?=form_input('current_organizations', set_value('current_organizations'), 'class="form-control tip" id="current_organizations"');?>
		                </div>
					</div>
					<div class="row">
						
		                <div class="form-group col-md-6">
		                    <label for="current_salary">Current Salary</label>
		                    <?=form_input('current_salary', set_value('current_salary'), 'class="form-control tip" id="current_salary"');?>
		                </div>
		                <div class="form-group col-md-6">
		                    <label for="expectation">Expected Salary</label>
		                    <?=form_input('expectation', set_value('expectation'), 'class="form-control tip" id="expectation"');?>
		                </div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
		                    <label for="experience">Experience(Years)</label>
		                    <?=form_input('experience', set_value('experience'), 'class="form-control tip" id="experience"');?>
		                </div>
						<!-- <div class="col-md-6">
							<label for="attach">Attach CV (doc|docx|pdf file)</label>
					 		<input type="file" name="userfile" size="40" class=" form-control ">
					 		</p>
						</div> -->
						<div class=" custom-file form-group col-md-6">
						  <label for="attach">Attach CV (doc|docx|pdf file)</label>
					      <div class=" form-group col-md-12">
					      	<input type="file" class="custom-file-input" id="customFile" name="userfile">
					      <label class="custom-file-label form-control" for="customFile">Choose file</label>
					      </div>
					    </div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">  
							<label for="profile_code">Apply with profile code</label>
							<input type="checkbox" name="profile_code_on_off" value="1" id="profile_code_on_off" onclick="profile_code_btn()"> 
		                </div>
		                <div class="form-group col-md-6 profile_code" style="display: none;">
		                    <label for="profile_code">Profile Code</label>
		                    <?=form_input('profile_code', set_value('profile_code'), 'class="form-control tip" id="profile_code" onblur="chackProfileCode()"');?>
		                    <span id="profile_code-error"></span>
		                </div>
					</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4 job_application application">
							<?=form_submit('news_add', 'Apply for job', 'class="btn btn-primary apply_now_jobs"');?>
						</div>						
					</div> <br>
				<?=form_close();?> 
			</div>
		</div>
	</div>
</section> 
 
<!-- <script src="<?= $frontend_assets ?>bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $frontend_assets ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> -->
 <script type="text/javascript">
    jQuery('#datepicker').datetimepicker({
	  format:'DD-MM-YYYY', 
	  formatDate:'DD-MM-YYYY'
	}); 
</script> 
<script type="text/javascript">
		function profile_code_btn(){
			if ($('#profile_code_on_off').is(":checked")){ 
			  	$('.profile_code').slideDown();  
			  	/*$("#form-div :input").prop("disabled", true);
			  	$("#profile_code_on_off").prop("disabled", false);
			  	$("#profile_code").prop("disabled", false);
			  	$(".apply_now_jobs").prop("disabled", false);
			  	$("input['spos_token']").prop("disabled", false);
			  	$("input['client_id']").prop("disabled", false);*/
			}else{
				/*$("#form-div :input").prop("disabled", false);
			  	$("#profile_code_on_off").prop("disabled", false);
			  	$("#profile_code").prop("disabled", false);
			  	$(".apply_now_jobs").prop("disabled", false);*/
				$('.profile_code').slideUp();
			} 
		}
		function chackProfileCode(){ 
            var profile_code = $("#profile_code").val(); 
            if(profile_code==''){
                $('#profile_code-error').html('<p>The first name field is required</p>');
            } else {
                $('#profile_code-error').html('');
                $(".apply_now_jobs").prop("disabled", false);
            }
            if(profile_code==''){
                return false;
            } else { 
            	var token_name = "<?=$this->security->get_csrf_token_name()?>";
                var token_value = "<?=$this->security->get_csrf_hash()?>";
                console.log(token_name);
                console.log(token_value);
                $.ajax({
                    type: "POST", 
                    url:  '<?php echo base_url(); ?>' + '/jobs/ajaxCheck',
                    data: {code:profile_code,token_name:token_value},
                    cache: false,
                    success: function(result){
                        result = JSON.parse(result);
                        console.log(result);
                        if(result.profile_code){
                            $('#profile_code-error').html(result.profile_code);
                        }else{
                            $('#profile_code-error').html('');
                        }
                        if(result.success){
                            $("#form").submit();
                        }
                    }
                });
            }
		} 
			
		/*function profile_code_btn(){
			$('#profile_code').show(); 
            var profile_code = $("#profile_code").val();
            if(profile_code==''){
                $('#profile_code-error').html('<p>The first name field is required</p>');
            } else {
                $('#profile_code-error').html('');
            }
            if(profile_code==''){
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url:  '<?=base_url();?>' + 'jobs/ajaxCheck',
                    data: {code:profile_code},
                    cache: false,
                    success: function(result){
                        result =JSON.parse(result);
                        if(result.profile_code){
                            $('#profile_code-error').html(result.profile_code);
                        }else{
                            $('#profile_code-error').html('');
                        }
                        if(result.success){
                            $("#form").submit();
                        }
                    }
                });
            }
		}*/ 
</script>