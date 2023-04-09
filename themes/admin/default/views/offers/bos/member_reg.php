

<!-- SUB-HEADER SECTION -->
<section class="sub_header_sec">
   <div class="container">
      <div class="row clearfix">
         <div class="col-md-12 text-center">
            <div class="sub_header">
               <h2>Registration</h2>
            </div>
            <div class="breadcrumb_menu">
               <ul class="list-inline">
                  <li><a href="index.html">Home</a></li>
                  <li><span>Registration</span></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- SUB-HEADER SECTION  END-->
<!-- CONTENT SECTION -->
<div class="content_area reg_form">
   <?php $status = $this->site->checksitebar(array('slug'=>'registration')); ?>
   <div class="container">
      <!-- WITH SIDEBAR CONTENT AREA -->
      <div class="row content_holder clearfix">
         <!-- NEWS SINGLE CONTENT SECTION -->
         <div class="<?php if($status == 'no'){echo 'col-md-12'; }else{echo 'col-md-8'; } ?>">
            <div class="section_area contact_form">
               <div class="section_title">
                  <h2>Become a Member</h2>
               </div>
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
                  <?php echo form_open_multipart("auth/member_registration", 'id="myForm" class="validation form_singel " onsubmit="return validateForm()"'); ?> 
                  <div class="file_ulpoad_btn"> 
                     <input type='file' id="imgInp" class="img_input" name="userfile" />
                     <img width="200px;" id="blah" class="img_holder" src="<?= $frontend_assets ?>images/default-user-image.png" alt="your image" />
                     <i class="fa fa-plus-circle upload_icon"></i>
                     
                  </div>
                  <span class="photo-size">Add photo(250px x 250px)</span>
                  <div class="form-row mb-3">
                     <!-- <label class="col-md-2">Name: </label> -->
                     <div class="col-md-6">
                        <?= form_input('name', set_value('name'), 'class="form-control first_name text-uppercase" placeholder="Name*"') ?> 
                        <?php echo '<div class="error">'.form_error('name').'</div>';  ?>
                     </div>
                     <div class="col-md-6">                    
                        <input type="date" class="form-control last_name" name="date_of_birth" placeholder="Date of Birth">
                        <?php echo '<div class="error">'.form_error('date_of_birth').'</div>';  ?>
                     </div>
                  </div> 
                  <div class="form-row mb-3"> 
                     <div class="col-md-6">
                        <?= form_input('designation', set_value('designation'), 'class="form-control last_name" placeholder="Present Designation"')?> 
                        <?php echo '<div class="error">'.form_error('designation').'</div>';  ?>
                     </div>
                     <div class="col-md-6">
                        <?= form_input('fathers_name', set_value('fathers_name'), 'class="form-control first_name" placeholder="Father’s Name"') ?> 
                        <?php echo '<div class="error">'.form_error('fathers_name').'</div>';  ?>
                     </div>
                  </div>
                  <div class="form-row mb-3">
                     <div class="col-md-6">
                        <?= form_input('mothers_name', set_value('mothers_name'), 'class="form-control first_name" placeholder="Mother’s Name"') ?> 
                        <?php echo '<div class="error">'.form_error('mothers_name').'</div>';  ?>
                     </div>
                     <div class="col-md-6">
                        <?= form_input('  spouse_name', set_value('   spouse_name'), 'class="form-control first_name" placeholder="Spouse Name"') ?> 
                        <?php echo '<div class="error">'.form_error('  spouse_name').'</div>';  ?>
                     </div>
                  </div>
                  <div class="form-row mb-3">
                     <div class="col-md-6">
                        <?= form_input('profession_of_spouse', set_value('profession_of_spouse'), 'class="form-control first_name " placeholder="Profession of Spouse"') ?> 
                        <?php echo '<div class="error">'.form_error('profession_of_spouse').'</div>';  ?>
                     </div>
                     <div class="col-md-6">
                        <?= form_input('no_of_children', set_value('no_of_children'), 'class="form-control first_name " placeholder="No. of Children"') ?> 
                        <?php echo '<div class="error">'.form_error('no_of_children').'</div>';  ?>
                     </div>
                  </div>

                  <div class="form-row mb-3">
                     <div class="col-md-6">
                        <?= form_input('nationality', set_value('nationality'), 'class="form-control first_name " placeholder="Nationality"') ?> 
                        <?php echo '<div class="error">'.form_error('nationality').'</div>';  ?>
                     </div>
                     


                      <div class="col-md-6">
                      <?= form_input('email', set_value('email'), 'id="email" class="form-control Email" placeholder="E-mail Address*" autocomplete="off"')?> 
                        <?php echo '<div class="error">'.form_error('email').'</div>';  ?>
                    </div>

                  </div>
                  <div class="form-row mb-3">
                    <div class="col-md-6">
                      <?= form_password('password', set_value('password'), 'id="password" class="form-control password" placeholder="Password*" autocomplete="new-password"')?> 
                      <?php echo '<div class="error">'.form_error('password').'</div>';  ?>  
                    </div>
                    <div class="col-md-6">
                      <?= form_password('confirm_password', set_value('confirm_password'), 'id="confirm_password" class="form-control password" placeholder="Confirm Password*"')?> 
                      <?php echo '<div class="error">'.form_error('confirm_password').'</div>';  ?>  
                    </div>
                  </div>
                  <div class="form-row mb-3">   

                    <div class="col-md-6">
                        <?= form_input('nid_no', set_value('nid_no'), 'class="form-control first_name " placeholder="National ID No"') ?> 
                        <?php echo '<div class="error">'.form_error('nid_no').'</div>';  ?>
                     </div>
                     <!-- Nid File -->
                  <div class="form-group Nid_uploadx"> 
                     <div class="nid_main">
                        <?= lang('Upload Nid', 'Upload Nid'); ?><!-- <samp class="required-star">*</samp>  --> 
                      <input type="file" name="nidfile">
                     </div>
                      <span>Max size 500kb (jpg|jpeg|png|pdf)</span>
                  </div>
                     
                  </div>
                  <div class="form-row mb-3"> 
                      <div class="col-md-6">
                        <?= form_input('passport_no', set_value('passport_no'), 'class="form-control first_name " placeholder="Passport no"') ?> 
                        <?php echo '<div class="error">'.form_error('passport_no').'</div>';  ?>
                     </div> 
                      <div class="col-md-6">
                        <?= form_input('telephone', set_value('telephone'), 'id="telephone" class="form-control phone" placeholder="Mobile No"')?> 
                        <?php echo '<div class="error">'.form_error('telephone').'</div>';  ?>
                     </div>    
                      <div class="col-md-6">
                        <?= form_input('sel_phone', set_value('sel_phone'), 'id="sel_phone" class="form-control phone" placeholder="Cell Phone"')?> 
                        <?php echo '<div class="error">'.form_error('sel_phone').'</div>';  ?>
                     </div>   


                     <div class="col-md-6">
                        <?= form_input('present_address', set_value('present_address'), 'id="present_address" class="form-control address" placeholder="Present Address"')?> 
                        <?php echo '<div class="error">'.form_error('present_address').'</div>';  ?>
                     </div>                     
                     <div class="col-md-6">
                        <?= form_input('permanent_address', set_value('permanent_address'), 'id="permanent_address" class="form-control address" placeholder="Permanent Address"')?> 
                        <?php echo '<div class="error">'.form_error('address').'</div>';  ?>
                     </div>
                     <div class="col-md-6">
                        <?= form_input('bmdc_egistration_no', set_value('bmdc_egistration_no'), 'id="permanent_address" class="form-control address" placeholder="BMDC Registration No*"')?> 
                        <?php echo '<div class="error">'.form_error('bmdc_egistration_no').'</div>';  ?>
                     </div> 
                  </div> 
                  <div class="form-row mb-3 Qualification_div" id="">
                     <label class="col-md-12">Qualification : </label> 
                     <div class="col-md-3">
                      <input type="text" name="degree[]" id="address" class="form-control address text-center" placeholder="Degree/Diploma"> 
                     </div>
                     <div class="col-md-3">
                      <input type="text" name="year[]" id="address" class="form-control address text-center" placeholder="Year">  
                        
                     </div>
                     <div class="col-md-3">
                      <input type="text" name="institution[]" id="address" class="form-control address text-center" placeholder="Institution">  
                     </div>
                    <div class="col-md-3"><input type="file" name="certificate[]"><span>Max size 1mb (jpg|png|jpeg|pdf)</span></div>

                    <button type="button" onclick="addMore()" id="add_more_field"><i class="fas fa-plus"></i></button>
                  </div> 
                  <div id="dynamic_field"></div>
                  <div class="form-row mb-3">
                     <label class="col-md-2">
                     Membership Category:<br>
                      
                     </label>
                     <div class="col-md-10 check-box">
                        <div class="form-check form-check-inline">
                           <label class="contai">Life Member  
                           <input value="3" type="radio" checked="checked" name="group">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="contai">General Member  
                           <input value="4" type="radio" name="group">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <!-- <div class="form-check form-check-inline">
                           <label class="contai">Associate-member 
                           <input value="5" type="radio" name="group">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="contai">Honorary Member
                           <input value="6" type="radio" name="group">
                           <span class="checkmark"></span>
                           </label>
                        </div> -->
                     </div>
                  </div>
                   <div class="form-group"> 
                      <?= lang('Upload Signature', 'Upload Signature'); ?><!-- <samp class="required-star">*</samp>  --> 
                      <input type="file" name="signature"><br>
                      <span>Max size 250px x 250px</span>
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
         <!-- NEWS SINGLE CONTENT SECTION END --> 
         <?php if($status != 'no'){ ?>
         <div class="col-md-4">
            <?php echo $this->tec->right_bar(); ?>
         </div>
         <?php } ?>
      </div>
      <!-- WITH SIDEBAR CONTENT AREA END -->
      <!-- LOGO AREA -->
      <!-- LOGO AREA END -->
   </div>
</div>
<script>
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

  

  function addMore(){
     var id = Math.random().toString(36).substring(7); 

      $('#dynamic_field').append('<div id="qu_'+id+'" class="form-row mb-3"><div class="col-md-3"><input type="text" name="degree[]" id="degree" class="form-control address text-center" placeholder="Degree/Diploma"></div><div class="col-md-3"><input type="text" name="year[]" id="Year" class="form-control address text-center" placeholder="Year"></div><div class="col-md-3"><input type="text" name="institution[]" id="degree" class="form-control address text-center" placeholder="Institution"></div><div class="col-md-3"><input type="file" name="certificate[]"><span>Max size 1mb (jpg|png|jpeg|pdf)</span></div><i onClick="removeFiled(\''+id+'\')" class="fa fa-times"></i></div>');
  }


  function removeFiled(id){

    $('#qu_'+id).html('');
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