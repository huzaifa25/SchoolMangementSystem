<?php
include('db.php');
    //fetchin data from course
$crs = "SELECT course_id, course_name FROM course";
$result = $conn->query($crs);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
   echo'<label>
    <input type="checkbox" name="topic[]" value="'.$row["course_id"].'">
    </label>'. $row["course_name"] ."<br>";
}
  }else{
    exit();
}

?>


<!-- // <>php 

// while start


// <label>
//     <span>name</span>
//     <input>
// </label>


white stop 



?> -->