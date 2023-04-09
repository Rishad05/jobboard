<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Resume</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= $frontend_assets; ?>images/header/logo.png" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="<?= $frontend_assets; ?>plugins/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

        .user_name {
            color: red;
            border: solid 1px red;
        }
    </style>
</head>

<body>
    <main>
        <!-- Resume Section  -->
        <section class="resume_wrapper">
            <!-- <div class="d-flex-between apply_title_area">
                <h4>Job Title: <b>Full Stack Developer</b></h4>
                <div>
                    <h6>Source:bdjobs online cv maker</h6>
                    <h6>Last Update: <b>05 Dec 2023</b></h6>
                </div>
            </div> -->
            <div class="resume_area" style="border: 1px solid #d5d4d4;" id="pdfContentArea">
                <div class="row">
                    <div class="col-md-5">
                        <div class="left_wrapper" style="height: 100%;
            padding: 10px 20px 40px 20px;
            background-color: whitesmoke;">
                            <div class="user_info_area">
                                <div class="user_img" style=" display: flex;
                align-items: center;
                justify-content: center;
                max-width: 180px;
                width: 100%;
                height: 180px;
                margin-left: auto;
                margin-right: auto;">
                                    <?php if ($personal_info->applicant_photo ?? '') { ?>
                                        <img src="<?= base_url('uploads/') . $personal_info->applicant_photo ?? ''; ?>" width="160" style=" max-height: 100%;">
                                    <?php } ?>

                                </div>
                                <h4 class="user_name" style="   font-size: 24px;
                font-weight: 600;
                margin-top: 20px;"><?= $personal_info->full_name ?? 'Name' ?></h4>
                                <ul class="contact_list" style="   margin-top: 30px;
                margin-bottom: 40px;">
                                    <li style="  display: grid;
                  grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr));
                  align-items: start;
                  gap: 10px;
                  margin-top: 12px;">
                                        <div class="icon" style="  display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 26px;
                    background-color: #1fa898;
                    border-radius: 50%;
                    -webkit-border-radius: 50%;
                    -moz-border-radius: 50%;
                    -ms-border-radius: 50%;
                    -o-border-radius: 50%;">
                                            <i class="fa-solid fa-phone" style=" color: white;
                      font-size: 12px;"></i>
                                        </div>
                                        <a href="tel:+" style="  font-size: 16px;
                    font-weight: 500;"><?= $personal_info->cell_phone_1 ?? 'Phone' ?></a>
                                    </li>
                                    <li style="  display: grid;
                  grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr));
                  align-items: start;
                  gap: 10px;
                  margin-top: 12px;">
                                        <div class="icon" style="  display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 26px;
                    background-color: #1fa898;
                    border-radius: 50%;
                    -webkit-border-radius: 50%;
                    -moz-border-radius: 50%;
                    -ms-border-radius: 50%;
                    -o-border-radius: 50%;">
                                            <i class="fa-regular fa-envelope-open" style=" color: white;
                      font-size: 12px;"></i>
                                        </div>
                                        <a href="#" style="  font-size: 16px;
                    font-weight: 500;"><?= $personal_info->email ?? 'Email' ?></a>
                                    </li>
                                    <li style="  display: grid;
                  grid-template-columns: minmax(0, 26px) repeat(1, minmax(0, 1fr));
                  align-items: start;
                  gap: 10px;
                  margin-top: 12px;">
                                        <div class=" icon" style="  display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 26px;
                    background-color: #1fa898;
                    border-radius: 50%;
                    -webkit-border-radius: 50%;
                    -moz-border-radius: 50%;
                    -ms-border-radius: 50%;
                    -o-border-radius: 50%;">
                                            <i class="fa-solid fa-location-dot" style=" color: white;
                      font-size: 12px;"></i>
                                        </div>
                                        <a href="#" style="  font-size: 16px;
                    font-weight: 500;" target="_blank"><?= $personal_info->present_address ?? 'Address' ?></a>
                                    </li>

                                </ul>
                                <div class="resume_title_grid" style="     display: grid;
                grid-template-columns: minmax(0, 28px) repeat(1, minmax(0, 1fr));
                align-items: center;
                gap: 12px;">
                                    <div class="icon" style="   display: flex;
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
                                        <i class="fa-solid fa-user-tie" style=" color: white;
                    font-size: 15px;"></i>
                                    </div>
                                    <h3 style=" font-size: 22px;
                  font-weight: 500;">Personal Information</h2>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Father's Name</h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->father_name ?? 'Father Name' ?></h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">

                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Mother's Name</h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->mother_name ?? 'Mother Name' ?></h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Gender </h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->gender ?? 'Gender' ?> </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Date of Birth </h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->dob ?? 'Date of Birth' ?> </h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Nationality </h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->nationality ?? 'Nationality' ?></h5>
                                </div>
                                <div class="information_item" style="margin-top: 30px;">
                                    <h4 style="   font-size: 16px;
                  font-weight: 400;
                  text-transform: capitalize;">Permanent Address </h4>
                                    <h5 style=" font-size: 18px;
                  font-weight: 500;
                  margin-top: 2px;
                  text-transform: capitalize;"><?= $personal_info->permanent_address ?? 'Permanent Address' ?></h5>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="right_wrapper ">
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <h3>Employment <b>History</b> </h3>
                                </div>
                                <div class="category_item" style="margin-top: 7px ;">
                                    <?php foreach ($employment_history as $key => $value) { ?>
                                        <h4><?= $value->designation ?? '' ?></h4>
                                        <ul>
                                            <li>Industry Type: <b><?= $value->industry_type ?? '' ?></b>
                                            </li>
                                            <li>Department: <b><?= $value->department ?? '' ?></b>
                                            </li>
                                            <li>Key Reponsibility: <b><?= $value->key_responsibility ?? '' ?></b>
                                            </li>
                                            <li> Company: <b> <?= $value->organization_name ?? '' ?></b> </li>
                                            <li> Address: <b> <?= $value->address ?? '' ?></b> </li>
                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <h3>Training <b>Info</b> </h3>
                                </div>
                                <div class="category_item" style="margin-top: 7px ;">
                                    <?php foreach ($training_info as $key => $value) { ?>
                                        <h4><?= $value->title ?? '' ?></h4>
                                        <ul>
                                            <li>Institution Name: <b><?= $value->institution_name ?? '' ?></b>
                                            </li>
                                            <li>Address: <b><?= $value->address ?? '' ?></b>
                                            </li>
                                            <li>Duration: <b><?= $value->duration ?? '' ?></b>
                                            </li>
                                            <li>Training Period: <b><?= $value->start_date ?? '' ?> - <?= $value->end_date ?? '' ?> </b> </li>
                                            <li> Skills: <b> <?= $value->skills ?? '' ?></b> </li>

                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <h3>Professional <b>Qualification</b></h3>
                                    </h2>
                                </div>
                                <div class="category_item" style="margin-top: 7px ;">
                                    <?php foreach ($professional_qualification as $key => $value) { ?>
                                        <h4><?= $value->certificate ?? '' ?></h4>
                                        <ul>
                                            <li>Awarding Body: <b><?= $value->awarding_body ?? '' ?></b>
                                            </li>
                                            <li>Address: <b><?= $value->address ?? '' ?></b>
                                            </li>
                                            <li>Registration Number: <b><?= $value->registration_number ?? '' ?></b>
                                            </li>
                                            <li>Passing Year: <b><?= $value->passing_year ?? '' ?></b>
                                            </li>
                                            <li> Result: <b> <?= $value->result ?? '' ?></b> </li>
                                            <li> Remarks: <b> <?= $value->remarks ?? '' ?></b> </li>

                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-lightbulb"></i>
                                    </div>

                                    <h3>Key <b>Skills</b> </h3>
                                </div>
                                <div class="category_item" style="margin-top: 0px ;">
                                    <?php foreach ($key_skills as $key => $value) { ?>
                                        <!-- <h4>Web Developer</h4> -->
                                        <ul class="list_disc">
                                            <li><?= $value->key_skill ?? '' ?> </li>
                                        </ul>
                                    <?php } ?>
                                </div>


                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-lightbulb"></i>
                                    </div>
                                    <h3>Computer <b>Skills</b></h3>
                                    <!-- <h3>Computer Skills</b> </h2> -->
                                </div>
                                <div class="category_item" style="margin-top: 0px ;">
                                    <?php foreach ($computer_skills as $key => $value) { ?>
                                        <!-- <h4>Web Developer</h4> -->
                                        <ul class="list_disc">
                                            <li><?= $value->computer_skill ?? '' ?> </li>
                                        </ul>
                                    <?php } ?>
                                </div>


                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <h3>Language <b>Proficiency</b></h3>
                                    </h2>
                                </div>
                                <div class="category_item" style="margin-top: 7px ;">
                                    <?php foreach ($language_proficincy as $key => $value) { ?>
                                        <h4><?= $value->language ?? '' ?></h4>
                                        <ul>
                                            <li>Speaking: <b><?= $value->speaking     ?? '' ?></b>
                                            </li>
                                            <li>Writing: <b><?= $value->writing ?? '' ?></b>
                                            </li>
                                            <li>Reading: <b><?= $value->reading ?? '' ?></b>
                                            </li>
                                            <li>Listening: <b><?= $value->listening ?? '' ?></b>
                                            </li>
                                        </ul>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div>
                                    <h3>Education </h2>
                                </div>
                                <?php foreach ($acadamic_info as $key => $value) { ?>
                                    <div class="category_item">
                                        <h4><?= $value->degree ?? '' ?></h4>
                                        <ul>
                                            <li>Institute: <b><?= $value->name_of_institution ?? '' ?></b>
                                            </li>
                                            <li>Pass Year: <b> <?= $value->passing_year ?? '' ?> </b> </li>
                                            <li>Concentration/Major: <b> <?= $value->major ?? '' ?></b> </li>
                                            <li>Result: <b><?= $value->result ?? '' ?> (Out of <?= $value->result_out_of ?? '' ?>) </b> </li>

                                        </ul>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="right_item">
                                <div class="resume_title_grid">
                                    <div class="icon">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div>
                                    <h3>References </h2>
                                </div>
                                <?php foreach ($references as $key => $value) { ?>
                                    <div class="category_item">
                                        <h4><?= $value->ref_name ?? '' ?></h4>
                                        <ul>
                                            <li>Degignation: <b><?= $value->ref_degignation ?? '' ?></b>
                                            </li>
                                            <li>Organization: <b> <?= $value->ref_organization ?? '' ?> </b> </li>
                                            <li>Mailing Address: <b> <?= $value->mailing_address ?? '' ?></b> </li>
                                            <li>Email: <b><?= $value->ref_email ?? '' ?> </b> </li>
                                            <li>Phone: <b><?= $value->ref_phone ?? '' ?> </b> </li>
                                            <li>Relation: <b><?= $value->ref_relation ?? '' ?> </b> </li>

                                        </ul>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JS Here -->
    <script src="<?= $frontend_assets; ?>plugins/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $frontend_assets; ?>plugins/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"  ></script> -->
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>

    <script src="<?= $frontend_assets; ?>js/main.js"></script>
    <script>
        let downloadPdf = document.querySelector('#downloadPdf');
        let pdfContentArea = document.querySelector('#pdfContentArea');
        if (downloadPdf) {
            downloadPdf.addEventListener('click', () => {
                window.print()
                // html2pdf()
                //     .from(pdfContentArea)
                //     .save();

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