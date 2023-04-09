<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>





<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box box-primary">

        <div class="box-header">

          <h3 class="box-title">

            <?= lang('enter_info'); ?>

          </h3>

        </div>

        <div class="box-body">

          <div class="col-lg-12"> 

		  <?php echo form_open("admin/groups/edit/".$group->user_groups_id); ?>

            <div class="row">
            
           <?php  $employee_ids = unserialize($group->employee_ids) ;
		   
		   		//	print_r($employee_ids);
		   ?>

              <div class="col-md-6">
               
                   <div class="form-group">
                      <label for="Group name">Group name<samp class="required-star">*</samp></label>
                      <?= form_input('group_name', $group->group_name, 'class="form-control tip" id="group_name"'); ?>
                    </div>
                    
                    <div class="form-group">
                    	 <label for="Group name">Employees<samp class="required-star"></samp></label><br />
                         <?php if($employees != FALSE){
							 foreach($employees as $employee) {
								 $checked = '';
								 for($i=0; $i<sizeof($employee_ids); $i++){
									 if($employee_ids[$i] == $employee->employee_id){
										 $checked ='checked="checked"';
									 }
								  }
								  ?>
                                 <input type="checkbox" <?php echo  $checked ?> name="employee_ids[]"  value="<?php echo  $employee->employee_id ?>" /><span class="employee_name"> <?php echo  $employee->employee_name ?> </span><br />  
								 
								<?php 
							 }
                       	  }
						 ?>
                    
                    </div>
                    
                    
              </div>

            </div>

            <div class="form-group">

              <?= form_submit('edit_groups', 'Update', 'class="btn btn-primary"'); ?>

            </div>

            <?php echo form_close();?> </div>

          <div class="clearfix"></div>

        </div>

      </div>

    </div>

  </div>

</section>

