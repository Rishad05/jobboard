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
                    <?= form_open_multipart("admin/teams/edit/{$info->id}",'class="validation fv-form fv-form-bootstrap"'); ?>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <?= lang('Name', 'name'); ?><span class="required-star">*</span>
                            <?= form_input('name', set_value('name',$info->name), 'class="form-control tip" id="name"'); ?>
                        </div> 

                        <div class="form-group">
                            <?= lang('Group', 'group_id'); ?><samp class="required-star">*</samp> 
                      <?php 
                      
                      $groupArr = $this->db->get('tec_group')->result_array();
        
                        $groupList = [];
                        foreach($groupArr as $group){
                           $groupList[$group['id']] = $group['group_name'];
                        }

                      echo form_dropdown('group_id',[''=>'Select Group']+$groupList,$info->group_id, 'id="status" data-placeholder="' . lang("select") . ' ' . lang("Group") . '" class="form-control input-tip select2" required="required" style="width:100%;"');
                      ?> 
                        </div> 
                        <div class="form-group">
                            <?= lang('Designation', 'designation'); ?><span class="required-star">*</span>
                            <?= form_input('designation', set_value('designation',$info->designation), 'class="form-control tip" id="designation"'); ?>
                        </div>
                        <div class="form-group">
                            <?= lang('Order by', 'order_by'); ?><span class="required-star">*</span>
                            <?= form_input('order_by', set_value('order_by',$info->order_by), 'class="form-control tip" id="order_by"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Email', 'email'); ?> 
                            <?= form_input('email', set_value('email',$info->email), 'class="form-control tip" id="email"'); ?>
                        </div>
                        <div class="form-group">
                            <?= lang('Address', 'address'); ?> 
                            <?= form_input('address', set_value('address',$info->address), 'class="form-control tip" id="address"'); ?>
                        </div>
                        <div class="form-group">
                            <?= lang('Map Address', 'map'); ?> 
                            <?= form_input('map', set_value('map',$info->map), 'class="form-control tip" id="map"'); ?>
                        </div>
                        <div class="form-group">
                            <?= lang('Phone Number', 'cell'); ?> 
                            <?= form_input('cell', set_value('cell',$info->cell), 'class="form-control tip" id="cell"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Telephone Number', 'tel'); ?> 
                            <?= form_input('tel', set_value('tel',$info->tel), 'class="form-control tip" id="tel"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Descriptions', 'descriptions'); ?>  
                            <?= form_textarea('descriptions', $info->descriptions, 'class="form-control tip" id="editor"'); ?> 
                        </div> 
                        <div class="form-group">
                            <?= lang('Facebook', 'facebook'); ?> 
                            <?= form_input('facebook', set_value('facebook',$info->facebook), 'class="form-control tip" id="facebook"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Twitter', 'twitter'); ?> 
                            <?= form_input('twitter', set_value('twitter',$info->twitter), 'class="form-control tip" id="twitter"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Linkedin', 'linkedin'); ?> 
                            <?= form_input('linkedin', set_value('linkedin',$info->linkedin), 'class="form-control tip" id="linkedin"'); ?>
                        </div> 
                        <div class="form-group">
                            <?= lang('Google plus', 'googleplus'); ?> 
                            <?= form_input('googleplus', set_value('googleplus',$info->googleplus), 'class="form-control tip" id="googleplus"'); ?>
                        </div> 
                        <div class="form-group"> 
                           <?php  
                           if($info->image){ ?>
                            <img src="<?= base_url('uploads/teams/').$info->image; ?>" width="80">
                           <?php }?><br>
                           <?= lang('Profile Image', 'thumbnail'); ?>  
                           <input type="file" name="thumbnail" id="thumbnail" > 
                        </div>   
                        <div class="form-group">
                            <?= lang('status', 'status'); ?><samp class="required-star">*</samp>
                            <?php
                            $opt = array('' => '', 1 => lang('Enable'), 0 => lang('Disable'));
                            echo form_dropdown('status', $opt, $info->status, 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" required="required" style="width:100%;"');
                            ?>
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
    selector: "#editor",theme: "modern",width: 680,height: 300,
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