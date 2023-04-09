<!--page_titlebar Section End-->
<div class="content_area">
    <!--Like What you see section Start-->
    <div class="like_what_you_see_section">
        <div class="product_main_wraper News_main">
            <section class="blog-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <main id="main" class="site-main">
                                <article id="post-2441" class="blog-single-item post-2441 post type-post status-publish format-standard has-post-thumbnail hentry category-education">
                                    <header class="entry-header">
                                        <h2><?php if($news){ echo  $news->title; } ?></h2>
                                        <div class="post-thumbnail">
                                            <?php if($news){ if($news->thumbnail){ ?> 
                                            <img src="<?= base_url('uploads/news/'.$news->thumbnail) ?>" height="329" alt="post_3" class="w-100" />
                                        <?php }} ?>
                                        </div>
                                         <!-- .post-thumbnail -->
                                    </header>  
                                    <div class="entry-content blog-title_block"> 
                                        <?php if($news){ if($news->content){  
                                            echo $news->content;
                                         }} ?>
                                    </div>
                                    <!-- .entry-footer -->
                                </article>
                                <!-- #post-## -->
                                <div class="clear post-nav-clear"></div>                                 <!-- #comments -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- .col-md-8 -->
                        <?php $this->load->view($this->frontend_theme . 'news/category-widget') ?>  
                        <!-- .col-md-4 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        </div>
    </div>
    <!--Like What you see section End-->
</div>
 