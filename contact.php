<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'sendmail/src/Exception.php';
 require 'sendmail/src/PHPMailer.php';
 require 'sendmail/src/SMTP.php';
 
   
 
 if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'b509fc6cca4adf';
    $mail->Password = 'a20b371ce49f1a';

    $senderEmail = $_POST["email"];
    
    $mail->setFrom($senderEmail); 
    $mail->addAddress('mailserver80085@gmail.com'); 

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body= $_POST["body"];

    // Set the sender's email as 'From' using custom header
    $mail->addCustomHeader('From', $senderEmail);

    // Set the sender's email as a reply-to address
    $mail->addReplyTo($senderEmail);

    if($mail->send()) {
        echo "<script>alert('Sent Successfully');
        document.location.href = 'contact.php';</script>";
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

// ini_set ("SMTP","my.mail.server");
// ini_set ("sendmail_from","mailserver80085@gmail.com");

// if(isset($_POST['submit'])){
//     $to = $_POST['email'];
//     $subject = $_POST['subject'];
//     $body = $_POST['body'];
//     $header = "from : admin";

//     if(mail($to,$subject,$body,$header)){
//         echo "Email sent";
//     }else{
//         echo " failed";
//     }
// }



  ?>
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
