<?php
include('db.php');

if(isset($_POST['submit'])){
    $phymarks = $_POST['phymarks'];
    $chemmarks = $_POST['chemmarks'];
    $query ="";
    foreach($_POST['student'] as  $key=>$value){
    $query .= "INSERT INTO std_marks(std_id,Physics,Chemistry) VALUE('".$value."','$phymarks[$key]','$chemmarks[$key]');";
    }
    if ($conn->multi_query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
      $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Enter Marks</title>
</head>
<body class="team-body">
    <h1>Student Marks</h1>
     <form method="post"> 
        <div class="tmbox">
            <table class="tm-table">
                <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Physics</th>
                <th>Chemistry</th>
                </tr>
                <tr>
                <?php include('marks-fetch.php'); ?>
                </tr>
            </table>
        </div>
        <div>
         <button class="atdm-btn" type="submit" name="submit">Add Marks</button>
         </div>
    </form>
   
    <div>
        <a  href="teacher.php"><button class ="adm-btn">Go Back</button></a>
    </div>
    <div>
        <a  href="logout.php"><button class ="tlogout">Log out</button></a>
    </div>
</body>
</html>