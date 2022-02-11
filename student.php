<?php

include('db.php');
//session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student</title>
</head>
<body class="tea-body">
    <form>    
        <div class="stubox">
            <table class="s-table">
                <tr>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Student Name</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                </tr>
                <tr>
                    <?php include('student-data-fetch.php'); ?> 
                </tr>
            </table>
          
        </div>
    </form>
    <div class ="logout">
                 <a  href="logout.php"><button>Log out</button></a>
            </div>
</body>
</html>