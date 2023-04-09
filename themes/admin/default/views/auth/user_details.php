<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 

data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content"> 

      <div class="modal-header">

        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>

        <h4 class="modal-title" id="myModalLabel">Member Details</h4>
        <input style="float: right;" type="button" onclick="PrintElem('datapdftable')" value="Print" id="btnPrint" />
      </div> 
      
      <script type="text/javascript">
         function PrintElem(elem)
        {
            var img = '<img style="text-align: center;" src="http://timesavedhaka.com/bos/themes/frontend/bos_theme/assets/images/logo.png">'
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title  + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<h1>' + img  + '</h1>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }
      </script>
      <div class="modal-body" id="datapdftable" style="text-align: center;">   
              
       <!--  <?php print_r($info); ?> -->
                <table class="table table-bordered user_info" >
                  <tbody>
                    <?php if($info->avatar){ ?>
                    <tr class="img_avtr">
                     <div class="avtr_info">
                        <img width="100" src="<?= base_url('uploads/avatars/'.$info->avatar); ?>">
                     </div>
                    </tr>
                    <?php }else{  ?>
                    <tr class="img_avtr">
                     <div class="avtr_info">
                        <img width="100" src="<?= base_url('uploads/blank.png'); ?>">
                     </div>
                    </tr>
                    <?php } ?>  

                    <?php
                    //print_r($this->site->getLastRegistertMember());
                    $createdDate = date('Y-m-d', $info->activated_at); 
                    $renewalDate = date('d-m-Y', strtotime($createdDate. ' + 730 days'));
                    $today = date('Y-m-d');
                    $diff = abs(strtotime($today) - strtotime($renewalDate));

                      $totalDay = floor($diff / (60*60*24)); // 7
 
                    ?>
                    <tr>
                      <td>Member Id :</td>
                      <td><?= $info->reg_number; ?></td>
                    </tr>
                    <?php if($info->activated_at){  ?>
                    <tr>
                      <td>Renewal Date :</td>
                      <td><?php echo $renewalDate.' ( '.$totalDay.' Days left )'; ?></td>
                    </tr>                 
                  <?php } ?>
                    <tr>
                      <td>Name:</td>
                      <td><?= $info->first_name; ?></td>
                    </tr>
                    <tr>
                      <td>Date of Birth:</td>
                      <td><?= $info->date_of_birth; ?></td>
                    </tr>
                    <tr>
                      <td>Designation:</td>
                      <td><?= $info->designation; ?></td>
                    </tr>
                    <tr>
                      <td>Father’s Name:</td>
                      <td><?= $info->fathers_name; ?></td>
                    </tr>
                    <tr>
                      <td>Mother’s Name:</td>
                     <td><?= $info->mothers_name; ?></td>
                    </tr>
                    <tr>
                      <td>Spouse Name:</td>
                      <td><?= $info->spouse_name;?></td>
                    </tr>
                    <tr>
                      <td>Profession of Spouse:</td>
                      <td><?= $info->profession_of_spouse; ?></td>
                    </tr>
                    <tr>
                      <td>No. of Children:</td>
                      <td><?= $info->no_of_children; ?></td>
                    </tr>
                    <tr>
                      <td>Nationality:</td>
                      <td><?= $info->nationality; ?></td>
                    </tr>
                    <tr>
                      <td>National ID No:</td>
                      <td><?= $info->nid_no; ?></td>
                    </tr>
                    <tr>
                      <td>Passport No :</td>
                      <td><?= $info->passport_no; ?></td>
                    </tr>
                    <tr>
                      <td>Telephone:</td>
                      <td><?= $info->telephone; ?></td>
                    </tr>
                    <tr>
                      <td>Cell Phone:</td>
                      <td><?= $info->sel_phone; ?></td>
                    </tr>
                    <tr>
                      <td>Present Address:</td>
                      <td><?= $info->present_address; ?></td>
                    </tr>
                    <tr>
                      <td>Permanent Address:</td>
                      <td><?= $info->permanent_address; ?></td>
                    </tr>
                    <tr>
                      <td>BMDC Registration No:</td>
                      <td><?= $info->bmdc_egistration_no; ?></td>
                    </tr>
                    <tr>
                      <td>Gender:</td>
                      <td><?= $info->gender; ?></td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><?= $info->email; ?></td>
                    </tr>
                    
                    <tr>
                      <td>Status:</td>
                      <td><?php if($info->active == 1){echo "Active";}else{echo "Inactive";} ?></td>
                    </tr>

                    <tr>
                      <td>Payment Status:</td>
                      <td><?php if($info->payment_status == 1){echo "Paid";}else{echo "Unpaid";} ?></td>
                    </tr>

                    <tr>
                      <td>Membership Category:</td>
                      <td><?= $this->site->member_group($info->group_id); ?></td>
                    </tr>
                    <tr>
                      <td>Signature :</td>
                      <td>
                        <?php if($info->signature){ ?>
                          <img width="100px" src="<?= base_url('uploads/signature/'.$info->signature); ?>">
                        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Nid :</td>
                      <td>
                        <?php if($info->nidfile){ ?>
                          <img width="200px" src="<?= base_url('uploads/nid/'.$info->nidfile); ?>">
                        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
                      <td colspan="2">
                        <embed src="<?= base_url('uploads/certificate/'.$value->certificate); ?>" width="200px" height="200px" />
                      </td>
                    </tr>
                    <?php }
                  } ?> 
                  </tbody>
                </table>
        
            <!-- <a class="btn btn-primary" onclick="addPosition()" >Save</a>s -->  

      </div>

    </div>

  </div>

</div> 
<style type="text/css">
  .modal-dialog {
    /*width: 60%;*/
  }
  .user_info tr td{
    width: 50%;
  }
  .avtr_info {
    width: 100%;
    margin: 0 auto;
    text-align: center;
  }
  .avtr_info img {
    width: 180px;
    border: 2px solid #ddd;
    box-shadow: 0 0 10px #ddd;
    margin-bottom: 16px;
    border-radius: 240px;
    height: 180px;
}
</style>
<script type="text/javascript">

  // var nodes = document.getElementById("desablediv").getElementsByTagName('*');
  // for(var i = 0; i < nodes.length; i++){
  //      nodes[i].disabled = true;
  // }
</script>
