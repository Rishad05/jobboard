<?php

$v = "?v=1";
if ($this->input->post('full_name')) {
    $v .= "&full_name=" . $this->input->post('full_name');
}
if ($this->input->post('email')) {
    $v .= "&email=" . $this->input->post('email');
}
if ($this->input->post('cell_phone_1')) {
    $v .= "&cell_phone_1=" . $this->input->post('cell_phone_1');
}
if ($this->input->post('gender')) {
    $v .= "&gender=" . $this->input->post('gender');
}
if ($this->input->post('blood_group')) {
    $v .= "&blood_group=" . $this->input->post('blood_group');
}
if ($this->input->post('marital_status')) {
    $v .= "&marital_status=" . $this->input->post('marital_status');
}
if ($this->input->post('education')) {
    $v .= "&education=" . $this->input->post('education');
}
if ($keySkills = $this->input->post('key_skill1')) {
    $v .= "&key_skill1=" . implode(",",$keySkills);
}

?>
<script>
    $(document).ready(function() {

        function status(n) {

            if (n !== null) {

                if (n == 1) {

                    return '<samp class="label label-success" >Published</samp>';

                } else {

                    return '<samp class="label label-danger">Draft</samp>';

                }

            }

            return '';

        }

        function attachment(n) {

            if (n !== null) {
                return '<samp class="label label-success" ><a title="View CV" style="color:#ffffff" target="_blank" href="<?php echo base_url("uploads/"); ?>' + n + '">View</a></samp>';
            }

            return '';

        }

        $('#catData').dataTable({

            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, '<?= lang('all'); ?>']
            ],

            "aaSorting": [
                [1, "asc"]
            ],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,

            'bProcessing': true,
            'bServerSide': true,

            'sAjaxSource': '<?= site_url('admin/jobboard/get_applyjob/' . $job_board_id . $v) ?>',

            'fnServerData': function(sSource, aoData, fnCallback) {

                aoData.push({

                    "name": "<?= $this->security->get_csrf_token_name() ?>",

                    "value": "<?= $this->security->get_csrf_hash() ?>"

                });

                $.ajax({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });

            },

            "aoColumns": [null, null, null, null, null, null, null, null, {
                    "mRender": attachment
                },
                {
                    "mRender": hrld
                }, {
                    "bSortable": false,
                    "bSearchable": false
                },
            ]

        });

        $('#catData').on('click', '.image', function() {

            var a_href = $(this).attr('href');

            var code = $(this).attr('id');

            $('#myModalLabel').text(code);

            $('#product_image').attr('src', a_href);

            $('#picModal').modal();

            return false;

        });

        $('#catData').on('click', '.open-image', function() {

            var a_href = $(this).attr('href');

            var code = $(this).closest('tr').find('.image').attr('id');

            $('#myModalLabel').text(code);

            $('#product_image').attr('src', a_href);

            $('#picModal').modal();

            return false;

        });

    });
</script>

<section class="content">

    <div class="box-body">

        <div id="form" class="panel panel-warning">
            <div class="panel-body">
                <h3 class="m-3">CV FILTERING</h3>
                <?= form_open('admin/jobboard/applyjob/' . $job_board_id); ?>
                <div class="col-md-4">
                    <div class="form-group">

                        <?= lang("Full Name", "Full Name"); ?>
                        <?= form_input('full_name', (isset($_POST['full_name']) ? $_POST['full_name'] : ""), 'class="form-control tip" id="full_name" placeholder="enter name"'); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <?= lang("Email", "Email"); ?>
                        <?= form_input('email', (isset($_POST['email']) ? $_POST['email'] : ""), 'class="form-control tip" id="email" placeholder="enter email"'); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <?= lang("Phone", "Phone"); ?>
                        <?= form_input('cell_phone_1', (isset($_POST['cell_phone_1']) ? $_POST['cell_phone_1'] : ""), 'class="form-control tip" id="cell_phone_1" placeholder="enter phone"'); ?>

                    </div>
                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <?= lang("Gender", "Gender"); ?>

                        <select name="gender" id="gender" class="form-control gender" style="width:100%">

                            <option selected disabled value=""><?= lang("Choice..."); ?></option>
                            <option value="Male"><?= lang("Male"); ?></option>

                            <option value="Female"><?= lang("Female"); ?></option>

                            <option value="other"><?= lang("other"); ?></option>

                        </select>

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <?= lang("Blood Group", "Blood Group"); ?>

                        <select name="blood_group" id="blood_group" class="form-control" style="width:100%">

                            <option selected disabled value=""><?= lang("Choice..."); ?></option>
                            <option value="A+"><?= lang("A+"); ?></option>
                            <option value="A-"><?= lang("A-"); ?></option>

                            <option value="B+"><?= lang("B+"); ?></option>
                            <option value="B-"><?= lang("B-"); ?></option>

                            <option value="O+"><?= lang("O+"); ?></option>
                            <option value="O-"><?= lang("O-"); ?></option>

                            <option value="AB+"><?= lang("AB+"); ?></option>
                            <option value="AB-"><?= lang("AB-"); ?></option>

                        </select>

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <?= lang("Marital Status", "Marital Status"); ?>

                        <select name="marital_status" id="marital_status" class="form-control marital_status " style="width:100%">

                            <option selected disabled value=""><?= lang("Choice..."); ?></option>
                            <option value="Married"><?= lang("Married"); ?></option>

                            <option value="Single"><?= lang("Single"); ?></option>

                        </select>

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <?= lang("Education Level", "Education Level"); ?>

                        <select name="education" id="education" class="form-control" style="width:100%">

                            <option selected disabled value=""><?= lang("Choice..."); ?></option>
                            <option value="ssc"><?= lang("SSC"); ?></option>
                            <option value="hsc"><?= lang("HSC"); ?></option>
                            <option value="under graduate"><?= lang("Under Graduate"); ?></option>
                            <option value="graduate"><?= lang("Graduate"); ?></option>

                        </select>

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <?= lang("Skill", "Skill"); ?>

                        <?php
                         $ks[0] = lang("select") . " " . lang("Skill");
                        foreach ($allkeyskills as $key => $keyskill) {
                            $ks[$keyskill->key_skill1] = $keyskill->key_skill1;
                        }

                        echo form_multiselect('key_skill1[]', $ks, set_value('key_skill1'), 'class="form-control select2" style="width:100%" id="keyskill"'); ?>
                    </div>

                </div>
                <div class="col-sm-12">

                    <button type="submit" class="btn btn-primary"><?= lang("search"); ?></button>

                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <a class='top-add-butto mt-5' href='<?php echo base_url('admin/jobboard/add'); ?>' title='Add'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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

                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Blood Group</th>

                                    <th>Email</th>

                                    <th>Phone</th>

                                    <th>Positions</th>

                                    <th>Applicant Id</th>

                                    <th>Attachment</th>

                                    <th>Applied At</th>

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