<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('update_info'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <?= form_open_multipart("admin/settings", 'class="validation"'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang("site_name", 'site_name'); ?>
                                    <?= form_input('site_name', $settings->site_name, 'class="form-control" id="site_name" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang("tel", 'tel'); ?>
                                    <?= form_input('tel', $settings->tel, 'class="form-control" id="tel" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('row_per_page', 'rows_per_page') ?>
                                    <?php
                                    $rw = array('10' => '10', '25' => '25', '50' => '50', '100' => '100');
                                    echo form_dropdown('rows_per_page', $rw, $settings->rows_per_page, 'class="form-control select2" id="rows_per_page" style="width:100%;" required="required"') ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('Phone Number', 'phone_number') ?>
                                    <?= form_input('phone_number', $settings->phone_number, 'class="form-control tip" id="phone_number"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('About Us', 'about_us') ?>
                                    <?= form_input('about_us', $settings->about_us, 'class="form-control tip" id="about_us"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('LinkedIn Link', 'linkedin'); ?>
                                    <?= form_input('linkedin', $settings->linkedin, 'class="form-control tip" id="linkedin"'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <?= lang('dateformat', 'dateformat'); ?> <a href="http://php.net/manual/en/function.date.php" target="_blank"><i class="fa fa-external-link"></i></a>
                                        <?= form_input('dateformat', $settings->dateformat, 'class="form-control tip" id="dateformat"  required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?= lang('timeformat', 'timeformat'); ?>
                                    <?= form_input('timeformat', $settings->timeformat, 'class="form-control tip" id="timeformat"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('default_email', 'default_email'); ?>
                                    <?= form_input('default_email', $settings->default_email, 'class="form-control tip" id="default_email" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('Address', 'address'); ?>
                                    <?= form_input('address', $settings->address, 'class="form-control tip" id="address"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('Facebook Link', 'facebook'); ?>
                                    <?= form_input('facebook', $settings->facebook, 'class="form-control tip" id="facebook"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('Twitter Link', 'twitter'); ?>
                                    <?= form_input('twitter', $settings->twitter, 'class="form-control tip" id="twitter"'); ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('login_logo', 'logo'); ?>
                                    <input type="file" name="userfile" id="logo"><br>
                                    <?php if ($settings->logo) { ?>
                                        <img src="<?= base_url('uploads/') . $settings->logo; ?>" width="160">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('Footer Logo', 'footerLogo'); ?>
                                    <input type="file" name="footerLogo" id="logo2"><br>
                                    <?php if ($settings->footer_logo) { ?>
                                        <img src="<?= base_url('uploads/') . $settings->footer_logo; ?>" width="160">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?= form_submit('update', lang('update_settings'), 'class="btn btn-primary"'); ?>
                        <?= form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>