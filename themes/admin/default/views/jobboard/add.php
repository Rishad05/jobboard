<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>
<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left"
            aria-hidden="true"></i> </a>
    <div class="row">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            width: 680,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,
            relative_urls: false,
            remove_script_host: false,
            external_filemanager_path: "<?= base_url(); ?>resources/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {
                "filemanager": "<?= base_url(); ?>resources/filemanager/plugin.min.js"
            }
        });
        </script>
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        <?= lang('enter_info'); ?>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <?php echo form_open_multipart("admin/jobboard/add", 'class="validation"'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_id">Company Name<samp class="required-star">*</samp></label>
                                    <?php
                  $companies = $this->site->selectQuery('company');
                  $options = array('' => 'Select company');
                  foreach ($companies as $company) {

                    $options[$company->id] = $company->name;
                  }
                  $company_id = 1; // set the default company ID here
                  $company_name = $company->name; // initialize default company name as empty
                  foreach ($companies as $company) {
                    if ($company->id == $company_id) {
                      $company_name = $company->name; // find the default company name
                      break;
                    }
                  }
                  ?>
                                    <?= form_dropdown('companey_id', $options, $company_id, 'class="form-control tip select2" id="company_id" required="required"'); ?>
                                    <input type="hidden" name="companey_name" value="<?= $company_name ?>">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="companey_id">Company Name<samp class="required-star">*</samp></label>
                                    <?php
                                    $company = $this->site->selectQuery('company');
                                    $cm[''] = "Select company";
                                    foreach ($company as $value) {

                                      $cm[$value->id] = $value->name;
                                    }
                                    ?>

                                    <?= form_dropdown('companey_id', $cm, set_value('companey_id'), 'class="form-control tip select2 " id="companey_id" required="required" '); ?>
                                </div> -->
                                <div class="form-group">
                                    <label for="job_category">Job Function <samp
                                            class="required-star">*</samp></label><br>
                                    <?php
                  $job_category = $this->site->selectQuery('job_category');
                  $cat[''] = 'Select Category';
                  foreach ($job_category as $key => $value) {
                    $cat[$value->id] = $value->name;
                  }
                  ?>
                                    <?= form_dropdown('job_category', $cat, set_value('job_category'), 'class="form-control tip select2" id="job_category" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="job_type">Job Type <samp class="required-star">*</samp></label><br>
                                    <?php
                  $job_type = $this->site->selectQuery('job_type');
                  $ty[''] = 'Select Job Type';
                  foreach ($job_type as $key => $value) {
                    $ty[$value->id] = $value->name;
                  }
                  ?>
                                    <?= form_dropdown('job_type', $ty, set_value('job_type'), 'class="form-control tip select2" id="job_type" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="industry">Industry<samp class="required-star">*</samp></label>
                                    <?= form_input('industry', set_value('industry'), 'class="form-control tip" id="industry" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="positions">Position<samp class="required-star">*</samp></label>
                                    <?= form_input('positions', set_value('positions'), 'class="form-control tip" id="positions" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="vacancy">#Vacancy<samp class="required-star">*</samp></label>
                                    <?= form_input('vacancy', set_value('vacancy'), 'class="form-control tip" id="vacancy" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="locations">Job Locations<samp class="required-star">*</samp></label>
                                    <?= form_input('locations', set_value('locations'), 'class="form-control tip" id="locations" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="last_date">Last Date / Deadline<samp
                                            class="required-star">*</samp></label>
                                    <?= form_input('last_date', set_value('last_date'), 'class="form-control tip datepicker" id="last_date" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience Requirement <samp
                                            class="required-star">*</samp></label>
                                    <?= form_input('experience', set_value('experience'), 'class="form-control tip" id="experience" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="descriptions">Job Descriptions / Responsibility </label>
                                    <?php
                  $descriptions = '';
                  if (isset($_POST['descriptions'])) {
                    $descriptions = $_POST['descriptions'];
                  }
                  ?>
                                    <?= form_textarea('descriptions', $descriptions, 'class="form-control tip" id="descriptions"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="education_experience">Educations Requirement </label>
                                    <?php
                  $education_experience = '';
                  if (isset($_POST['education_experience'])) {
                    $education_experience = $_POST['education_experience'];
                  }
                  ?>
                                    <?= form_textarea('education_experience',  $education_experience, 'class="form-control tip" id="education_experience"'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="education_experience2">Additional Requirement </label>
                                    <?php
                  $education_experience2 = '';
                  if (isset($_POST['education_experience2'])) {
                    $education_experience2 = $_POST['education_experience2'];
                  }
                  ?>
                                    <?= form_textarea('education_experience2',  $education_experience2, 'class="form-control tip" id="education_experience2"'); ?>
                                </div>
                                <div class="form-group input_main_lvl">
                                    <label for="minimum_requirement">Minimum Requirement</label><br>
                                    <?php
                  $minimum = $this->site->whereRows('minimum_requirement', 'status', 1, 'ASC');
                  foreach ($minimum as $key => $value) {
                    echo form_checkbox('minimum_requirement[]', $value->id, '', 'class="checkbox"') . '<label>' . $value->title . '</label>';
                  }
                  ?>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="home_page" value="1" id="home_page" />
                                    <label for="home_page">Home Page</label>

                                </div>
                                <div class="form-group">
                                    <label for="userfile">Profile Image (jpeg|png|jpg)</label>
                                    <input type="file" name="userfile">
                                    <span>Standard image size 350px X 250px</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= form_submit('news_add', 'Submit', 'class="btn btn-primary"'); ?>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript">
</script>
<script type="text/javascript">
$(function() {
    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});
</script>