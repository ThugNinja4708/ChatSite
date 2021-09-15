<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "message";

$conn = mysqli_connect($host , $dbusername , $dbpassword, $dbname);
if(!$conn){
    echo "Not Connected to the server";
}
?>