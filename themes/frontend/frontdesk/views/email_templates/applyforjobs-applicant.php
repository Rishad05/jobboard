<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Golden Infotech | Email Template</title>
</head>

<body style="margin:0">
   <div class="wrapper">

      <table width="100%" border="0" border-collapse="collapse" style="border-spacing:0;width:80%;margin:0 auto;">
         <tbody border="0">
            <!-- HEADER STARTS -->
            <tr>
               <td colspan="3" style="background:#f0f0f0;text-align:center; padding:20px;"><a href="#" title="FDB" rel="home" target="_blank"> <img src="<?= base_url('uploads/' . $this->Settings->logo); ?>" style="width: 175px;" alt="logo"> </a></td>
            </tr>
            <!-- HEADER ENDS -->
            <!-- MAIL BODY CONTENT STARTS -->
            <tr style="background:#fafafa">
               <td colspan="3" style="padding:35px; padding-left: 20%;">
                  <table>
                     <tbody>
                        <tr>
                           <td colspan="2" style="padding-right: 15px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 font-weight: bold;">
                              Details:
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
                              Name:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;
                                 ">
                              <?php echo $mailData['name']; ?>
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
                              Phone Number:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['phone']; ?>
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
                              Email:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['email']; ?>
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
                              Position:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['positions']; ?>
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
                              Date of Birth:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['dob']; ?>
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
                              Current Organization:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['current_organizations']; ?>
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
                              Experience:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['experience']; ?>
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
                              Current Salary:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['current_salary']; ?>
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
                              Expectation:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['expectation']; ?>
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
                              Profile Code:
                           </td>
                           <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #74787e;
                                 font-size: 16px;
                                 line-height: 1.5em;
                                 margin-top: 0;
                                 text-align: left;">
                              <?php echo $mailData['profile_code']; ?>
                           </td>
                        </tr>

                        <tr>
                           <td style="padding-right: 35px; padding-top: 30px;">
                              <p style="font-family: Avenir,Helvetica,sans-serif;
                                    box-sizing: border-box;
                                    color: #74787e;
                                    font-size: 16px;
                                    line-height: 1.5em;
                                    margin-top: 0;
                                    text-align: left;">
                                 Regards,<br>
                                 Golden Infotech
                              </p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <!-- MAIL BODY CONTENT ENDS -->
            <!-- HIGHLIGHTED TEXT STARTS -->
            <tr>
               <td colspan="3">
                  <p style="background:#f0f0f0; color:#fff;text-align:center;padding:20px;font-weight:bold;font-size:14px;margin:0;font-family: Avenir,Helvetica,sans-serif;
                                 box-sizing: border-box;
                                 color: #4a7bb9;">©
                     2023, All rights reserved.<span></span>
                  </p>
               </td>
            </tr>
            <!-- HIGHLIGHTED TEXT ENDS -->
            <!-- FOOTER STARTS -->
            <!-- FOOTER ENDS -->
            <!-- FOOTER BOTTOM STARTS -->
            <!-- FOOTER BOTTOM ENDS -->
         </tbody>
      </table>
   </div>
</body>

</html>