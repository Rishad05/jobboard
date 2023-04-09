<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Faretrim | Email Template</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
  
<body style="margin:0;font-family: \'Lato\', sans-serif;">
    <div class="wrapper">
        <table width="100%" border="0" border-collapse="collapse" style="border-spacing:0;width:80%;margin:0 auto;">
            <tbody border="0">

                <!-- HEADER STARTS -->
                <tr>
                    <td colspan="3" style="background:#059348;text-align:center; padding:20px;">
                        <a style="" href="<?php echo $site_link; ?>" title="FareTrim" rel="home" target="_blank"> <img width="270" height="auto" src="<?= $logo; ?>"  alt="BOS"> </a>
                    </td>
            

                </tr>
                <!-- HEADER ENDS -->

                <!-- MAIL BODY CONTENT STARTS -->
                <tr style="background:#f5f5f5">
                    <td colspan="3" style="padding:50px 35px;">
                        <h2 style="color:#059348">Hi  <?php echo $activationUserInfo['uname']; ?></h2>

                        <h2 style="color:#059348">Congratulations! Your account has been activated, enjoy your account click <a href="<?php echo $activationUserInfo['link']; ?>">here</a> to login.</h2>

                          


                         <!--  <a  href="<?php echo $activationUserInfo['link']; ?>" style="width: 150px;display: block;background: green;color: #fff;text-decoration: none;padding: 15px 25px;text-align: center;">Click here to login</a> -->
                             
                       
                        <p style="font-size: 18px;color: rgb(58, 149, 75);font-weight: 600;line-height: 30px;"> Best Regards, 
                            <br>
                            
                            <span style="font-size: 14px;color: rgb(58, 149, 75);">Bangladesh Orthopaedic Society </span>
                    </p>
            </td>
          </tr> 
           
          <!-- HIGHLIGHTED TEXT ENDS -->

          <!-- FOOTER STARTS -->
          <tr style="background:#059348;color:#fff;text-align: center;line-height: 25px;font-size: 18px ">
            <td colspan="3 " style="padding:35px 35px;border-spacing: 0; ">
                Our Location : Sher-e-Bangla Nagar, Dhaka - 1207, Bangladesh</br>
                <!-- Telephone : <a style="color:#fff; " href="tel::+61433336354 ">:+61433336354</a></br> -->
                Send email : <a style="color:#fff; " href="mailto:bos_bdortho@yahoo.com ">bos_bdortho@yahoo.com</a></br>
                <span style="color: rgba(255,255,255,.6);margin-top: 20px;display: block; ">Copyright © 2019 | Bangladesh Orthopaedic Society | All Rights Reserved.</span>
            </td>
          </tr>
          <!-- FOOTER ENDS -->
      </tbody>
    </table>
</div>
</body>
</html> 
