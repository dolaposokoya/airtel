<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($hospitalEmail, $hospitalName)
{
    try {
        require_once "../PHPMailer/Exception.php";
        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";

        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'globalsightservices.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@globalsightservices.com';
        $mail->Password   = 'GlobalSight@21';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $message = "
<html>
<head>
<title>Patients' Bill of Rights | Support Federal Competition & Consumer Protection Commission | FCCPC Patients' Bill of Rights</title>
</head>
<body>
<a  href='https://www.fccpc.gov.ng/' target='_blank' style='display: flex; justify-content: center; align-items: center; width: 100vw;'>
<img src='https://www.fccpc.gov.ng/uploads/logo.jpg' style='width: 90px;
height: 60px;' />
</a>
<h4>You have registered " . strtoupper($hospitalName) . " under the FCCPC Patients' Bill of Rights (PBoR) as an hosiptal in Nigeria, kindly await more details about this project.</h4>
</body>
</html>
";

        //Recipients 
        $mail->setFrom('info@globalsightservices.com', 'FCCPC (PBoR)');
        $mail->addAddress($hospitalEmail, strtoupper($hospitalName));

        //Add attachments
        // $mail->addAttachment("../card/" . str_replace(' ', '', $hospitalName) . ".jpeg");

        $mail->isHTML(true);
        $mail->Subject = "FCCPC Patients' Bill Of Rights (PBoR)";
        $mail->Body    = $message;
        $mail->AltBody = 'FCCPC (PBoR)';

        $mail->send();
        $mailresult['success'] = true;
        $mailresult['message'] = "Message has been sent";
    } catch (Exception $e) {
        $mailresult['success'] = false;
        $mailresult['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    return $mailresult;
}
