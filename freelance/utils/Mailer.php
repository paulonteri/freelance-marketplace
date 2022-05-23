<?php

namespace app\utils;

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer
{

    public static function sendMail(string $to, string $subject, string $body): bool
    {

        $from = getenv("MAIL_USERNAME");
        $password = getenv("MAIL_PASSWORD");
        if (!$password || $password == "" || !$from || $from == "") {
            DisplayAlert::displayError("Error while sending Email: '" . $subject . "' Email not configured.");
            return false;
        }

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Mailer = "smtp";
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            $mail->Username = $from;
            $mail->Password = $password;

            // Sender
            $mail->setFrom($from, 'Freelance Marketplace');
            $mail->AddReplyTo("me@paulonteri.com", "Paul Onteri");

            // Recipients
            $mail->AddAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->MsgHTML($body);

            if (!$mail->Send()) {
                DisplayAlert::displayError("Error while sending Email.");
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            DisplayAlert::displayError("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}