<section class="sub_header_sec">
    <div class="tg-innerpagebanner tg-haslayout">
        <div class="tg-pagetitle tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="page-title-wrap">
                            <div class="titlebar-sc-wrap">
                                <p>
                                </p>
                                <div class="sc-boxed-call-to-cation  ">
                                    <div class="tg-titleandbtns">
                                        <h1 style="color:#ffffff">Applicant Apply Jobs Details<br>
                                        </h1>
                                        <div class="tg-btnsbox">
                                        </div>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="tg-breadcrumb">
                        <li class="first-item">
                            <a href="<?= base_url(''); ?>">Home</a>
                        </li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="last-item"><a href="<?= base_url('jobs/applicant_applied_jobs'); ?>"> My Applied Job</a></li>
                        <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                        <li class="last-item"><?= $job->positions ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Current_Jobs_full_section crt_jb_dtils">
    <div class="container">
        <?php if ($error) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fas fa-ban"></i>
                    <?= lang('error'); ?>
                </h4>
                <?= $error; ?>
            </div>
        <?php }
        if ($warning) { ?>
            <div class="alert alert-warning alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fas fa-warning"></i>
                    <?= lang('warning'); ?>
                </h4>
                <?= $warning; ?>
            </div>
        <?php }
        if ($message) { ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4> <i class="icon fas fa-check"></i>
                    <?= lang('Success'); ?>
                </h4>
                <?= $message; ?>
            </div>
        <?php }  ?>
        <div class="row">

            <div class="col-md-8 offset-md-2">
                <div class="post_description">
                    <div class="single_job_listing">
                        <ul class="job-listing-meta meta">
                            <li class="job-type full-time" style="background-color:#1EA696; color:white">
                                <?= $job->job_type_name ? $job->job_type_name : ''; ?></li>
                            <li class="location">
                                <a class="google_map_link" href="#" target="_blank">
                                    <i class="fas fa-map-marker-alt"></i> <?= $job->location ? $job->location : ''; ?>
                                </a>
                            </li>
                            <li class="date-posted">
                                <span class="">
                                    <!-- <i class="far fa-clock"></i> --> Application Deadline:
                                </span>
                                <!-- <time datetime="2019-08-24"><?= $job->created_at ? $this->tec->timeago($job->created_at) : '' ?> 
				        	</time>  -->
                                <span class="calen"><i class="far fa-calendar-alt"></i></span>
                                <?= $job->last_date ? date('D M d, Y', strtotime($job->last_date)) : ''; ?>
                            </li>
                        </ul>
                        <div class="company">
                            <!-- <img class="company_logo" src="<?= base_url('uploads/company/' . $job->company_logo); ?>" alt=""> -->
                            <p class="name comp">
                                <!----------<a class="website" href="" target="_blank" rel="nofollow">Website</a>-------->
                                <!-- <i class="icon icon-building"></i><strong>Industry: </strong><?= $job->company_name; ?> -->
                            </p>
                            <?php
                            $mre = json_decode($job->minimum_requirement);
                            $minrequ = $this->site->whereIn('minimum_requirement', 'id', $mre);
                            ?>
                            <p class="name qlf">
                                <i class="icon icon-graduation-cap"></i>
                                <strong>Job Title: </strong> <?= $job->positions ?>
                            </p>
                            <p class="name qlf">
                                <i class="icon icon-graduation-cap"></i>
                                <strong>Education: </strong>
                                <?php if ($minrequ) {
                                    $dddd = '';
                                    foreach ($minrequ as $key => $minreq) {
                                        $dddd .= $minreq->title . '/ ';
                                    }
                                    echo substr(trim($dddd), 0, -1);
                                } ?>
                            </p>
                            <p class="name exp"><i class="icon icon-certificate"></i><strong>Experience:
                                </strong><?= $job->experience ? $job->experience : ''; ?></p>
                            <p class="name exp"><i class="icon icon-certificate"></i>
                                <?php
                                //if($job->job_category_id){
                                $category = $this->site->whereRow('job_category', 'id', $job->job_category_id);
                                //}
                                ?>
                                <strong>Job Function: </strong><?= $category ? $category->name : ''; ?>
                            </p>

                            <p class="name exp"><i class="icon icon-certificate"></i><strong>Industry:
                                </strong><?= $job->industry ? $job->industry : ''; ?></p>
                        </div>
                        <div class="job_description">
                            <p><strong>Responsibilities:</strong></p>
                            <?= $job->descriptions ? $job->descriptions : ''; ?>
                            <p><strong>Education Requirement :</strong></p>
                            <?= $job->education_experience ? $job->education_experience : ''; ?>
                            <p><strong>Additional Requirement :</strong></p>
                            <?= $job->additional_requirement ? $job->additional_requirement : ''; ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<style type="text/css">
    .custom-file .btn-file {
        position: relative;
        overflow: hidden;
    }

    .custom-file .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .custom-file .btn.btn-default.btn-file {
        border: 1px solid #ddd;
        border-right: none;
        border-radius: 5px 0 0 5px;
    }

    .custom-file .form-control {
        background-color: #fff;
    }

    .custom-file {

        display: inline-table;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    });
</script>


<!-- <script src="<?= $frontend_assets ?>bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $frontend_assets ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> -->

<script type="text/javascript">
    jQuery('#datepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        formatDate: 'DD-MM-YYYY'
    });
</script>
<script type="text/javascript">
    function profile_code_btn() {
        if ($('#profile_code_on_off').is(":checked")) {
            $('.profile_code').slideDown();
            /*$("#form-div :input").prop("disabled", true);
            $("#profile_code_on_off").prop("disabled", false);
            $("#profile_code").prop("disabled", false);
            $(".apply_now_jobs").prop("disabled", false);
            $("input['spos_token']").prop("disabled", false);
            $("input['client_id']").prop("disabled", false);*/
        } else {
            /*$("#form-div :input").prop("disabled", false);
              	$("#profile_code_on_off").prop("disabled", false);
              	$("#profile_code").prop("disabled", false);
              	$(".apply_now_jobs").prop("disabled", false);*/
            $('.profile_code').slideUp();
        }
    }

    function chackProfileCode() {
        var profile_code = $("#profile_code").val();
        if (profile_code == '') {
            $('#profile_code-error').html('<p>The first name field is required</p>');
        } else {
            $('#profile_code-error').html('');
            $(".apply_now_jobs").prop("disabled", false);
        }
        if (profile_code == '') {
            return false;
        } else {
            var token_name = "<?= $this->security->get_csrf_token_name() ?>";
            var token_value = "<?= $this->security->get_csrf_hash() ?>";
            console.log(token_name);
            console.log(token_value);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>' + '/jobs/ajaxCheck',
                data: {
                    code: profile_code,
                    token_name: token_value
                },
                cache: false,
                success: function(result) {
                    result = JSON.parse(result);
                    console.log(result);
                    if (result.profile_code) {
                        $('#profile_code-error').html(result.profile_code);
                    } else {
                        $('#profile_code-error').html('');
                    }
                    if (result.success) {
                        $("#form").submit();
                    }
                }
            });
        }
    }

    /*function profile_code_btn(){
    			$('#profile_code').show(); 
                var profile_code = $("#profile_code").val();
                if(profile_code==''){
                    $('#profile_code-error').html('<p>The first name field is required</p>');
                } else {
                    $('#profile_code-error').html('');
                }
                if(profile_code==''){
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url:  '<?= base_url(); ?>' + 'jobs/ajaxCheck',
                        data: {code:profile_code},
                        cache: false,
                        success: function(result){
                            result =JSON.parse(result);
                            if(result.profile_code){
                                $('#profile_code-error').html(result.profile_code);
                            }else{
                                $('#profile_code-error').html('');
                            }
                            if(result.success){
                                $("#form").submit();
                            }
                        }
                    });
                }
    		}*/
</script>