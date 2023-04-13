<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resume PDF</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,400&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>
<?php
function convertToBase64($path)
{
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  return $base64;
}
?>

<body>
  <div style="
        max-width: 900px;
        width: 100%;
        margin: 10px auto;
      ">

    <table style="width: 100%; border-collapse: collapse">
      <tr>
        <td>
          <table style="width: 100%; border-collapse: collapse">
            <tr style="vertical-align: top">
              <td style="font-size: 0">
                <!-- Left Section  -->
                <table style="
                      max-width: 320px;
                      width: 100%;
                      border-collapse: collapse;
                      float:left;
                      height: 100%;
                      padding: 10px 20px 40px 20px;
                      background-color: whitesmoke;
                    ">
                  <!-- User Info Start -->
                  <tr>
                    <td>
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td>
                            <div style="
                                  max-width: 180px;
                                  width: 100%;
                                  height: 180px;
                                ">
                              <?php
                              $path = base_url('uploads/') . $personal_info->applicant_photo;
                              $base64 = convertToBase64($path);
                              ?>
                              <?php if ($personal_info->applicant_photo ?? '') { ?>
                                <img src="<?= $base64 ?>" style="height: 100%; max-width: 100%" alt="">
                              <?php } ?>

                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>


                  <tr>
                    <td>
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td>
                            <h4 style="
                                  font-size: 24px;
                                  font-weight: 600;
                                  margin: 0;
                                  margin-top: 20px;
                                ">
                              <?= $personal_info->full_name ?? 'Name' ?>
                            </h4>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td>
                            <table style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  margin-top: 12px;
                                ">
                              <tr>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 26px;
                                              height: 26px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <?php
                                          $path = $frontend_assets . "icon/call.png";
                                          $base64 = convertToBase64($path);
                                          ?>

                                          <img src="<?= $base64; ?>" alt="call icon" style="width: 13px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <a href="tel:+" style="
                                                font-size: 16px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                white-space: nowrap;
                                                
                                                word-break: break-all;
                                              "><?= $personal_info->cell_phone_1 ?? 'Phone' ?></a>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <table style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  margin-top: 12px;
                                ">
                              <tr>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 26px;
                                              height: 26px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/mail.png" alt="mail icon" style="width: 13px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <a href="mailto:<?= $personal_info->email ?? 'Email' ?>" style="
                                                font-size: 16px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                white-space: nowrap;
                                                
                                                word-break: break-all;
                                              "><?= $personal_info->email ?? 'Email' ?></a>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <table style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  margin-top: 12px;
                                ">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 26px;
                                              height: 26px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/location.png" alt="mail icon" style="width: 13px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <a style="
                                                font-size: 16px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                
                                                word-break: break-all;
                                              "><?= $personal_info->present_address ?? 'Present Address' ?></a>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- User Info End -->
                  <!-- User Title  -->
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  margin-top: 12px;
                                ">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/user.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                            Personal Information
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- Personal Info Start  -->

                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Father's Name
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->father_name ?? 'Father Name' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Mother's Name
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->mother_name ?? 'Mother Name' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Gender
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->gender ?? 'Gender' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Date Of Birth
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->dob ?? 'Date of Birth' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Nationality
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->nationality ?? 'Nationality' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 24px">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 16px;
                                        font-weight: 500;
                                        margin: 0;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    Permanent Address
                                  </h4>
                                  <h5 style="
                                        font-size: 18px;
                                        font-weight: 600;
                                        margin: 0;
                                        margin-top: 2px;
                                        text-transform: capitalize;
                                        word-break: break-all;
                                        margin-right: 5px;
                                      ">
                                    <?= $personal_info->permanent_address ?? 'Permanent Address' ?>
                                  </h5>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- Personal Info End  -->
                </table>

                <!-- Right Section  -->
                <table style="
                      max-width: 565px;
                      width: 100%;
                      border-collapse: collapse;
                      
                      vertical-align: top;
                      padding-left: 20px;
                    ">
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/education.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                            Education
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <?php foreach ($acadamic_info as $key => $value) { ?>
                                <tr>
                                  <td>
                                    <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                      <?= $value->degree ?? '' ?>
                                    </h4>
                                    <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Institute:
                                        <b><?= $value->name_of_institution ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Pass Year: <b> <?= $value->passing_year ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Concentration/Major:
                                        <b> <?= $value->major ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Result: <b><?= $value->result ?? '' ?> (Out of <?= $value->result_out_of ?? '' ?>) </b>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>

                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/education.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                            Employement History
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <?php foreach ($employment_history as $key => $value) { ?>
                                <tr>
                                  <td>
                                    <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                      <?= $value->designation ?? '' ?>
                                    </h4>
                                    <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Industry Type:
                                        <b><?= $value->industry_type ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Department: <b> <?= $value->department ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Key Reponsibility:
                                        <b> <?= $value->key_responsibility ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Organization Name:
                                        <b> <?= $value->organization_name ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Address:
                                        <b> <?= $value->address ?? '' ?></b>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>

                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/education.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                           Training Info
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <?php foreach ($training_info as $key => $value) { ?>
                                <tr>
                                  <td>
                                    <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                      <?= $value->title ?? '' ?>
                                    </h4>
                                    <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Institution Name:
                                        <b><?= $value->institution_name ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Address: <b> <?= $value->address ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Duration:
                                        <b> <?= $value->duration ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Training Period: <b><?= $value->start_date ?? '' ?> to <?= $value->end_date ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Skills:
                                        <b> <?= $value->skills ?? '' ?></b>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>

                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/education.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                           Professional Qualification
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <?php foreach ($professional_qualification as $key => $value) { ?>
                                <tr>
                                  <td>
                                    <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                      <?= $value->certificate ?? '' ?>
                                    </h4>
                                    <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                       Awarding Body:
                                        <b><?= $value->awarding_body ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Registration Number: <b> <?= $value->registration_number ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Passing Year:
                                        <b> <?= $value->passing_year ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Result: <b><?= $value->result ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Remarks:
                                        <b> <?= $value->remarks ?? '' ?></b>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>

                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/education.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                           Professional Qualification
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <?php foreach ($professional_qualification as $key => $value) { ?>
                                <tr>
                                  <td>
                                    <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                      <?= $value->certificate ?? '' ?>
                                    </h4>
                                    <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                       Awarding Body:
                                        <b><?= $value->awarding_body ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Registration Number: <b> <?= $value->registration_number ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Passing Year:
                                        <b> <?= $value->passing_year ?? '' ?></b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Result: <b><?= $value->result ?? '' ?> </b>
                                      </li>
                                      <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                        Remarks:
                                        <b> <?= $value->remarks ?? '' ?></b>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>

                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!--
                    !don't remove this row
                    ?this is tricks to full width right section
                -->
                  <tr>
                    <td style="font-size: 0; padding: 0">
                      <table style="width: 100%; border-collapse: collapse">
                        <tr>
                          <td>
                            <div style="
                                  width: 100%;
                                  height: 1px;
                                  font-size: 16px;
                                  opacity: 0;
                                ">
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. At est, doloribus suscipit
                              laboriosam obcaecati voluptatibus neque facere
                              nihil ea deserunt voluptas quasi ipsum, aut iste
                              doloremque! Voluptatum deleniti laudantium
                              quaerat.
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- Tricks row end  -->

                  <!-- Experience Title  -->
                  <tr>
                    <td style="padding-top: 10px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/user.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                            Experience
                                            <b style="
                                                  font-weight: 600;
                                                  color: #1fa898;
                                                ">(3.9Year)</b>
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                    Web Developer
                                  </h4>
                                  <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        list-style: none;
                                      ">
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      Experience(Years):
                                      <b>2 year 3 months</b>
                                    </li>
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      Company: <b> Digicart solutions</b>
                                    </li>
                                  </ul>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                    Web Developer
                                  </h4>
                                  <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        list-style: none;
                                      ">
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      Experience(Years):
                                      <b>2 year 3 months</b>
                                    </li>
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      Company: <b> Digicart solutions</b>
                                    </li>
                                  </ul>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- Skills Title  -->
                  <tr>
                    <td style="padding-top: 20px">
                      <table style="
                            max-width: 32px;
                            width: 100%;
                            border-collapse: collapse;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr style="vertical-align: top">
                                <td>
                                  <table style="
                                        max-width: 32px;
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div style="
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              width: 32px;
                                              height: 32px;
                                              background-color: #1fa898;
                                              border-radius: 50%;
                                              -webkit-border-radius: 50%;
                                              -moz-border-radius: 50%;
                                              -ms-border-radius: 50%;
                                              -o-border-radius: 50%;
                                              margin-right: 5px;
                                            ">
                                          <img src="<?= $frontend_assets; ?>icon/skill.png" alt="mail icon" style="width: 16px" />
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table style="
                                        width: 100%;
                                        border-collapse: collapse;
                                      ">
                                    <tr>
                                      <td>
                                        <div>
                                          <h4 style="
                                                font-size: 22px;
                                                font-weight: 500;
                                                color: black;
                                                width: 250px;
                                                margin: 0;
                                                
                                                word-break: break-all;
                                              ">
                                            Skills
                                          </h4>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                          padding-bottom: 10px;
                          border-bottom: 1px solid #b0afaf;
                        ">
                      <table style="
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 30px;
                          ">
                        <tr>
                          <td style="font-size: 0">
                            <table style="width: 100%; border-collapse: collapse">
                              <tr>
                                <td>
                                  <h4 style="
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin: 0;
                                      ">
                                    Web Developer
                                  </h4>
                                  <ul style="
                                        margin-top: 15px;
                                        padding: 0;
                                        padding-left: 20px;
                                      ">
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      HTML
                                    </li>
                                    <li style="
                                          font-size: 16px;
                                          font-weight: 400;
                                          margin-top: 5px;
                                        ">
                                      CSS
                                    </li>
                                  </ul>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- Skills Title  -->

                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>