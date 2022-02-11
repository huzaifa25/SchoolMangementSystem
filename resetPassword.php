<?php
include('db.php');

if(!isset($_GET["code"])){
    exit("Can't find the page");
}
$code = $_GET["code"];
$getEmailQuery = mysqli_query($conn, "SELECT email FROM password_reset_temp WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
    exit("Can't find the page");
}

if(isset($_POST["password"])){
    $pw = $_POST["password"];
    $pw = md5($pw);

    $row = mysqli_fetch_array($getEmailQuery);
     $email = $row["email"];
   
    if($_POST['field']=='admin'){
        $query = mysqli_query($conn, "UPDATE Admin SET AdminPassword='$pw' WHERE email='$email'");

        if($query){
            $query = mysqli_query($conn, "DELETE FROM password_reset_temp WHERE code='$code'");
            exit("Password Updated");
        }
        else{
            exit("Sonmething went wrong");
        }
    }else if($_POST['field']=='Teacher'){
        $query = mysqli_query($conn, "UPDATE Teacher SET TeacherPassword='$pw' WHERE email='$email'");

        if($query){
            $query = mysqli_query($conn, "DELETE FROM password_reset_temp WHERE code='$code'");
            exit("Password Updated");
        }
        else{
            exit("Sonmething went wrong");
        }
    }else if($_POST['field']=='Student'){
        $query = mysqli_query($conn, "UPDATE Student SET StudentPassword='$pw' WHERE email='$email'");
        
            if($query){
                $query = mysqli_query($conn, "DELETE FROM password_reset_temp WHERE code='$code'");
                exit("Password Updated");
            }
            else{
                 exit("Sonmething went wrong");
            }
    }    
    else{
        echo"Please Select your field";
    }

}

?>
<form method="POST" name="resetpsw">
    <input type="password" name="password" placeholder="New password">
    <br>
    
    <p><b>Select your Field:</b></p>
           <label  class="rad"> <input type="radio" name="field" value="admin"><b>Admin</b></label>
           <label  class="rad"><input type="radio" name="field" value="Teacher" ><b>Teacher</b></label>
            <label  class="rad"><input type="radio" name="field" value="Student" ><b>Student</b></label>
            <input type="submit" name="submit" value="Update password">
        </form>
  
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->