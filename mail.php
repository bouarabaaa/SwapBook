<?php
Use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php' ;

$mail = new PHPMailer(true);
$alert ='';

if (isset($_POST['submit'])){
$name = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];


try{

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'anisyaya44@gmail.com';
$mail->Password = 'wpsapknopgyxzfif';
$mail->SMTPSecure = "tls";
$mail->Port = '587';

$mail->setFrom('anisyaya44@gmail.com');
$mail->addAddress('anisyaya44@gmail.com');
if($_FILES['file']['tmp_name']){
    $mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']); 
}

$mail->isHTML(true);
$mail->Subject = 'Message Received from Contact:'.$name;
$mail->Body = "Name: $name <br>prenom: $prenom<br><br>Email: $email<br>Subject: $subject<br>Message: $message";
$mail->send();
$alert= "<div class='alert-success'><span>Message Sent! Thanks for contact us.</span></div>";


}

catch(Exception $e){
    $alert = "<div class='alert-error'><span>error</span></div>";

}
}
