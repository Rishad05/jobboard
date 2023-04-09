<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sign Up</title>
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
                                            <h1 style="color:#ffffff">Registration<br>
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
                            <li class="last-item">Registration</li>
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
                <h1 class="text-center" style="color:aquamarine">Applicant Registration</h1>
                <h3 class="text-center pt-3">Please compleate the bellow form to create an applicant account</h3>
                <!-- <a href="<?= base_url(); ?>"><?= $Settings->site_name == 'SimplePOS' ? 'Simple<b>POS</b>' : '<img src="' . base_url('uploads/' . $Settings->logo) . '" alt="' . $Settings->site_name . '" width="350" />'; ?></a> -->
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
            <?php echo form_open('auth/applicant_register', ['class' => 'form_area needs-validation']); ?>
            <!-- <small class="form-text text-muted text-center mb-3">Please create an account.</small> -->
            <div class="form-group">
                <label for="name">Name </label>
                <!-- <input type="text" class="form-control" id="name" placeholder="Enter Name" required /> -->
                <input type="text" name="username" class="form-control" id="name" placeholder="Enter Name" required>
                <span class="error-massage"><?= form_error('username'); ?></span>
                <div class="invalid-feedback">Please Enter Name.</div>
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required />
                <span class="error-massage"><?= form_error('email'); ?></span>
                <div class="invalid-feedback">Please Enter Email.</div>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required />
                <span class="error-massage"><?= form_error('password'); ?></span>
                <div class="invalid-feedback">Please Enter Password.</div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password </label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" required />
                <span class="error-massage"><?= form_error('confirm_password'); ?></span>
                <div class="invalid-feedback">Please Enter Password.</div>
            </div>
            <button type="submit" class="btn btn-info w-100 mt-3">
                Create Account
            </button>

            <div class="have_account_area mt-3">
                <h4>
                    If you have an account.
                    <a href="<?= base_url('auth/applicant_login') ?>">Click Here </a>
                </h4>
            </div>
            <?php echo form_close(); ?>
            <!-- </form> -->
        </section>
    </main>

    <!-- JS Here -->
    <script src=".<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src=".<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <script src=".<?= $frontend_assets; ?>plugins/js/jquery.nice-select.min.js"></script>
    <script src=".<?= $frontend_assets; ?>plugins/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>
</body>

</html>