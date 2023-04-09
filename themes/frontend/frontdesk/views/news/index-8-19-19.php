 <div class="content_area">
    <!--Like What you see section Start-->
    <div class="like_what_you_see_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php if($news){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page_title">News</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($news as $key => $snews) { 
                            $users = $this->site->whereRow('administrator','id',$snews->created_by); ?>
                        
                            <div class="col-md-4">
                                <div class="post_content">
                                    <div class="post_img">
                                        <img src="<?= base_url('uploads/news/'.$snews->thumbnail); ?>" alt="post_3" class="w-100"/>
                                    </div>
                                    <div class="post_info">
                                        <h2>
                                            <a href="<?= base_url('news/details/'.lcfirst(
                                            str_replace(' ','_',$snews->title)

                                            )); ?>"><?= $snews->title ?></a></h2>
                                        <div class="post_desc"><p><?= $snews->content; ?></p></div>
                                        <div class="date_time">
                                            <!-- <span><i class="far fa-clock"></i><p>14 Nov 2019</p></span> -->
                                            <span><i class="far fa-clock"></i><?= date("j F Y", strtotime($snews->created_at)); ?></span>  <!-- <?= $users->first_name .' '.$users->last_name ?> --> 
                                            <span class="user"><i class="far fa-user"></i> <?= $users->first_name .' '.$users->last_name ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    <?php   }
                    }else{
                        echo '<p>No record found</p>';
                    } ?> 
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--Like What you see section End-->
</div>
 