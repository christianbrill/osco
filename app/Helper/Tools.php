<?php

namespace Helper;

use PHPMailer;
require_once 'vendor/autoload.php';

class Tools {
    /**
     * This is a static method, which will allow us to send an email
     * @param type $to: email address destination
     * @param type $subject: subject of the email
     * @param type $htmlContent: email's content
     * @param type $textContent: optional text content of the email
     * @return true boolean if the email has been sent successfully, and false if otherwise
     */
    public static function sendEmail($to, $subject, $htmlContent, $textContent='') {
        $mail = new PHPMailer();

        //$mail->SMTPDebug = 3;                             // Enable verbose debug output

        $mail->isSMTP();                                    // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = 'osco.contact@gmail.com';         // SMTP username
        $mail->Password = file_get_contents('C:\xampp\htdocs\osco\app\Helper\pwd.txt');          // SMTP password
        $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                  // TCP port to connect to

        $mail->setFrom('osco.contact@gmail.com', 'Osco');
        $mail->addAddress($to);                             // Add a recipient

        $mail->isHTML(true);                                // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $textContent;

        if(!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }
        else {
            return true;
        }
    }
}
