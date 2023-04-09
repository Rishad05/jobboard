<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 

data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content">

      <?php // print_r($info); ?>

      <div class="modal-header">

        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>

        <h4 class="modal-title" id="myModalLabel"><?php echo $title.' ('. $info->first_name .' '.$info->last_name .')' ?></h4>

      </div>

      <div class="modal-body">

        <table cellspacing="0" cellpadding="0" border="0" class="table table-bordered table-hover table-striped" id="CompTable">

          <tbody>

             

            <tr>

              <td width="25%">First_name </td>

              <td><?php echo $info->first_name ; ?></td>

            </tr>

            <tr>

              <td width=" ">Last_name </td>

              <td><?php echo $info->last_name ; ?></td>

            </tr>

            <tr>

              <td width=" ">Gender </td>

              <td><?php echo $info->gender ; ?></td>

            </tr>

             <tr>

              <td >Email </td>

              <td><?php echo $info->email ; ?></td>

            </tr>

            <tr>

             <tr>

             <td >Username </td>

              <td><?php echo $info->username ; ?></td>

            </tr>

            <tr>

             <td >Phone </td>

              <td><?php echo $info->phone ; ?></td>

            </tr>

            <tr>

             <td >Register ip address </td>

              <td><?php echo $info->ip_address ; ?></td>

            </tr>

            <tr>

             <td >Last ip address </td>

              <td><?php echo $info->last_ip_address ; ?></td>

            </tr>

            <tr>

              <td > Created At </td>

              <td><?php  echo $this->tec->hrld(date('Y-m-d H:i:s', $info->created_on)) ; ?></td>

            </tr>

            <?php  if($UserType == 'admin'){ ?>

            <tr>

              <td > Created By </td>

              <td><?php

			    $created_by = $this->tec->getUser($info->created_by) ; 

			    echo $created_by[0]->first_name.' '.$created_by[0]->last_name ; 

				?></td>

            </tr>

            <?php } ?>

            <tr>

              <td > Last login </td>

              <td><?php  echo $this->tec->hrld(date('Y-m-d H:i:s', $info->last_login)) ; ?></td>

            </tr>
			<?php if($this->UserType == 'company_user' ) {  ?>
            <tr>

              <td > Group </td>

              <td><?php $users_group =   $info->users_group ; 
				$emps = $this->site->where_row('user_groups','user_groups_id',$users_group);
				echo  $emps->group_name ;
			   ?> </td>

            </tr>
    		<?php } ?>
            <tr>
              <td >Status</td>

              

              <td><?php 

			  if($info->active ==1){ echo '<span class="label label-success">Active</span>' ; }else { echo '<span class="label label-danger">Inactive</span>';} ; ?></td>

            </tr>

          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>

