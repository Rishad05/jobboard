<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/images/header/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/nice-select.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/select2.min.css" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>sass/style.css" />
    <style>
        .error-massage p {
            color: red !important;
        }
    </style>


</head>

<body>


    <?php
    // echo "<pre>";
    // print_r($acadamic_info);
    // die;
    $start_year = date("Y");
    $range_item = range($start_year, 1980);
    $range = array_merge_recursive(["continue"], $range_item);



    ?>
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
                                            <h1 style="color:#ffffff">Update Profile<br>
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
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                            <li class="last-item">
                                <a href="<?= base_url('career') ?>">Career</a>
                            </li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                            <li class="last-item">Update Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>

        <!-- Career Section  -->
        <section class="career_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- <form action="" class="form_area needs-validation" novalidate> -->
                        <?php echo form_open_multipart('personal_information/insert_personal_info', ['class' => 'form_area needs-validation', 'id' => 'applyForm', 'novalidate' => 'true']); ?>
                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('member_id') ?>" />
                        <div class="tab_wrapper">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link enable_tab_btn active" id="pills-personal-tab" data-toggle="pill" data-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true" tabIndex="0">
                                        Personal Information
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-academic-tab" data-toggle="pill" data-target="#pills-academic" type="button" role="tab" aria-controls="pills-academic" aria-selected="false" tabIndex="1">
                                        Academic Information
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-employment-tab" data-toggle="pill" data-target="#pills-employment" type="button" role="tab" aria-controls="pills-employment" aria-selected="false" tabIndex="2">
                                        Employment History
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-training-tab" data-toggle="pill" data-target="#pills-training" type="button" role="tab" aria-controls="pills-training" aria-selected="false" tabIndex="3">
                                        Training Information
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-professional-tab" data-toggle="pill" data-target="#pills-professional" type="button" role="tab" aria-controls="pills-professional" aria-selected="false" tabIndex="4">
                                        Professional Qualification/ Membership
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skill-tab" data-toggle="pill" data-target="#pills-skill" type="button" role="tab" aria-controls="pills-skill" aria-selected="false" tabIndex="5">
                                        Key Skill/ Competency
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-computer-tab" data-toggle="pill" data-target="#pills-computer" type="button" role="tab" aria-controls="pills-computer" aria-selected="false" tabIndex="6">
                                        Computer Skill
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-language-tab" data-toggle="pill" data-target="#pills-language" type="button" role="tab" aria-controls="pills-language" aria-selected="false" tabIndex="7">
                                        Language Proficiency
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-reference-tab" data-toggle="pill" data-target="#pills-reference" type="button" role="tab" aria-controls="pills-reference" aria-selected="false" tabIndex="8">
                                        Reference
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-additional-tab" data-toggle="pill" data-target="#pills-additional" type="button" role="tab" aria-controls="pills-additional" aria-selected="false" tabIndex="9">
                                        Additional Information
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Personal Information</h3>
                                        <!--  <?php if ($error) { ?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?= $error; ?>
                                            </div>
                                        <?php }
                                                if ($message) { ?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?= $message; ?>
                                            </div>
                                        <?php } ?> -->
                                        <!-- <form action="" class="form_area needs-validation" novalidate> -->
                                        <!-- <?php echo form_open_multipart('personal_information/insert_personal_info', ['class' => 'form_area', 'needs-validation']); ?> -->
                                        <div class="upload_img_area">
                                            <label for="uploadImage">
                                                <div class="upload_text d-none">
                                                    Upload your recent photo
                                                </div>
                                                <div class="preview_img">
                                                    <div class="change_icon">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </div>

                                                    <?php
                                                    if (isset($personal_info->applicant_photo) && $personal_info->applicant_photo != null) { ?>
                                                        <img id="previewImage" src="<?= base_url('uploads/') . $personal_info->applicant_photo ?? ''; ?>" width="160">
                                                    <?php } else { ?>
                                                        <img id="previewImage" src="<?= $frontend_assets; ?>images/default-user-image.png" width="160">
                                                    <?php } ?>
                                                </div>
                                            </label>
                                            <?php if ($message) { ?>
                                                <span class="error-massage"> <?= $message; ?></span>
                                            <?php } ?>

                                            <p>Upload your photo (gif , jpg , png)</p>
                                            <input type="file" class="d-none" name="applicantPhoto" id="uploadImage" />
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fullName">Full Name
                                                        <!-- <span class="label_helper">(Block Letter)</span> -->
                                                        <span class="star">*</span>
                                                    </label>
                                                    <input type="text" name="full_name" class=" form-control" id="fullName" required placeholder="Enter full Name" value="<?= $this->session->userdata('username') ?>" />
                                                    <span class="error-massage"><?= form_error('full_name'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please enter full name
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="genderSelect">Gender <span class="star">*</span></label>
                                                            <?php
                                                            $genders = array("Male" => "Male", "Female" => "Female", "Other" => "Other");
                                                            ?>
                                                            <select required class="custom-select" name="gender" id="genderSelect">
                                                                <option selected disabled value="">
                                                                    Choose...
                                                                </option>
                                                                <?php
                                                                foreach ($genders as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>" <?= isset($personal_info->gender) ? (($key == $personal_info->gender) ? "selected" : "") : "";
                                                                                                        ?>> <?php echo $value; ?> </option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="error-massage"><?= form_error('gender'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please select gender.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="bloodSelect">Blood Group
                                                                <span class="star">*</span></label>
                                                            <?php
                                                            $blood_groups = array("O+" => "O+ve", "A+" => "A+ve", "B+" => "B+ve", "A-" => "A-ve");
                                                            ?>

                                                            <select required class="custom-select" name="blood_group" id="bloodSelect">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($blood_groups as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>" <?php if (isset($personal_info->blood_group)) {
                                                                                                            if ($key == $personal_info->blood_group) {
                                                                                                                echo "selected";
                                                                                                            }
                                                                                                        }  ?>><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="error-massage"><?= form_error('blood_group'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please select gender.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">E-mail

                                                                <span class="star">*</span>
                                                            </label>
                                                            <?= form_input('email', $this->session->userdata('email'), 'class="form-control tip" id="email" readonly="true"'); ?>
                                                            <div class="invalid-feedback">
                                                                Please Enter email
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="CellPhone1">Cell Phone 1

                                                                <span class="star">*</span>
                                                            </label>
                                                            <input type="number" required name="cell_phone_1" value="<?= $personal_info->cell_phone_1 ?? '' ?>" class="form-control" id="CellPhone1" placeholder="Enter   Number" />
                                                            <span class="error-massage"><?= form_error('cell_phone_1'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please Enter Number
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="CellPhone2">Cell Phone 2 </label>
                                                            <input type="number" name="cell_phone_2" value="<?= $personal_info->cell_phone_2 ?? '' ?>" class="form-control" id="CellPhone2" placeholder="Enter  Number" />
                                                            <div class="invalid-feedback">
                                                                Please Cell Number
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="OfficePhone">Office Phone </label>
                                                            <input type="number" name="office_phone" value="<?= $personal_info->office_phone ?? '' ?>" class="form-control" id="OfficePhone" placeholder="Enter Office Phone" />
                                                            <div class="invalid-feedback">
                                                                Enter Office Phone
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="HomePhone">Home Phone </label>
                                                            <input type="number" name="home_phone" value="<?= $personal_info->home_phone ?? '' ?>" class=" form-control" id="HomePhone" placeholder="Enter  Number" />
                                                            <div class="invalid-feedback">
                                                                Please Home Number
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="DateBirth">Date of Birth

                                                                <span class="star">*</span>
                                                            </label>
                                                            <input type="date" required name="dob" class="form-control" id="DateBirth" value="<?= $personal_info->dob ?? '' ?>" placeholder="Enter Office Phone" />
                                                            <span class="error-massage"><?= form_error('dob'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Enter Date of Birth
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="religionSelect">Religion <span class="star">*</span></label>
                                                            <?php
                                                            $religious = array("Islam" => "Islam", "Hindu" => "Hindu", "Buddha" => "Buddha", "Christianity" => "Christianity");
                                                            ?>
                                                            <select required class="custom-select" name="religion" id="religionSelect">
                                                                <option selected disabled value="">
                                                                    Choose...
                                                                </option>
                                                                <?php foreach ($religious as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>" <?php if (isset($personal_info->religion)) {
                                                                                                            if ($key == $personal_info->religion) {
                                                                                                                echo "selected";
                                                                                                            }
                                                                                                        }  ?>><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="error-massage"><?= form_error('religion'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please select Religion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="MaritialStatus">Maritial Status
                                                                <span class="star">*</span></label>
                                                            <?php
                                                            $marital_status = array("Married" => "Married", "Single" => "Single");
                                                            ?>
                                                            <select required class="custom-select" name="marital_status" id="MaritialStatus">
                                                                <option selected disabled value="">
                                                                    Choose...
                                                                </option>
                                                                <?php foreach ($marital_status as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>" <?php if (isset($personal_info->marital_status)) {
                                                                                                            if ($key == $personal_info->marital_status) {
                                                                                                                echo "selected";
                                                                                                            }
                                                                                                        }  ?>><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="error-massage"><?= form_error('marital_status'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please select Maritial Status.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="Nationality">Nationality

                                                                <span class="star">*</span>
                                                            </label>
                                                            <input required type="text" name="nationality" value="<?= $personal_info->nationality ?? '' ?>" class="form-control" id="Nationality" placeholder="Enter Nationality" />
                                                            <span class="error-massage"><?= form_error('nationality'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Please Enter Nationality
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="NationalID">National ID Number

                                                                <span class="star">*</span>
                                                            </label>
                                                            <input required type="text" name="national_id_number" value="<?= $personal_info->national_id_number ?? '' ?>" class=" form-control" id="NationalID" placeholder="Enter National ID" />
                                                            <span class="error-massage"><?= form_error('national_id_number'); ?></span>
                                                            <div class="invalid-feedback">
                                                                Enter National ID
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="PassportNumber">Passport Number</label>
                                                    <input type="number" name="passport_number" value="<?= $personal_info->passport_number ?? '' ?>" class=" form-control" id="PassportNumber" placeholder="Enter Passport Number" aria-describedby="passwortHelp" />
                                                    <!-- <small id="passwortHelp" class="form-text text-muted">Mandatory
                                                        for the candidate (expatriate) who
                                                        are not Bangladeshi citizen
                                                    </small> -->
                                                    <div class="invalid-feedback">
                                                        Enter Passport Number
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="FatherName">Father's Name

                                                        <span class="star">*</span>
                                                    </label>
                                                    <input required type="text" name="father_name" value="<?= $personal_info->father_name ?? '' ?>" class=" form-control" id="FatherName" placeholder="Enter Father's Name " />
                                                    <span class="error-massage"><?= form_error('father_name'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please Enter Father's Name
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="FatherProfession">Father's Profession
                                                    </label>
                                                    <input type="text" name="father_profession" value="<?= $personal_info->father_profession ?? '' ?>" class=" form-control" id="FatherProfession" placeholder="Enter Father's Profession " />
                                                    <span class="error-massage"><?= form_error('father_profession'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please Enter Father's Profession
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="MotherName">Mother's Name

                                                        <span class="star">*</span>
                                                    </label>
                                                    <input required type="text" name="mother_name" value="<?= $personal_info->mother_name ?? '' ?>" class=" form-control" id="MotherName" placeholder="Enter Mother's Name " />
                                                    <span class="error-massage"><?= form_error('mother_name'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please Enter Mother's Name
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="MotherProfession">Mother's Profession
                                                    </label>
                                                    <input type="text" name="mother_profession" value="<?= $personal_info->mother_profession ?? '' ?>" class=" form-control" id="MotherProfession" placeholder="Enter Mother's Profession " />
                                                    <div class="invalid-feedback">
                                                        Please Enter Mother's Profession
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="PresentAddress">Present Address
                                                        <span class="star">*</span>
                                                    </label>
                                                    <textarea required class="form-control" name="present_address" id="PresentAddress" rows="4" placeholder="write Present address"><?= $personal_info->present_address ?? '' ?></textarea>
                                                    <span class="error-massage"><?= form_error('present_address'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please Enter Present Address
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ParmanetAddress">Permanent Address
                                                        <span class="star">*</span>
                                                    </label>
                                                    <textarea required class="form-control" name="permanent_address" id="ParmanetAddress" rows="4" placeholder="write Permanent address"><?= $personal_info->permanent_address ?? '' ?></textarea>
                                                    <span class="error-massage"><?= form_error('permanent_address'); ?></span>
                                                    <div class="invalid-feedback">
                                                        Please Enter Permanent Address
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- <button type="submit"
                                                class="btn btn-info btn-lg d-flex align-items-center justify-content-center flex-wrap g-smm">
                                                <span><i class="fa-solid fa-file"></i></span>
                                                Save
                                            </button> -->
                                            <!-- <?php echo form_close(); ?> -->
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-academic" role="tabpanel" aria-labelledby="pills-academic-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Academic Information</h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="academicTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">
                                                                Education Level <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Degree/ Exam<span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Passing Year
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Board
                                                                <!-- <span class="star">* </span> -->
                                                            </th>
                                                            <th scope="col">
                                                                Name of Institution
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Concentration/ Major
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Result
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Result Out of
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $education_lavels = array("ssc" => "SSC", "hsc" => "HSC", "under graduate" => "Under Graduate", "graduate" => "Graduate");
                                                    ?>
                                                    <tbody>
                                                        <?php if ($acadamic_info > 0 && $acadamic_info != null) {
                                                            foreach ($acadamic_info as $key => $info) { ?>

                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">

                                                                            <select required class="custom-select" name="education_lavel[]" id="education_lavel">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($education_lavels as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $info->education_lavel ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Education Level.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $education_degrees = array("Secondary School Certificate" => "Secondary School Certificate", "Higher Secondary School Certificate" => "Higher Secondary School Certificate", "Bechelor" => "Bechelor", "Masters" => "Masters");
                                                                            ?>
                                                                            <select required class="custom-select" name="degree[]" id="degree">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($education_degrees as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $info->degree ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="invalid-feedback">
                                                                                Please select Degree.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <select required class="custom-select" name="passing_year[]" id="passing_year">
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($range as $key => $value) {
                                                                                    if ($value != 'continue') : ?>
                                                                                        <option value="<?php echo $value; ?>" <?= $value == $info->passing_year ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php endif;
                                                                                } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Board .
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $education_boards = array(
                                                                                "Barisal" => "Barisal",
                                                                                "Cumilla" => "Cumilla",
                                                                                "Dhaka" => "Dhaka",
                                                                                "Jessore" => "Jessore",
                                                                                "Mymensingh" => "Mymensingh",
                                                                                "Rajshahi" => "Rajshahi",
                                                                                "Sylhet" => "Sylhet",
                                                                                "Chittagong" => "Chittagong",
                                                                                "Dinajpur" => "Dinajpur",
                                                                                "Others" => "Others",
                                                                            );
                                                                            ?>
                                                                            <select required class="custom-select" name="board[]" id="board">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($education_boards as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $info->board ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="invalid-feedback">
                                                                                Please select Board .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $info->name_of_institution ?>" name="name_of_institution[]" placeholder="institution name" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Institution name.
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $education_majors = array(
                                                                                "Science" => "Science",
                                                                                "Commerce" => "Commerce",
                                                                                "Arts" => "Arts",
                                                                                "Others" => "Others",
                                                                            );
                                                                            ?>
                                                                            <select required class="custom-select" name="major[]" id="major">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($education_majors as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $info->major ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="invalid-feedback">
                                                                                Please select Concentration.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $info->result ?>" name="result[]" placeholder="Result" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter result.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $info->result_out_of ?>" name="result_out_of[]" placeholder="Result" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter result.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="academicRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>



                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">

                                                                        <select required class="custom-select" name="education_lavel[]" id="education_lavel">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($education_lavels as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Education Level.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $education_degrees = array("Secondary School Certificate" => "Secondary School Certificate", "Higher Secondary School Certificate" => "Higher Secondary School Certificate", "Bechelor" => "Bechelor", "Masters" => "Masters");
                                                                        ?>
                                                                        <select required class="custom-select" name="degree[]" id="degree">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($education_degrees as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            Please select Degree.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <select required class="custom-select" name="passing_year[]" id="passing_year">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($range as $key => $value) {
                                                                                if ($value != 'continue') :  ?>
                                                                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                            <?php endif;
                                                                            } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Board .
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $education_boards = array(
                                                                            "Barisal" => "Barisal",
                                                                            "Cumilla" => "Cumilla",
                                                                            "Dhaka" => "Dhaka",
                                                                            "Jessore" => "Jessore",
                                                                            "Mymensingh" => "Mymensingh",
                                                                            "Rajshahi" => "Rajshahi",
                                                                            "Sylhet" => "Sylhet",
                                                                            "Chittagong" => "Chittagong",
                                                                            "Dinajpur" => "Dinajpur",
                                                                            "Others" => "Others",
                                                                        );
                                                                        ?>
                                                                        <select required class="custom-select" name="board[]" id="board">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($education_boards as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            Please select Board .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="name_of_institution[]" placeholder="institution name" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Institution name.
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $education_majors = array(
                                                                            "Science" => "Science",
                                                                            "Commerce" => "Commerce",
                                                                            "Arts" => "Arts",
                                                                            "Others" => "Others",
                                                                        );
                                                                        ?>
                                                                        <select required class="custom-select" name="major[]" id="major">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($education_majors as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            Please select Concentration.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="result[]" placeholder="Result" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter result.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="result_out_of[]" placeholder="Result" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter result.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="delete_icon" id="academicRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>




                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="academicAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-employment" role="tabpanel" aria-labelledby="pills-employment-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Employment History</h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="employmentTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">
                                                                Organization's Name<span class="star">*
                                                                </span>
                                                            </th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">
                                                                Industry Type
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Department/ Job Area
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Designation
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">Key Responsibilities</th>
                                                            <th scope="col">
                                                                From
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                To
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($employment_history > 0 && $employment_history != null) {
                                                            foreach ($employment_history as $key => $history) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $history->organization_name ?>" name="organization_name[]" placeholder="Organization's Name" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Organization's Name.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" class="form-control" value="<?= $history->address ?>" name="address[]" placeholder="Address" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Address.
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $industry_types = array(
                                                                                "IT" => "IT",
                                                                                "Group of company" => "Group of company",
                                                                                "Garments" => "Garments",
                                                                                "Other" => "Other",
                                                                            );
                                                                            ?>
                                                                            <select required class="custom-select" name="industry_type[]" id="industryType">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($industry_types as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $history->industry_type ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="invalid-feedback">
                                                                                Please select Industry Type.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $departments = array(
                                                                                "Department 1" => "Department 1",
                                                                                "Department 2" => "Department 2",
                                                                                "Department 3" => "Department 3",
                                                                            );
                                                                            ?>
                                                                            <select required class="custom-select" name="department[]" id="department">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($departments as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $history->department ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="invalid-feedback">
                                                                                Please select Department.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $history->designation ?>" name="designation[]" placeholder="Designation " />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Designation .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" class="form-control" value="<?= $history->key_responsibility ?>" name="key_responsibility[]" placeholder="Key Responsibilities" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Key Responsibilities .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <select required class="custom-select" name="start_from[]" id="startfrom">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($range as $key => $value) {
                                                                                    if ($value != 'continue') : ?>
                                                                                        <option value="<?php echo $value; ?>" <?= $value == $history->start_from ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php endif;
                                                                                } ?>

                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select From .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <select required class="custom-select" name="end_to[]" id="endto">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($range as $key => $value) { ?>
                                                                                    <option value="<?php echo $value; ?>" <?= $value == $history->end_to ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select To .
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="employmentRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="organization_name[]" placeholder="Organization's Name" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Organization's Name.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" class="form-control" name="address[]" placeholder="Address" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Address.
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $industry_types = array(
                                                                            "IT" => "IT",
                                                                            "Group of company" => "Group of company",
                                                                            "Garments" => "Garments",
                                                                            "Others" => "Others",
                                                                        );
                                                                        ?>
                                                                        <select required class="custom-select" name="industry_type[]" id="industryType">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($industry_types as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            Please select Industry Type.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $departments = array(
                                                                            "Department 1" => "Department 1",
                                                                            "Department 2" => "Department 2",
                                                                            "Department 3" => "Department 3",
                                                                        );
                                                                        ?>
                                                                        <select required class="custom-select" name="department[]" id="department">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($departments as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            Please select Department.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="designation[]" placeholder="Designation " />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Designation .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" class="form-control" name="key_responsibility[]" placeholder="Key Responsibilities" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Key Responsibilities .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <select required class="custom-select" name="start_from[]" id="startFromSelect">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($range as $key => $value) {
                                                                                if ($value != 'continue') : ?>
                                                                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                            <?php endif;
                                                                            } ?>

                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select From .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <select required class="custom-select" name="end_to[]" id="endToSelect">
                                                                            <option selected disabled value="">
                                                                                Choose...
                                                                            </option>
                                                                            <?php foreach ($range as $key => $value) { ?>
                                                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select To .
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="employmentRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="employmentAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-training" role="tabpanel" aria-labelledby="pills-training-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Training Information</h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="trainingTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">
                                                                Training Information<span class="star">*
                                                                </span>
                                                            </th>
                                                            <th scope="col">
                                                                Institution Name<span class="star">* </span>
                                                            </th>
                                                            <th scope="col">Address</th>

                                                            <th scope="col">
                                                                Duration
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">Start Date</th>
                                                            <th scope="col">End Date</th>
                                                            <th scope="col">Skill/s Acquired</th>

                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($training_info > 0 && $training_info != null) {
                                                            foreach ($training_info as $key => $training) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $training->title ?>" name="title[]" placeholder="Training title" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Training Information.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $training->institution_name ?>" name="institution_name[]" placeholder="Institution name" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter institution name
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" class="form-control" value="<?= $training->address ?>" name="address[]" placeholder="Address" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Address.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" class="form-control" value="<?= $training->duration ?>" name="duration[]" placeholder="Duration" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Duration.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="date" name="start_date[]" value="<?= $training->start_date ?>" class="form-control" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="date" name="end_date[]" value="<?= $training->end_date ?>" class="form-control" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" class="form-control" value="<?= $training->skills ?>" name="skills[]" placeholder="Skill" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Skill/ Acquired.
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="trainingRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="title[]" placeholder="Training title" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Training Information.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="institution_name[]" placeholder="Institution name" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter institution name
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" class="form-control" name="address[]" placeholder="Address" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Address.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" class="form-control" name="duration[]" placeholder="Duration" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Duration.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="date" name="start_date[]" class="form-control" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="date" name="end_date[]" class="form-control" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" class="form-control" name="skills[]" placeholder="Skill" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Skill/ Acquired.
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="trainingRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="trainingAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-professional" role="tabpanel" aria-labelledby="pills-professional-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">
                                            Professional Qualification/ Membership
                                        </h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="professionalTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">
                                                                Degree/ Certification/ Qualification/
                                                                Membership<span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Awarding Body/ Institute/ Club/
                                                                Association<span class="star">* </span>
                                                            </th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">
                                                                Membership/ Registration No.
                                                                <span class="sub_text">(Only for the members of
                                                                    Professional
                                                                    Club/ Association/ Alumni etc.)</span>
                                                            </th>
                                                            <th scope="col">Passing Year (If any)</th>
                                                            <th scope="col">Result (If any)</th>
                                                            <th scope="col">Remarks (If any)</th>

                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($professional_qualification > 0 && $professional_qualification != null) {
                                                            foreach ($professional_qualification as $key => $qualification) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" value="<?= $qualification->certificate ?>" name="certificate[]" class="form-control" placeholder="Certification" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Certification.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input required type="text" value="<?= $qualification->awarding_body ?>" name="awarding_body[]" class="form-control" placeholder="Awarding Body" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Awarding Body.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" value="<?= $qualification->address ?>" name="address[]" class="form-control" placeholder="Address" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Address.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" value="<?= $qualification->registration_number ?>" name="registration_number[]" class="form-control" placeholder="Reg No" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Registration No.
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <select class="custom-select" name="passing_year[]" id="passingYearSelect">
                                                                                <option selected disabled value="">
                                                                                    Choose...
                                                                                </option>
                                                                                <?php foreach ($range as $key => $value) {
                                                                                    if ($value != 'continue') : ?>
                                                                                        <option value="<?php echo $value; ?>" <?= $key == $qualification->passing_year ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php endif;
                                                                                } ?>

                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Passing Year .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" value="<?= $qualification->result ?>" name="result[]" class="form-control" placeholder="Result" />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Result (If any).
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" value="<?= $qualification->remarks ?>" name="remarks[]" class="form-control" placeholder="Remarks " />
                                                                            <div class="invalid-feedback">
                                                                                Please Enter Remarks (If any).
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="professionalRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" name="certificate[]" class="form-control" placeholder="Certification" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Certification.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input required type="text" name="awarding_body[]" class="form-control" placeholder="Awarding Body" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Awarding Body.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="address[]" class="form-control" placeholder="Address" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Address.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="registration_number[]" class="form-control" placeholder="Reg No" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Registration No.
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <select class="custom-select" name="passing_year[]" id="passingYearSelect">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($range as $key => $value) {
                                                                                if ($value != 'continue') : ?>
                                                                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                            <?php endif;
                                                                            } ?>

                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Passing Year .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="result[]" class="form-control" placeholder="Result" />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Result (If any).
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="remarks[]" class="form-control" placeholder="Remarks " />
                                                                        <div class="invalid-feedback">
                                                                            Please Enter Remarks (If any).
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="professionalRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="professionalAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-skill" role="tabpanel" aria-labelledby="pills-skill-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Key Skill/ Competency</h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="skillTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">Skill/ Competency 1</th>
                                                            <th scope="col">Skill/ Competency 2</th>
                                                            <th scope="col">Skill/ Competency 3</th>
                                                            <th scope="col">Skill/ Competency 4</th>
                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <?php if ($key_skills > 0 && $key_skills != null) {
                                                            foreach ($key_skills as $key => $key_skill) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="key_skill1[]" value="<?= $key_skill->key_skill1 ?>" class="form-control" placeholder="Skill 1" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="key_skill2[]" value="<?= $key_skill->key_skill2 ?>" class="form-control" placeholder="Skill 2" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="key_skill3[]" value="<?= $key_skill->key_skill2 ?>" class="form-control" placeholder="Skill 3" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="key_skill4[]" value="<?= $key_skill->key_skill2 ?>" class="form-control" placeholder="Skill 4" />
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="skillRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="key_skill1[]" class="form-control" placeholder="Skill 1" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="key_skill2[]" class="form-control" placeholder="Skill 2" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="key_skill3[]" class="form-control" placeholder="Skill 3" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="key_skill4[]" class="form-control" placeholder="Skill 4" />
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="skillRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>




                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="skillAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-computer" role="tabpanel" aria-labelledby="pills-computer-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Computer Skill</h3>
                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="computerTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">Computer Skill 1</th>
                                                            <th scope="col">Computer Skill 2</th>
                                                            <th scope="col">Computer Skill 3</th>
                                                            <th scope="col">Computer Skill 4</th>
                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($computer_skills > 0 && $computer_skills != null) {
                                                            foreach ($computer_skills as $key => $computer_skill) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="computer_skill1[]" value="<?= $computer_skill->computer_skill1 ?>" class="form-control" placeholder="Skill 1" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="computer_skill2[]" value="<?= $computer_skill->computer_skill1 ?>" class="form-control" placeholder="Skill 2" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="computer_skill3[]" value="<?= $computer_skill->computer_skill1 ?>" class="form-control" placeholder="Skill 3" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="computer_skill4[]" value="<?= $computer_skill->computer_skill1 ?>" class="form-control" placeholder="Skill 4" />
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="computerRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="computer_skill1[]" class="form-control" placeholder="Skill 1" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="computer_skill2[]" class="form-control" placeholder="Skill 2" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="computer_skill3[]" class="form-control" placeholder="Skill 3" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <input type="text" name="computer_skill4[]" class="form-control" placeholder="Skill 4" />
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="computerRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>



                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="computerAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-language" role="tabpanel" aria-labelledby="pills-language-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Language Proficiency</h3>

                                        <div class="inner_table_area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="languageTable">
                                                    <thead class="thead-light">
                                                        <tr class="vertical-center">
                                                            <th scope="col">Language<span class="star">* </span></th>
                                                            <th scope="col">
                                                                Speaking<span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Writing
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Reading
                                                                <span class="star">* </span>
                                                            </th>
                                                            <th scope="col">
                                                                Listening
                                                                <span class="star">* </span>
                                                            </th>

                                                            <th scope="col" class="text-center">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($language_proficincy > 0 && $language_proficincy != null) {
                                                            foreach ($language_proficincy as $key => $language_data) { ?>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $languages = array("Bangla" => "Bangla", "English" => "English", "Hindi" => "Hindi");
                                                                            ?>
                                                                            <select required class="custom-select" name="language[]" id="languageSelect">
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($languages as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $language_data->language ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Language .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $speakings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                            ?>
                                                                            <select class="custom-select" name="speaking[]" id="speakingSelect" required>
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($speakings as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $language_data->speaking ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Speaking.
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">

                                                                            <?php
                                                                            $writings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                            ?>
                                                                            <select class="custom-select" name="writing[]" id="writingSelect" required>
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($writings as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $language_data->writing ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Writing .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $readings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                            ?>
                                                                            <select class="custom-select" name="reading[]" id="readingSelect" required>
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($readings as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $language_data->reading ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Reading .
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $listenings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                            ?>
                                                                            <select class="custom-select" name="listening[]" id="listeningSelect" required>
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($listenings as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>" <?= $key == $language_data->listening ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select Listening .
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="languageRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr class="vertical-center">
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $languages = array("Bangla" => "Bangla", "English" => "English", "Hindi" => "Hindi");
                                                                        ?>
                                                                        <select required class="custom-select" name="language[]" id="languageSelect">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($languages as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Language .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $speakings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                        ?>
                                                                        <select class="custom-select" name="speaking[]" id="speakingSelect" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($speakings as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Speaking.
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">

                                                                        <?php
                                                                        $writings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                        ?>
                                                                        <select class="custom-select" name="writing[]" id="writingSelect" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($writings as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Writing .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $readings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                        ?>
                                                                        <select class="custom-select" name="reading[]" id="readingSelect" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($readings as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Reading .
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="table_input_area">
                                                                        <?php
                                                                        $listenings = array("Good" => "Good", "Average" => "Avarage", "Excellent" => "Excellent");
                                                                        ?>
                                                                        <select class="custom-select" name="listening[]" id="listeningSelect" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <?php foreach ($listenings as $key => $value) { ?>
                                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select Listening .
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="delete_icon" id="languageRemove">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="languageAdd">
                                                <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-reference" role="tabpanel" aria-labelledby="pills-reference-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Reference</h3>

                                        <div class="inner_table_area">
                                            <div class="row mt-4">
                                                <?php if ($references > 0 && $references != null) {
                                                    foreach ($references as $key => $reference) { ?>
                                                        <div class="col-md-6">
                                                            <div class="reference_area">
                                                                <h4>Reference 1</h4>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Name </label>
                                                                    <input type="text" value="<?= $reference->ref_name ?>" name="ref_name[]" class="form-control" id="ReferenceName" placeholder="Enter Reference Name" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Designation
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->ref_degignation ?>" name="ref_degignation[]" class="form-control" id="ReferenceName" placeholder="Enter Designation" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Organization
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->ref_organization ?>" name="ref_organization[]" class="form-control" id="ReferenceName" placeholder="Enter Organization" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Mailing Address
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->mailing_address ?>" name="mailing_address[]" class="form-control" id="ReferenceName" placeholder="Enter Mailing Address" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">E-mail Address
                                                                    </label>
                                                                    <input type="email" value="<?= $reference->ref_email ?>" name="ref_email[]" class="form-control" id="ReferenceName" placeholder="Enter E-mail Address" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Cell Phone </label>
                                                                    <input type="number" value="<?= $reference->ref_phone ?>" name="ref_phone[]" class="form-control" id="ReferenceName" placeholder="Enter Cell Phone" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Relation</label>
                                                                    <input type="text" value="<?= $reference->ref_relation ?>" name="ref_relation[]" class="form-control" id="ReferenceName" placeholder="Enter Relation" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mm-30">
                                                            <div class="reference_area">
                                                                <h4>Reference 2</h4>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Name </label>
                                                                    <input type="text" value="<?= $reference->ref_name2 ?>" name="ref_name2[]" class="form-control" id="ReferenceName" placeholder="Enter Reference Name" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Designation
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->ref_degignation2 ?>" name="ref_degignation2[]" class="form-control" id="ReferenceName" placeholder="Enter Designation" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Organization
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->ref_organization2 ?>" name="ref_organization2[]" class="form-control" id="ReferenceName" placeholder="Enter Organization" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Mailing Address
                                                                    </label>
                                                                    <input type="text" value="<?= $reference->mailing_address2 ?>" name="mailing_address2[]" class="form-control" id="ReferenceName" placeholder="Enter Mailing Address" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">E-mail Address
                                                                    </label>
                                                                    <input type="email" value="<?= $reference->ref_email2 ?>" name="ref_email2[]" class="form-control" id="ReferenceName" placeholder="Enter E-mail Address" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Cell Phone </label>
                                                                    <input type="number" value="<?= $reference->ref_phone2 ?>" name="ref_phone2[]" class="form-control" id="ReferenceName" placeholder="Enter Cell Phone" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ReferenceName">Relation</label>
                                                                    <input type="text" value="<?= $reference->ref_relation2 ?>" name="ref_relation2[]" class="form-control" id="ReferenceName" placeholder="Enter Relation" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="col-md-6">
                                                        <div class="reference_area">
                                                            <h4>Reference 1</h4>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Name </label>
                                                                <input type="text" name="ref_name[]" class="form-control" id="ReferenceName" placeholder="Enter Reference Name" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Designation
                                                                </label>
                                                                <input type="text" name="ref_degignation[]" class="form-control" id="ReferenceName" placeholder="Enter Designation" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Organization
                                                                </label>
                                                                <input type="text" name="ref_organization[]" class="form-control" id="ReferenceName" placeholder="Enter Organization" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Mailing Address
                                                                </label>
                                                                <input type="text" name="mailing_address[]" class="form-control" id="ReferenceName" placeholder="Enter Mailing Address" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">E-mail Address
                                                                </label>
                                                                <input type="email" name="ref_email[]" class="form-control" id="ReferenceName" placeholder="Enter E-mail Address" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Cell Phone </label>
                                                                <input type="number" name="ref_phone[]" class="form-control" id="ReferenceName" placeholder="Enter Cell Phone" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Relation</label>
                                                                <input type="text" name="ref_relation[]" class="form-control" id="ReferenceName" placeholder="Enter Relation" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mm-30">
                                                        <div class="reference_area">
                                                            <h4>Reference 2</h4>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Name </label>
                                                                <input type="text" name="ref_name2[]" class="form-control" id="ReferenceName" placeholder="Enter Reference Name" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Designation
                                                                </label>
                                                                <input type="text" name="ref_degignation2[]" class="form-control" id="ReferenceName" placeholder="Enter Designation" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Organization
                                                                </label>
                                                                <input type="text" name="ref_organization2[]" class="form-control" id="ReferenceName" placeholder="Enter Organization" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Mailing Address
                                                                </label>
                                                                <input type="text" name="mailing_address2[]" class="form-control" id="ReferenceName" placeholder="Enter Mailing Address" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">E-mail Address
                                                                </label>
                                                                <input type="email" name="ref_email2[]" class="form-control" id="ReferenceName" placeholder="Enter E-mail Address" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Cell Phone </label>
                                                                <input type="number" name="ref_phone2[]" class="form-control" id="ReferenceName" placeholder="Enter Cell Phone" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ReferenceName">Relation</label>
                                                                <input type="text" name="ref_relation2[]" class="form-control" id="ReferenceName" placeholder="Enter Relation" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-additional" role="tabpanel" aria-labelledby="pills-additional-tab">
                                    <div class="tab_inner_wrapper">
                                        <h3 class="tab_title">Additional Information</h3>

                                        <div class="inner_table_area">
                                            <?php if ($additional_info > 0 && $additional_info != null) {
                                                foreach ($additional_info as $key => $additional) { ?>
                                                    <div class="row mt-4">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="JobLocation">Job Location Preference
                                                                </label>
                                                                <?php
                                                                $location_preferences = array("Yes" => "Yes", "No" => "No");
                                                                ?>
                                                                <select class="custom-select" name="job_location_preference" id="JobLocation">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <?php foreach ($location_preferences as $key => $value) { ?>
                                                                        <option value="<?php echo $key; ?>" <?= $key == $additional->job_location_preference ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Hide/show full div in below if job preference yes or now -->
                                                        <!-- Office Select Start  -->
                                                        <div class="col-lg-4 col-md-6 hide_area" id="JobLocationDepended">
                                                            <div class="form-group">
                                                                <label for="SelectOffice">Select Office </label>
                                                                <?php
                                                                $location_names = array("Uttara" => "Uttara", "Banani" => "Banani");
                                                                ?>
                                                                <select class="custom-select" name="location_name" id="SelectOffice">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <?php foreach ($location_names as $key => $value) { ?>
                                                                        <option value="<?php echo $key; ?>" <?= $key == $additional->location_name ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Office Select End  -->
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="presentSalary">Your Present Salary (BDT)-Monthly
                                                                </label>
                                                                <input type="text" class="form-control" value="<?= $additional->present_salary ?>" name="present_salary" id="presentSalary" placeholder="Enter Present Salary" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="expectedSalary">Your Expected Salary (BDT)-Monthly
                                                                </label>
                                                                <input type="text" class="form-control" value="<?= $additional->expected_salary ?>" name="expected_salary" id="expectedSalary" placeholder="Enter Expected Salary" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-7">
                                                            <div class="form-group">
                                                                <label for="howKnow">How you come to know about Bitopi Group?
                                                                </label>
                                                                <?php
                                                                $how_knows = array("Website" => "Website", "Job Portal" => "Job Portal", "Social Media" => "Social Media", "Other" => "Other");
                                                                ?>
                                                                <select class="custom-select" name="how_know" id="howKnow">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <?php foreach ($how_knows as $key => $value) { ?>
                                                                        <option value="<?php echo $key; ?>" <?= $key == $additional->how_know ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-5 hide_area" id="howKnowDepended">
                                                            <div class="form-group">
                                                                <label for="howKnowOthers">Others </label>
                                                                <input type="text" value="<?= $additional->other_way ?>" name="other_way" class="form-control" id="howKnowOthers" placeholder="Enter others way" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <label for="JobLocation">Do you have any relative/ friend/ family
                                                                    member employing in Bitopi Group?
                                                                </label>
                                                                <?php
                                                                $any_relativies = array("Yes" => "Yes", "No" => "No");
                                                                ?>
                                                                <select class="custom-select" name="any_relatives" id="relativeSelect">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <?php foreach ($any_relativies as $key => $value) { ?>
                                                                        <option value="<?php echo $key; ?>" <?= $key == $additional->any_relatives ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- if relative  table  -->
                                                    <div id="relativeDepended" class="hide_area">
                                                        <hr>
                                                        <div class="table-responsive mt-3">
                                                            <table class="table table-bordered" id="relativeTable">
                                                                <thead class="thead-light">
                                                                    <tr class="vertical-center">
                                                                        <th scope="col">Name of Relative</th>
                                                                        <th scope="col">Relationship</th>
                                                                        <th scope="col">Designation</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Job Location</th>
                                                                        <th scope="col" class="text-center">
                                                                            Action
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($relatives as $key => $rel_info) { ?>
                                                                        <tr class="vertical-center">
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" value="<?= $rel_info->name_relative ?>" name="name_relative[]" class="form-control" placeholder="Name of Relative" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" value="<?= $rel_info->rel_relationship ?>" name="rel_relationship[]" class="form-control" placeholder="Enter Relationship" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" value="<?= $rel_info->rel_designation ?>" name="rel_designation[]" class="form-control" placeholder="Enter Designation" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" value="<?= $rel_info->rel_department ?>" name="rel_department[]" class="form-control" placeholder="Enter Department" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <?php
                                                                                    $relatives_job_locations = array("Dhaka" => "Dhaka", "Noakhali" => "Noakhali");
                                                                                    ?>
                                                                                    <select class="custom-select" name="rel_job_location[]" id="genderSelect">
                                                                                        <option selected disabled value="">Choose...</option>
                                                                                        <?php foreach ($relatives_job_locations as $key => $value) { ?>
                                                                                            <option value="<?php echo $key; ?>" <?= $key == $rel_info->rel_job_location ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <button type="button" class="delete_icon" id="relativeRemove">
                                                                                    <i class="fa-regular fa-trash-can"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php   } ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="relativeAdd">
                                                            <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                            Add
                                                        </button>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="JobLocation">Previously Interviewed gfg
                                                                </label>
                                                                <?php
                                                                $previously_interviewed = array("Yes" => "Yes", "No" => "No");
                                                                ?>
                                                                <select class="custom-select" name="perviously_interview" id="previousInterview">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <?php foreach ($previously_interviewed as $key => $value) { ?>
                                                                        <option value="<?php echo $key; ?>" <?= $key == $additional->perviously_interview ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- if interviwed  table  -->
                                                    <div id="previousDepended" class="hide_area">
                                                        <div class="table-responsive mt-3">
                                                            <table class="table table-bordered" id="interviewedTable">
                                                                <thead class="thead-light">
                                                                    <tr class="vertical-center">
                                                                        <th scope="col">Position/ Designation</th>
                                                                        <th scope="col">Month</th>
                                                                        <th scope="col">Year</th>
                                                                        <th scope="col">Remarks (If any)</th>
                                                                        <th scope="col" class="text-center">
                                                                            Action
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ($previously_interview > 0 && $previously_interview != null) {
                                                                        foreach ($previously_interview as $key => $data) { ?>
                                                                            <tr class="vertical-center">
                                                                                <td>
                                                                                    <div class="table_input_area">
                                                                                        <input type="text" value="<?= $data->previous_position ?>" name="previous_position[]" class="form-control" placeholder="Position/ Designation" />
                                                                                    </div>
                                                                                </td>

                                                                                <td>
                                                                                    <div class="table_input_area">
                                                                                        <?php
                                                                                        $interviewed_month = array("January" => "January", "February" => "February", "March" => "March", "April" => "April", "May" => "May", "June" => "June", "July" => "July", "August" => "August", "September" => "September", "October" => "October", "November" => "November", "December" => "December",);
                                                                                        ?>
                                                                                        <select class="custom-select" name="interview_month[]" id="genderSelect">
                                                                                            <option selected disabled value="">Choose...</option>
                                                                                            <?php foreach ($interviewed_month as $key => $value) { ?>
                                                                                                <option value="<?php echo $key; ?>" <?= $value == $data->interview_month ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="table_input_area">

                                                                                        <select class="custom-select" name="interview_year[]" id="genderSelect">
                                                                                            <option selected disabled value="">Choose...</option>
                                                                                            <?php foreach ($range as $key => $value) {
                                                                                                if ($value != 'continue') : ?>
                                                                                                    <option value="<?php echo $value; ?>" <?= $value == $data->interview_year ? "selected" : '' ?>><?php echo $value; ?></option>
                                                                                            <?php endif;
                                                                                            } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="table_input_area">
                                                                                        <input type="text" value=" <?= $data->interview_remarks ?>" name="interview_remarks[]" class="form-control" placeholder="Remarks (If any)" />
                                                                                    </div>
                                                                                </td>

                                                                                <td>
                                                                                    <button type="button" class="delete_icon" id="interviewedRemove">
                                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr class="vertical-center">
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" name="previous_position[]" class="form-control" placeholder="Position/ Designation" />
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <?php
                                                                                    $interviewed_month = array("January" => "January", "February" => "February", "March" => "March", "April" => "April", "May" => "May", "June" => "June", "July" => "July", "August" => "August", "September" => "September", "October" => "October", "November" => "November", "December" => "December",);
                                                                                    ?>
                                                                                    <select class="custom-select" name="interview_month[]" id="genderSelect">
                                                                                        <option selected disabled value="">Choose...</option>
                                                                                        <?php foreach ($interviewed_month as $key => $value) { ?>
                                                                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">

                                                                                    <select class="custom-select" name="interview_year[]" id="genderSelect">
                                                                                        <option selected disabled value="">Choose...</option>
                                                                                        <?php foreach ($range as $key => $value) {
                                                                                            if ($value != 'continue') : ?>
                                                                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                                        <?php endif;
                                                                                        } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table_input_area">
                                                                                    <input type="text" name="interview_remarks[]" class="form-control" placeholder="Remarks (If any)" />
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <button type="button" class="delete_icon" id="interviewedRemove">
                                                                                    <i class="fa-regular fa-trash-can"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="interviewedAdd">
                                                            <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                            Add
                                                        </button>
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <div class="row mt-4">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group">
                                                            <label for="JobLocation">Job Location Preference
                                                            </label>
                                                            <?php
                                                            $location_preferences = array("Yes" => "Yes", "No" => "No");
                                                            ?>
                                                            <select class="custom-select" name="job_location_preference" id="JobLocation">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($location_preferences as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Hide/show full div in below if job preference yes or now -->
                                                    <!-- Office Select Start  -->
                                                    <div class="col-lg-4 col-md-6 hide_area" id="JobLocationDepended">
                                                        <div class="form-group">
                                                            <label for="SelectOffice">Select Office </label>
                                                            <?php
                                                            $location_names = array("Uttara" => "Uttara", "Banani" => "Banani");
                                                            ?>
                                                            <select class="custom-select" name="location_name" id="SelectOffice">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($location_names as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Office Select End  -->
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group">
                                                            <label for="presentSalary">Your Present Salary (BDT)-Monthly
                                                            </label>
                                                            <input type="text" class="form-control" name="present_salary" id="presentSalary" placeholder="Enter Present Salary" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group">
                                                            <label for="expectedSalary">Your Expected Salary (BDT)-Monthly
                                                            </label>
                                                            <input type="text" class="form-control" name="expected_salary" id="expectedSalary" placeholder="Enter Expected Salary" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="form-group">
                                                            <label for="howKnow">How you come to know about Bitopi Group?
                                                            </label>
                                                            <?php
                                                            $how_knows = array("Website" => "Website", "Job Portal" => "Job Portal", "Social Media" => "Social Media", "Other" => "Other");
                                                            ?>
                                                            <select class="custom-select" name="location_name" id="howKnow">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($how_knows as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-5 hide_area" id="howKnowDepended">
                                                        <div class="form-group">
                                                            <label for="howKnowOthers">Others </label>
                                                            <input type="text" name="other_way" class="form-control" id="howKnowOthers" placeholder="Enter others way" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label for="JobLocation">Do you have any relative/ friend/ family
                                                                member employing in Bitopi Group?
                                                            </label>
                                                            <?php
                                                            $any_relativies = array("Yes" => "Yes", "No" => "No");
                                                            ?>
                                                            <select class="custom-select" name="any_relatives" id="relativeSelect">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($any_relativies as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- if relative  table  -->
                                                <div id="relativeDepended" class="hide_area">
                                                    <hr>
                                                    <div class="table-responsive mt-3">
                                                        <table class="table table-bordered" id="relativeTable">
                                                            <thead class="thead-light">
                                                                <tr class="vertical-center">
                                                                    <th scope="col">Name of Relative</th>
                                                                    <th scope="col">Relationship</th>
                                                                    <th scope="col">Designation</th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">Job Location</th>
                                                                    <th scope="col" class="text-center">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="name_relative[]" class="form-control" placeholder="Name of Relative" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="rel_relationship[]" class="form-control" placeholder="Enter Relationship" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="rel_designation[]" class="form-control" placeholder="Enter Designation" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="rel_department[]" class="form-control" placeholder="Enter Department" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $relatives_job_locations = array("Dhaka" => "Dhaka", "Noakhali" => "Noakhali");
                                                                            ?>
                                                                            <select class="custom-select" name="rel_job_location[]" id="rel_job_location">
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($relatives_job_locations as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="relativeRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="relativeAdd">
                                                        <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                        Add
                                                    </button>
                                                </div>
                                                <hr>
                                                <div class="row mt-3">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="JobLocation">Previously Interviewed
                                                            </label>
                                                            <?php
                                                            $previously_interviewed = array("Yes" => "Yes", "No" => "No");
                                                            ?>
                                                            <select class="custom-select" name="perviously_interview" id="previousInterview">
                                                                <option selected disabled value="">Choose...</option>
                                                                <?php foreach ($previously_interviewed as $key => $value) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- if interviwed  table  -->
                                                <div id="previousDepended" class="hide_area">
                                                    <div class="table-responsive mt-3">
                                                        <table class="table table-bordered" id="interviewedTable">
                                                            <thead class="thead-light">
                                                                <tr class="vertical-center">
                                                                    <th scope="col">Position/ Designation</th>
                                                                    <th scope="col">Month</th>
                                                                    <th scope="col">Year</th>
                                                                    <th scope="col">Remarks (If any)</th>
                                                                    <th scope="col" class="text-center">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="vertical-center">
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="previous_position[]" class="form-control" placeholder="Position/ Designation" />
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <?php
                                                                            $interviewed_month = array("January" => "January", "February" => "February", "March" => "March", "April" => "April", "May" => "May", "June" => "June", "July" => "July", "August" => "August", "September" => "September", "October" => "October", "November" => "November", "December" => "December",);
                                                                            ?>
                                                                            <select class="custom-select" name="interview_month[]" id="interview_month">
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($interviewed_month as $key => $value) { ?>
                                                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">

                                                                            <select class="custom-select" name="interview_year[]" id="interview_year">
                                                                                <option selected disabled value="">Choose...</option>
                                                                                <?php foreach ($range as $key => $value) {
                                                                                    if ($value != 'continue') : ?>
                                                                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                                <?php endif;
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table_input_area">
                                                                            <input type="text" name="interview_remarks[]" class="form-control" placeholder="Remarks (If any)" />
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" class="delete_icon" id="interviewedRemove">
                                                                            <i class="fa-regular fa-trash-can"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="button" class="btn btn-primary icon_btn d-flex align-items-center justify-content-center flex-wrap g-smm mt-3" id="interviewedAdd">
                                                        <span class="icon"><i class="fa-solid fa-plus"></i></span>
                                                        Add
                                                    </button>
                                                    <hr>
                                                </div>
                                            <?php } ?>
                                            <!-- Upload files  -->
                                            <div class="row mt-4">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="ReferenceName">Upload update resume
                                                        </label>
                                                        <input type="file" name="uploadResume" class="form-control form_control_file" id="ReferenceName" placeholder="Enter Reference Name" aria-describedby="resumeUploadHelp" />
                                                    </div>
                                                    <?php if ($message) { ?>
                                                        <span class="error-massage"> <?= $message; ?></span>
                                                    <?php } ?>

                                                    <small class="form-text text-muted">Upload file (pdf)</small>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="ReferenceName">Download Uploaded Resume
                                                        </label>

                                                        <?php if ($resume_upload->upload_file ?? '') { ?>
                                                            <a href="<?= base_url('uploads/') . $resume_upload->upload_file ?? ''; ?>" class="download_btn" download>Download Resume</a>
                                                        <?php } ?>
                                                        <!-- <small class="form-text text-muted">PDF file only</small> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="ReferenceName">Download Registered Resume
                                                        </label>
                                                        <a target="_blank" href="<?= base_url('personal_information/user_all_data'); ?>" class="download_btn">Registered Resume</a>
                                                        <!-- <small class="form-text text-muted">PDF file only</small> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-4 text-right">
                                                <button type="submit" class="btn btn-lg btn-info">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_footer_area mt-4 d-flex-between w-100">
                            <div class="d-flex align-items-center flex-wrap g-sm">
                                <!-- <button class="btn btn-primary btn-lg d-flex align-items-center justify-content-center flex-wrap g-smm">
                                    <span><i class="fa-solid fa-file-pen"></i></span>
                                    Edit
                                </button> -->
                                <!-- <button type="submit" class="btn btn-info btn-lg d-flex align-items-center justify-content-center flex-wrap g-smm">
                                    <span><i class="fa-solid fa-file"></i></span>
                                    Save
                                </button> -->
                            </div>
                            <div class="d-flex align-items-center flex-wrap g-sm">
                                <button type="button" disabled class="btn btn-info btn-lg btnPrevious d-flex align-items-center justify-content-center flex-wrap g-smm">
                                    <span><i class="fa-solid fa-chevron-left"></i></span> Prev
                                </button>
                                <button type="button" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center flex-wrap g-smm btnNext">
                                    Next
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </button>
                                <!-- <button type="submit" class="btn btn-success">subject</button> -->
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </section>
        <div style="margin-top: 300px"></div>
        <!-- Section  -->
        <section class="wrapper">
            <div class="container">
                <div class="row"></div>
            </div>
        </section>
    </main>
    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/jquery.nice-select.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script>
        var year_range = '<?php echo json_encode($range) ?>';
        // alert("fdfdfdf")
        // console.table(year_range);
    </script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>

</body>

</html>