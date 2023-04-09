<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="hide()" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $title ?></h4>
      </div>
      <div class="modal-body">
        <div class="job_app_list_det">

          <p><b>Name:</b> <?= $info->full_name ?></p>
          <p><b>Positions:</b> <?= $info->positions ?></p>
          <p><b>Date Of Birth:</b> <?= $info->dob ?></p>
          <p><b>Email:</b> <?= $info->email ?></p>
          <p><b>Phone:</b> <?= $info->cell_phone_1 ?></p>
          <p><b>Current Position:</b> <?= $info->designation ?></p>
          <p><b>Current Organizations:</b> <?= $info->organization_name ?></p>
          <!-- <p><b>Experience:</b> <?= $info->experience ?></p> -->
          <p><b>Current Salary:</b> <?= $info->present_salary ?></p>
          <p><b>Expectation:</b> <?= $info->expected_salary ?></p>
          <p><b>Attachment:</b> <a target="_blank" href="<?= base_url('uploads/' . $info->upload_file); ?>">View CV</a></p>
        </div>
      </div>
    </div>
  </div>
</div>