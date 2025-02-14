<?php
 $email = $_REQUEST['email'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$SixDigitRandomNumber = mt_rand(100000,999999);

try {
    $mail = new PHPMailer(true);
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'povakwin@gmail.com';                     //SMTP username
    $mail->Password   = 'xmpfdyntvtcibmyg';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('povakwin@gmail.com');
    $mail->addAddress($email);     //Add a recipient
    // $mail->addAddress('wollongong1958@gmail.com');     //Add a recipient


   // $mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset your password';
    $mail->Body    = '<b>Reset your password</b> <br>Your code: <b>'.$SixDigitRandomNumber.'</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    echo $SixDigitRandomNumber;

    $mail->send();
    echo 'Message has been sent';
    //->
    
    // $_POST['ran'] = 15;
    // require('code_mail.php');
    header('Location: code_mail.php?ran='.$SixDigitRandomNumber.'&mail='.$email.'');
    ?>
    <!-- <input hidden name="ran" type="text" value="<?php echo $SixDigitRandomNumber ?>"> -->
    
    <?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>