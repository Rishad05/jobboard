<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Forget Password</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= $frontend_assets; ?>images/header/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?= $frontend_assets; ?>sass/style.css" />
</head>

<body>
    <main>
        <!-- Section  -->
        <section class="sign_up_wrapper d-flex align-items-center justify-content-center flex-column">
            <div class="text-center mb-4">
                <img src="<?= $frontend_assets; ?>images/Logo.png" alt="logo" />
            </div>
            <!-- <form action="" class="form_area needs-validation" novalidate> -->
            <?php echo form_open('auth/applicant_forgot_password', ['class' => 'form_area needs-validation', 'novalidate' => 'true']); ?>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="forgot_email" class="form-control" id="email" placeholder="Enter Email" required />
                <div class="invalid-feedback">Please Enter Email.</div>
            </div>

            <button type="submit" class="btn btn-info w-100 mt-3">Forget</button>
            <!-- </form> -->
            <?php echo form_close(); ?>
        </section>
    </main>

    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>
</body>

</html>