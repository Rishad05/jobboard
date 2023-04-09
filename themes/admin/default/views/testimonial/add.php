<section class="content"> 
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?= lang('enter_info'); ?></h3>
				</div> 
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
				<div class="box-body">
					<?php echo form_open_multipart("admin/testimonial/add");?> 
					<div class="col-md-12"> 
						<div id="group_div"></div> 					
	           			<div class="col-md-8"> 
							<div class="form-group">
								<label class="control-label" for="content"><?= $this->lang->line("Author Name"); ?></label> <samp class="required-star">*</samp>
								<?= form_input('name', set_value('name'), 'class="form-control input-sm" id="name"'); ?>
								<?php echo form_error('name', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="col-md-8"> 
							<div class="form-group">
								<label class="control-label" for="content"><?= $this->lang->line("Author Designation"); ?></label> <samp class="required-star">*</samp>
								<?= form_input('title', set_value('title'), 'class="form-control input-sm" id="title"'); ?>
								<?php echo form_error('title', '<div class="error">', '</div>'); ?>
							</div>
						</div>  
						<div class="col-md-8"> 
							<div class="form-group">
								<label class="control-label" for="comment"><?= $this->lang->line("Comment"); ?></label>
								<?= form_textarea('comment', set_value('comment'), 'class="form-control input-sm my-editor" id="comment"'); ?>
								<?php echo form_error('details', '<div class="error">', '</div>'); ?>
							</div>
						</div>  
						<div class="col-md-8"> 
							<div class="form-group">
								<label class="control-label" for="order_by"><?= $this->lang->line("Order By"); ?></label> <samp class="required-star">*</samp>
								<?= form_input('order_by', set_value('order_by'), 'class="form-control input-sm" id="order_by"'); ?>
								<?php echo form_error('order_by', '<div class="error">', '</div>'); ?>
							</div>
						</div> 
						<div class="col-md-8">  
							<div class="form-group">
								<label class="control-label" for="content"><?= $this->lang->line("Image "); ?></label>
								<input type="file" name="userfile" value="">
							</div>
						</div>
						<div class="col-md-8"> 
							<div class="form-group">
	                            <?= lang('status', 'status'); ?><samp class="required-star">*</samp>
	                            <?php
	                            $opt = array('' => '', 1 => lang('Enable'), 0 => lang('Disable'));
	                            echo form_dropdown('status', $opt, set_value('status'), 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" required="required" style="width:100%;"');
	                            ?>
	                        </div>
                    	</div>
						<div class="col-md-8">  
							<div class="form-group">
								<?php echo form_submit('add_now', $this->lang->line("Add_Now"), 'class="btn btn-primary"');?>
							</div> 
						</div>
					</div>
					<?php echo form_close();?>
				</div>
			</div> 
		</div>
	</div>  
</section> 

