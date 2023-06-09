<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>BITOPI GROUP | Email Template</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body style="margin:0;font-family: \'Lato\', sans-serif;">
    <div class="wrapper">
        <table width="100%" border="0" border-collapse="collapse" style="border-spacing:0;width:80%;margin:0 auto;">
            <tbody border="0">

                <!-- HEADER STARTS -->
                <tr>
                    <td colspan="3" style="background:white;text-align:center; padding:20px;">
                        <a style="" href="<?php echo $parse_data['site_link']; ?>" title="BITOPI GROUP" rel="home" target="_blank"> <img src="<?= base_url('uploads/' . $this->Settings->logo); ?>" style="width: 175px;" alt="logo"> </a>
                    </td>


                </tr>
                <!-- HEADER ENDS -->

                <!-- MAIL BODY CONTENT STARTS -->
                <tr style="background:#f5f5f5">
                    <td colspan="3" style="padding:50px 35px;">
                        <h3 style="text-transform: capitalize;color:#059348">Hi <?php echo $parse_data['user_name']; ?></h3>
                        <p style="font-size: 18px;color: #333;"> You recently requested to reset your password for your Applicant account. Click the button below to reset it. if you did not request a password reset, please ignore this email.</p>


                        <a href="<?php echo $parse_data['reset_password_link']; ?>" style="width: 150px;display: block;background: green;color: #fff;text-decoration: none;padding: 15px 25px;text-align: center;">Password Reset</a>


                        <p style="font-size: 18px;color: rgb(58, 149, 75);font-weight: 600;line-height: 30px;"> Best Regards,
                            <br>

                            <span style="font-size: 14px;color: rgb(58, 149, 75);">BITOPI GROUP </span>
                        </p>
                    </td>
                </tr>

                <!-- HIGHLIGHTED TEXT ENDS -->

                <!-- FOOTER STARTS -->
                <tr style="background:#059348;color:#fff;text-align: center;line-height: 25px;font-size: 18px ">
                    <td colspan="3 " style="padding:35px 35px;border-spacing: 0; ">
                        Our Location : 822/3, Begum Rokeya Sharani, Shewrapara,
                        Mirpur, Dhaka 1216, Bangladesh</br>
                        <!-- Telephone : <a style="color:#fff; " href="tel::+61433336354 ">:+61433336354</a></br> -->
                        Send email : <a style="color:#fff; " href="mailto:info@bitopi.com ">info@bitopi.com</a></br>
                        <span style="color: rgba(255,255,255,.6);margin-top: 20px;display: block; ">Copyright © 2023 | BITOPI GROUP | All Rights Reserved.</span>
                    </td>
                </tr>
                <!-- FOOTER ENDS -->
            </tbody>
        </table>
    </div>
</body>

</html>