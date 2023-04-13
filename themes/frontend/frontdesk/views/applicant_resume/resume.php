<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Resume</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= $frontend_assets; ?>images/header/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?= $frontend_assets; ?>sass/style.css" />
    <style>
        .resume_wrapper {
            max-width: 900px;
            width: 100%;
            margin: 20px auto;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper {
                transition: 0.5s;
                padding: 12px;
            }
        }

        .resume_wrapper .apply_title_area {
            margin-bottom: 10px;
        }

        .resume_wrapper .apply_title_area h4 {
            font-size: 18px;
            font-weight: 400;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .apply_title_area h4 {
                transition: 0.5s;
                font-size: 16px;
            }
        }

        .resume_wrapper .apply_title_area h4 b {
            color: #a112a3;
        }

        .resume_wrapper .apply_title_area h6 {
            font-size: 12px;
            font-weight: 400;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .apply_title_area h6 {
                transition: 0.5s;
                font-size: 10px;
            }
        }

        .resume_wrapper .resume_area {
            border: 1px solid #d5d4d4;
        }

        .resume_wrapper .left_wrapper {
            height: 100%;
            padding: 10px 20px 40px 20px;
            background-color: whitesmoke;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .left_wrapper {
                transition: 0.5s;
                padding: 10px 12px 20px 12px;
            }
        }

        .resume_wrapper .user_img {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 180px;
            width: 100%;
            height: 180px;
            margin-left: auto;
            margin-right: auto;
        }

        .resume_wrapper .user_img img {
            max-height: 100%;
        }

        .resume_wrapper .user_name {
            font-size: 24px;
            font-weight: 600;
            margin-top: 20px;
        }

        @media all and (max-width: 991px) {
            .resume_wrapper .user_name {
                transition: 0.5s;
                font-size: 20px;
                margin-top: 15px;
            }
        }

        .resume_wrapper .contact_list {
            margin-top: 30px;
            margin-bottom: 40px;
        }

        .resume_wrapper .contact_list li {
            display: grid;
            grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr));
            align-items: start;
            gap: 10px;
            margin-top: 12px;
        }

        .resume_wrapper .contact_list .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 26px;
            background-color: #1fa898;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        .resume_wrapper .contact_list .icon i {
            color: white;
            font-size: 12px;
        }

        .resume_wrapper .contact_list a {
            font-size: 16px;
            font-weight: 500;
        }

        .resume_wrapper .contact_list a:hover {
            opacity: 0.8;
        }

        .resume_wrapper .resume_title_grid {
            display: grid;
            grid-template-columns: minmax(0, 28px) repeat(1, minmax(0, 1fr));
            align-items: center;
            gap: 12px;
        }

        .resume_wrapper .resume_title_grid .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 28px;
            background-color: #1fa898;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        .resume_wrapper .resume_title_grid i {
            color: white;
            font-size: 15px;
        }

        .resume_wrapper .resume_title_grid h3 {
            font-size: 22px;
            font-weight: 500;
        }

        @media all and (max-width: 991px) {
            .resume_wrapper .resume_title_grid h3 {
                transition: 0.5s;
                font-size: 20px;
            }
        }

        .resume_wrapper .resume_title_grid h3 b {
            font-weight: 600;
            color: #1fa898;
        }

        .resume_wrapper .information_item {
            margin-top: 30px;
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .resume_wrapper .information_item {
                transition: 0.5s;
                margin-top: 20px;
            }
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .information_item {
                transition: 0.5s;
                margin-top: 15px;
            }
        }

        .resume_wrapper .information_item h4 {
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .resume_wrapper .information_item h5 {
            font-size: 18px;
            font-weight: 500;
            margin-top: 2px;
            text-transform: capitalize;
        }

        .resume_wrapper .right_wrapper {
            margin-top: 10px;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .right_wrapper {
                transition: 0.5s;
                margin-top: 30px;
            }
        }

        .resume_wrapper .right_item {
            margin-bottom: 20px;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .right_item {
                transition: 0.5s;
                padding: 0 12px;
            }
        }

        .resume_wrapper .right_item .category_item:last-child {
            padding-bottom: 10px;
            border-bottom: 1px solid #b0afaf;
        }

        .resume_wrapper .category_item {
            margin-top: 40px;
        }

        @media all and (max-width: 991px) {
            .resume_wrapper .category_item {
                transition: 0.5s;
                margin-top: 30px;
            }
        }

        .resume_wrapper .category_item h4 {
            font-size: 18px;
            font-weight: 500;
        }

        @media all and (max-width: 767px) {
            .resume_wrapper .category_item h4 {
                transition: 0.5s;
                font-size: 16px;
            }
        }

        .resume_wrapper .category_item ul {
            margin-top: 15px;
        }

        .resume_wrapper .category_item ul li {
            font-size: 16px;
            font-weight: 400;
            margin-top: 5px;
        }

        /* hide on print */
        @media print {
            .download_btn {
                display: none;
            }

            #banner {
                display: none;
            }

            #header {
                display: none;
            }

            #footer {
                display: none;
            }

            .footer_last {
                display: none;
            }

        }
    </style>
</head>

<body>

    <section class="sub_header_sec" id="banner">

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
                                            <h1 style="color:#ffffff"><?php if ($this->Admin) {  ?>
                                                    View Resume of <?= $personal_info->full_name ?? 'Name' ?>
                                                <?php } else { ?>
                                                    View My Resume
                                                <?php } ?>
                                                <br>
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
                                <a href="<?= base_url('career'); ?>">Career</a>
                            </li>
                            <li class="arrow-item"><i class="fas fa-angle-right"></i></li>
                            <li class="last-item"><?php if ($this->Admin) {  ?>
                                    View resume of <?= $personal_info->full_name ?? 'Name' ?>
                                <?php } else { ?>
                                    View my resume
                                <?php } ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <!-- Resume Section  -->
        <section class="resume_wrapper">
            <?php
            //Use this code to convert your image to base64
            $path = base_url('uploads/') . $personal_info->applicant_photo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
            <div class="resume_area" id="pdfContentArea">
                <div class="row">
                    <div class="col-md-5">
                        <div class="left_wrapper" style="height: 100%; padding: 10px 20px 40px 20px; background-color: whitesmoke;">
                            <div class="user_info_area">
                                <div class="user_img" style=" display: flex; align-items: center;justify-content: center; max-width: 180px; width: 100%;height: 180px;margin-left: auto;margin-right: auto;">
                                    <?php if ($personal_info->applicant_photo ?? '') { ?>
                                        <img src="<?= $base64 ?>" width="160" style=" max-height: 100%;">
                                    <?php } ?>

                                </div>
                                <h4 class="user_name" style="   font-size: 24px; font-weight: 600; margin-top: 20px;">
                                    <?= $personal_info->full_name ?? 'Name' ?></h4>
                                <ul class="contact_list" style="   margin-top: 30px; margin-bottom: 40px;">
                                    <li style="  display: grid; grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr));align-items: start; gap: 10px;margin-top: 12px;">
                                        <div class="icon" style="  display: flex; align-items: center; justify-content: center; width: 100%;height: 26px;background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%;-ms-border-radius: 50%;-o-border-radius: 50%;">
                                            <i class="fa-solid fa-phone" style=" color: white;font-size: 12px;"></i>
                                        </div>
                                        <a href="tel:+" style="  font-size: 16px; font-weight: 500;"><?= $personal_info->cell_phone_1 ?? 'Phone' ?></a>
                                    </li>
                                    <li style="  display: grid;grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr)); align-items: start; gap: 10px;margin-top: 12px;">
                                        <div class="icon" style="  display: flex; align-items: center; justify-content: center; width: 100%;height: 26px;background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%;-ms-border-radius: 50%; -o-border-radius: 50%;">
                                            <i class="fa-regular fa-envelope-open" style=" color: white; font-size: 12px;"></i>
                                        </div>
                                        <a href="#" style="  font-size: 16px;font-weight: 500;"><?= $personal_info->email ?? 'Email' ?></a>
                                    </li>
                                    <li style="  display: grid; grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr)); align-items: start; gap: 10px;margin-top: 12px;">
                                        <div class=" icon" style="  display: flex; align-items: center; justify-content: center; width: 100%; height: 26px;  background-color: #1fa898; border-radius: 50%;-webkit-border-radius: 50%; -moz-border-radius: 50%;-ms-border-radius: 50%; -o-border-radius: 50%;">
                                            <i class="fa-solid fa-location-dot" style=" color: white;font-size: 12px;"></i>
                                        </div>
                                        <a href="#" style="  font-size: 16px; font-weight: 500;" target="_blank"><?= $personal_info->present_address ?? 'Address' ?></a>
                                    </li>

                                </ul>
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px) repeat(1, minmax(0, 1fr)); align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items:     center; justify-content: center; width:     100%; height: 28px; background-color: #1fa898;  border-radius: 50%;-webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-user-tie" style=" color: white;font-size: 15px;">
                                        </i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Personal Information
                                    </h3>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;font-weight: 400;text-transform: capitalize;">Father's
                                        Name
                                    </h4>
                                    <h5 style=" font-size: 18px;font-weight: 500; margin-top: 2px; text-transform: capitalize;">
                                        <?= $personal_info->father_name ?? 'Father Name' ?>
                                    </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">

                                    <h4 style="   font-size: 16px; font-weight: 400; text-transform: capitalize;">
                                        Mother's Name
                                    </h4>
                                    <h5 style=" font-size: 18px; font-weight: 500; margin-top: 2px; text-transform: capitalize;">
                                        <?= $personal_info->mother_name ?? 'Mother Name' ?>
                                    </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px; font-weight: 400; text-transform: capitalize;">Gender
                                    </h4>
                                    <h5 style=" font-size: 18px; font-weight: 500; margin-top: 2px; text-transform: capitalize;">
                                        <?= $personal_info->gender ?? 'Gender' ?>
                                    </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px; font-weight: 400; text-transform: capitalize;">Date
                                        of Birth
                                    </h4>
                                    <h5 style=" font-size: 18px; font-weight: 500;margin-top: 2px; text-transform: capitalize;">
                                        <?= $personal_info->dob ?? 'Date of Birth' ?>
                                    </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;font-weight: 400;text-transform: capitalize;">
                                        Nationality
                                    </h4>
                                    <h5 style=" font-size: 18px; font-weight: 500;      margin-top: 2px;text-transform: capitalize;">
                                        <?= $personal_info->nationality ?? 'Nationality' ?>
                                    </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px; font-weight: 400; text-transform: capitalize;">
                                        Permanent Address </h4>
                                    <h5 style=" font-size: 18px; font-weight: 500;  margin-top: 2px;text-transform: capitalize;">
                                        <?= $personal_info->permanent_address ?? 'Permanent Address' ?></h5>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="right_wrapper " style=" margin-top: 10px;">
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="display: grid;
                grid-template-columns: minmax(0, 28px) repeat(1, minmax(0, 1fr));
                align-items: center;
                gap: 12px;">
                                    <div class="icon" style="display: flex;
                  align-items: center;
                  justify-content: center;
                  width: 100%;
                  height: 28px;
                  background-color: #1fa898;
                  border-radius: 50%;
                  -webkit-border-radius: 50%;
                  -moz-border-radius: 50%;
                  -ms-border-radius: 50%;
                  -o-border-radius: 50%;">
                                        <i class="fa-solid fa-graduation-cap" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px;
                  font-weight: 500;">Education </h2>
                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;">
                                    <?php foreach ($acadamic_info as $key => $value) { ?>
                                        <h4 style="  font-size: 18px;font-weight: 500; "><?= $value->degree ?? '' ?></h4>
                                        <ul style="   margin-top: 15px;">
                                            <li style="font-size: 16px;font-weight: 400; margin-top: 5px;">Institute: <b><?= $value->name_of_institution ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px;font-weight: 400;margin-top: 5px;">Pass Year: <b> <?= $value->passing_year ?? '' ?> </b> </li>
                                            <li style="font-size: 16px; font-weight: 400;margin-top: 5px;">Concentration/Major: <b> <?= $value->major ?? '' ?></b> </li>
                                            <li style="font-size: 16px; font-weight: 400;margin-top: 5px; margin-bottom:40px">Result: <b><?= $value->result ?? '' ?> (Out of <?= $value->result_out_of ?? '' ?>) </b> </li>

                                        </ul>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px) repeat(1, minmax(0, 1fr));align-items: center;gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center; width:100%; height: 28px; background-color: #1fa898;border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%;-ms-border-radius: 50%;-o-border-radius: 50%;">
                                        <i class="fa-solid fa-user-tie" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Employment <b>History</b> </h3>
                                </div>
                                <div class="category_item" style=" margin-top: 40px; padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                    <?php foreach ($employment_history as $key => $value) { ?>
                                        <h4 style="  font-size: 18px; font-weight: 500;"><?= $value->designation ?? '' ?></h4>
                                        <ul style="   margin-top: 15px; padding-left: 20px;">
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Industry Type: <b><?= $value->industry_type ?? '' ?></b>
                                            </li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Department: <b><?= $value->department ?? '' ?></b>
                                            </li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Key Reponsibility: <b><?= $value->key_responsibility ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Company: <b> <?= $value->organization_name ?? '' ?></b> </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Address: <b> <?= $value->address ?? '' ?></b> </li>
                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-user-tie" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Training <b>Info</b> </h3>
                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px; ">
                                    <?php foreach ($training_info as $key => $value) { ?>
                                        <h4 style="font-size: 18px; font-weight: 500;"><?= $value->title ?? '' ?></h4>
                                        <ul style="margin-top: 15px; padding-left: 20px;">
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Institution Name: <b><?= $value->institution_name ?? '' ?></b>
                                            </li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Address: <b><?= $value->address ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Duration: <b><?= $value->duration ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Training Period: <b><?= $value->start_date ?? '' ?> to <?= $value->end_date ?? '' ?> </b> </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Skills: <b> <?= $value->skills ?? '' ?></b> </li>

                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-user-tie" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Professional <b>Qualification</b></h3>

                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                    <?php foreach ($professional_qualification as $key => $value) { ?>
                                        <h4 style="  font-size: 18px; font-weight: 500;"><?= $value->certificate ?? '' ?></h4>
                                        <ul>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Awarding Body: <b><?= $value->awarding_body ?? '' ?></b>
                                            </li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">
                                            <li>Address: <b><?= $value->address ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Registration Number: <b><?= $value->registration_number ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Passing Year: <b><?= $value->passing_year ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Result: <b> <?= $value->result ?? '' ?></b> </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Remarks: <b> <?= $value->remarks ?? '' ?></b> </li>

                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-lightbulb" style=" color: white; font-size: 15px;"></i>
                                    </div>

                                    <h3 style=" font-size: 22px; font-weight: 500;">Key <b>Skills</b> </h3>
                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                    <?php
                                    foreach ($key_skills as $key => $value) { ?>
                                        <!-- <h4>Web Developer</h4> -->
                                        <ul class="list_disc">
                                            <?= ($value->key_skill1 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;" >' . $value->key_skill1 . '</li>' : null ?>
                                            <?= ($value->key_skill2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->key_skill2 . '</li>' : null ?>
                                            <?= ($value->key_skill3 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->key_skill3 . '</li>' : null ?>
                                            <?= ($value->key_skill4 != null) ? '<li>' . $value->key_skill4 . "</li>" : null ?>

                                        </ul>
                                    <?php } ?>

                                </div>


                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-lightbulb" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Computer <b>Skills</b></h3>
                                    <!-- <h3>Computer Skills</b> </h2> -->
                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                    <?php
                                    foreach ($computer_skills as $key => $value) { ?>
                                        <!-- <h4>Web Developer</h4> -->
                                        <ul class="list_disc">
                                            <?= ($value->computer_skill1 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->computer_skill1 . '</li>' : null ?>
                                            <?= ($value->computer_skill2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->computer_skill2 . '</li>' : null ?>
                                            <?= ($value->computer_skill3 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->computer_skill3 . '</li>' : null ?>
                                            <?= ($value->computer_skill4 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">' . $value->computer_skill4 . '</li>' : null ?>

                                        </ul>
                                    <?php } ?>

                                </div>


                            </div>
                            <div class="right_item" style=" margin-bottom: 20px;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-user-tie" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">Language <b>Proficiency</b></h3>
                                    </h2>
                                </div>
                                <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                    <?php foreach ($language_proficincy as $key => $value) { ?>
                                        <h4 style=" font-size: 18px; font-weight: 500;"><?= $value->language ?? '' ?></h4>
                                        <ul>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Speaking: <b><?= $value->speaking     ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Writing: <b><?= $value->writing ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Reading: <b><?= $value->reading ?? '' ?></b>
                                            </li>
                                            <li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;">Listening: <b><?= $value->listening ?? '' ?></b>
                                            </li>
                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>

                            <div class="right_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                <div class="resume_title_grid" style="     display: grid; grid-template-columns: minmax(0, 28px)repeat(1, minmax(0, 1fr));align-items: center; gap: 12px;">
                                    <div class="icon" style="   display: flex; align-items: center; justify-content: center;width: 100%; height: 28px; background-color: #1fa898; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; -ms-border-radius: 50%; -o-border-radius: 50%;">
                                        <i class="fa-solid fa-graduation-cap" style=" color: white; font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px; font-weight: 500;">References </h2>
                                </div>
                                <?php foreach ($references as $key => $value) { ?>
                                    <div class="category_item" style=" margin-top: 40px;    padding-bottom: 10px;border-bottom: 1px solid #b0afaf;">
                                        <?= ($value->ref_name != null) ? '<h4 style=" font-size: 18px; font-weight: 500;"> Name:' . $value->ref_name . '</h4>' : null ?>
                                        <ul>
                                            <?= ($value->ref_degignation != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Degignation: <b>' . $value->ref_degignation . '</b></li>' : null ?>
                                            <?= ($value->ref_organization != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Organization: <b>' . $value->ref_organization . '</b></li>' : null ?>
                                            <?= ($value->mailing_address != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Mailing Address: <b>' . $value->mailing_address . '</b></li>' : null ?>
                                            <?= ($value->ref_email != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Email: <b>' . $value->ref_email . '</b></li>' : null ?>
                                            <?= ($value->ref_phone != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Phone: <b>' . $value->ref_phone . '<b></li>' : null ?>
                                            <?= ($value->ref_relation  != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Relation: <b>' . $value->ref_relation . '</b></li>' : null ?>
                                        </ul>

                                        <hr>
                                        <?= ($value->ref_name2 != null) ? '<h4 style=" font-size: 18px; font-weight: 500;"> Name:' . $value->ref_name2 . "</h4>" : null ?>
                                        <ul>
                                            <?= ($value->ref_degignation2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Degignation: <b>' . $value->ref_degignation2 . '</b></li>' : null ?>
                                            <?= ($value->ref_organization2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Organization: <b>' . $value->ref_organization2 . '</b></li>' : null ?>
                                            <?= ($value->mailing_address2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Mailing Address: <b>' . $value->mailing_address2 . '</b></li>' : null ?>
                                            <?= ($value->ref_email2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Email: <b>' . $value->ref_email2 . "</b></li>" : null ?>
                                            <?= ($value->ref_phone2 != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Phone: <b>' . $value->ref_phone2 . '<b></li>' : null ?>
                                            <?= ($value->ref_relation2  != null) ? '<li style="font-size: 16px; font-weight: 400; margin-top: 5px;list-style-type: disc;"> Relation: <b>' . $value->ref_relation2 . '</b></li>' : null ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 mb-2">
                <button type="button" id="downloadPdf" class="download_btn btn btn-info">Download</button>
                <button type="button" class="download_btn btn btn-info"><a target="_blank" href="<?= site_url('MPdf') ?>">Download</a> </button>
            </div>


            <!-- <div class="text-center mt-4 mb-2">
                <button type="button" id="downloadPdf" class="download_btn btn btn-info">Download</button>
                <button type="button" class="download_btn btn btn-info"><a target="_blank" href="<?= site_url('personal_information/pdf/') . $user_id ?>">Download</a> </button>
            </div> -->
        </section>
    </main>

    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/html2pdf.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"  ></script> -->
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>
    <script>
        let downloadPdf = document.querySelector('#downloadPdf');
        let pdfContentArea = document.querySelector('#pdfContentArea');
        var option = {
            margin: [2, 1],
            filename: '<?= $personal_info->full_name . '.pdf' ?>',
            // image: { type: 'jpeg', quality: 0.98 },
            html2canvas: {
                scale: 1,
                scrollY: 0
            }
            // jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        if (downloadPdf) {
            downloadPdf.addEventListener('click', () => {
                html2pdf().set(option)
                    .from(pdfContentArea)
                    .save();

            })
        }
    </script>
    <!-- JS Here -->
    <!-- <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script> -->
</body>

</html>