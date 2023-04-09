
<script>

    $(document).ready(function() {

		  function status(n) {

            if(n !== null) {

              if(n == 1) {

                return '<samp class="label label-success" >Published</samp>';

              }else{

				return '<samp class="label label-danger">Draft</samp>';

			  }

            }

            return '';

        }

        $('#catData').dataTable({

            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?=lang('all');?>']],

            "aaSorting": [[ 1, "asc" ]], "iDisplayLength": <?=$Settings->rows_per_page?>,

            'bProcessing': true, 'bServerSide': true,

            'sAjaxSource': '<?=site_url('admin/jobboard/get_job_type/')?>',

            'fnServerData': function (sSource, aoData, fnCallback) {

                aoData.push({

                    "name": "<?=$this->security->get_csrf_token_name()?>",

                    "value": "<?=$this->security->get_csrf_hash()?>"

                });

                	$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});

            },

            "aoColumns": [  null, {"bSortable":false, "bSearchable": false},]

        });

    });

</script>
<section class="content">
    <a class='top-add-butto' href='<?php echo base_url('admin/jobboard/add'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?=lang('list_results');?></h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="col-xs-5">
                            <?php if ($info) {?>
                                <?= form_open_multipart("admin/jobboard/job_type/{$info->id}");?>
                                <div class="form-group">
                                    <label for="title">Title<samp class="required-star">*</samp></label>
                                    <?=form_input('title', set_value('title', $info->name), 'class="form-control tip" id="title" required="required"');?>
                                </div> 
                                <div class="form-group">
                                    <?php echo form_submit('add_now', $this->lang->line("Submit"), 'class="btn btn-primary"'); ?>
                                </div>
                                <?php echo form_close(); ?>
                            <?php } else {?>
                                <?= form_open_multipart("admin/jobboard/job_type");?>
                                <div class="form-group">
                                    <label for="title">Title<samp class="required-star">*</samp></label>
                                    <?=form_input('title', set_value('title'), 'class="form-control tip" id="title" required="required"');?>
                                </div> 
                                <div class="form-group">
                                    <?php echo form_submit('add_now', $this->lang->line("Submit"), 'class="btn btn-primary"'); ?>
                                </div>
                                <?php echo form_close(); ?>
                            <?php }?>
                        </div>

                        <div class="col-xs-7">
                            <table id="catData" class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:5px;">
                            <thead>
                            <tr class="active">
                                <th>Name</th> 
                                <th style="width:120px;"><?=lang('actions');?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="dataTables_empty"><?=lang('loading_data_from_server');?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>