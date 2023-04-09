<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>Posts</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>Posts</span></li>


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
								<!-- <div class="col-md-12">
									
									<ul class="pagination">
									  <li class="page_prv"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
									  <li class="page-item active"><a class="page-link" href="#">1</a></li>
									  <li class="page-item"><a class="page-link" href="#">2</a></li>
									  <li class="page-item"><a class="page-link" href="#">3</a></li>
									  <li class="page_next"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
									</ul> 

								</div> -->
								<div class="col-md-12">
									<h3 class="ad_class"><?= $topic->title; ?></h3>
								</div>
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="forum_table">
											<?php if($postInfo){ ?> 
											<thead>
												<tr>
													<th colspan="2">Thread / Author</th>
													<th>Post info</th>
													<th>Created at</th>
												</tr>
											</thead>
										<?php } ?>
								            <tbody>
								            	<?php
								            	if(!$postInfo){
								            		$postInfo = array();
								            		echo "Post Not Found";
								            	}  
								            	foreach ($postInfo as $key => $value) { ?>
								                <tr>
								                    <td class="topic_icon">
								                        <i class="fas fa-comments"></i>
								                    </td>
								                    <?php $userInfo = $this->home_model->membearProfile($value->created_by); 
 						 
								                    ?>
								                    <td class="topic_title">
								                    	<a href="<?= base_url('forums/details/'.$value->id); ?>"><?= $value->title; ?></a>
								                    	<br>
								                    	<span>Posted by <?php if($userInfo->first_name){echo $userInfo->first_name;}else{echo $userInfo->name;} ?> </span>
								                    </td>

								                    <td class="topic_info">
								                    	<span><a href="<?= base_url('forums/details/'.$value->id); ?>"><?= $this->site->reply_count($value->id);  ?></a> Replies</span><br><!-- <span>3,586 Views</span> -->
								                    </td>
								                    <td class="topic_last_post">
								                    	<?= $value->created_at; ?> 
								                    </td>
								                </tr>
								            	<?php } ?>
								                
								            </tbody>
								        </table>
								    </div>

								</div>

								<!-- <div class="col-md-12">
									
									<ul class="pagination">
									  <li class="page_prv"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
									  <li class="page-item active"><a class="page-link" href="#">1</a></li>
									  <li class="page-item"><a class="page-link" href="#">2</a></li>
									  <li class="page-item"><a class="page-link" href="#">3</a></li>
									  <li class="page_next"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
									</ul> 

								</div> -->

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