<div class="col-md-3 widget">

    <div class="widget_section">
        <h3 class="widget-title">Latest News</h3>       
        <ul class="widget_left blog_widget">
            <?php $latest_news = $this->site->whereRows('news','status',1); 
            if($latest_news){
                $i=0;
                foreach ($latest_news as $key => $value) {  
                    $i++;
                    if($i==4){
                        break;
                    }
                    ?>
            <a href="<?= base_url('news/details/'.lcfirst( str_replace(' ','_',$value->title) )); ?>">
                <li>
                    <h4><?= $value->title ?></h4>                
                    <div class="post_desc"><?= $value->content; ?></div>
                    <span class="Publish_ed">Published : <?= date("d-m-Y", strtotime($value->created_at)); ?></span> 
                </li>
            </a> 
            <?php } } ?>
        </ul>

    </div>

    <div class="widget_section">
    <h3 class="widget-title">Categories</h3>

    <?php $categories =  $this->site->whereRows('news_category','status',1); ?>

    <?php if($categories){ ?>

    <ul class="widget_left Categori_s">

        <?php foreach ($categories as $key => $category) { ?>

            <a href="<?= base_url('news/category/'.lcfirst(str_replace(' ','_',$category->title))); ?>">
                <li>
                <?=  $category->title; ?>
                </li>
            </a>

        <?php } ?>

        <!-- <a href="#" class="active">

            <li>Self-Driving</li>

        </a>



        <a href="#">

            <li>Shared Mobility</li>

        </a>



        <a href="#">

            <li>Driver Training Guide</li>

        </a>



        <a href="#">

            <li>Delivery</li>

        </a>



        <a href="#">

            <li>Driver Organizing</li>

        </a>



        <a href="#">

            <li>Driving Strategies</li>

        </a>



        <a href="#">

            <li>Policies & Information</li>

        </a>



        <a href="#">

            <li>Special Contributor</li>

        </a> -->



    </ul>
</div>

    <?php } ?>





</div>