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

        $('#catData').dataTable({

            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],

            "aaSorting": [[ 1, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,

            'bProcessing': true, 'bServerSide': true,

            'sAjaxSource': '<?= site_url('admin/news/get_newscategory') ?>',

            'fnServerData': function (sSource, aoData, fnCallback) {

                aoData.push({

                    "name": "<?= $this->security->get_csrf_token_name() ?>",

                    "value": "<?= $this->security->get_csrf_hash() ?>"

                });

                	$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});

				

            },

				 	

            "aoColumns": [  null , null , {"mRender":hrld} ,{"bSortable":false, "bSearchable": false},]

				

        });



        $('#catData').on('click', '.image', function() {

            var a_href = $(this).attr('href');

            var code = $(this).attr('id');

            $('#myModalLabel').text(code);

            $('#product_image').attr('src',a_href);

            $('#picModal').modal();

            return false;

        });



        $('#catData').on('click', '.open-image', function() {

            var a_href = $(this).attr('href');

            var code = $(this).closest('tr').find('.image').attr('id');

            $('#myModalLabel').text(code);

            $('#product_image').attr('src',a_href);

            $('#picModal').modal();

            return false;

        });

    });

</script>

<section class="content">
    <?php 
    $popUp = '"'.site_url('admin/news/add_category/').'"'; 
    ?>
    <a class='top-add-butto' onclick='popUp(<?= $popUp ?>)' href='javascript:;' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>   
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

                                <th>Title</th>

                                <th>Description</th>

                                <th>Created at</th> 

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

