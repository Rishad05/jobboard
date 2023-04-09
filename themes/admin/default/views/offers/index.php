<script>
    $(document).ready(function() {  
        function status(n) {
            if(n !== null) {
              if(n == 1) {
                return '<samp class="label label-success" >Active</samp>';
              }else{    
                return '<samp class="label label-danger">Inactive</samp>';  
              }
            }
            return '';
        }
        function image(n) {
            if(n) { 
                return '<img src="<?= base_url('uploads/images/')?>'+n+'" width="80px">';  
            }
            return '';
        }
        $('#catData').dataTable({
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],
            "aaSorting": [[ 1, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('admin/offers/get_offers') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [ null, null, {"mRender":status}, {"bSortable":false, "bSearchable": false},]          

        });

    });

</script>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a class="goBack add_goback" href="<?= base_url('admin/offers/add'); ?>">Add New</a> 
                    <button class="goBack" onclick="goBack()">Go Back</button> 
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="catData" class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:5px;">
                            <thead>
                            <tr class="active">  
                                <th>Offer Title</th>  
                                <th>Order By</th>  
                                <th>Active </th> 
                                <th style="width:60px;"><?= lang('actions'); ?></th>
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