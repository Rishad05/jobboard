<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">  
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div> 
                <div class="box-body">  
                    <?= form_open_multipart("admin/group/edit/{$info->id}",'class="validation fv-form fv-form-bootstrap"'); ?>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <?= lang('Group', 'group_name'); ?><span class="required-star">*</span>
                            <?= form_input('group_name', set_value('group_name',$info->group_name), 'class="form-control tip" id="name" required="required"'); ?>
                        </div>

                        <div class="form-group">
                            <?= lang('Order', 'order_by'); ?><span class="required-star">*</span>
                            <?= form_input('order_by', set_value('order_by',$info->order_by), 'class="form-control tip" id="order_by" required="required"'); ?>
                        </div> 
                       
                        <div class="form-group">
                            <?= form_submit('add_user', lang('Update Now'), 'class="btn btn-primary"'); ?>
                        </div>
                        
                    </div> 
                    <?= form_close(); ?> 
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
