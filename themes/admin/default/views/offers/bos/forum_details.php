<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>Forum Details & Reply</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>Forum Details & Reply</span></li>


						</ul>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- SUB-HEADER SECTION  END-->



	<!-- CONTENT SECTION -->

	<div class="content_area">
		<?php $status = $this->site->checksitebar(array('slug'=>'forum')); ?>
		<div class="container">

			<!-- WITH SIDEBAR CONTENT AREA -->

			<div class="row content_holder clearfix">

				<div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">

					<!-- NEWS SINGLE CONTENT SECTION -->

					<div class="section_area news_single_content">

						<div class="section_content">

							<div class="row forum_main">
							 
								<?php $userInfo = $this->home_model->membearProfile($postInfo->created_by);   ?>
								<div class="col-md-12">
									<h3 class="ad_class"><?= $postInfo->title; ?></h3>
								</div>
								<div class="col-md-12">
									<div class="post_container">
										<div class="post_author clearfix">
											<div class="author_info">
												<?php  
												if($userInfo->p_photo){ ?>
												<div class="author_img">
													<img src="<?= base_url('uploads/avatars/'.$userInfo->p_photo); ?>">
												</div>
												<?php }else{ ?>
												<div class="author_img">
												<img width="200px" src="<?= base_url('uploads/blank.png'); ?>">
												</div>
												<?php } ?>
												<div class="author_content">
													<h3><span class="author_status active"><i class="fas fa-dot-circle"></i></span><?php if($userInfo->name){echo $userInfo->name;}else{echo  $userInfo->first_name;} ?></h3>
													<?php if($userInfo->group_id != 1){ ?>
													<p class="author_desig"><?= $userInfo->dr_designation; ?></p>
													<?php } ?>
													<p class="author_desig"><?php if($userInfo->group_id == 1){echo "Admin";}else{echo $this->site->member_group($userInfo->group_id);} ?></p>
												</div>
											</div>
											<div class="author_stat">
												Posts: <?php echo $this->site->user_total_post($postInfo->created_by); ?><br> 
												Joined: <?= date('F Y', $userInfo->created_on); ?><br> 
											</div>
										</div>
										<div class="post_content">
											<p class="post_create_date"><span><?= $this->tec->hrld($postInfo->created_at);  ?></span><br><!-- <span class="post_no">  Post id #BOSF-<?= $postInfo->id; ?></span> --></p>
											<p><?= $postInfo->description; ?></p>
										</div>
										<div class="post_action_btn">
											<a href="#reply_from_here" class="btn btn-primary btn_small"><i class="fas fa-comment-dots"></i> Reply</a>
										</div>
									</div>

									
									<!-- Replay section -->

									<?php foreach ($replies as $key => $reply_value) { ?>
									<div class="post_container">
										<?php $createdBy = $this->home_model->membearProfile($reply_value->created_by);   ?>
										<div class="post_author clearfix">
											<div class="author_info"> 
												<?php  
												if($createdBy->p_photo){ ?>
												<div class="author_img">
													<img width="100px" src="<?= base_url('uploads/avatars/'.$createdBy->p_photo); ?>">
												</div>
												<?php }else{ ?>
												<div class="author_img">
												<img width="100px" src="<?= base_url('uploads/blank.png'); ?>">
												</div>
												<?php } ?>
												<div class="author_content">
													<h3><span class="author_status "><i class="fas fa-dot-circle"></i></span><?php  if($createdBy->name){echo $createdBy->name;}
													else{echo $createdBy->first_name;} ?></h3>

													<?php if($createdBy->group_id != 1){ ?>
													<p class="author_desig"><?= $createdBy->dr_designation; ?></p>
													<?php } ?>
													<p class="author_desig"><?php if($createdBy->group_id == 1){echo "Admin";}else{echo $this->site->member_group($createdBy->group_id);} ?></p>
													 
												</div>
											</div>


											<div class="author_stat"> 
											</div>
										</div>
										<div class="post_content">
											<p class="post_create_date"><span><?= $this->tec->hrld($reply_value->created_at); ?></span></p>
											<p><?=  $reply_value->description; ?></p>
										</div>
										<div class="post_action_btn">
											<a href="#reply_from_here" class="btn btn-primary btn_small"><i class="fas fa-comment-dots"></i> Reply</a>
										</div>
									</div> 
									<?php } ?>
								</div>

								 

								<div class="col-md-12" id="reply_from_here">
									<?php if($error)  { ?>
										<div class="alert alert-danger alert-dismissable">
											<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
											<?= $error; ?>
										</div>
									<?php } if($message) { ?>
										<div class="alert alert-success alert-dismissable">
											<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
											<?= $message; ?>
										</div>
									<?php } ?>
									<div class="reply_box mt-5">
										<div class="section_title">
											<h2>Post Your Reply Here</h2>
										</div>
 
										<?= form_open('forums/details/'.$postInfo->id,'class="reply_form mt-3" id="forum_reply_form"  onsubmit="return validateForm()"') ?>
											<div class="form-row">
												<div class="form_group col-md-12 mb-3">
												 
													 <?= form_textarea('reply', set_value('reply'), 'class="form-control reply_err" id="description" placeholder="Type Your Reply Here"'); ?> 
												</div>
											</div>
											<div class="form-group"> 
					                            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
					                        </div>
											<div class="form-row">
												<button type="submit" name="submit" class="btn btn-primary btn_small">Post</button>
											</div>
										<?= form_close(); ?>
									</div>
								</div>

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


<style type="text/css">
	.forum_main h3.ad_class {
	    font-size: 20px;
	    background-color: #008c44;
	    color: #fff;
	    padding: 15px 22px;
	    border-radius: 5px;
	    margin-top: 20px;
	}
	.forum_title {
	    color: #008c44;
	}
	.forum_main .forum_table tr {

	    white-space: nowrap;
		border: 1px solid #eee !important;

	}
	.forum_main .forum_table tr td, .forum_main .forum_table tr th{
		padding: 10px;
		text-align: left;
	}
	.forum_main .forum_table tr td a{
		color: #008c44;
	}
	.forum_main .forum_table tr td.topic_icon{
		text-align: center;
	}

	.pagination {
	  border-radius: 30px;
	  text-align: center;
	  margin: 0 auto;
	  width: auto;
	}
	.pagination li.page-item a, .pagination li a  {
	  display: block;
	  width: 40px;
	  height: 40px;
	  line-height: 40px;
	  text-align: center;
	  background: #f6f6f6;
	  color: #777;
	  border: none;
	  margin: 0 5px;
	  border-radius: 0 !important;
	}
	.pagination li.page-item a:hover, .pagination li a:hover {
	  color: #008c44;
	  background: #fafafa;
	}
	.pagination li.page-item.active a.page-link, .pagination li.page-item a.page-link:focus {
	  background: #008c44;
	  color: #fff;
	}
	.pagination li.page-item a.page-link:focus, .pagination li a.page-link:focus{
		box-shadow: none;
		outline: 0;
	}
	.forum_table {
	    margin-bottom: 20px;
	}
</style>

<script type="text/javascript">
	
	function validateForm() { 
   
     var fname = document.forms["forum_reply_form"]["reply"].value;
     if (fname == "") { 
       $('.reply_err').css('border','1px solid red');
       return false;
     }  
   }

</script>