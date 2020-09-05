<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAutoTLS = false;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->Username = 'olabayo.segun.e@gmail.com';
        $mail->Password = 'Oluwasegun12';

        $mail->setFrom('hollasheg@gmail.com');
        $mail->addAddress('hollasheg@gmail.com');
        $mail->AddReplyTo($email, $first_name);

        $mail->Subject = 'You have a message from ' . $first_name . " " . $last_name;
        $mail->Body = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $message;
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Message was not sent.';
            echo "ERROR: " . $mail->ErrorInfo;
        } else {
            echo "Message sent successfully. " . $first_name . ", we will contact you shortly.";
        }
    }
?>



<!DOCTYPE html>
<head>
<title>Theimagecreator Form submission</title>
</head>
<body>

<form action="" method="post">
    First Name: <input type="text" name="first_name"><br>
    Last Name: <input type="text" name="last_name"><br>
    Email: <input type="text" name="email"><br>
    Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 
