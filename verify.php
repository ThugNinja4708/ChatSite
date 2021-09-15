<?php
session_start();
include "DB_Conn.php";
$username = $_POST['username'];
$password = $_POST['pass'];

    $sql = mysqli_query($conn,"SELECT * FROM userdetails WHERE Name='$username'");
    if(!$sql) {
        die("Query Failed: ". mysqli_error($conn));
    } else {

            $row=mysqli_fetch_array($sql);
            $pass_check = password_verify($password,$row['password']);

            if($username == $row['Name'] && $pass_check){
                echo "login sucessfull !!";
                $_SESSION['username'] = $username;
                header("Refresh:3; url=home.php");
            }
            else{
                echo "Unauthorised login attempt!! "."<br>";
                echo " OR <br>";
                echo "You need to register first!!"."<br>" ;
                header("Refresh:5; url=index.html");
            }
    }
?>