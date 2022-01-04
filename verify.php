<?php

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
                session_start();
                $_SESSION['username'] = $username;
                $fl = True;
                header("Location: home.php?flag=$fl");
            }
            else{
                $fl = False;
                header("Location: index.php?flag=$fl");
            }
    }
?>