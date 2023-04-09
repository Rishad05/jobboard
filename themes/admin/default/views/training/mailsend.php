<section class="content">
	<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script> -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?= lang('enter_info'); ?></h3>
				</div> 
				<style type="text/css">
					.redactor-editor.redactor-linebreaks {
						    color: #000;
						}
					#select2-city-container {
					    color: #fff;
					}
				</style>
				<div class="box-body">
					<?php  
					echo form_open_multipart("admin/trainingprogram/sendmail/".$tid);
					?> 
	               		<div class="col-md-8"> 
	               			<div class="form-group">
								<label class="control-label" for="message">Selecet Users *</label>
								<?php 
								 
								$u['all'] = 'All Users';

								foreach ($users as $key => $value) {
									$u[$value->email] = $value->first_name; 
								}
								?>
								 
								<?= form_dropdown('users[]', $u, set_value('users'), 'class="form-control select2" id="users_id" multiple="multiple"'); ?>
								<?php echo form_error('users', '<div class="error">', '</div>'); ?>
							</div>
							<!-- <div class="form-group">
								<label class="control-label" for="message"><?= $this->lang->line("Subject"); ?></label>
								<?= form_input('subject', set_value('subject'), 'class="form-control input-sm" id="subject"'); ?>
								<?php echo form_error('subject', '<div class="error">', '</div>'); ?>
							</div> -->
						</div>
						<!-- <div class="col-md-8"> 
							<div class="form-group">
								<label class="control-label" for="message"><?= $this->lang->line("Message"); ?></label>
								<?= form_textarea('message', set_value('message'), 'class="form-control input-sm redactor" id="Details"'); ?>
								<?php echo form_error('details', '<div class="error">', '</div>'); ?>
							</div>
						</div> -->
						<div class="col-md-8">  
							<div class="form-group">
								<?php echo form_submit('send', $this->lang->line("Send"), 'class="btn btn-primary"');?>
							</div>
							<div id="mail_show"></div>
						</div>
					</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div> 
</section> 

