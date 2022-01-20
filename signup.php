
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
        <form class="" id="signupform" method="post">
            <label for="mail"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="mail" >
            <br><br>
            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="Enter UserName" name="username" >
            <br><br>
            <label for="psword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psword" >
            <br><br>        
            <label for="confirmpsw"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="confirmpsw">
            <br><br>
            <p><b>Select your Field:</b></p>
            <label  class="rad"> <input type="radio" name="field" value="admin"><b>Admin</b></label>
           <label  class="rad"><input type="radio" name="field" value="Teacher" ><b>Teacher</b></label>
            <label  class="rad"><input type="radio" name="field" value="Student" ><b>Student</b></label>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
<script>
$("#signupform").validate({
 rules:{
    mail:{
      required:true,
      email:true
    },
    username:{
      required:true, 
      minlength:2
    },
    psword:{
        required:true,
      minlength:5
    },
    confirmpsw:{
      required:true,
      minlength:5,
      equalTo:"#confirmpsw"
    },
    field:{
        required:true
    }


 }
});

</script>
</body>
</html>