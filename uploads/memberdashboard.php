

<!-- SUB-HEADER SECTION -->
<section class="sub_header_sec">
   <div class="container">
      <div class="row clearfix">
         <div class="col-md-12 text-center">
            <div class="sub_header">
               <h2>Dashboard</h2>
            </div>
            <div class="breadcrumb_menu">
               <ul class="list-inline">
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><span>Login</span></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- SUB-HEADER SECTION  END-->
<!-- CONTENT SECTION -->
<div class="content_area">
   <div class="container">
      <!-- WITH SIDEBAR CONTENT AREA -->
      <div class="row content_holder clearfix">
         <div class="col-md-4">
            <div class="sidebar_section">
               <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link <?php if($this->uri->segment(3) != 'changepass' && $this->uri->segment(3) != 'edit' && $this->uri->segment(3) != 'addpost' && $this->uri->segment(3) != 'editpost' && $this->uri->segment(3) != 'abstract'){echo 'active';} ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-one" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'changepass'){echo 'active';} ?> " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-two" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'edit'){echo 'active';} ?>" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-three" role="tab" aria-controls="v-pills-messages" aria-selected="false">Update Profile</a>

                  <a class="nav-link" target="_blank" href="<?= base_url('forums'); ?>">BOS Forum</a>

                  <a class="nav-link" id="list_forum_post" data-toggle="pill" href="#v-pills-six" role="tab" aria-controls="v-pills-settings" aria-selected="false">Forum Post List</a>
                  <?php if($this->uri->segment(3) == 'editpost'){ ?>
                  <a class="nav-link <?php if($this->uri->segment(3) == 'editpost'){echo 'active';} ?>" id="update_forum_post" data-toggle="pill" href="#v-pills-seven" role="tab" aria-controls="v-pills-settings" aria-selected="false">Edit Post</a>
                  <?php } ?>

                  <a class="nav-link <?php if($this->uri->segment(3) == 'addpost'){echo 'active';} ?>" id="create_forum_post" data-toggle="pill" href="#v-pills-five" role="tab" aria-controls="v-pills-settings" aria-selected="false">Create Forum Post</a>

                  <a class="nav-link <?php if($this->uri->segment(3) == 'abstract'){echo 'active';} ?>" id="send_abstract" data-toggle="pill" href="#v-pills-nine" role="tab" aria-controls="v-pills-settings" aria-selected="false">Send Abstract</a>

                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-four" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <!-- NEWS SINGLE CONTENT SECTION -->
            <div class="section_area news_single_content contact_form reg_form">
               <div class="section_content">
                  <?php 
                     //echo $this->uri->segment(3);
                     if($error)  { ?>
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
                  <?php //print_r($info); ?>
                  <div class="tab-content " id="v-pills-tabContent">
                     <div class="tab-pane fade <?php if($this->uri->segment(3) != 'changepass' && $this->uri->segment(3) != 'edit' && $this->uri->segment(3) != 'addpost' && $this->uri->segment(3) != 'editpost' && $this->uri->segment(3) != 'abstract'){echo 'show active';} ?> " id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="user_info">
                           <a href="#" class="pay_online">Pay Online</a>
                           <div class="img_section_main">
                              <?php if($info->avatar){ ?>
                           <div class="user_img we_main">
                              <img src="<?php echo base_url('uploads/avatars/'.$info->avatar); ?>" alt="">
                           </div>
                           <span class="avatar_title">
                              <?= $this->site->member_group($info->group_id); ?>
                           </span>
                           
                           <?php }else{ ?>
                          <div class="user_Main_div">
                            <div class="user_img we_main">
                              <img width="200px;" id="blah" class="img_holder" src="<?= $frontend_assets ?>images/default-user-image.png" alt="your image" />                              
                           </div>
                          </div>
                           <?= $this->site->member_group($info->group_id); ?>
                           <?php } ?>

                           </div>

                           <?php
                              $createdDate = date('Y-m-d', $info->created_on); 
                              $renewalDate = date('d-m-Y', strtotime($createdDate. ' + 730 days'));
                              $today = date('Y-m-d');
                              $diff = abs(strtotime($today) - strtotime($renewalDate));

                              $totalDay = floor($diff / (60*60*24)); // 7 
                           ?>

                           <div class="info_alls">
                              <div class="account_status">
                                 <p>Account Status<br>
                                 <?php if($info->active == 1){
                                    echo '<a class="active_account">Active</a>';
                                 }else{
                                    echo '<a class="inactive_account">InActive</a>';
                                 } ?> 
                                 </p>
                              </div>
                              <div class="pay_ment_status">
                                 <p>Payment Status<br>
                                   <?php if($info->payment_status == 1){
                                     echo '<a class="Pain_active">Paid</a>'; 
                                   }else{ 
                                    echo '<a class="unPain_active">Unpaid</a>';
                                   } ?>   
                                 </p>
                              </div>
                              <div class="renew_date">
                                 <div class="date_re_nw_main">
                                    <p>Renewal Date</p>
                                 </div>
                                 <div class="date_month_day_main">
                                    <?= $this->tec->hrld($renewalDate.' 11:59:59pm'); ?>
                                 </div>
                                 <div class="date_day_main">
                                    <?= $totalDay; ?> days Left
                                 </div>
                              </div>
                           </div>
                           <div class="user_info_content">
                               <p><span>Member Id : </span><?php echo $info->reg_number; ?></p>
                              <p><span>Name : </span><?php echo $info->first_name.' '.$info->last_name; ?></p>
                              <p><span>Designation : </span><?php echo $info->dr_designation; ?></p>
                              <p><span>Date of birth : </span><?php echo $info->date_of_birth; ?></p>
                              <p><span>Fathers name : </span><?php echo $info->fathers_name; ?></p>
                              <p><span>Mothers name : </span><?php echo $info->mothers_name; ?></p>
                              <p><span>Spouse name : </span><?php echo $info->spouse_name; ?></p>
                              <p><span>Profession of spouse : </span> <?php echo $info->profession_of_spouse; ?></p>
                              <p><span>Profession of spouse : </span><?php echo $info->profession_of_spouse; ?></p>
                              <p><span>Nationality : </span><?php echo $info->nationality; ?></p>
                              <p><span>National id : </span><?php echo $info->nid_no; ?></p>
                              <p><span>Passport no : </span><?php echo $info->passport_no; ?></p>
                              <p><span>Email : </span><?php echo $info->email; ?></p>
                              <p><span>Telephone : </span><?php echo $info->telephone; ?></p>
                              <p><span>Cel phone : </span><?php echo $info->sel_phone; ?></p>
                              <p><span>Present address : </span><?php echo $info->present_address; ?></p>
                              <p><span>Permanent address : </span><?php echo $info->permanent_address; ?></p>
                              <p><span>BMDC registration no : </span> <?php echo $info->bmdc_egistration_no; ?></p>

                              <p><span>Signature : </span>  
                                 <?php if($info->signature){ ?>

                                    <img width="100px;" src="<?= base_url('uploads/signature/'.$info->signature); ?>">

                                 <?php } ?>
                              </p>
                              <p><span>NID : </span>  
                                 <?php if($info->nidfile){ ?>

                                    <img width="200px" src="<?= base_url('uploads/nid/'.$info->nidfile); ?>">

                                 <?php } ?>
                              </p>
                              <?php //print_r($qualification); ?>
                              <table class="table table-bordered text-center">
                                 <thead>
                                    <tr>
                                       <th colspan="3">Qualification</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Degree</td>
                                       <td>Year</td>
                                       <td>Institution</td>
                                    </tr>
                                    <?php foreach ($qualification as $key => $value) {  ?>
                                    <tr>
                                       <td><?= $value->degree; ?></td>
                                       <td><?= $value->year; ?></td>
                                       <td><?= $value->institution; ?></td>
                                    </tr> 
                                    <?php if($value->certificate){ ?>
                                    <tr>
                                       <td colspan="4">
                                           <embed src="<?= base_url('uploads/certificate/'.$value->certificate); ?>" width="200px" height="200px" />
                                       </td>
                                    </tr>
                                   
                                    <?php }
                                 } ?> 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade <?php if($this->uri->segment(3) == 'changepass'){echo 'active show';} ?>" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h5 class="font-bold mb-3">Change Your Password</h5>
                        <?= form_open('member/change_password', 'class="form_singel"') ?>
                        <div class="form-row mb-3">
                           <div class="col">
                              <input type="password" class="form-control" name="old_password" placeholder="Old Password*">
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col">
                              <input type="Password" class="form-control" name="new_password" placeholder="New Password*">
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col">
                              <input type="Password" class="form-control" name="new_password_confirm" placeholder="Confirm Password*">
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                        <?= form_close(); ?>
                     </div>

                     <div class="tab-pane fade <?php if($this->uri->segment(3) == 'edit'){echo 'active show';} ?>" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h5 class="font-bold mb-3"></h5>
                        <div class="section_title">
                           <h2>Update Your Profile</h2>
                        </div>
                        <div id="form_desable_dynamic">
                        <?php //print_r($info); ?> 
                        <?= form_open_multipart('member/update_member/'.$info->detailsId, 'class="form_singel" ') ;?> 
                        	<?php if($info->p_photo){  ?>
                           <div class="file_ulpoad_btn">
                              <input type='file' id="imgInp" class="img_input" name="userfile" />
                              <img width="200px;" id="blah" class="img_holder" src="<?= base_url('uploads/avatars/'.$info->p_photo); ?>" alt="your image" />
                              <i class="fa fa-plus-circle upload_icon"></i>

                           </div>
                            <span class="photo-size">Add photo(250px x 250px)</span>
	                       <?php }else{ ?>
	                       	<div class="file_ulpoad_btn">
                              <input type='file' id="imgInp" class="img_input" name="userfile" />
                              <img width="200px;" id="blah" class="img_holder" src="<?= $frontend_assets ?>images/default-user-image.png" alt="your image" />
                              <i class="fa fa-plus-circle upload_icon"></i>

                           	</div>
                            <span class="photo-size">Add photo(250px x 250px)</span>
	                       <?php } ?>
                            
                           <div class="form-row mb-3">
                              <!-- <label class="col-md-2">Name: </label> -->
                              <div class="col-md-6">
                                 <?= form_input('name', $info->name, 'class="form-control first_name text-uppercase" placeholder="Name*"') ?> 
                                 <?php echo '<div class="error">'.form_error('name').'</div>';  ?>
                              </div>
                              <div class="col-md-6">                    
                                 <input type="date" class="form-control last_name" name="date_of_birth" value="<?= $info->date_of_birth; ?>" placeholder="Date of Birth">
                                 <?php echo '<div class="error">'.form_error('date_of_birth').'</div>';  ?>
                                 </div>
                              
                           </div>
                           <div class="form-row mb-3">
                              <div class="col-md-6">
                                 <?= form_input('designation', $info->designation, 'class="form-control last_name" placeholder="Present Designation"')?> 
                                 <?php echo '<div class="error">'.form_error('designation').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('fathers_name', $info->fathers_name, 'class="form-control first_name" placeholder="Father’s Name"') ?> 
                                 <?php echo '<div class="error">'.form_error('fathers_name').'</div>';  ?>
                              </div>
                           </div>
                           <div class="form-row mb-3">
                              <div class="col-md-6">
                                 <?= form_input('mothers_name', $info->mothers_name, 'class="form-control first_name" placeholder="Mother’s Name"') ?> 
                                 <?php echo '<div class="error">'.form_error('mothers_name').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('  spouse_name', $info->spouse_name, 'class="form-control first_name" placeholder="Spouse Name"') ?> 
                                 <?php echo '<div class="error">'.form_error('  spouse_name').'</div>';  ?>
                              </div>
                           </div>
                           <div class="form-row mb-3">
                              <div class="col-md-6">
                                 <?= form_input('profession_of_spouse', $info->profession_of_spouse, 'class="form-control first_name " placeholder="Profession of Spouse"') ?> 
                                 <?php echo '<div class="error">'.form_error('profession_of_spouse').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('no_of_children', $info->no_of_children, 'class="form-control first_name " placeholder="No. of Children"') ?> 
                                 <?php echo '<div class="error">'.form_error('no_of_children').'</div>';  ?>
                              </div>
                           </div>
                           <div class="form-row mb-3">
                              <div class="col-md-6">
                                 <?= form_input('nationality', $info->nationality, 'class="form-control first_name " placeholder="Nationality"') ?> 
                                 <?php echo '<div class="error">'.form_error('nationality').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('nid_no', $info->nid_no, 'class="form-control first_name " placeholder="National ID No"') ?> 
                                 <?php echo '<div class="error">'.form_error('nid_no').'</div>';  ?>
                              </div>

                           </div>
                           <div class="form-row mb-3">
                              <div class="col-md-6">
                                 <?= form_input('passport_no', $info->passport_no, 'id="passport_no" class="form-control Email" placeholder="Passport No" ')?> 
                                 <?php echo '<div class="error">'.form_error('passport_no').'</div>';  ?>
                              </div> 
                              <div class="col-md-6">
                                 <?= form_input('telephone', $info->telephone, 'id="telephone" class="form-control phone" placeholder="Telephone"')?> 
                                 <?php echo '<div class="error">'.form_error('telephone').'</div>';  ?>
                              </div>
                           </div>
                           <div class="form-row mb-3">
                              
                              <div class="col-md-6">
                                 <?= form_input('sel_phone', $info->sel_phone, 'id="sel_phone" class="form-control phone" placeholder="Cell Phone"')?> 
                                 <?php echo '<div class="error">'.form_error('sel_phone').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('present_address', $info->present_address, 'id="present_address" class="form-control address" placeholder="Present Address"')?> 
                                 <?php echo '<div class="error">'.form_error('present_address').'</div>';  ?>
                              </div>
                           </div>
                           <div class="form-row mb-3">
                              
                              <div class="col-md-6">
                                 <?= form_input('permanent_address', $info->permanent_address, 'id="permanent_address" class="form-control address" placeholder="Permanent Address"')?> 
                                 <?php echo '<div class="error">'.form_error('address').'</div>';  ?>
                              </div>
                              <div class="col-md-6">
                                 <?= form_input('bmdc_egistration_no', $info->bmdc_egistration_no, 'id="permanent_address" class="form-control address" placeholder="BMDC Registration No*"')?> 
                                 <?php echo '<div class="error">'.form_error('bmdc_egistration_no').'</div>';  ?>
                              </div>
                           </div> 
                           <div class="form-row mb-3">
                               <div class="col-md-6">
                                 <?= form_input('email', $info->email, 'id="email" class="form-control Email" placeholder="E-mail Address*" readonly="readonly"')?> 
                                 <?php echo '<div class="error">'.form_error('email').'</div>';  ?>
                              </div> 
                           </div>
                           <h3>Qualification</h3> 
                            <input type="checkbox" name="updatequalification" onclick="qualificationupdate()" id="updatequalific" value="1"> If you want update qualification checked here (Of course select certificate image if there are certificate)<br>
                           <?php //print_r($qualification); 
                           if(!$qualification){
                           ?>
                           <div class="form-row mb-3 Qualification_div" id="">
                            
                              <div class="col-md-2">
                                 <input type="text" name="degree[]" id="address" class="form-control address text-center" placeholder="Degree/Diploma"> 
                              </div>
                              <div class="col-md-2">
                                 <input type="text" name="year[]" id="address" class="form-control address text-center" placeholder="Year">  
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="institution[]" id="address" class="form-control address text-center" placeholder="Institution"> 
                              </div>
                              <div class="col-md-4">
                                  <input type="file" name="certificate[]">
                              </div>
                              <button type="button" onclick="addMore()" id="add_more_field"><i class="fa fa-times"></i></button>
                           </div>
                       		<?php }else{ 
                           echo "<div id='updatequadesabed'>";
                       		foreach ($qualification as $key => $value) { 
                       		?>

                       		<div id="qu_<?= $value->id; ?>" class="form-row mb-3 Qualification_div"> 
                              <div class="col-md-2">
                                 <input type="text" name="degree[]" id="address" class="form-control address text-center" value="<?= $value->degree; ?>" placeholder="Degree/Diploma"> 
                              </div>
                              <div class="col-md-2">
                                 <input type="text" name="year[]" id="address" class="form-control address text-center" value="<?= $value->year; ?>" placeholder="Year">  
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="institution[]" id="address" class="form-control address text-center" value="<?= $value->institution; ?>" placeholder="Institution"> 
                              </div>
                              <div class="col-md-4"><input type="file" name="certificate[]"></div>
                              <?php if($key==0){ ?>
                              <button type="button" onclick="addMore()" id="add_more_field"><i class="fas fa-plus"></i></button>
                          		<?php }else{ ?>
                          			<button onclick="removeFiled(<?= $value->id; ?>)" class="remove_btn"><i class="fa fa-times"></i></button>
                          		<?php } ?>
                           </div>

                       		<?php 
	                       		}
                              echo "</div>";
	                       	} ?>

                           <div id="dynamic_field"></div>
                           <div class="form-group">
                              <?= lang('Upload Signature', 'Upload Signature'); ?><!-- <samp class="required-star">*</samp>  --> 
                              <input type="file" name="signature"><br>
                              <span>Max size 250px x 250px</span>
                              
                           </div>
                           <?php if($info->signature){ ?>
                                 <img width="100px" src="<?= base_url('uploads/signature/'.$info->signature); ?>">
                              <?php } ?>

                           <div class="form-group">
                              <?= lang('Upload Nid', 'Upload Nid'); ?><!-- <samp class="required-star">*</samp>  --> 
                              <input type="file" name="nidfile"><br>
                              <span>jpg|jpeg|png|pdf (Max size 500kb)</span>
                             
                           </div>
                            <?php if($info->nidfile){ ?>
                                 <img width="100px" src="<?= base_url('uploads/nid/'.$info->nidfile); ?>"><br><br>
                              <?php } ?>
                           <div class="form-row">
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary">Update Profile</button>
                              </div>
                           </div>
                        <?= form_close(); ?>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="v-pills-six" role="tabpanel" aria-labelledby="list_forum_post">
                        <h5 class="font-bold mb-3">Forum Post List</h5>
                        <table class="table"> 
                          <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Topic</th>
                            <th>##</th>
                          </tr> 
                        <?php foreach ($forumPost as $key => $value) { ?>
                          <tr>
                             <td><?= $value->title; ?></td>
                             <td><?= $value->category; ?></td>
                             <td><?= $value->topic; ?></td>
                             <td>
                                <a href="<?= base_url('member/dashboard/editpost/'.$value->post_id); ?>">Edit</a>
                             </td>
                          </tr>
                        <?php } ?>
                        </table>
                     </div>
                     <div class="tab-pane fade <?php if($this->uri->segment(3) == 'addpost'){echo 'active show';} ?>" id="v-pills-five" role="tabpanel" aria-labelledby="create_forum_post">
                        <h5 class="font-bold mb-3">Create New BOS Forum Post</h5>
                        <?= form_open('member/addforumpost', 'class="form_singel"') ?>

                        <div class="form-row mb-3">
                           <div class="col">       
                               <?php
                               $category = $this->site->wheres_rows('forum_category', null); 
                               $cat[''] = "Select Forum Category";
                               foreach ($category as $value) {
                                 $cat[$value->id] = $value->title;
                               }
                               ?>
                               <?= form_dropdown('category_id', $cat, set_value('category_id'), 'class="form-control tip" id="forum_category_id" onchange="myFunction()" '); ?>
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col" id="category_wise_topic">
                              <?php
                      
                               $top[''] = "Select Forum Topic";
                               
                               ?>
                               <?= form_dropdown('topic_id', $top, set_value('topic_id'), 'class="form-control tip" id="topic_id"'); ?>
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col">
                              
                              <?= form_input('title', set_value('title'), 'class="form-control tip" id="title" placeholder="Title"'); ?>
                           </div>
                        </div>

                        <div class="form-row mb-3">
                           <div class="col">
                              
                               <?= form_textarea('post_description', set_value('post_description'), 'class="form-control tip" id="forum_post_description"'); ?>
                           </div>
                        </div>
                        
                        <div class="form-row mb-3">
                           <div class="col">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                        <?= form_close(); ?>

                         
                     </div>

                     <?php if($this->uri->segment(3) == 'editpost'){ ?>
                     <div class="tab-pane fade <?php if($this->uri->segment(3) == 'editpost'){echo 'active show';} ?>" id="v-pills-seven" role="tabpanel" aria-labelledby="update_forum_post">
                        <h5 class="font-bold mb-3">Update BOS Forum Post</h5>
                        <?= form_open('member/editforumpost/'.$postInfo->id, 'class="form_singel"') ?>

                        <div class="form-row mb-3">
                           <div class="col">       
                               <?php
                               $category = $this->site->wheres_rows('forum_category', null); 
                               $cat[''] = "Select Forum Category";
                               foreach ($category as $value) {
                                 $cat[$value->id] = $value->title;
                               }
                               ?>
                               <?= form_dropdown('category_id', $cat, $postInfo->category_id, 'class="form-control tip" id="forum_category_id2" required="required" onchange="myFunction2()" '); ?>
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col" id="category_wise_topic2">
                              <?php
                      
                               $top[''] = "Select Forum Topic";
                               foreach ($postCatInfo as $key => $cats) {
                                  $top[$cats->id] = $cats->title;
                               }
                               ?>
                               <?= form_dropdown('topic_id', $top, $postInfo->topic_id, 'class="form-control tip" id="topic_id2" required="required"'); ?>
                           </div>
                        </div>
                        <div class="form-row mb-3">
                           <div class="col">
                              
                              <?= form_input('title', $postInfo->title, 'class="form-control tip" id="title" placeholder="Title"'); ?>
                           </div>
                        </div>

                        <div class="form-row mb-3">
                           <div class="col">
                              
                               <?= form_textarea('post_description', $postInfo->description, 'class="form-control tip" id="forum_post_description_update"'); ?>
                           </div>
                        </div>
                        
                        <div class="form-row mb-3">
                           <div class="col">
                              <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                        </div>
                        <?= form_close(); ?>

                         
                     </div>
                     <?php } ?>

                     <div class="tab-pane fade <?php if($this->uri->segment(3) == 'abstract'){echo 'active show';} ?>" id="v-pills-nine" role="tabpanel" aria-labelledby="send_abstract">
                        <h5 class="font-bold mb-3">Send Abstract</h5>

                        <?= form_open_multipart('member/abstract_send/', 'class="form_singel"') ?> 
                        <div class="form-row mb-3">
                           <div class="col">
                              
                              <?= form_input('abstract_title', set_value('abstract_title'), 'class="form-control tip" id="abstract_title" placeholder="Title"'); ?>
                           </div>
                        </div>

                        <div class="form-row mb-3">
                           <div class="col">
                              
                               <?= form_textarea('abstract_description', set_value('abstract_description'), 'class="form-control tip" id="sendabastract"'); ?>
                           </div>
                        </div>

                        <div class="form-row mb-3">
                           <div class="col">
                              <span>Attach File Max Size 5mb(pdf|jpg|jpeg|png)</span><br>
                                <input type="file" name="abstract_file" class="abstract_file">

                           </div>
                        </div>
                        
                        <div class="form-row mb-3">
                           <div class="col">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                        <?= form_close(); ?>

                     </div>

                     <div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h5 class="font-bold mb-3">Logout From Your Account</h5>
                        <button type="button" class="btn btn-primary btn-sm"><a href="<?php echo base_url('logout-home'); ?>">Logout</a></button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- NEWS SINGLE CONTENT SECTION END -->
         </div>
      </div>
      <!-- WITH SIDEBAR CONTENT AREA END -->
      <!-- LOGO AREA -->
      <!-- LOGO AREA END -->
   </div>
</div>
<!-- CONTENT SECTION END -->
<script>  
   function addMore(){
      var id = Math.random().toString(36).substring(7); 
   
       $('#dynamic_field').append('<div id="qu_'+id+'" class="form-row mb-3"><div class="col-md-3"><input type="text" name="degree[]" id="degree" class="form-control address text-center" placeholder="Degree/Diploma"></div><div class="col-md-3"><input type="text" name="year[]" id="Year" class="form-control address text-center" placeholder="Year"></div><div class="col-md-3"><input type="text" name="institution[]" id="degree" class="form-control address text-center" placeholder="Institution"></div><div class="col-md-3"><input type="file" name="certificate[]"></div><i onClick="removeFiled(\''+id+'\')" class="fa fa-times"></i></div>');
   }
   
   
   function removeFiled(id){
   
     $('#qu_'+id).html('');
   }


   
</script>

<?php if($this->Settings->member_info_update == 'off'){ ?>
   <script type="text/javascript">
      var nodes = document.getElementById("form_desable_dynamic").getElementsByTagName('*');
        for(var i = 0; i < nodes.length; i++){
             nodes[i].disabled = true;
        }

         
   </script>
<?php } ?>



 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      
 <script>        
  tinymce.init({
     selector: "#forum_post_description, #forum_post_description_update, #sendabastract",theme: "modern",width: 680,height: 300,
     plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
          "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
     ],
     toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
     toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
     image_advtab: true , 
     relative_urls: false,
   remove_script_host : false,
     external_filemanager_path:"<?=base_url();?>resources/filemanager/",
     filemanager_title:"Responsive Filemanager" ,
     external_plugins: { "filemanager" : "<?=base_url();?>resources/filemanager/plugin.min.js"}
  }); 
 </script> 


<script type="text/javascript">
   
   function myFunction() {
      
      var id = $('#forum_category_id').val();
      var url = "<?= base_url('forums/cat_wise_topic'); ?>/"+id;
      
      $('#category_wise_topic').load(url);

    }
 </script>


 <script type="text/javascript">
   
   function myFunction2() {
      
      var id = $('#forum_category_id2').val();
      var url = "<?= base_url('forums/cat_wise_topic'); ?>/"+id;
      
      $('#category_wise_topic2').load(url);

    }
 </script>
 



 <script type="text/javascript">

    var nodes = document.getElementById("updatequadesabed").getElementsByTagName('*');
   
      for(var i = 0; i < nodes.length; i++){
           nodes[i].disabled = true;
      }

   function qualificationupdate()
    {
         
        var per = $('#updatequalific').val(); 
        
        if ($('#updatequalific').is(":checked"))
        {
         // alert(per);
           for(var i = 0; i < nodes.length; i++){
                 nodes[i].disabled = false;
            }
          //document.getElementById("updateqa").setAttribute("id", "div_top2");
            
        }
   }
         
</script>