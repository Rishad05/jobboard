<div class="col-md-3 widget">



    <h3 class="widget-title">Categories</h3>

    <?php $categories =  $this->site->whereRows('news_category','status',1); ?>

    <?php if($categories){ ?>

    <ul>

        <?php foreach ($categories as $key => $category) { ?>

            <a href="<?= base_url('news/category/'.lcfirst(str_replace(' ','_',$category->title))); ?>"><?=  $category->title; ?></a>

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

    <?php } ?>



</div>