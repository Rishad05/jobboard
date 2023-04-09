<section class="sub_header_sec">

    <div class="container">

        <div class="row clearfix">

            <div class="col-md-12 text-center">

                <div class="sub_header">

                    <h2><?= lang("Login"); ?></h2>

                </div>

                <div class="breadcrumb_menu">

                    <ul class="list-inline">

                        <li><a href="<?php echo base_url(); ?>"><?= lang("Home"); ?></a></li>

                        <li><span><?= lang("Login"); ?></span></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- SUB-HEADER SECTION  END-->



<!-- CONTENT SECTION -->

<div class="content_area">
    <?php $status = $this->site->checksitebar(array('slug' => 'member-login')); ?>
    <div class="container">

        <!-- WITH SIDEBAR CONTENT AREA -->

        <div class="row content_holder clearfix">

            <div class="<?php if ($status == 'no') {
                            echo 'col-md-12';
                        } else {
                            echo 'col-md-8';
                        } ?>">

                <!-- NEWS SINGLE CONTENT SECTION -->

                <div class="section_area contact_form Login_form">
                    <div class="section_title">
                        <h2><?= lang("Please_Login_Here"); ?></h2>
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
                    <div class="section_content">
                        <?php echo form_open("auth/member_login", 'class="validation form_singel"'); ?>

                        <div class="form-row mb-3">

                            <div class="col">

                                <?= form_input('identity', set_value('identity'), 'class="form-control" placeholder=' . lang("Email")); ?>

                            </div>

                        </div>
                        <div class="form-row mb-3">

                            <div class="col">

                                <?= form_password('password', set_value('password'), 'class="form-control" placeholder=' . lang("Password")); ?>

                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><?= lang("Login"); ?></button>
                                <div class="forget_pass_login">
                                    <p><a data-toggle="modal" data-target="#myModal" href="#"><?= lang("Forgot_your_password"); ?></a></p>
                                    <!-- Don't worry! click <a  data-toggle="modal" data-target="#myModal" href="#">here</a> To Reset | -->
                                    <!-- <a href="<?php echo base_url('registration'); ?>">Become a Member</a> -->
                                </div>
                                <div class="btn_links">
                                    <a href="<?php echo base_url('registration/member'); ?>" class="btn btn-primary btn_small"><i class="fas fa-user"></i><?= lang("Apply_For_Your_Membership"); ?> </a>
                                    <a href="<?php echo base_url('membership-renew'); ?>" class="btn btn-primary btn_small"><i class="fas fa-calendar-alt"></i>
                                        <?= lang("Renew_Your_Membership"); ?> </a>
                                </div>

                            </div>

                        </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

                <!-- NEWS SINGLE CONTENT SECTION END -->



            </div>






            <?php if ($status != 'no') { ?>
                <div class="col-md-4">

                    <?php echo $this->tec->right_bar(); ?>

                </div>
            <?php } ?>

        </div>

        <!-- WITH SIDEBAR CONTENT AREA END -->



        <!-- LOGO AREA -->

        <!-- Start Modal -->
        <div class="container">
            <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		    Open modal
		  </button> -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Forgot Password?</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php echo form_open("auth/forgot_password2", 'class="validation form_singel"'); ?>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <label>Enter your e-mail address below to reset your password.</label>
                            <input type="email" name="forgot_email" placeholder="E-mail">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- LOGO AREA END -->

    </div>

</div>

<!-- CONTENT SECTION END