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
        .error-massage {
            color: red !important;
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
                                            <h1 style="color:#ffffff">Login<br>
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
                            <li class="last-item">
                                <a href="<?= base_url('career') ?>"> Career</a>
                            </li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                            <li class="last-item">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <!-- Section  -->
        <section class="sign_up_wrapper d-flex align-items-center justify-content-center flex-column">
            <div class="text-center mb-4">
                <h1 class="text-center" style="color:aquamarine">Applicant Login</h1>
                <h3 class="text-center pt-3">Please enter your login details to access your account</h3>
            </div>
            <?php if ($error) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $error; ?>
                </div>
            <?php }
            if ($message) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $message; ?>
                </div>
            <?php } ?>
            <!-- <form action="" class="form_area needs-validation" novalidate> -->
            <?php echo form_open('auth/applicant_login', ['class' => 'form_area needs-validation']); ?>
            <!-- <small class="form-text text-muted text-center mb-3">Please login to your account.</small> -->
            <div class="form-group">
                <label for="email">Email </label>
                <!-- <input type="email" class="form-control" id="email" placeholder="Enter Email" required /> -->
                <?= form_input('identity', set_value('identity'), 'class="form-control" placeholder=' . lang("Email")); ?>
                <span class="error-massage"><?= form_error('identity'); ?></span>

                <div class="invalid-feedback">
                    Please Enter Email.
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <!-- <input type="password" class="form-control" id="password" placeholder="Enter Password" required /> -->
                <?= form_password('password', set_value('password'), 'class="form-control" placeholder=' . lang("Password")); ?>
                <span class="error-massage"><?= form_error('password'); ?></span>

                <div class="invalid-feedback">
                    Please Enter Password.
                </div>
            </div>
            <button type="submit" class="btn btn-info w-100 mt-3">Login</button>
            <div class="have_account_area">
                <h4>
                    Do you have't account? <a href="<?= base_url('auth/applicant_register') ?>">Create Account </a>
                </h4>
            </div>
            <div class="have_account_area mt-3">

                <h4>
                    You don't remember your password?
                    <a href="<?= base_url('auth/applicant_forgetpassview') ?>">Click Here </a>
                </h4>
            </div>
            <?php echo form_close(); ?>
        </section>
    </main>

    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/jquery.nice-select.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>