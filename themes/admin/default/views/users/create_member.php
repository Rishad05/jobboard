<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>

                </div>

                <div class="box-body">
                    <?= form_open_multipart('auth/create_member', 'class="" id="memberForm" '); ?>
                    <div class="col-lg-6"> 

                       <?php  if($this->UserType == 'admin'){ ?>

                        

                        <div class="form-group">

                          

                          <div class="form-group"  id="group" >

                           <label for="Company">Membership Category <samp class="required-star">*</samp></label>

                            <?php  
                            foreach ($groups as  $value) { 
                                $dt[$value->id] = $value->description;
                            }
                            ?>

                         	 <?= form_dropdown('group',  $dt, set_value('group'), 'class="form-control tip"  id="group"  ') ?>
                           </div>

                        </div>

                     
                         <?php } ?>

                        <div class="form-group">

                            <?= lang('Name', 'Name'); ?><samp class="required-star">*</samp>

                            <?= form_input('name', set_value('name'), 'class="form-control tip" id="name"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Date_of_Birth', 'Date_of_Birth'); ?>
                           
                             <?= form_input('date_of_birth',  set_value('date_of_birth'), 'class="form-control tip datepicker" id="date_of_birth"'); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Designation', 'Designation'); ?><!-- <samp class="required-star">*</samp>  -->

                            <?= form_input('designation', set_value('designation'), 'class="form-control tip" id="designation"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Father’s_Name', 'Father’s_Name'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('fathers_name', set_value('fathers_name'), 'class="form-control tip" id="fathers_name"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Mother’s_Name', 'Mother’s_Name'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('mothers_name', set_value('mothers_name'), 'class="form-control tip" id="mothers_name"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Spouse_Name', 'Spouse_Name'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('spouse_name', set_value('spouse_name'), 'class="form-control tip" id="spouse_name"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Profession_of_Spouse', 'Profession_of_Spouse'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('profession_of_spouse', set_value('profession_of_spouse'), 'class="form-control tip" id="profession_of_spouse"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('No._of_Children', 'No._of_Children'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('no_of_children', set_value('no_of_children'), 'class="form-control tip" id="no_of_children"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Nationality', 'Nationality'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('nationality', set_value('nationality'), 'class="form-control tip" id="Nationality"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('National_ID_No', 'National_ID_No'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('nid_no', set_value('nid_no'), 'class="form-control tip" id="nid_no" autocomplete="off" '); ?>

                        </div>                    
                        <div class="form-group">

                            <?= lang('Passport No', 'passport'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('passport_no', set_value('passport_no'), 'class="form-control tip" id="passport_no"  '); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('Telephone', 'Telephone'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('telephone', set_value('telephone'), 'class="form-control tip" id="telephone"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Cell_Phone', 'Cell_Phone'); ?><!-- <samp class="required-star">*</samp>  -->

                            <?= form_input('sel_phone', set_value('sel_phone'), 'class="form-control tip" id="sel_phone"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Present_Address', 'Present_Address'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('present_address', set_value('present_address'), 'class="form-control tip" id="present_address"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Permanent_Address', 'Permanent_Address'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('permanent_address', set_value('permanent_address'), 'class="form-control tip" id="permanent_address"  '); ?>

                        </div>
                         <div class="form-group">

                            <?= lang('BMDC Registration No', 'BMDC Registration No'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?= form_input('bmdc_egistration_no', set_value('bmdc_egistration_no'), 'class="form-control tip" id="permanent_address"  '); ?>

                        </div>

                        

                        <div class="form-group">

                            <?= lang('gender', 'gender'); ?><!-- <samp class="required-star">*</samp>  -->


                            <?php $gnders = array('male' => lang('male'), 'female' => lang('female')); ?>

                            <?= form_dropdown('gender', $gnders, set_value('gender'), 'class="form-control tip select2" style="width:100%;" id="gender"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('email', 'email'); ?><samp class="required-star">*</samp>


                            <?= form_input('email', set_value('email'), 'class="form-control tip" id="email"  '); ?>

                        </div>

                      

                        <div class="form-group">

                            <?= lang('password', 'password'); ?><samp class="required-star">*</samp>

                            <?= form_password('password', '', 'class="form-control tip" id="password"  autocomplete="new-password" '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('confirm_password', 'confirm_password'); ?><samp class="required-star">*</samp>

                            <?= form_password('confirm_password', '', 'class="form-control tip" id="confirm_password"  '); ?>

                        </div>

                        

                        <div class="form-group">

                            <?= lang('Upload Profile Photo', 'Upload Profile Photo'); ?><!-- <samp class="required-star">*</samp>  --> 
                            <input type="file" name="userfile">
                            <span>Max size 250X250</span>
                        </div>
                        <div class="form-group"> 
                            <?= lang('Upload Signature', 'Upload Signature'); ?><!-- <samp class="required-star">*</samp>  --> 
                            <input type="file" name="signature">
                            <span>Max size 250X250</span>
                        </div>
                        <div class="form-group"> 
                            <?= lang('Upload Nid', 'Upload Nid'); ?><!-- <samp class="required-star">*</samp>  --> 
                            <input type="file" name="nidfile">
                            <span>Max size 250X250</span><br>
                        </div>
                        <div class="form-group">

                            <?= lang('status', 'status'); ?><samp class="required-star">*</samp>

                            <?php

                            $opt = array(1 => lang('active'), 0 => lang('inactive'));

                            echo form_dropdown('status', $opt, (isset($_POST['status']) ? $_POST['status'] : ''), 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" style="width:100%;"');

                            ?>

                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <!-- form-inline Qualification_div -->
                        <div class="">
                            <label>Qualification </label><!-- <samp class="required-star">*</samp>  -->

                            <br> 
                            <div class="form-group col-md-3">
                                <input type="text" name="degree[]" id="degree" class="form-control address text-center" placeholder="Degree/Diploma"> 
                            </div>
                            
                            <div class="form-group col-md-3">
                                <input type="text" name="year[]" id="address" class="form-control address text-center" placeholder="Year">
                            </div>
                            <div class="form-group col-md-3"> 
                                <input type="text" name="institution[]" id="address" class="form-control address text-center" placeholder="Institution">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" name="certificate[]">
                                Max size 1mb (jpg|png|jpeg|pdf)
                            </div>

                             <button type="button" onclick="addMore()" id="add_more_field"><i class="fa fa-plus"></i></button>
                        </div> <br> 
                        <div id="dynamic_field"></div><br>



                        <div class="form-group">

                            <?= form_submit('add_user', lang('add_user'), 'class="btn btn-primary"'); ?>

                        </div>
                    </div>
                     <?= form_close(); ?>
                    <!-- End col 6 -->
                </div> 

            </div>

        </div>

    </div>

</section>

 <script type="text/javascript">
    function addMore(){
        var id = Math.random().toString(36).substring(7); 

        $('#dynamic_field').append('<div id="qu_'+id+'" class="form-row mb-3"><div class="col-md-3"><input type="text" name="degree[]" id="degree" class="form-control address text-center" placeholder="Degree/Diploma"></div><div class="col-md-3"><input type="text" name="year[]" id="Year" class="form-control address text-center" placeholder="Year"></div><div class="col-md-3"><input type="text" name="institution[]" id="degree" class="form-control address text-center" placeholder="Institution"></div><div class="form-group col-md-3"><input type="file" name="certificate[]">Max size 1mb (jpg|png|jpeg|pdf)</div><i onClick="removeFiled(\''+id+'\')" class="fa fa-times"></i></div>');
    }
    function removeFiled(id){

        $('#qu_'+id).html('');
    }
 </script>

<link href="<?= $assets ?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>

<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('.datepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
    }); 
 
     
</script> 