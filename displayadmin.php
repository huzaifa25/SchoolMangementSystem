<?php
include('db.php');
//for Single Search
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    if($_POST['field']=='admin'){
        $query = "SELECT * FROM Admin WHERE UserName ='$username' ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["Id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>"
            .'<a href="delete.php?id='.$row["Id"].'">Delete</a>';
        }
        }else{ echo"Please Select a correct field for the UserName";
        exit();
        }

    }else if($_POST['field']=='Teacher'){
        $query = "SELECT * FROM Teacher WHERE UserName ='$username' ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>"
        .'<a href="delete.php?id='.$row["id"].'">Delete</a>';
        }
        }else{echo"Please Select a correct field for the UserName";
        exit();
        }
    }else if($_POST['field']=='Student'){
    $query = "SELECT * FROM Student WHERE UserName ='$username' ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["std_id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>"
        .'<a href="delete.php?id='.$row["std_id"].'">Delete</a>';
        }
         }else{echo"Please Select a correct field for the UserName";
        exit();
        }

    }
} 
//SEARCH FOR ALL
else if(isset($_POST['search-all'])){
    $username = $_POST['name'];
    if($_POST['field']=='admin'){
        $query = "SELECT * FROM Admin ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["Id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>";
        }
        } else{ echo"Please Select a correct field for the UserName";
        exit();
        }
    }elseif($_POST['field']=='Teacher'){
        $query = "SELECT * FROM Teacher ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>";
        }
        }else{ echo"Please Select a correct field for the UserName";
        exit();
        }
   }else if($_POST['field']=='Student'){
    $query = "SELECT * FROM Student  ";
        $result = $conn->query($query);
        if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
        echo "<br> Id: " . ' ' . $row["std_id"]. "<br> Email: " . $row["email"]. " <br> Name: " . $row["UserName"]."<br>";
        }
        }else{ echo"Please Select a correct field for the UserName";
        exit();
        }

    }
}
else{
    echo"some thing has wrongsss";
}
?> 
