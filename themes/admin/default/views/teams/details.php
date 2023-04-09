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
              <td>Name </td>
              <td><?= $info->name ? $info->name : ''; ?></td>
            </tr>  
            <tr>
              <td>Designation</td>
              <td><?= $info->designation ? $info->designation : '' ; ?></td>
            </tr> 
            <tr>
              <td>Descriptions</td>
              <td><?= $info->descriptions ? $info->descriptions : '' ; ?></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><?= $info->address ? $info->address : '' ; ?></td>
            </tr> 
            <tr>
              <td>Email</td>
              <td><?= $info->email ? $info->email : ''; ?></td>
            </tr> 
            <tr>
              <td>Cell</td>
              <td><?= $info->cell ? $info->cell : ''; ?></td>
            </tr> 
            <tr>
              <td>Tel</td>
              <td><?= $info->tel ? $info->tel : ''; ?></td>
            </tr> 
            <tr>
              <td>Facebook</td>
              <td><?= $info->facebook ? $info->facebook : ''; ?></td>
            </tr> 
            <tr>
              <td>Twitter</td>
              <td><?= $info->twitter ? $info->twitter : ''; ?></td>
            </tr> 
            <tr>
              <td>Linked In</td>
              <td><?= $info->linkedin ? $info->linkedin : ''; ?></td>
            </tr> 
            <tr>
              <td>Linked In</td>
              <td><?= $info->linkedin ? $info->linkedin : ''; ?></td>
            </tr>  
            <tr>
              <td>Google Plus</td>
              <td><?= $info->googleplus ? $info->googleplus : ''; ?></td>
            </tr>  
          </tbody>
        </table>
      </div>
    </div>
  </div> 
</div>
 