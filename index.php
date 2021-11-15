<!DOCTYPE html>
<html lang="en" style="background-color: #479CA9">
<?php
if(isset($_POST['login']))
{
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
                $_SESSION['username'] = $username;
                header("Refresh:0.5; url=home.php");
            }
            else{
              echo '<script>
              var x = document.getElementsByName("username");
              x[0].setAttribute("style", "background-color: red;");
              alert("You need to register first");</script>';
                header("Refresh:0; url=index.php");
            }
    }
  }
?>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Login Page</title>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>

<body>
  <div class="everything">
    <header class="Center"><a href="home.php"><img src="logo.png" alt="logo" width="250px" height="75px"></a>
    </header>

    <form method="POST" action="index.php">

      <table class="Center">
        <tr>
          <td style="padding-bottom: 5px;"><b style="font-size: 30px; color:#fdfdfe">Login</b></td>
        </tr>
        <tr>
          <td><input id="username" type="text" placeholder="Your Name.." name="username"  required></td>
        </tr>
        <tr>
          <td><input type="password" placeholder="Enter Password" name="pass" required></td>
        </tr>
        <tr>
          <td><button type="submit" value="Login" name="login">Login</button></td>
        </tr>
        </table>
    </form>

        <table>
          <tr>
            <td style="padding-bottom: 5px;font-size: 25px; color:#fdfdfe"><b>New to the Circle? <a href="registration.php"><button style="background-color: #04aeee;color:white; font-weight:bold; width:200px;"> Create Account</button></a></b></td>
          </tr>
        </table>
  
  </div>
</body>

</html>