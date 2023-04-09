
<script>

    $(document).ready(function() {

         

        function image(n) {
            if(n){
                return '<a target="_blank" href="<?php echo base_url('uploads/avatars/'); ?>'+n+'"><img width="100px" src="<?php echo base_url('uploads/avatars'); ?>/'+n+'"></a>';
            }else{
                return '';
            }
        }

        $('#catData').dataTable({

            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],

            "aaSorting": [[ 1, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,

            'bProcessing': true, 'bServerSide': true,

            'sAjaxSource': '<?= site_url('admin/management/get_honorary_members/') ?>',

            'fnServerData': function (sSource, aoData, fnCallback) {

                aoData.push({

                    "name": "<?= $this->security->get_csrf_token_name() ?>",

                    "value": "<?= $this->security->get_csrf_hash() ?>"

                }); 
                    $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback}); 
            }, 
            "aoColumns": [ null ,null, null,null,{"bSortable":false, "bSearchable": false},] 
        }); 
      
         

    });

</script>

<section class="content"> 
    <a class='top-add-butto' href='<?php echo base_url('admin/management/add_honorary_member'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>   
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

                               

                                <th>Years</th>

                                <th>President name</th>   

                                <th>Secretary name</th> 
                                <th>Order by</th> 

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

