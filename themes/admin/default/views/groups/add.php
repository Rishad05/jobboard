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
          <div class="col-lg-12"> <?php echo form_open_multipart("admin/groups/add", 'class="validation"'); ?>
            <div class="row">
              <div class="col-md-6">
               
                   <div class="form-group">
                      <label for="Group name">Group name<samp class="required-star">*</samp></label>
                      <?= form_input('group_name', set_value('group_name'), 'class="form-control tip" id="group_name"'); ?>
                    </div>
                    
                    <div class="form-group">
                    	 <label for="Group name">Employees<samp class="required-star"></samp></label><br />
                         <?php if($employees != FALSE){
							 foreach($employees as $employee) {
							  ?>
                        		 <input type="checkbox" name="employee_ids[]" value="<?php echo  $employee->employee_id ?>" /><span class="employee_name"> <?php echo  $employee->employee_name ?></span><br /> 
                         <?php  
							 }
                       	  }else{ ?>
							 <a href="<?php echo base_url('admin/employee/add') ?>">Create a new employee</a> 
						 <?php  }
						 ?>
                    
                    </div>
                    
                    
              </div>
            </div>
            <div class="form-group">
              <?= form_submit('group_add', 'Add Now', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close();?> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>
