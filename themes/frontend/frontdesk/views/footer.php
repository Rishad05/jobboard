<section id="footer" class="footer_bigs_section" style="background-color: #000000;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="foot_big_inner_sect">
                    <div class="foot_big_inner_logo">

                        <?php if ($Settings->footer_logo) { ?>

                            <img src="<?= base_url('uploads/' . $Settings->footer_logo); ?>" width="170px" alt="LOGO"></a>
                        <?php } ?>
                    </div>
                    <p class="copyright_main" style="color:white">
                        © 2023 goldeninfotech.com.bd All Rights Reserved.
                    </p>
                    <p class="footer_big_about_dtl" style="color:white">
                        <!-- <?= $this->Settings->about_us ?> -->
                        Your trustworthy company to build services or transform your existing systems to the next level.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="foot_big_inner_sect">
                    <h3 class="bi_foot_title">
                        Contact Us
                    </h3>
                    <div class="foonter_icon_div">
                        <h5>Phone</h5>
                        <div>
                            <span class="footer_contack_icon"><i class="fas fa-phone-volume"></i></span>
                            <span><?= $this->Settings->phone_number ?></span>
                        </div>
                    </div>
                    <div class="foonter_icon_div">
                        <h5>Email</h5>
                        <div>
                            <a href="#">
                                <span class="footer_contack_icon">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <span><?= $this->Settings->default_email ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="foonter_icon_div">
                        <h5>Support</h5>
                        <div>
                            <a href="#">
                                <span class="footer_contack_icon">
                                    <i class="fas fa-globe"></i>
                                </span>
                                <span>goldeninfotech.com.bd</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="foot_big_inner_sect">
                    <h3 class="bi_foot_title">
                        Getting Around
                    </h3>
                    <div class="big_foot_list">
                        <ul>
                            <li><a href="<?= base_url('jobs'); ?>">Career</a></li>
                            <!-- <li><a href="#">Who We Are</a></li> -->

                            <!-- <li><a href="#">What We Offer</a></li> -->

                            <!-- <li><a href="#">Our Partners</a></li> -->
                        </ul>
                        <ul>
                            <!-- <li><a href="#">News</a></li> -->
                            <!-- <li><a href="<?= base_url('jobs'); ?>">Career</a></li> -->
                            <!-- <li><a href="#">Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="footer_last" style="background-color: #4d4c4c;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_last_inner">
                    <ul>
                        <!-- <li><a href="<?= base_url('accessibility'); ?>">Accessibility</a></li>-->
                        <li><a href="<?= base_url('terms_conditions'); ?>">Terms and Conditions</a></li>
                        <li>|</li>
                        <li><a href="<?= base_url('privacy_policy'); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6"></div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_last_inner">
                    <h3 class="bi_foot_title">
                        Social
                    </h3>
                    <div class="footer_social_last_icon">
                        <a target="_blank" href="<?= $this->Settings->facebook ?>" class="fb_social">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="#" class="in_social">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a target="_blank" href="#" class="tw_social">
                            <i class="">
                                <img class="footer_connect_us" src="<?php echo base_url('uploads/connect_icon.png'); ?>" alt="Connect Us" />
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
                $("#Newsticker").eocjsNewsticker({
                    speed: 25,
                    timeout: 0.5
                });
</script>

<script type="text/javascript">
    window.onscroll = function() {
        myFunction()
    };
    var navbar = document.getElementById("nv_bar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v5.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=install_email page_id="205038622957771">
</div>


<?php
$CI = &get_instance();
$CI->load->model('event');
$events = $CI->event->events();
?>

<!-- <?php
        $CI->load->model('Jobs_model');
        $jobs = $CI->Jobs_model->clander_jobs();
        ?> -->

<?php
$CI->load->model('News_model');
$newses = $CI->News_model->newsForClander();

?>



<script type="text/javascript" src="<?= $frontend_assets; ?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?= $frontend_assets; ?>js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= $frontend_assets; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $frontend_assets; ?>js/all.min.js"></script>
<!-- POGO Slider JS -->
<script src="<?= $frontend_assets; ?>pogo-slider-master/src/jquery.pogo-slider.js"></script>
<!-- translator -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<!-- slick Slider JS -->
<script src="<?= $frontend_assets; ?>js/slick.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link href="<?= $frontend_assets; ?>event-calendar/equinox.css" rel="stylesheet" type="text/css">
<script src="<?= $frontend_assets; ?>event-calendar/equinox.min.js"></script>
<script src="<?= $frontend_assets ?>newsticker/eocjs-newsticker.js"></script>
<script src="<?= $frontend_assets; ?>js/jquery.jConveyorTicker.min.js"></script>
<script type="text/javascript" src="<?= $frontend_assets; ?>js/custom.js"></script>
<script>
    $(function() {
        $('.js-conveyor-example').jConveyorTicker({
            reverse_elm: true
        });
    });
</script>
</body>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<script>
    $('#event-calendar').equinox({
        events: [
            <?php
            if ($newses) {
                foreach ($newses as $key => $news) { ?> {
                        start: '<?= $news->created_at ?>',
                        end: '<?= $news->created_at ?>',
                        title: '<?= str_replace("'", '', $news->title) ?>',
                        url: '<?= base_url('news/details/' . $news->slug); ?>',
                        class: '',
                        color: '#000',
                        data: {},
                    },
                <?php }
            }
            if ($events) {
                foreach ($events as $key => $event) { ?> {
                        start: '<?= $event['start_date'] ?>',
                        end: '<?= $event['start_date'] ?>',
                        title: '<?= str_replace("'", '', $event['title']) ?>',
                        url: '<?= $event['slug'] ? base_url('training/details/' . $event['slug']) : base_url('training/detail/' . $event['id']); ?>',
                        class: '',
                        color: '#000',
                        data: {},
                    },
            <?php }
            }
            ?>
        ],
    });
</script>


<script>
    $('.jobs-calendar').equinox({
        events: [
            <?php if ($events) {
                foreach ($jobs as $key => $job) { ?> {
                        start: '<?= $job->created_at ?>',
                        end: '<?= $job->created_at ?>',
                        title: '<?= $job->positions ?>',
                        url: '<?= base_url('jobs/details/' . $job->id); ?>',
                        class: '',
                        color: '#000',
                        data: {},
                    },
            <?php
                }
            }
            ?>
        ],
    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<script>
    function getCalendar(target_div, year, month) {
        $.ajax('<?php echo base_url('home/event_calender/'); ?>' + year + '/' + month, {
            success: function(data, status, xhr) { // success callback function
                $('#' + target_div).html(data);
            }
        });

        /*$.get( '<?php echo base_url('home/eventCalendar/'); ?>'+year+'/'+month, function( html ) {
                $('#'+target_div).html(html);
            });*/
    }

    function getEvents(date) {
        $.get('<?php echo base_url('home/getEvents/'); ?>' + date, function(html) {
            $('#event_list').html(html);
            $('#event_list').slideDown('slow');
        });
    }
</script>
<script>
    /*$(document).on("mouseenter", ".date_cell", function(){
		    date = $(this).attr('date');
		    $(".date_popup_wrap").fadeOut();
		    $("#date_popup_"+date).fadeIn();
		});*/
    /*$(document).on("mouseleave", ".date_cell", function(){
        $(".date_popup_wrap").fadeOut();
    });*/
    $(document).on("change", ".month_dropdown", function() {
        getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
    });
    $(document).on("change", ".year_dropdown", function() {
        getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
    });
    $(document).click(function() {
        $('#event_list').slideUp('slow');
    });
</script>
<!-- Customer panel menu active by js -->
<script type="text/javascript">
    var pathname = window.location.pathname; // Returns path only     
    var res = pathname.split("/");
    var sizeof = res.length;
    console.log(res);
    console.log(sizeof);
    console.log(res[sizeof - 2]);
    if (res[sizeof - 2] == 'home') {
        $('#home').addClass('active');
    } else if (res[sizeof - 1] == '') {
        $('#home').addClass('active');
    } else if (res[sizeof - 1] == 'about') {
        $('#about').addClass('active');
    } else if (res[sizeof - 1] == 'services') {
        $('#services').addClass('active');
    } else if (res[sizeof - 1] == 'gallery') {
        $('#gallery').addClass('active');
    } else {
        $('#' + res[2]).addClass('active');
    }
</script>
<script type="text/javascript">
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            $(".Header_stky_menu").addClass("darkHeader");
        } else {
            $(".Header_stky_menu").removeClass("darkHeader");
        }
    });
</script>

</body>

</html>