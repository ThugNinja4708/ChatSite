<?php
include "Db_Conn.php";
$username = $_POST['username'];
$password = $_POST['pass'];
$password = password_hash($password,PASSWORD_BCRYPT);


    $sql="select * from userdetails where (name='$username');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
        echo "This user is already Registerd !!";
        header("Refresh:3; url=index.html");
        
    }
   else{ 
       $sql = "INSERT INTO userdetails (name,password) VALUES ('$username','$password')";
       $iquery = mysqli_query($conn,$sql);
        if(!$iquery){
            echo "Not inserted !!!";
            header("Refresh:3; url=index.html");
        }
        else{
            echo "Inserted correctly !!! hurray";
            header("Refresh:3; url=index.html");
        }
}
?>