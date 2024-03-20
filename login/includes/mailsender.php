<?php
class MailSender
{
    public function sendMail($email, $user, $id, $type)
    {
        require 'scripts/PHPMailer/PHPMailerAutoload.php';
        include 'config.php';

        $finishedtext = $active_email;
        $verifyurl = substr($base_url . $_SERVER['PHP_SELF'], 0, -strlen(basename($_SERVER['PHP_SELF']))) . "verifyuser.php?v=1&uid=" . $id;
        $mail = new PHPMailer;
        $mail->isHTML(true);
        $mail->CharSet = "text/html; charset=UTF-8;";
        $mail->WordWrap = 80;
        $mail->setFrom($from_email, $from_name);
        $mail->AddReplyTo($from_email, $from_name);
        $mail->addAddress($email, $user);

        if ($type == 'Verify') {

            $mail->Subject = $user . ' Verificção da conta';

            $mail->Body = $verifymsg . '<br><a href="'.$verifyurl.'">'.$verifyurl.'</a>';

            $mail->AltBody  =  $verifymsg . $verifyurl;

        } elseif ($type == 'Active') {

            $mail->Subject = $site_name . ' Conta criada com sucesso!';

            $mail->Body = $active_email . '<br><a href="'.$signin_url.'">'.$signin_url.'</a>';
            $mail->AltBody  =  $active_email . $signin_url;

        };
        if ($mailServerType == 'smtp') {

            $mail->IsSMTP(); //Enable SMTP
            $mail->SMTPAuth = true; //SMTP Authentication
            $mail->Host = $smtp_server; //SMTP Host
            $mail->SMTPSecure = $smtp_security; // Sets the prefix to the server
            $mail->Port = $smtp_port; //SMTP Port
            $mail->Username = $smtp_user; //SMTP Username
            $mail->Password = $smtp_pw; //SMTP Password
            $mail->SMTPDebug = 0; //Set to 0 to disable debugging (for production)
        }

        try {

            $mail->Send();

        } catch (phpmailerException $e) {

            echo $e->errorMessage();// Error messages from PHPMailer

        } catch (Exception $e) {

            echo $e->getMessage();// Something else

        }
    }
}
