<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(!function_exists('send_mails')) {
        function send_mails($subject, $to, $content)
        {
            // SMTP configuration
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host     = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@gonusa-distribusi.com';
            $mail->Password = 'Gonusa680!';
            $mail->SMTPSecure = 'tls';
            $mail->Port     = 587;
            $mail->Timeout = 60;
            $mail->SMTPKeepAlive = true; 
            $mail->setFrom('no-reply@gonusa-distribusi.com', 'Auto Email GEXIM');
            $mail->addAddress($to['email']);
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $message = $content;
            $mail->Body = $message;

            if(!$mail->send()){
                echo json_encode(['status' => 0, 'messages' => 'Message could not be sent.']);
            }else{
                echo json_encode(['status' => 1, 'messages' => 'Message has been sent.']);
            }
        }
    }
?>