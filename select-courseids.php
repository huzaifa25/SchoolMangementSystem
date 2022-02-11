<?php
include('db.php');
$query = "SELECT course_id, course_name FROM course";var_dump($query);
$query_run = $conn->query($query);

if($query_run -> num_rows > 0){
    while($row = $query_run -> fetch_assoc()){
    
    echo '<option value="'.$row['course_id'].'">"'.$row['course_name'].'"</option>';
        
    }
}   else{

   echo'No Record Found';
}
?>