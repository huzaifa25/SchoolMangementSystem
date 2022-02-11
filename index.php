<?php

include('db.php');
session_start();
if(!isset( $_SESSION ['name'])){
  echo"you are ogout kindly login first";
  // header('location:#');
}
  // if(isset($_POST['admin_name']) || isset($_POST['teacher_name']) || isset($_POST['std_name'])){ 
  //   // session_start();
  //   // $servername = "localhost";
  //   // $username = "root";
  //   // $password = "cc";
  //   // $dbname = "SchoolManagemant";

  //   // Create connection
  //   $conn = mysqli_connect('localhost', 'root', 'cc', 'SchoolManagemant');
  //   if($conn){
  //     echo"connection successful";
  //   }else{
  //     echo"not connected";
  //   }
  //   //fetching data
  //     mysqli_select_db($conn, 'SchoolManagemant');}
      //for admin login
      if(isset($_POST['admin_name'])) {
        session_start();
        $usernameadmin = $_POST['admin_name'];
        $passwordadmin = md5($_POST['admin_psw']);
        $q="select * from Admin where UserName='$usernameadmin' && AdminPassword = '$passwordadmin'";
        echo $q;
        $result= mysqli_query ($conn, $q);
        $num = mysqli_num_rows($result);
        
        if($num==1){
          // $_SESSION['name']=$username;
          header('location:admin.php');
          exit();
  
        }else{
          echo " incorrect username or password";
          exit();
        }
      } //teaher login
      if(isset($_POST['teacher_name'])) {
        session_start();
        $usernameteacher = $_POST['teacher_name'];
        $passwordteacher = md5($_POST['tpsw']);
        $t="select * from Teacher where UserName='$usernameteacher' && TeacherPassword = '$passwordteacher'";
           
       echo $t;
         $resultt= mysqli_query($conn, $t);
         $numt = mysqli_num_rows($resultt);
        // var_dump($resultt);
        // echo $resultt;
        if($numt==1){
          // $_SESSION['name']=$username;
          //echo "hello";
          header('location:teacher.php');
          exit();

        }else{
          echo " incorrect username or passwordddd";
          exit();
        }
      }
       //student logoin
       if(isset($_POST['std_name'])){
       //session_start();
        $_std_name= $_POST['std_name'];
        $spsw= md5($_POST['spsw']);
        $s="select * from Student where UserName='$_std_name' && StudentPassword = '$spsw'";
           echo $s;
          $results= mysqli_query($conn, $s);
          $nums = mysqli_num_rows($results);
          if($nums ==1){
           
            
            $_SESSION ["name"] = $_POST['std_name'];//post hata
            $_SESSION ["pass"]= md5($_POST['spsw']);
            header('location:student.php');
            
          exit();

        }else{
          echo " incorrect username or passworddss";
          exit();
        }
      }
  
  
      
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    
    <title>Document</title>
</head>
<body class="body">
    <h2 class="h2">Welcome to School Mangement System</h2>
    <h3 class="h3">Select your Respective Field</h3>
    <div class="box" onclick="document.getElementById('admin').style.display='block'">
        <p>Admin</p>
    </div>
    <div class="box" onclick="document.getElementById('teacher').style.display='block'">
        <p>Teacher</p>
    </div>
    <div class="box"onclick="document.getElementById('student').style.display='block'">
        <p>Student</p>
    </div>
    <!--Modal-Admin-->
    <div id='admin' class="modal">
  
        <form id="loginform" class="modal-content animate" action="#" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('admin').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img/a.jpg" alt="Avatar" class="avatar">
          </div>
          
          <div class="container"  >
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="required, at least 2 characters" name="admin_name">
            <br><br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Password require, at least 5 character" name="admin_psw">
              
            <button type="submit" name="submit">Login</button>
            <a href="signup.php"><button type="button">Sign up</button></a>
            <span class="fpsw"> <a href="forget-password.php">Forgot Password</a><span>
          </div>
        </form>
      </div>
      <!--Modal-End-->
        <!--Modal-Teacher-->
    <div id='teacher' class="modal">
  
        <form id="loginform2" class="modal-content animate" action="#" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('teacher').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img/t.png" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="teacher_name" >
            <br><br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="tpsw" >
              
            <button type="submit" name="submit">Login</button>
            <a href="signup.php"><button type="button">Sign up</button></a>
           <span class="fpsw"> <a href="forget-password.php">Forgot Password</a><span>
          </div>
        </form>
      </div>
      <!--Modal-End-->
        <!--Modal-Student-->
    <div id='student' class="modal">
  
        <form id="loginform3" class="modal-content animate" action="" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('student').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img/s.jpg" alt="Avatar" class="avatar">
          </div>
      
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text"  placeholder="Enter Username" name="std_name" >
            <br><br>
            <label for="spsw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="spsw" >
              
            <button type="submit" name="submit" >Login</button>
            <a href="signup.php"><button type="button">Sign up</button></a>
            <span class="fpsw"> <a href="forget-password.php">Forgot Password</a><span>
          </div>
        </form>
      </div>
      <!--Modal-End-->
<script>
 // Get the modal 
var modalAdmin = document.getElementById('admin');
var modalTeacher = document.getElementById('teacher');
var modalStudent = document.getElementById('student');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalAdmin) {
        modalAdmin.style.display = "none";
    }else if(event.target == modalTeacher){
        modalTeacher.style.display ="none";
    }else if(event.target == modalStudent){
        modalStudent.style.display ="none";
    }
}

$("#loginform").validate({
  rules:{
    admin_name: {
      required: true,
      minlength:2     
    },
    admin_psw:{
      required: true,
    }
  }

});
$("#loginform2").validate({
  rules:{
    teacher_name: {
      required: true,
      minlength:2     
    },
    tpsw:{
      required: true,
    }
  }

});
$("#loginform3").validate({
  rules:{
    std_name: {
      required: true,
      minlength:2     
    },
    spsw:{
      required: true,
    }
  }

});
</script>

</body>
</html>
<!-- 
if(isset($_POST['std_submit'])){
       //session_start();
          $usernamestd = $_POST['std_name'];
          $spsw = md5($_POST['spsw']);
          $s="select * from Student where UserName='$usernamestd'";
          $results= mysqli_query($conn, $s);
          $email_count = mysqli_num_rows($results);
          if($email_count){
            $email_pass = mysqli_fetch_assoc($results);
            $db_pass = $email_pass['spsw'];
            $pass_decode = password_verify($spsw, $db_pass);
            if($pass_decode){
              echo"login successfull";var_dump($pass_decode);
              session_start();
            }else{
              echo"password incorrect";
            }
          }else{
            echo"invalid email";
          }
        } -->