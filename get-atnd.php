<?php
// session_start();
include('db.php');

 if(isset($_POST['submit'])){
    $atnd = "SELECT std_id, UserName FROM Student";
    $result = $conn->query($atnd);
    foreach($result as $data){
        $id = $data['std_id'];
        $q = "SELECT std_id FROM std_attendance";
        $run = $conn->query($q);
        if($run -> num_rows >  0 ){
            dd('tt');
        } else{
            foreach($_POST['atndd'] as $selected){
                echo $selected;
                break;
            } 
        }
        // var_dump($data['std_id']);
    
    $last1_id = mysqli_insert_id($conn);
    if(!empty($_POST['atndd'])){
        foreach($_POST['atndd'] as $selected){
            $query = "INSERT INTO std_attendance(std_id,attendance,date) VALUE('$id','$selected','')"; 
        } 
    }
}
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
  
      $conn->close();
}
//     var_dump($query);
//    // $last1_id = mysqli_insert_id($conn);
//     $attendence = ($_POST['option']);
//     $atd = ($_POST['std_id']);  
//     foreach($atd as $attendence){
//     //if($_POST['option']=='Present')
//             $query = "INSERT INTO std_attendance(std_id,attendance,) VALUE('$atd','$attendence')";
           
//     //else if($_POST['option']=='Absent'){
//        // $query = "INSERT INTO std_attendance(std_id,attendance,) VALUE('$atd','$attendence')";
//        if (mysqli_query($conn, $query)){
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $query . "<br>" . $conn->error;
//         }
    
//         $conn->close();
   
       
//     }
        
// }
?>
