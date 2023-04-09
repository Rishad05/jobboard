<!-- SUB-HEADER SECTION -->
<!-- <section class="sub_header_sec">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 text-center">
                <div class="sub_header">
                    <h2> <?php if($user_type == 'doctor'){ echo "Doctor ";} ?> Registration</h2>
                </div>
                <div class="breadcrumb_menu">
                    <ul class="list-inline">
                        <li><a href="<?= base_url(); ?>">Home</a></li>
                        <li><span><?php if($user_type == 'doctor'){ echo "Doctor";} ?>Registration</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="content_area reg_form">
    <?php $status = $this->site->checksitebar(array('slug'=>'registration')); ?>
    <div class="container">

        <div class="row content_holder clearfix">

            <div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
                <div class="section_area contact_form">
                    <div class="section_title">
                        <h2>Become a Member </h2>
                    </div>
                    <?php //echo validation_errors() ?>
                    <?php if($error)  { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?= $error; ?>
                    </div>
                    <?php } if($message) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?= $message; ?>
                    </div>
                    <?php } ?>
                    <div class="section_content">
                        <?php echo form_open_multipart("auth/member_registration/", 'id="myForm" class="validation form_singel " onsubmit="return validateForm()"'); ?>
                        <div class="file_ulpoad_btn">
                            <input type='file' id="imgInp" class="img_input" name="userfile" />
                            <img width="200px;" id="blah" class="img_holder"
                                src="<?= $frontend_assets ?>images/default-user-image.png" alt="your image" />
                            <i class="fa fa-plus-circle upload_icon"></i>

                        </div>
                        <span class="photo-size">Add photo(250px x 250px)</span>

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_input('name',set_value('name'),'class="form-control first_name " placeholder="Name*"'); ?>
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <!-- <input type="date" class="form-control last_name" name="date_of_birth" placeholder="Date of Birth"> -->
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date_of_birth"
                                            placeholder="Date of Birth" autocomplete="off">

                                    </div>
                                    <div class="docs-datepicker-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_input('nick',set_value('nick'),'class="form-control first_name " placeholder="Nick"'); ?>

                            </div>
                            <div class="col-md-6">
                                <?= form_input('education',set_value('education'),'class="form-control first_name " placeholder="Education"'); ?>

                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_input('occupation',set_value('occupation'),'class="form-control first_name " placeholder="Occupational Details"'); ?>
                            </div>
                            <div class="col-md-6">
                                <?= form_input('organization',set_value('organization'),'class="form-control first_name " placeholder="Membership in other Organization"'); ?>
                            </div>

                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_input('resident_address',set_value('resident_address'),'class="form-control first_name " placeholder="Resident Address" '); ?>
                            </div>
                            <div class="col-md-6">
                                <?= form_input('mobile',set_value('mobile', '+88'),'class="form-control first_name " placeholder="Mobile*" '); ?>
                                <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_input('email',set_value('email'),'class="form-control first_name " placeholder="Email*" '); ?>

                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="col-md-6">
                                <?= form_password('password', '', 'class="form-control tip" id="password"  required="required"  placeholder="Password*"'); ?>
                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                            </div>

                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <?= form_password('confirm_password', '', 'class="form-control tip" id="confirm_password" required="required"  placeholder="Confirm Password*"'); ?>
                                <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <button type="submit" name="reg" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>

            <?php if($status != 'no'){ ?>
            <div class="col-md-4">
                <?php echo $this->tec->right_bar(); ?>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
<script>
$('input[name="mobile"]').keyup(function(e) {
    if (/\D/g.test(this.value)) {
        // Filter non-digits from input value.
        this.value = this.value.replace(/\D/g, '');

        this.value = '+' + this.value;
    }
});
// function validateForm() { 

//   var fname = document.forms["myForm"]["first_name"].value;
//   if (fname == "") { 
//     $('.first_name').css('border','1px solid red');
//     return false;
//   } 
//   var lname = document.forms["myForm"]["last_name"].value;
//   if (lname == "") { 
//     $('.last_name').css('border','1px solid red'); 
//      return false;
//   } 
//   var phone = document.forms["myForm"]["phone"].value;
//   if (phone == "") { 
//     $('#phone').css('border','1px solid red');
//     return false;
//   } 
//   var address = document.forms["myForm"]["address"].value;
//   if (address == "") { 
//     $('.address').css('border','1px solid red');
//     return false;
//   } 
//   var email = document.forms["myForm"]["email"].value;
//   if (email == "") { 
//     $('#email').css('border','1px solid red');
//     return false;
//   } 
//   // var pass = document.forms["myForm"]["password"].value;
//   // if (pass == "") { 
//   //   $('.password').css('border','1px solid red');
//   //   return false;
//   // }  

// }



function addMore() {
    var id = Math.random().toString(36).substring(7);

    $('#dynamic_field').append('<div id="qu_' + id +
        '" class="form-row mb-3"><div class="col-md-3"><input type="text" name="degree[]" id="degree" class="form-control address text-center" placeholder="Degree/Diploma"></div><div class="col-md-3"><input type="text" name="year[]" id="Year" class="form-control address text-center" placeholder="Year"></div><div class="col-md-3"><input type="text" name="institution[]" id="degree" class="form-control address text-center" placeholder="Institution"></div><div class="col-md-3"><input type="file" name="certificate[]"><span>Max size 1mb (jpg|png|jpeg|pdf)</span></div><i onClick="removeFiled(\'' +
        id + '\')" class="fa fa-times"></i></div>');
}


function removeFiled(id) {

    $('#qu_' + id).html('');
}
</script>
<!-- <style type="text/css">
   label {
   margin-top: 17px;
   }
   .kbw-signature { 
   width: 400px; 
   height: 200px;
   border: 1px solid #008c44;
   box-shadow: 0 0 12px #c9c5c5; 
   }
   .sing_main p button {
   font-size: 18px !important;
   padding: 10px 40px !important;
   margin-top: 20px !important;
   }
   .contai {
   display: block;
   position: relative;
   padding-left: 35px;
   margin-bottom: 12px;
   cursor: pointer;
   font-size: 16px;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   /* Hide the browser's default radio button */
   .contai input {
   position: absolute;
   opacity: 0;
   cursor: pointer;
   }
   /* Create a custom radio button */
   .checkmark {
   position: absolute;
   top: 0;
   left: 0;
   height: 25px;
   width: 25px;
   background-color: #eee;
   border-radius: 50%;
   }
   /* On mouse-over, add a grey background color */
   .contai:hover input ~ .checkmark {
   background-color: #ccc;
   }
   /* When the radio button is checked, add a blue background */
   .contai input:checked ~ .checkmark {
   background-color: #008C44;
   }
   /* Create the indicator (the dot/circle - hidden when not checked) */
   .checkmark:after {
   content: "";
   position: absolute;
   display: none;
   }
   /* Show the indicator (dot/circle) when checked */
   .contai input:checked ~ .checkmark:after {
   display: block;
   }
   /* Style the indicator (dot/circle) */
   .contai .checkmark:after {
   top: 9px;
   left: 9px;
   width: 8px;
   height: 8px;
   border-radius: 50%;
   background: white;
   }
   .check-box .form-check.form-check-inline {
   margin-top: 20px;
   }


  .reg_form .section_content {
    box-shadow: 0 0 9px #ddd;
    padding: 10px 40px;
}

.reg_form .form_singel .form-control {
    box-shadow: none;
    padding: 15px 5px;
    border-bottom: 1px dotted;
}
.Qualification_div {
    position: relative;
}
.Qualification_div #add_more_field {

    background-color: #008c44;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 4px 30px;
    margin: 4px 6px;
    border-radius: 20px;

}
#dynamic_field .fa.fa-times {

    background-color: #028d45;
    color: #fff;
    padding: 8px 34px;
    margin: 5px 6px;
    border-radius: 20px;

}
</style> -->


<style type="text/css">
.nid_main {
    border-bottom: 1px dotted;
    width: 126%;
    padding: 6px 0 0 10px;
    color: #495057;
}

.nid_main label {
    font-size: 14px;
    margin-right: 10px;
    color: #495057;
}

.form-group.Nid_uploadx span {
    padding-left: 11px;
    font-size: 13px;
}
</style>