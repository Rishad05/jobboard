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
                                <h1 style="color:#ffffff"><?= $news->title ?><br>
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
                        <a href="<?= base_url();?>">Home</a></li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                    <li class="0-item">
                        <a href="<?= base_url('news');?>">News</a></li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                    <li class="last-item"><?= $news->title ?></li>
                </ol>
              </div>
           </div>
        </div>
    </div>
</section>
<!-- FDB News Section -->
<section class="blog-wrap">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <main id="main" class="site-main">
                    <article id="post-2441" class="blog-single-item post-2441 post type-post status-publish format-standard has-post-thumbnail hentry category-education">
                        <div class="entry-header">
                            <!-- <h2>First Sales Capability Team in Bangladesh...</h2> -->
                            <div class="post-thumbnail">
                                <img src="<?= base_url('uploads/news/'.$news->image); ?>" alt="" width="100%" height="">
                            </div>
                            <!-- .post-thumbnail -->
                        </div>
                        <!-- .entry-header -->
                        <div class="entry-content blog-title_block">
                            <h6> 
                                <?php 
                                $user = $this->site->whereRow('users','id',$news->created_by); 
                                $category = $this->site->whereRow('news_category','id',$news->category_id); 
                                ?>
                                <a ><i class="fa fa-user" aria-hidden="true"></i><span>
                                    <?php if($user){
                                        echo $user->first_name .' '. $user->last_name;
                                    } ?></span></a>
                                | <a href="<?= base_url('news/category/'.strtolower(
                                            str_replace(' ','_',$category->title) )); ?>" rel="category tag"><span class="cat-links"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php if($category){ echo  $category->title; }?></span>  </a>      </h6>

                             <?= $news->description ?>

                        </div>
                        <!-- .entry-content -->

                        <footer class="entry-footer">

                            <div class="blog-icons">

                                <div class="blog-share_block">

                                    <a href="#" class="entry-date pull-left">
                                        <time class="entry-date published"><?= date('M d, Y', strtotime($news->created_at)); ?> </time> 
                                    </a>

                                    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d7f66f3ab6f1000123c8f21&product=inline-share-buttons" async="async"></script> 
                                    <div class="blog-share_block">

                                        <div class="sharethis-inline-share-buttons"></div>

                                        <!-- <ul>

                                            <li><a target="_blank" href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>

                                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>

                                            <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>

                                            <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>

                                            <li>Share :</li>

                                        </ul> -->

                                    </div>

                                </div>

                            </div>

                        </footer>
                        <!-- .entry-footer -->
                    </article>
                    <!-- #post-## -->

                    <div class="clear post-nav-clear"></div> 

                </main>
                <!-- #main -->

            </div>
            <!-- .col-md-8 -->

            <!-- .col-md-4 -->

        </div>
        <!-- .row -->

    </div>
    <!-- .container -->

</section>

<script type="text/javascript">
    shareImage();
    function shareImage(){ 
        var url = '<?= base_url("uploads/news/".$news->image); ?>';  
        $("head").append('<meta property="og:image" content="'+url+'">');  
        $("head").append('<meta property="og:image:type" content="image/jpeg">'); 
        $("head").append('<meta property="og:image:width" content="1024">'); 
        $("head").append('<meta property="og:image:height" content="1024">'); 
    }
</script>
