 
<script>

    $(document).ready(function() {
        function image(n) {
            if(n){
                return '<img src="<?= base_url('uploads/services/'); ?>'+n+'" width="90">';
            }else{
                return '';
            }
        }

		function status(n) { 
            if(n == 1) {
                return '<samp class="label label-success" >Active</samp>';
            }else{
				return '<samp class="label label-danger">Inactive</samp>'; 
			} 
        }
        function home(n) { 
            if(n == 1) {
                return '<samp class="label label-success" >Yes</samp>';
            }else{
                return '<samp class="label label-danger">No</samp>'; 
            } 

        }

        $('#catData').dataTable({

            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],

            "aaSorting": [[ 0, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,

            'bProcessing': true, 'bServerSide': true,

            'sAjaxSource': '<?= site_url('admin/services/get_services/') ?>',

            'fnServerData': function (sSource, aoData, fnCallback) {

                aoData.push({

                    "name": "<?= $this->security->get_csrf_token_name() ?>",

                    "value": "<?= $this->security->get_csrf_hash() ?>"

                });

                	$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});				

            },				 	

            "aoColumns": [  null, null, {"mRender":image}, null, null, null,  {"mRender":hrld}, {"mRender":status}, {"mRender":home}, {"bSortable":false, "bSearchable": false},]				

        });  

    });

</script>

<section class="content"> 
    <a class='top-add-butto' href='<?php echo base_url('admin/services/add'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>   
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('list_results'); ?></h3>

                </div>

                <div class="box-body">

                    <div class="table-responsive">

                        <table id="catData" class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:5px;">

                            <thead>

                            <tr class="active">

                                <th>SL/No</th>

                                <th>Icon</th>  

                                <th>Thumbnail</th>  

                                <th>Title</th>

                                <th>Order By</th>

                                <th>Descriptions</th>     

                                <th>Created at</th>

                                <th>Status</th> 
                                
                                <th>Home</th> 

                                <th style="width:120px;"><?= lang('actions'); ?></th>

                            </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td colspan="4" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

        </div>

    </div>

</section> 