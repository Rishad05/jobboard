<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>BOS | Email Template</title>
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
                        <h1 style="text-transform: capitalize;color:#059348">
                            User Details
                        </h1>


                         <table>
                             
                             <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Name   
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                     <b>:</b> <?= $eventUserInfo['name']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Phone   
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                     <b>:</b> <?= $eventUserInfo['phone']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Cell Phone  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                    <b>:</b> <?= $eventUserInfo['cell_phone']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Email   
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                    <b>:</b> <?= $eventUserInfo['email']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Address  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                     <b>:</b> <?= $eventUserInfo['address']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Post  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                     <b>:</b> <?= $eventUserInfo['post']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 City  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                    <b>:</b> <?= $eventUserInfo['city']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Country  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                   <b>:</b> <?= $eventUserInfo['country']; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                                 Accompanying Person  
                              </td>
                              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                                     <b>:</b> <?= $eventUserInfo['accompanying_person']; ?>
                              </td>
                           </tr>
                         </table>

                         


                         <!--  <a  href="<?php echo $parse_data['reset_password_link']; ?>" style="width: 150px;display: block;background: green;color: #fff;text-decoration: none;padding: 15px 25px;text-align: center;">Password Reset</a> -->
                             
                       
                        <p style="font-size: 18px;color: rgb(58, 149, 75);font-weight: 600;line-height: 30px;"> Best Regards, 
                            <br>
                            
                            <span style="font-size: 14px;color: rgb(58, 149, 75);"><?= $eventUserInfo['name']; ?></span><br>

                             

                            
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