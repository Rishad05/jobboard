 <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header"> 
                    <button class="goBack" onclick="goBack()">Go Back</button> 
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div> 
                <div class="box-body">  
                    <?= form_open_multipart("",'class="validation fv-form fv-form-bootstrap"'); ?>
                    <div class="col-lg-10">                        	  
                        <div class="form-group">
                            <?= lang('Offer Title', 'title'); ?><span class="required-star">*</span>
                            <?= form_input('title', set_value('title', $info->title), 'class="form-control tip" id="title" placeholder="Hotel Name" required="required"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Order By', 'order_by'); ?><span class="required-star">*</span>
                            <?= form_input('order_by', set_value('order_by', $info->order_by), 'class="form-control tip" id="order_by" placeholder="0" required="required"'); ?>
                        </div>  
                        <div class="form-group">
                            <?= lang('status', 'status'); ?><span class="required-star">*</span>
                            <?php
                            $opt = array(1 => lang('active'), 0 => lang('inactive'));
                            echo form_dropdown('status', $opt, set_value('status',$info->status), 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" required="required"');
                            ?>
                        </div>   
                        <div class="form-group">
                            <?= lang('Descriptions', 'content'); ?>  
                            <?= form_textarea('content',  $info->content, 'class="form-control tip" id="content" '); ?>
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
<script>        
 tinymce.init({
    selector: "textarea",theme: "modern",width: 680,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true , 
    relative_urls: false,
  remove_script_host : false,
    external_filemanager_path:"<?=base_url();?>resources/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "<?=base_url();?>resources/filemanager/plugin.min.js"}
 }); 
</script> 