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
            <p><b>Title: </b><?= $info->title; ?></p>
            <p><b>Icon: </b><?= $info->icon; ?></p>
            <p><b>Thumbnail: </b><?php if($info->thumbnail){ ?> 
              <img src="<?= base_url('service/').$info->thumbnail; ?>">
              <?php } ?></p>
            <p><b>Short Descriptions: </b><?= $info->short_descriptions; ?></p>
            <p><b>Descriptions: </b><?= $info->descriptions; ?></p>
        </div> 
      </div>
    </div>
  </div>
</div>