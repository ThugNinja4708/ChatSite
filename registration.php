<!DOCTYPE html>
<?php
function validate(){
  
include "Db_Conn.php";
$username = $_POST['username'];
$password = $_POST['pass'];
$password = password_hash($password,PASSWORD_BCRYPT);


    $sql="select * from userdetails where (name='$username');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
        echo'<script>alert("The user is already registered");</script>';
    }
   else{ 
      
       $sql = "INSERT INTO userdetails (name,password) VALUES ('$username','$password')";
       $iquery = mysqli_query($conn,$sql);
        if(!$iquery){
            echo "Not inserted !!!";
            header("Refresh:0; url=index.html");
        }
        else{
          echo'<script>alert("Registration Successful");</script>';
            header("Refresh:0; url=index.html");
        }
}
}
if(isset($_POST['register'])){
  validate();
}

?>
<html lang="en" style="background-color: #a9c8fd;">

<head>
  <link rel="stylesheet" href="style.css">
  <title>Registration Page</title>
  <script>    
        if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }</script>
</head>

<body>
  <div class="everything">
    <header class="Center"><a href="home.html"><img src="logo.png" alt="logo" width="200px" height="50px"></a></header>

    <form method="post" action="registration.php">

 
      <table class="Center">
        <tr>
          <td style="padding-bottom: 5px;"><b style="font-size: 30px; color:#fdfdfe">Create Account</b></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="User name" name="username" required></td>
        </tr>
        <tr>
          <td><input type="password" placeholder="At least 6 characters" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required></td>
        </tr>
        <tr>
          <td >
            <label style="font-size: large;" for="img">Profile pic:</label><input type="file" id="img" name="img" accept="image/*"></td>
        </tr>
        <tr>
          <td><button type="submit" value="Register" name="register">Register</button></td>
        </tr>
      </table>
    </form>
        <table>
          <tr>
            <td style="padding-bottom: 5px;font-size: 25px; color:#fdfdfe"><b>Already have an Account? <a href="index.html"><button style="background-color: #04aeee;color:white; font-weight:bold; width:200px;"> Login</button></a></b></td>
          </tr>
        </table>

  </div>
  
</body>

</html>