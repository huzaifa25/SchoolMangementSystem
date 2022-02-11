<?php
include('db.php');
$id= $_GET["id"];
// die($id);
$q = "DELETE FROM Admin WHERE Id ='$id' ";
$run= $conn->query($q); 
if ($conn->query($q) === TRUE){
    echo "admin record has been deleted successfully";
} else {
    echo "Error: " . $q . "<br>" . $conn->error;
}
  

$idt= $_GET["id"];var_dump($idt);
$qt = "DELETE FROM Teacher WHERE id ='$idt' ";

$runt= $conn->query($qt); 
if ($conn->query($qt) === TRUE){
      echo "teacher record has been deleted successfully";
} else {
      echo "Error: " . $qt . "<br>" . $conn->error;
}


$ids= $_GET["id"];
$qs = "DELETE FROM Student WHERE std_id ='$ids' ";
//var_dump($qs);
$runt= $conn->query($qs); 
if ($conn->query($qs) === TRUE){
      echo "student record has been deleted successfully";
} else {
      echo "Error: " . $qs . "<br>" . $conn->error;
}
// if(isset($_DELETE['delete'])){
// }
?>