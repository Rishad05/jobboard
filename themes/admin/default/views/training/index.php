<script>
    $(document).ready(function() {
        function status(n) {
            if(n == 1) {
                return '<span class="label label-success">Active</span>';
            }
            return '<span class="label label-danger">Deactive</span>';
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
            "aaSorting": [[ 2, "DESC" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('admin/trainingprogram/get_training') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [null, null, null ,   null, {"mRender":home}, {"mRender":status} ,{"bSortable":false}]
        });

    
    });
</script> 

<section class="content">
    <a class='top-add-butto' href='<?php echo base_url('admin/trainingprogram/add'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a> 
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
                                <th style="width:50px;">Sl.No:</th> 
                                <th>Title</th>     
                                <th style="width:100px;">Start date</th>   
                                <th style="width:100px;">End date</th>
                                <th style="width:100px;">Home</th>   
                                <th style="width:80px;">Status</th>  
                                <th style="width:80px;"><?= lang('actions'); ?></th>
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

<div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="picModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body text-center">
                <img id="product_image" src="" alt="" />
            </div>
        </div>
    </div>
</div>
