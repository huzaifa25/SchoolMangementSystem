<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
require 'db.php';
//get data from form
// $name = $_POST['name'];
// $email = $_POST['email'];
// $message = $_POST['message'];
// preparing mail content
// $messagecontent ="Name = ". $name . "<br>Email = " . $email . "<br>Message =" . $message;
//Create an instance; passing `true` enables exceptions

if(isset($_POST["email"])){
   
    $emailTo = $_POST["email"];

    $code = uniqid(true);
    $query = mysqli_query($conn, "INSERT INTO password_reset_temp(code, email) VALUES('$code', '$emailTo')");  
    if(!$query){
        exit("Error");
    }
    
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '9be85a8322fade';                     //SMTP username
        $mail->Password   = '024a6b1bb641d2';                               //SMTP password
        $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
         $mail->setFrom('from@example.com', 'Mailer');
         $mail->addAddress("$emailTo");     //Add a recipient
         //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        //Content
        $url = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'your password Reset links';
        $mail->Body    =  "<h1>you hav requested for the reset password</h1>
                            Click <a href='$url'>this link</a> ";
        $mail->send();
        echo 'Reset password link has been sent to your email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}
?>
<!-- <form method="POST">
    <label>Enter your Email Adress</label><br>
    <input type="text" name="email" placeholder="Email" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Reset email">
</form> -->
<!DOCTYPE html>
    <head>
        <title>Password Recovery using PHP and MySQL</title>
         <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="resetpsw">

        <div class="container-fluid">
          
                
                <div class="">

                    <h2>Forgot Password</h2>   

                    
                    <form method="post" action="" name="reset">
                        

                        <div >
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" autocomplete="off" class="form-control"/>
                        </div>

                        <div >
                            <input class="form-group" type="submit" name="submit" id="reset" value="Reset Password" />
                        </div>
                    </form>

                </div>
                <div class="col-md-4"></div>
           
        </div>
    </body>
</html>

<!-- http://admin.test/update_password.php?email='.base64_encode($email).' -->