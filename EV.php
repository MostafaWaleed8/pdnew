<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';
require 'vendor\autoload.php';

include("CONN.PHP");
$result = mysqli_query($conn, "SELECT * FROM admin WHERE ID = '1'"); 
while ($row = mysqli_fetch_array($result)) { $encryption = $row['password1'];}

$ciphering = "AES-128-CTR"; 
$options = 0; 
$decryption_iv = '1234567891011121'; 
$decryption_key = "123581321";  
$decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv); 
  
$six_digit_random_number = mt_rand(100000, 999999);
$to = $_POST['email'];
$subject = 'Your verification code : '.$six_digit_random_number;
$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <!--<![endif]-->
    <!--[if (gte mso 9)|(IE)]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
    <!--[if (gte mso 9)|(IE)]>
  <style type="text/css">
    body {width: 600px;margin: 0 auto;}
    table {border-collapse: collapse;}
    table, td {mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
    img {-ms-interpolation-mode: bicubic;}
  </style>
<![endif]-->
    <style type="text/css">
        body,
        p,
        div {
            font-family: inherit;
            font-size: 14px;
        }
        
        body {
            color: #000000;
        }
        
        body a {
            color: #1188E6;
            text-decoration: none;
        }
        
        p {
            margin: 0;
            padding: 0;
        }
        
        table.wrapper {
            width: 100% !important;
            table-layout: fixed;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
            -moz-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        img.max-width {
            max-width: 100% !important;
        }
        
        .column.of-2 {
            width: 50%;
        }
        
        .column.of-3 {
            width: 33.333%;
        }
        
        .column.of-4 {
            width: 25%;
        }
        
        @media screen and (max-width:480px) {
            .preheader .rightColumnContent,
            .footer .rightColumnContent {
                text-align: left !important;
            }
            .preheader .rightColumnContent div,
            .preheader .rightColumnContent span,
            .footer .rightColumnContent div,
            .footer .rightColumnContent span {
                text-align: left !important;
            }
            .preheader .rightColumnContent,
            .preheader .leftColumnContent {
                font-size: 80% !important;
                padding: 5px 0;
            }
            table.wrapper-mobile {
                width: 100% !important;
                table-layout: fixed;
            }
            img.max-width {
                height: auto !important;
                max-width: 100% !important;
            }
            a.bulletproof-button {
                display: block !important;
                width: auto !important;
                font-size: 80%;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            .columns {
                width: 100% !important;
            }
            .column {
                display: block !important;
                width: 100% !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }
    </style>
    <!--user entered Head Start-->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Muli", sans-serif;
        }
    </style>
    <!--End Head user entered-->
</head>

<body>
    <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:inherit; color:#000000; background-color:#FFFFFF;">
        <div class="webkit">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#FFFFFF">
                <tbody>
                    <tr>
                        <td valign="top" bgcolor="#FFFFFF" width="100%">
                            <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                    <tr>
                                        <td width="100%">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <!--[if mso]>
    <center>
    <table><tr><td width="600">
  <![endif]-->
                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td role="modules-container" style="padding:0px 0px 0px 0px; color:#000000; text-align:left;" bgcolor="#FFFFFF" width="100%" align="left">
                                                                            <table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%" style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td role="module-content">
                                                                                            <p></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:30px 20px 30px 20px;" bgcolor="#057AEC">
                                                                                <tbody>
                                                                                    <tr role="module-content">
                                                                                        <td height="100%" valign="top">
                                                                                            <table class="column" width="540" style="width:540px; border-spacing:0; border-collapse:collapse; margin:0px 10px 0px 10px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="padding:0px;margin:0px;border-spacing:0;">
                                                                                                            <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="d8508015-a2cb-488c-9877-d46adf313282">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
                                                                                                                            <img class="max-width" border="0" style="display:block; color:#000000; text-decoration:none; font-family:Helvetica, arial, sans-serif; font-size:16px;" width="200" alt="" data-proportionally-constrained="true" data-responsive="false" src="https://i.ibb.co/3scJZgk/logo-host.png"
                                                                                                                                height="200">
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="948e3f3f-5214-4721-a90e-625a47b1c957" data-mc-module-version="2019-10-22">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding:50px 30px 18px 30px; line-height:36px; text-align:inherit; background-color:#ffffff;" height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                                                                                                                            <div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="font-size: 23px">Your OTP verification code is :&nbsp;</span></div>
                                                                                                                                <div></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout:fixed;" width="100%" data-muid="d050540f-4672-4f31-80d9-b395dc08abe1">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td align="center" bgcolor="#ffffff" class="outer-td" style="padding:0px 0px 0px 0px;">
                                                                                                                            <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
                                                                                                                                <tbody>
                                                                                                                                    <tr>
                                                                                                                                        <td align="center" bgcolor="#057AEC" class="inner-td" style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;">
                                                                                                                                            <a style="background-color:#057AEC; border:1px solid #057AEC; border-color:#057AEC; border-radius:0px; border-width:1px; color:#ffffff; display:inline-block; font-size:14px; font-weight:normal; letter-spacing:0px; line-height:normal; padding:12px 40px 12px 40px; text-align:center; text-decoration:none; border-style:solid; font-family:inherit;"
                                                                                                                                                target="_blank">'.$six_digit_random_number.'</a>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="a10dcb57-ad22-4f4d-b765-1d427dfddb4e" data-mc-module-version="2019-10-22">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding:18px 30px 18px 30px; line-height:22px; text-align:inherit; background-color:#ffffff;" height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                                                                                                                            <div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="font-size: 18px">Please verify your email address to</span><span style="color: #000000; font-size: 18px; font-family: arial,helvetica,sans-serif"> get access to thousands of exclusive job listings</span>
                                                                                                                                    <span style="font-size: 18px">.</span>
                                                                                                                                </div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="color: #057AEC; font-size: 18px"><strong>Thank you!&nbsp;</strong></span></div>
                                                                                                                                <div></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="7770fdab-634a-4f62-a277-1c66b2646d8d">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding:0px 0px 20px 0px;" role="module-content" bgcolor="#ffffff">
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="a265ebb9-ab9c-43e8-9009-54d6151b1600" data-mc-module-version="2019-10-22">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding:50px 30px 50px 30px; line-height:22px; text-align:inherit; background-color:#F0F0F0;" height="100%" valign="top" bgcolor="#F0F0F0" role="module-content">
                                                                                                                            <div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="color: #000000; font-size: 18px"><strong>Why you have to verfiy your email : </strong></span></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><br></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="color: #000000; font-size: 18px">This email will be used for future logins for your account and as we need to complete your payment processes, to provide better and accurate support, and to maintain the security of your account and information.</span></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><br></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="color: #ff0404; font-size: 18px">This code will expire in an hour</span></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><br></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><span style="color: #000000; font-size: 18px">Need support? Our support team is always happy to help , you can replay to this email with your problem</span></div>
                                                                                                                                <div style="font-family: inherit; text-align: center"><br></div>
                                                                                                                                <div></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c37cc5b7-79f4-4ac8-b825-9645974c984e">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding:0px 0px 30px 0px;" role="module-content" bgcolor="F0F0F0">
                                                                                                                            <div style="font-family: inherit; text-align: center"><span style="color: #000000; font-size: 18px">P&D Hosting Website</span></div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--[if mso]>
                                  </td>
                                </tr>
                              </table>
                            </center>
                            <![endif]-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>


</body>

</html>';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML(true);
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'thewiner1009@gmail.com';
$mail->Password =  $decryption;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('thewiner1009@gmail.com', 'PD hosting');
$mail->addReplyTo('thewiner1009@gmail.com', 'PD hosting');
$mail->addAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;

if(!$mail->send()){
    echo 'false';
}else{
    echo $six_digit_random_number;
}
?>