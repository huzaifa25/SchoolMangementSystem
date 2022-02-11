<?php 
 
 $conn = mysqli_connect('localhost', 'root', 'cc', 'SchoolManagemant');
 if($conn){
   echo"";
 }else{
   echo"not connected";
 }
 date_default_timezone_set('Karachi/Pakistan');
$error = "";

?>