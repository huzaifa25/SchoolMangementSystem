<?php

include('db.php');
session_start();
//if(!empty($_POST['std_name'])){
//$email = $_POST['email'];
$name = $_SESSION ["name"];
$pass = $_SESSION ["pass"];
$std = "SELECT Student.std_id, email, UserName,course.course_id,course_name from Student
RIGHT JOIN std_crs_bridge
ON Student.std_id = std_crs_bridge.std_id
RIGHT JOIN course
    on course.course_id = std_crs_bridge.course_id
 WHERE UserName = '$name' && StudentPassword = '$pass' ";
// join lagayga
$result = $conn->query($std);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
   echo'<tr>
            <td>
            '. $row["std_id"] .'
            </td>
            <td>
            '. $row["email"] .'
            </td>
            <td>
            '.$row['UserName'].'
            </td>
            <td>
            '.$row['course_id'].'
            </td>
            <td>
            '.$row['course_name'].'
            </td>
        </tr>';
    }
  }else{
    exit();
}


?>