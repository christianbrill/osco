<?php

namespace Helper;

use \PHPMailer;

// The PHPMailer allows us to send emails to the user, and for the user to send emails to us. 
// It is ignored on github because of sensitive information.

class Tools {
    /**
     * This is a static method, which will allow us to send an email
     * $to: email address destination
     * $subject: subject of the email
     * $htmlContent: email's content
     * $textContent: optional text content of the email
     * @return boolean "true" if the email has been sent successfully, and "false" if otherwise
     */
    public static function sendEmail($to, $subject, $htmlContent, $textContent='') {
        $mail = new PHPMailer();

        $mail->isSMTP();                                    // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = 'osco.contact@gmail.com';         // SMTP username
        $mail->Password = 'webforce3';                      // SMTP password
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
        } else {
            return true;
        }
    }
}
