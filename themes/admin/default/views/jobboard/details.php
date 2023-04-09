<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal"  
data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $title ?></h4>
      </div>
      <div class="modal-body"> 
        <div>
           <p><b>Company Name:</b> <?= $users->name ? $users->name : ''; ?></p> 
           <p><b>Job Category:</b> <?= $category->name ? $category->name : ''; ?></p> 
           <p><b>Job Type:</b> <?php 
              if($job_board_type){ foreach ($job_board_type as $key => $job_board) {
              $job_type = $this->site->whereRow('job_type', 'id', $job_board->job_type_id);
              if($job_type){
                $job_type->name;
              }
            }
           } ?></p> 
           <p><b>Positions:</b> <?= $info->positions ? $info->positions : '';?></p>
           <p><b>#Vacancy:</b> <?= $info->vacancy ? $info->vacancy : ''; ?></p>
           <p><b>Location:</b> <?= $info->location ? $info->location : ''; ?></p>
           <p><b>Deadline:</b> <?= $info->last_date ? $info->last_date : ''; ?></p>
           <p><b>Descriptions:</b> <?= $info->descriptions ? $info->descriptions : ''; ?></p>
           <p><b>Education Experience:</b> <?= $info->education_experience ? $info->education_experience : ''; ?></p>
           <p><b>Additional Requirement:</b> <?= $info->additional_requirement ? $info->additional_requirement : ''; ?></p>
        </div> 
      </div>
    </div>
  </div>
</div>