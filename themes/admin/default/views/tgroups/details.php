<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 
data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $title ?></h4>
      </div> 
      <div class="modal-body">
        <table cellspacing="0" cellpadding="0" border="0" class="table table-bordered table-hover table-striped" id="CompTable">
          <tbody> 
            <tr>
              <td>Group Name </td>
              <td><?= $info->group_name ? $info->group_name : ''; ?></td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div> 
</div>
 