<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html><?php
include('db.php');
    //fetchin data from course
$atnd = "SELECT std_id, UserName FROM Student";
$result = $conn->query($atnd);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
   echo'<tr>
            <td>
            '. $row["std_id"] .'
            </td>
            <td>
            '. $row["UserName"] .'
            </td>
            <td>
            <input type="hidden" name="student[]" value="'.$row['std_id'].'" />
            <select name="atndd[]" id="'.$row['std_id'].'">
              <option value="" name="ok">Select Attendance</option>
              <option value="1">Present</option>
              <option value="0">Absent</option>
            </select>
            </td>
        </tr>';
    }
  }else{
    exit();
}

?>
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