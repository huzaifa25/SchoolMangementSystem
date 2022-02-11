<?php

include('db.php');

 if(isset($_POST['submit'])){
  
    if(!empty($_POST['atndd'])){
        $counter = 0;
        foreach($_POST['atndd'] as $selected){
            
            $dte =date($_POST['dates']);
            $query = "INSERT INTO std_attendance(std_id,attendance,date) VALUE('".$_POST['student'][$counter]."','$selected','$dte')"; 
            if ($conn->query($query) === TRUE) {
                 echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
            $counter++;

        } 
        $conn->close();
      
    }
}
    
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <title>Teacher</title>
</head>
<body class="tea-body">
    <h1>Student & Attendence</h1>
   
    <form method="post" id="form_atd">
    <h2>Kindly Select Date </h2>
    <input type="date" name="dates" id="dates">
        <div class="teabox">
            <table class="t-table">
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
                <tr>
                    <?php include('attnd-fetch.php'); ?> 
                </tr>
            </table>
           
        </div>
        <div>
            <button class="atd-btn" type="submit" name="submit" >Save Attendance</button>
        </div>
    </form>
    <div>
        <a  href="ent-marks.php"><button class ="adm-btn">Add Marks</button></a>
    </div>
    <div>
        <a  href="logout.php"><button class ="tlogout">Log out</button></a>
    </div>
    <script>
  //form validation trying
  
$("#form_atd").validate({
 rules:{
  ok:{
    required:true
    }
  }

  
});
</script>
</body>

</html>
