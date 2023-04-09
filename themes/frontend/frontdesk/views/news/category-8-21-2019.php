 
<!--page_titlebar Section End-->

<div class="content_area">

    <!--Like What you see section Start-->

    <div class="like_what_you_see_section">

        <div class="product_main_wraper News_main">



            <section class="blog-wrap">



                <div class="container">



                    <div class="row">



                        <div class="col-md-9">



                            <?php if($news){

                            foreach ($news as $key => $blog) { 

                                $users = $this->site->whereRow('administrator','id',$blog->created_by); ?>

                               <div class="col-md-4">

                                <div class="post_content">

                                    <img src="<?= base_url('uploads/news/'.$blog->thumbnail); ?>" alt="post_3" class="w-100"/>

                                    <h2><a href="<?= base_url('news/details/'.lcfirst(str_replace(' ','_',$blog->title))); ?>"><?= $blog->title ?></h2>

                                    <p><?= character_limiter($blog->content, 35); ?></p>

                                    <div class="date_time">

                                        <!-- <span><i class="far fa-clock"></i><p>14 Nov 2019</p></span> -->

                                        <span><i class="far fa-clock"></i><?= date("j F Y", strtotime($blog->created_at)); ?></span>  <!-- <?= $users->first_name .' '.$users->last_name ?> --> 

                                        <span class="user"><i class="far fa-user"></i><p> <?= $users->first_name .' '.$users->last_name ?></p></span>

                                    </div>

                                </div>

                            </div>

                        <?php   }

                        }else{

                            echo '<p>No record found</p>';

                        } ?>

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

 

<!-- Info Icon Section End