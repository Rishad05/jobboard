<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#UTable').dataTable();
    });
</script> 

<section class="content">
    <a class='top-add-butto' href='<?php echo base_url('member/add'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a> 
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="export_product"> 
        <!-- <button id="export" data-export="export"><i class="fa fa-download" aria-hidden="true"></i> Export list</button> -->

        <button onclick="exportfunction()" id="exportlist"><i class="fa fa-download" aria-hidden="true"></i> Export list</button>

    </div> 
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div>
                <?php echo form_open('auth/members'); ?>
                <div class="box-body">
                    <div class="form-group col-lg-3">
                      <?= form_label('Status', 'Status'); ?>  
                      <?php $arr = array(''=>'Select Status', 1 =>'Active', 2 =>'Inactive'); ?>
                      <?= form_dropdown('status', $arr, set_value('status'), 'id="activestatus" class="form-control input-tip select2" style="width:100%;"'); 
                      ?>  
                    </div>  
                    <div class="form-group col-lg-3">
                      <?= form_label('Payment Status', 'Status'); ?>  
                      <?php $py = array(''=>'Select Payment Status', 1 =>'Paid', 2 =>'Unpaid'); ?>
                      <?= form_dropdown('payment_status', $py, set_value('payment_status'), 'id="paymentstatus" class="form-control input-tip select2" style="width:100%;"'); 
                      ?>  
                    </div>  
                    <div class="form-group col-lg-3">
                      <?= form_label('Membership Category', 'Membership Category'); ?>  
                      <?php $gr = array(''=>'Select Category','3'=>'Life Member', '4'=>'General Member'); ?>
                      <?= form_dropdown('group', $gr, set_value('group'), 'id="groupid" class="form-control input-tip select2" style="width:100%;"'); 
                      ?>  
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 25px;">
                   
                      <?= form_submit('add_now', 'Search now', 'class="btn btn-primary"'); ?>
                    </div>
                </div>
                <?= form_close(); ?>
                <div class="box-body">
                    <table id="UTable" class="table table-bordered table-striped table-hover">
                        <thead class="cf">
                        <tr>

                            <th><?php echo lang('Photo'); ?></th> 
                            <th><?php echo lang('Name'); ?></th> 
                            <th><?php echo lang('email'); ?></th>
                            <th><?php echo lang('Membership Category'); ?></th>
                            <th style="width:100px;"><?php echo lang('status'); ?></th>
                            <th style="width:100px;"><?php echo lang('Payment Status'); ?></th>
                            <th style="width:100px;"><?php echo lang('Order By'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!$users){
                            $users = array();
                        }

                        foreach ($users as $user) {
                             
                            echo '<tr>';
                            if(!$user->avatar){ 
                                echo '<td> <img width="80px" src='.base_url('uploads/blank.png'). '></td>'; 
                            }else{
                                echo '<td> <img width="80px" src='.base_url('uploads/avatars/'.$user->avatar). '></td>';
                            }
                             
                            echo '<td>' . $user->first_name . '</td>'; 
                            echo '<td>' . $user->email . '</td>';
                            echo '<td>' . $user->group . '</td>';
                            echo '<td class="text-center" style="padding:6px;">' . ($user->active ? '<span class="label label-success">' . lang('active') . '</span' : '<span class="label label-danger">' . lang('inactive') . '</span>') . '</td>';
                            echo '<td class="text-center" style="padding:6px;">' . ($user->payment_status ? '<span class="label label-success">' . lang('Paid') . '</span' : '<span class="label label-danger">' . lang('Unpaid') . '</span>') . '</td>';
                            echo '<td><input value="'.$user->order_by.'" type="text" name="ordering" id=orderingval_'.$user->id.' onkeyup="memberordering('.$user->id.')"><span id="orderingmsg_'.$user->id.'"></span></td>';
                            echo '<td class="text-center" style="padding:6px; width:50px;">
                            <div class="btn-group btn-group-justified" role="group"><div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-primary btn-xs" title="' . lang("Details") . '" href="javascript:;" onclick="detailsUser('.$user->id.')"><i class="fa fa-file-text"></i></a></div> 
                            <div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-warning btn-xs" title="' . lang("Update") . '" href="' . site_url('member/update/'. $user->id) . '"><i class="fa fa-edit"></i></a></div>

                            <div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-danger btn-xs" title="' . lang("delete") . '" href="' . site_url('auth/delete_member/' . $user->id.'/'.$user->details_id) . '" onclick="return confirm(\''.lang('alert_x_user').'\')"><i class="fa fa-trash-o"></i></a></div></div></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <span id="lod_data_ordering"></span>
</section>
<style type="text/css">
.btn-group.btn-group-justified a.tip.btn:hover {
    padding: 8px 5px !important;
}
.btn-group.btn-group-justified a.tip.btn { 
    padding: 8px 5px !important;
    border: none !important;
}
</style>

<script type="text/javascript">
    function exportfunction()
    {
        var status = $('#activestatus').val();
        var pay_status = $('#paymentstatus').val();
        var group = $('#groupid').val();
        if(status){
            status = status;
        }else{
            status = 'n';
        }
        if(pay_status){
            pay_status = pay_status;
        }else{
            pay_status = 'n';
        }
        if(group){
            group = group;
        }else{
            group = 'n';
        }
        

        var url = '<?= base_url("auth/exportcsv"); ?>/'+status+'/'+pay_status+'/'+ group;
        //alert(url);
        window.location = url;
    }
</script>

<script type="text/javascript">
    function memberordering(id)
    {
        var order = $('#orderingval_'+id).val();
        var url = '<?php echo base_url("auth/member_ordering"); ?>/'+id+'/'+order; 
        $('#lod_data_ordering').load(url, function(e){ 
            $('#orderingmsg_'+id).html(e);
            $('#lod_data_ordering').html('');
        });
    }
</script>