<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sign In</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= $frontend_assets; ?>images/header/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/nice-select.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/select2.min.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>sass/style.css" />
    <style>
        ul.a {
            list-style-type: circle !important;
        }

        .list-style {
            list-style-type: circle !important;
        }
    </style>
</head>

<body>
    <section class="sub_header_sec">
        <div class="tg-innerpagebanner tg-haslayout">
            <div class="tg-pagetitle tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="page-title-wrap">
                                <div class="titlebar-sc-wrap">
                                    <p>
                                    </p>
                                    <div class="sc-boxed-call-to-cation  ">
                                        <div class="tg-titleandbtns">
                                            <h1 style="color:#ffffff">Career<br>
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
                                <a href="<?= base_url('') ?>">Home</a>
                            </li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                            <li class="last-item">Career</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h1 class="text-center" style="color:aquamarine">Welcome to Bitopi Group</h1>
    <h2 class="text-center pt-3">Build your dream career with us!</h2>

    <ul class="a">
        <?php if ($error) { ?>
            <div class="col-md-6 alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= $error; ?>
            </div>
        <?php }
        if ($message) { ?>
            <div class="col-md-6 alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= $message; ?>
            </div>
        <?php } ?>

        <?php
        if (isset($_SESSION['member_id'])) { ?>
            <div class="d-flex justify-content-center p-3  m-3">
                <!-- <div class="col-md-6"> -->
                <?php if ($personal_info != null) { ?>
                    <?php if (
                        $personal_info->full_name != null &&  $personal_info->email != null &&  $personal_info->dob != null && $personal_info->gender != null &&   $personal_info->blood_group != null &&  $personal_info->cell_phone_1 != null &&
                        $personal_info->religion != null &&
                        $personal_info->marital_status != null &&
                        $personal_info->nationality != null &&
                        $personal_info->national_id_number != null &&
                        $personal_info->father_name != null &&
                        $personal_info->mother_name != null &&
                        $personal_info->present_address != null &&
                        $personal_info->permanent_address != null
                    ) { ?>
                        <button class=" btn btn-dark nav-item m-3">
                            <a class="nav-link" href="<?= base_url('personal_information/insert_personal_info'); ?>">Update your profile information</span></a>
                        </button>
                        <button class=" btn btn-dark nav-item m-3">
                            <a class="nav-link" href="<?= base_url('jobs'); ?>">Apply for a Position</span></a>
                        </button>
                    <?php } else { ?>
                        <button class=" btn btn-dark nav-item m-3">
                            <a class="nav-link" href="<?= base_url('personal_information/insert_personal_info'); ?>">Add your profile information</span></a>

                        </button>
                    <?php } ?>
                <?php } else { ?>
                    <button class=" btn btn-dark nav-item m-3">
                        <a class="nav-link" href="<?= base_url('personal_information/insert_personal_info'); ?>">Add your profile information</span></a>

                    </button>
                <?php } ?>

                <button class=" btn btn-dark nav-item m-3"> <a class="nav-link" href="<?= base_url('jobs/applicant_applied_jobs'); ?>">My Applied Jobs</a></button>
                <!-- </div>
                <div class="col-md-6 "> -->
                <button class=" btn btn-dark nav-item m-3"> <a class=" nav-link" href="<?= base_url('personal_information/user_all_data'); ?>">View My Resume</a></button>
                <button class=" btn btn-dark nav-item m-3"> <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a></button>
                <!-- </div> -->
            </div>
        <?php } else { ?>
            <div class="d-flex justify-content-center p-3  m-3">
                <button class="btn btn-dark nav-item m-3" id="training">
                    <a class="nav-link" href="<?= base_url('auth/applicant_login') ?>">Applicant Login</span></a>
                </button>
                <button class=" btn btn-dark nav-item m-3" id="training">
                    <a class="nav-link" href=" <?= base_url('auth/applicant_register') ?>">Applicant Registration</span></a>
                </button>
            </div>
        <?php } ?>
    </ul>
    <!-- </div> -->
    <!-- <?php
            if (isset($_SESSION['member_id'])) {
                // show logout button
                echo '<li class="text-center nav-item has_sub_menu" id="news">
                                            <a class="nav-link" href="#">User Acoount <i class="fas fa-angle-down"></i></span></a>
                                            <ul class="list-inline sub_menu">
                                                <li><a href="' . base_url('personal_information/insert_personal_info') . '">Update Profile</a></li>
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
            ?> -->



    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/jquery.nice-select.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>