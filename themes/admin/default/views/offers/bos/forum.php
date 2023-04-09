<!-- SUB-HEADER SECTION -->

	<section class="sub_header_sec">

		<div class="container">

			<div class="row clearfix">

				<div class="col-md-12 text-center">

					<div class="sub_header">

						<h2>Forum</h2>

					</div>

					<div class="breadcrumb_menu">

						<ul class="list-inline">

							<li><a href="index.html">Home</a></li>

							<li><span>Forum</span></li>

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
							<?php  
							foreach ($info as $key => $value) { 
							?>
							<div class="row forum_main">

								<div class="col-md-12">
									<h3 class="ad_class" ><?= $value['category_title']; ?> <a class="add_removed" id="dynamic_class"><span><i class="fas fa-plus"></i><!-- <i class="fas fa-minus"></i> --></span></a></h3>
								</div>

								<div id="table_id" class="col-md-12 btns01">
									<table class="forum_table">
							            <tbody>
							            	<?php  foreach ($value['topics'] as $key => $value2) { ?>
							                <tr>
							                    <td style="width: 70px;font-size: 20px;height: 50px; text-align: center;" class="td01">
							                        <i class="fas fa-folder"></i>
							                    </td>
							                    <td class="text-left td02">
							                    	<strong>
							                        <a class="forum_title" href="<?= base_url('forums/posts/'.$value2->id);	 ?>">
							                            <?= $value2->title; ?>
							                        </a>
							                    </strong>
							                    <br>
							                        <span><?= $value2->description; ?></span>
							                    </td>
							                    <td class="text-right td01 tops_reply">
							                        
							                        <a href="<?= base_url('forums/posts/'.$value2->id);	 ?>"><strong><?= $this->site->post_count($value2->id); ?></strong> Posts</a>
							                    </td>
							                    <!-- <td class="text-left td02">
							                    	<strong>
							                        <a href="#">
							                        Bangladesh Dr.....
							                    	</a>
							                    	</strong>
							                    	<br>
							                    	<a href="#"><i class="fas fa-clock"></i> By Abdurrakib </a>
							                      
							                           
							                    </td> -->
							                </tr>
							            	<?php } ?>
							                 
							                
							            </tbody>
							        </table>

								</div>

							</div>
							<?php } ?>
							 
						

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
.forum_main .add_removed {

    float: right;
    cursor: pointer;

}
.forum_main .forum_table tr {

    white-space: nowrap;
	border: 1px solid #eee !important;

}
.forum_main .forum_table tr td{
	padding: 10px 12px 10px 10px;
	border-left: 1px solid #eee;
}
.td02 span {

    font-size: 13px;
    color: #999;
    margin-bottom: 15px;
    display: block;

}
.td01.tops_reply {

    font-size: 13px;
    color: #837e7e;
    margin-bottom: 15px;


}
.td02 a:hover {
    color: #056735;
}
</style>


<!-- <script type="text/javascript">

    function  myFunction(n){ 
    	n++
    	console.log(n);
    	$('#table_id').addClass('active_row');    	
    }
</script> -->

<script>
$(document).ready(function(){
  $("a.btns").click(function(){
    $("h1, h2, p").toggleClass("blue");
  });
});
</script>