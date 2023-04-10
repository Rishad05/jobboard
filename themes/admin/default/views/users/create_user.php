<?php (defined('BASEPATH')) OR exit('No direct script access allowed');?>

<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?=lang('enter_info');?></h3>

                </div>

                <div class="box-body">

                    <div class="col-lg-6">

                     <?=form_open('auth/create_user', 'class="validation"');?>
                        <div class="form-group">
                            <?=lang("group", "group");?><samp class="required-star">*</samp>
                            <?php
                            $groups = $this->site->selectQuery('groups');
                            $gp[""] = "";
                            foreach ($groups as $group) {
                                $gp[$group->id] = $group->name;
                            }
                            echo form_dropdown('group', $gp, set_value('group'), 'id="group" data-placeholder="' . lang("select") . ' ' . lang("group") . '" class="form-control input-tip select2" required="required"');
                            ?>
                        </div>
                        <div class="form-group company_grp" id="company" >
                            <?=lang("company", "company");?>
                            <?php
                            $companies = $this->site->whereRows('company','status',1);
                            $cm[""] = "";
                            foreach ($companies as $compan) {
                                $cm[$compan->id] = $compan->name;
                            }
                            echo form_dropdown('company_id', $cm, set_value('company_id'), 'id="company_id" data-placeholder="' . lang("select") . ' ' . lang("company") . '" class="form-control input-tip select2" ');
                            ?>
                        </div>
                        <div class="form-group"> 
                            <?=lang('first_name', 'first_name');?><samp class="required-star">*</samp>

                            <?=form_input('first_name', set_value('first_name'), 'class="form-control tip" id="first_name"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('last_name', 'last_name');?><samp class="required-star">*</samp>

                            <?=form_input('last_name', set_value('last_name'), 'class="form-control tip" id="last_name"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('phone', 'phone');?><samp class="required-star">*</samp>

                            <?=form_input('phone', set_value('phone'), 'class="form-control tip" id="phone"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('gender', 'gender');?><samp class="required-star">*</samp>

                            <?php $gnders = array('male' => lang('male'), 'female' => lang('female'));?>

                            <?=form_dropdown('gender', $gnders, set_value('gender'), 'class="form-control tip select2" style="width:100%;" id="gender"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('email', 'email');?><samp class="required-star">*</samp>

                            <?=form_input('email', set_value('email'), 'class="form-control tip" id="email"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('username', 'username');?><samp class="required-star">*</samp>

                            <?=form_input('username', set_value('username'), 'class="form-control tip" id="username"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('password', 'password');?><samp class="required-star">*</samp>

                            <?=form_password('password', '', 'class="form-control tip" id="password"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('confirm_password', 'confirm_password');?><samp class="required-star">*</samp>

                            <?=form_password('confirm_password', '', 'class="form-control tip" id="confirm_password"  required="required"');?>

                        </div>

                        <div class="form-group">

                            <?=lang('status', 'status');?><samp class="required-star">*</samp>

                            <?php

                            $opt = array(1 => lang('active'), 0 => lang('inactive'));

                            echo form_dropdown('status', $opt, (isset($_POST['status']) ? $_POST['status'] : ''), 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" style="width:100%;"');

                            ?>

                        </div>

                        <div class="form-group">

                            <label class="checkbox" for="notify"><input type="checkbox" name="notify" value="1" id="notify" checked="checked"/> <?=lang('notify_user_by_email')?></label>

                        </div>

                        <div class="form-group">

                            <?=form_submit('add_user', lang('add_user'), 'class="btn btn-primary"');?>

                        </div>

                        <?=form_close();?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style type="text/css">
    .company_grp{
        display: none;
    }
    
    .company_grp .select2 {

        width: 100% !important;

    }
</style>

<script>

$(document).ready(function(){

    $('#group').change(function() {

    var value  = $("#group option:selected").val(); 

	if( value == 3){

		$("#company").css('display','block')

	}else{

		$("#company").css('display','none')

	}

  });

});

</script>
