<?php
    require 'vendor/autoload.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if (isset($_POST['who']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['who'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $mail = new PHPMailer(true);
        
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kkeokicontact@gmail.com';
            $mail->Password = 'wilcoxmnpc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            $mail->setFrom('kkeokicontact@gmail.com', 'Mailer');
            $mail->addAddress('kkeoki@protonmail.com');
            
            $mail->isHTML(false);
            $mail->Subject = 'Contacted From Portfolio';
            $mail->Body = "$name has request that you contact them from \"$email\" their message is: $message";
            $mail->AltBody = "$name has request that you contact them from \"$email\" their message is: $message";
            
            $mail->send();
            die(header('Location: /sent.html') . '');
        } catch (Exception $e) {
            die(header('Location: /error.html') . '');
        }
    }
    die(header('Location: /error.html') . '');

    