<?php

$servername = "localhost";
$username = "root";
$password = "cc";
$dbname = "SchoolManagemant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//make connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
$mail =htmlspecialchars($_POST['mail']);
$uname =htmlspecialchars($_POST['uname']);
$psw =md5($_POST['psw']);
//select table from radio button field
  if($_POST['field']=='admin'){
    $sql =  "INSERT INTO  Admin (email, UserName, AdminPassword) VALUES ('$mail', '$uname', '$psw')";
  } else if($_POST['field']=='Teacher'){
    $sql =  "INSERT INTO Teacher (email, UserName, TeacherPassword) VALUES ('$mail', '$uname', '$psw')";
  } else if($_POST['field']=='Student'){
    $sql =  "INSERT INTO  Student (email, UserName, StudentPassword) VALUES ('$mail', '$uname', '$psw')";
    /////////Student course selection fieldset/////////////
          if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $cid = ($_POST['topic']);
            $ql = "";
            foreach($cid as $value){
              $ql .= "INSERT INTO std_crs_bridge (std_id,course_id) VALUES('$last_id','$value');";
            }
              if ($conn->multi_query($ql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $ql . "<br>" . $conn->error;
              }
        
              $conn->close();
        }
           
          else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
      
          $conn->close();
      
  
  }
    

  // // if(isset($_POST['submit']))
  //   $last_id = mysqli_insert_id($conn);
  //   $cid= ($_POST['course_id']);
  
  //   foreach($cid as $value ){
  //     // $sql = "INSERT INTO std_crs_bridge(std_id, course_id) VALUES('$last_id','$value')";

  //     if ($conn->query($sql) === TRUE) {
  //       echo "New record created successfully";
  //     } else {
  //       echo "Error: " . $sql . "<br>" . $conn->error;
  //     }
  
  //     $conn->close();
  //   }
  

  

 // Check connection
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// //fetchin data from course
// $crs = "SELECT course_name FROM course";
// $result = $conn->query($crs);
// if($result -> num_rows > 0){
//   while($row = $result -> fetch_assoc()){
//     echo $row["course_name"]."<br>";

//   }
//   }else{
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <title>signup</title>
</head>
<body class="bsign">
    
    <div class="regcontainer">
        <p class="rig">Register Your Self</p>
        <form class="" id="signupform" action="" method="post">
            <label for="mail"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="mail" id="mail">
            <br><br>
            <label for="uname"><b>User Name</b></label>
            <input type="text" placeholder="Enter UserName" name="uname" id="uname">
            <br><br>
            <label for="psword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw">
            <br><br>        
            <label for="confirmpsw"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="confirmpsw">
            <br><br>
            <p><b>Select your Field:</b></p>
            <label  class="rad"> <input type="radio" name="field" value="admin"><b>Admin</b></label>
           <label  class="rad"><input type="radio" name="field" value="Teacher" ><b>Teacher</b></label>
            <label  class="rad"><input type="radio" name="field" value="Student" id="course"><b>Student</b></label>
                 <fieldset id="select-course">
                 <?php include('course-fetch.php'); ?> 
                 <br>
                   <label for="atleast" name="topic">Please Select atleast one course</label>
                 </fieldset>


            <!-- <span id="emp">This field is required</span> -->
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
<script>
  //form validation
$("#signupform").validate({
 rules:{
    mail:{
      required:true,
      email:true
    },
    uname:{
      required:true,
      minlength: 2
    
    },
    psw:{
      required:true,
      minlength: 5
    },
    confirmpsw:{
      required: true,
      minlength: 5,
      equalTo:"#psw"
    },
    field:{
      required:true
    },
    topic:{
      required:"#course:checked",
      minlength:1
    }
  },
  messages:{
    topic:"Please select atleast one course"
  }
  
});

// $(document).ready(function(){
//   $("#emp").hide();
// })

$(document).ready(function(){
  $("input[name='field']").on('change',function(){
    var initial = $("input[name='field']:checked").val();
    console.log($("input[name='field']:checked").val());
    if(initial == 'Student'){
      $("#select-course").css('display','block');
    }else{
      $("#select-course").css('display','none');
    }
  })
})
</script>
</body>
</html>