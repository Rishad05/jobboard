<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>

                </div>

                <div class="box-body">

                    <div class="col-lg-6">

                     <?= form_open_multipart('admin/management/add_executive_committee'); ?> 

                        <div class="form-group">

                            <?= lang('Name', 'Name'); ?><samp class="required-star">*</samp>

                            <?= form_input('name', set_value('name'), 'class="form-control tip" id="name" '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Designation', 'Designation'); ?><samp class="required-star">*</samp> 


                             <?php  
                             $data = $this->site->wheres_rows('designation',NULL);
                             $dg[''] = 'Select Designation';
                             foreach ($data as $key => $value) {
                                 $dg[$value->id] = $value->title;
                             }
                             ?>

                            <?= form_dropdown('designation', $dg, set_value('designation'), 'class="form-control tip select2" style="width:100%;" id="designation"  '); ?>
                            <a href="javascript:;" onclick="addDesignation()">Add Designation</a>
                        </div>
                        
                        <div class="form-group">

                            <?= lang('Mobile', 'Mobile'); ?> 

                            <?= form_input('phone_number', set_value('phone_number'), 'class="form-control tip" id="phone_number"'); ?>

                        </div>
                         <div class="form-group">

                            <?= lang('Resident phone', 'Resident phone'); ?> 

                            <?= form_input('res_phone', set_value('res_phone'), 'class="form-control tip" id="res_phone"'); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('City', 'City'); ?> 

                            <?= form_input('city', set_value('city'), 'class="form-control tip" id="city"'); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('Years', 'years'); ?> 

                            <?= form_input('years', $this->Settings->executive_committee_years, 'class="form-control tip" id="from_year" '); ?>

                        </div>

 

                         <div class="form-group">

                            <?= lang('Order By', 'order_by'); ?> 

                            <?= form_input('order_by', set_value('order_by'), 'class="form-control tip" id="order_by" '); ?>

                        </div> 
                        <div class="form-group">

                             <label>Upload Photo (jpg|png|jpeg)</label>

                            <input type="file" name="userfile">
                            <span>Max size 250px x 250px</span>
                        </div> 
                        

                        <div class="form-group">

                            <?= form_submit('add', lang('Add_now'), 'class="btn btn-primary"'); ?>

                        </div>

                        <?= form_close(); ?>

                    </div>
                    <div class="col-lg-6">
                        <script>

                            $(document).ready(function() { 

                                $('#catData').dataTable({

                                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],

                                    "aaSorting": [[ 0, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,

                                    'bProcessing': true, 'bServerSide': true,

                                    'sAjaxSource': '<?= site_url('admin/management/get_designation/') ?>',

                                    'fnServerData': function (sSource, aoData, fnCallback) {

                                        aoData.push({

                                            "name": "<?= $this->security->get_csrf_token_name() ?>",

                                            "value": "<?= $this->security->get_csrf_hash() ?>"

                                        }); 
                                            $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback}); 
                                    }, 
                                    "aoColumns": [ null,null,{"bSortable":false, "bSearchable": false},] 
                                }); 
                              
                                 

                            });

                        </script>

                        <section class="content"> 
                             
                            <div class="row">

                                <div class="col-xs-12">
                                     <h3 class="box-title">Designation List</h3>
                                    <div class="box box-primary">

                                        <div class="box-header"> 

                                        </div>

                                        <div class="box-body">

                                            <div class="table-responsive">

                                                <table id="catData" class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:5px;">

                                                    <thead>

                                                    <tr class="active"> 
                                                        <th style="width:40px;">SL</th> 
                                                        <th>Title</th>  
                                                        <th style="width:50px;"><?= lang('actions'); ?></th>

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
                    </div>

                </div>

            </div>

        </div>

    </div>

</section> 
 