 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?= $frontend_assets; ?>/css/bootstrap.min.css">

     <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
     <link href="<?= $frontend_assets; ?>/css/jquery.jConveyorTicker.min.css" rel="stylesheet">
     <!-- Fontawesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="<?= $frontend_assets; ?>/css/all.min.css">

     <link rel="stylesheet" href="<?= $frontend_assets; ?>css/lightbox.min.css">
     <link rel="stylesheet" href="<?= $frontend_assets; ?>light-box/css/lightbox.min.css">

     <!--POGO Slider CSS -->
     <link rel="stylesheet" href="<?= $frontend_assets; ?>pogo-slider-master/src/pogo-slider.css">

     <!--slick Slider CSS -->
     <link rel="stylesheet" href="<?= $frontend_assets; ?>css/slick.css">

     <!-- Main CSS -->
     <link rel="stylesheet" type="text/css" href="<?= $frontend_assets; ?>css/style.css">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <link rel="stylesheet" href="<?= $frontend_assets; ?>newsticker/eocjs-newsticker.css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

     <!-- <link href="<?= $frontend_assets ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />  
		<script type="text/javascript" src="<?= $frontend_assets; ?>js/jquery-3.3.1.min.js"></script> -->

     <title>Golden Infotech</title>
 </head>

 <body class="Header_stky_menu">
     <!--HEADER SECTION-->
     <header id="header">
         <section class="top_bar">
             <div class="container">
                 <div class="row clearfix">
                     <?php //print_r($Settings);
                        //$phones = explode(',', $Settings->phone_number);
                        //is_array($phones)  
                        ?>
                     <div class="col-md-12">
                         <ul class="list-inline float-md-left">
                             <li>
                                 <i class="fa fa-phone-volume"></i>
                                 <a href="tel:<?= $Settings->phone_number ?>">
                                     <?= $Settings->phone_number ?></a>
                             </li>
                             <li>
                                 <a href="mailto:<?= $Settings->default_email ?>">
                                     <i class="fas fa-envelope"></i> <?= $Settings->default_email ?>
                                 </a>
                             </li>
                         </ul>
                         <ul class="ml-auto list-inline float-md-right">
                             <!-- <li>
									<i class="fa fa-comments"></i> <a href="">Chat With US</a>
								</li> -->
                             <li>
                                 <div id="google_translate_element"></div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </section>
         <section class="main menu" id="nv_bar">
             <div class="container">
                 <nav class="navbar navbar-expand-md navbar-light">
                     <a class="navbar-brand" href="<?= base_url(); ?>">
                         <?php if ($Settings->logo) { ?>
                             <img src="<?= base_url('uploads/' . $Settings->logo); ?>" alt="LOGO"></a>
                 <?php } ?>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <?php $this->site->whereRows('pages', 'status', 1); ?>
                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav ml-auto">
                         <li class="nav-item" id="home">
                             <a class="nav-link" href="<?= base_url(); ?>">Home</span></a>
                         </li>
                         <!-- <li class="nav-item has_sub_menu" id="about">
                                 <a class="nav-link" href="<?= base_url('about'); ?>">About Us <i
                                         class="fas fa-angle-down"></i></span></a>
                                 <ul class="list-inline sub_menu">
                                     <li id="teams"><a href="<?= base_url('teams'); ?>">Our Team</a></li>
                                     <li id="sister_concern"><a href="<?= base_url('sister_concern'); ?>">Sister
                                             Concern</a></li>
                                     <li id="aos"><a href="<?= base_url('aos'); ?>">AOS</a></li>
                                     <li id="aos2"><a href="<?= base_url('aos2'); ?>">AOS2</a></li>
                                     <li id="partners"><a href="<?= base_url('partners'); ?>">Our partners</a></li>
                                 </ul>
                             </li>
                             <li class="nav-item has_sub_menu" id="services">
                                 <?php $services = $this->site->whereRows('services', 'status', 1, 'ASC'); ?>
                                 <a class="nav-link" href="<?= base_url('services'); ?>">Services <i
                                         class="fas fa-angle-down"></i></a>
                                 <ul class="list-inline sub_menu">
                                     <?php if ($services) {
                                            foreach ($services  as $key => $service) { ?>
                                     <li><a id="<?= strtolower(str_replace(' ', '_', $service->title)) ?>"
                                             href="<?= base_url('services/details/' . strtolower(str_replace(' ', '_', $service->title))); ?>"><?= $service->title; ?></a>
                                     </li>
                                     <?php }
                                        } ?>
                                 </ul>
                             </li>-->
                         <!-- <li class="nav-item" id="training">
                             <a class="nav-link" href="<?= base_url('auth/applicant_login'); ?>">Login</span></a>
                         </li> -->
                         <!-- <li class="nav-item" id="jobs">
                             <a class="nav-link" href="<?= base_url('career'); ?>">Career</span></a>
                         </li> -->
                         <!--  <li class="nav-item" id="jobs">
                             <a class="nav-link" href="<?= base_url('jobs'); ?>">Current Job</span></a>
                         </li> -->

                         <?php
                            if (isset($_SESSION['member_id'])) {
                                // show logout button
                                echo '<li class="nav-item has_sub_menu" id="news">
                                            <a class="nav-link" href="' . base_url('career') . '">Career <i class="fas fa-angle-down"></i></span></a>
                                            <ul class="list-inline sub_menu">
                                                <li><a href="' . base_url('personal_information/insert_personal_info') . '">Update Your Profile Information</a></li>
                                                <li><a href="' . base_url('jobs') . '">Apply for a Position</a></li>
                                                <li><a href="' . base_url('jobs/applicant_applied_jobs') . '">My Applied Jobs</a></li>
                                                <li><a href="' . base_url('personal_information/user_all_data') . '">View My Resume</a></li>
                                                <li><a href="' . base_url('auth/logout') . '">Logout</a></li>
                                            </ul>
                                      </li>';
                            } else {
                                // show login button
                                echo '<li class="nav-item" id="training">
                                            <a class="nav-link" href="' . base_url('auth/applicant_login') . '">Login</span></a>
                                      </li>';
                                echo '<li class="nav-item" id="training">
                                            <a class="nav-link" href="' . base_url('auth/applicant_register') . '">Registration</span></a>
                                      </li>';
                            }
                            ?>

                         <!-- <li class="nav-item has_sub_menu" id="news">
                                <a class="nav-link" href="#">News & Media <i class="fas fa-angle-down"></i></span></a>
                                <ul class="list-inline sub_menu">
                                    <li><a href="<?= base_url('news'); ?>">News</a></li>
                                    <li><a href="<?= base_url('gallery'); ?>">Gallery</a></li>
                                    <li><a href="<?= base_url('training/calendar'); ?>"> FDB Calender</a></li>
                                    <li><a href="<?= base_url('jobs/calendar'); ?>">Job Calender</a></li>
                                </ul>
                            </li> -->

                         <!-- <li class="nav-item">
					        <a class="nav-link" href="<?= base_url('news'); ?>">News & Media</span></a>
					      </li> -->
                         <!-- <li class="nav-item" id="contacts">
                                 <a class="nav-link" href="<?= base_url('contacts'); ?>">Contact Us</span></a>
                             </li> -->
                     </ul>
                     <!-- <ul class="navbar-nav ml-auto">
					      <li class="nav-item drive_btn">
					        <a class="nav-link" href="driver.html"><img src="assets/images/driver_with_icons-white.png" alt=""> Drive With Faretrim</span></a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#about">Contact Us</a>
					      </li>
					    </ul> -->
                 </div>
                 </nav>
             </div>
         </section>
     </header>