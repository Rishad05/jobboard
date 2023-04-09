<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>

                </div>

                <div class="box-body">

                    <div class="col-lg-6">

                     <?= form_open_multipart('admin/management/edit_honorary_member/'.$info->id); ?> 

                        <div class="form-group">

                            <?= lang('Year', 'Year'); ?><samp class="required-star">*</samp>

                            <?= form_input('years', $info->years, 'class="form-control tip" placeholder="0000 - 0000" id="years"  '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('President Name', 'Name'); ?><samp class="required-star">*</samp>

                            <?= form_input('president_name', $info->president_name, 'class="form-control tip" id="president_name"  '); ?>

                        </div>
                        <div class="form-group">

                             <label>President Photo (jpg|png|jpeg)</label>

                            <input type="file" name="president_photo">
                            <span>Max size 250px x 250px</span>
                        </div> 
                        <?php if($info->president_photo){  ?>
                            <img width="100px" src="<?= base_url('uploads/avatars/'.$info->president_photo); ?>">
                        <?php } ?>


                        <div class="form-group">

                            <?= lang('Secretary General Name', 'Name'); ?><samp class="required-star">*</samp>

                            <?= form_input('secretary_name', $info->secretary_name, 'class="form-control tip" id="secretary_name"  '); ?>

                        </div>

                        <div class="form-group"> 
                             <label>Secretary Photo (jpg|png|jpeg)</label>

                            <input type="file" name="secretary_photo">
                            <span>Max size 250px x 250px</span>
                        </div> 
                        <?php if($info->secretary_photo){  ?>
                            <img width="100px" src="<?= base_url('uploads/avatars/'.$info->secretary_photo); ?>">
                        <?php } ?>
 

                         <div class="form-group">

                            <?= lang('Order By', 'order_by'); ?><samp class="required-star">*</samp>

                            <?= form_input('order_by', $info->order_by, 'class="form-control tip" id="order_by"  '); ?>

                        </div> 
                         
                        

                        <div class="form-group">

                            <?= form_submit('add', lang('Update Now'), 'class="btn btn-primary"'); ?>

                        </div>

                        <?= form_close(); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section> 

<link href="<?= $assets ?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>

<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY'
        });
         
    }); 
</script>