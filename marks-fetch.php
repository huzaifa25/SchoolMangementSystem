<?php
include('db.php');
//fetching data from database
$atnd = "SELECT std_id, UserName FROM Student";
$result = $conn->query($atnd);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
   echo'<tr>
            <input type="hidden" name="student[]" value="'.$row['std_id'].'" />
             <td>
            '. $row["std_id"] .'
            </td>
            <td>
            '. $row["UserName"] .'
            </td>
            <td>
            <input class="inmarks" type="text" name="phymarks[]" id="'.$row['std_id'].'">
            </td>
            <td>
            <input class="inmarks" type="text" name="chemmarks[]" id="'.$row['std_id'].'">
            </td>
        </tr>';
    }
  }else{
    exit();
}

?>
 <!-- $query = "SELECT * FROM course";
                    $query_run = mysqli_query($conn, $query);
                    
                    if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $rows){
                        
                            <option value="'.$row['course_id'].'">"'.$row['course_name'].'"</option>
                            
                        }else{
                    
                            <option value="">No Record Found</option>
                        }
                    }   -->