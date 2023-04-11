<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Change Password</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= $frontend_assets; ?>images/header/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?= $frontend_assets; ?>sass/style.css" />
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
                                            <h1 style="color:#ffffff">Reset Password<br>
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
                            <li class="last-item">Reset Password</li>
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
                <h1 class="text-center" style="color:aquamarine">Applicant Reset Password</h1>
                <h3 class="text-center pt-3">Please enter your new password to access your account</h3>
                <!-- <img src="assets/images/Logo.png" alt="logo" /> -->
            </div>
            <!-- <form action="" class="form_area needs-validation" novalidate> -->
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
            <?= form_open('auth/reset_password_member/' . $code, ['class' => 'form_area needs-validation']); ?>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="new" class="form-control" id="password" placeholder="Enter Password" required />
                <div class="invalid-feedback">Please Enter Password.</div>
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirm Password </label>

                <input type="password" name="new_confirm" class="form-control" id="passwordConfirm" placeholder="Enter Confirm Password" required />
                <div class="invalid-feedback">Please Enter Confirm Password.</div>
            </div>
            <?php echo form_input($user_id); ?>
            <?php echo form_hidden($csrf); ?>
            <button type="submit" class="btn btn-info w-100 mt-3">
                Change Password
            </button>
            <?= form_close(); ?>
            </form>
        </section>
    </main>

    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>
</body>

</html>