<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 

data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">

  <div class="modal-dialog" style=" width: 800px;">

    <div class="modal-content">

      <?php // print_r($info); ?>

      <div class="modal-header">

        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>

        <h4 class="modal-title" id="myModalLabel"><?php echo $title.' ('. $info->group_name .')' ?></h4>

      </div>

      <div class="modal-body">

        <table cellspacing="0" cellpadding="0" border="0" class="table table-bordered table-hover table-striped" id="CompTable">

          <tbody>

            <tr>

              <td width="17%">Group name </td>

              <td><?php echo $info->group_name ; ?></td>

            </tr>
			<?php if($this->UserType == 'admin' || $this->UserType == 'admin_user') {  ?>
            <tr>

              <td>Company </td>

              <td><?php
			  
			  
			   $company =  $this->site->getCompanyById($info->company_id);
			  
			   echo $company->company_name ; ?></td>

            </tr>
            <?php } ?>
            
            <tr>

              <td>Employee </td>

              <td><?php
			   
			   $employee_ids = unserialize($info->employee_ids) ;
			   $emps = $this->site->where_in('employee','employee_id',$employee_ids);
			   print_r($emp);
			  if($emps != FALSE ){ ?>
				  <table class="table table-bordered table-hover table-striped" >
                  <body>
                  		<tr>
                        	<td colspan="5"><h4 class="modal-title" style="text-align:center">Employee list</h4> </td>
                        </tr>
                   		<tr>
                  			<th>Employee Name</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Report</th>
                        </tr>
                        <?php  foreach($emps  as $emp){ ?>
                        	<tr>
							   <td> <?php echo $emp->employee_name ?> </td>
                               <td> <?php echo  $emp->position ?> </td>
                               <td> <a href="mailto:<?php echo  $emp->email ?>" target="_top"><?php echo  $emp->email ?></a></td>
                               <td> <?php echo  $emp->phone ?></td>
                               <td> <a class='tip btn btn-report btn-xs'  href='<?php echo  site_url("admin/reports?employee_id=".$emp->employee_id."&company_id=".$info->company_id) ?> ' target="_blank" title='View report of <?php $emp->employee_name ?> '><i class='fa fa-file-text'></i></a> </td>
                            </tr>
						<?php  } ?> 
                    </body>
                  </table>
				   
				<? 
			  }
			   
			   ?></td>

            </tr>

            
            <tr>

              <td > Created At </td>

              <td><?php echo  $this->tec->hrld($info->created_at) ; ?></td>

            </tr>

            <tr>

              <td > Created By </td>

              <td><?php

			    $created_by = $this->tec->getUser($info->created_by) ; 

			    echo $created_by[0]->first_name.' '.$created_by[0]->last_name ; 

				?></td>

            </tr>

            <tr>

              <td> Updated At </td>

               <td><?php 
			    if( $info->updated_at !='0000-00-00 00:00:00'){
			   
			    echo $this->tec->hrld(date('Y-m-d H:i:s', $info->updated_at)) ; ?>
                
                <?php } ?>
                </td>

            </tr>

            <tr>

              <td > Updated By </td>

              <td>

              <?php

			  if($info->updated_by !=0){

			    $updated_by = $this->tec->getUser($info->updated_by) ; 

			    echo $updated_by[0]->first_name.' '.$updated_by[0]->last_name ; 

			  }

			  ?>

              </td>

          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>

