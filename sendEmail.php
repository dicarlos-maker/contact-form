<?php 

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name =$_POST['name'];
    $email =$_POST['email'];
    $subject =$_POST['subject'];
    $body =$_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //Settings of SMTP

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dagacarlos555@gmail.com";
    $mail->Password = 'dicarlos1989';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

     //Settings of Email

     $mail->isHTML(true);
     $mail->setFrom($email, $name);
     $mail->addAddress("dagacarlos555@gmail.com");
     $mail->Subject = ("$email, ($subject)");
     $mail->Body = $body;

     if($mail->send()){
         $status = "success";
         $response = "Email is sent!";
     }
     else{
        $status = "failed";
        $response = "Something went wrong: <br>" . $mail->ErrorInfo;
     }

     exit(json_encode(array("status" => $status, "response" => $response)));

}


?>