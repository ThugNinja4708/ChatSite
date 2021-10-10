<?php
include "DB_Conn.php";
session_start();
if (!isset($_SESSION['username'])) {
  echo "login first";
  header("Refresh:1; url=index.html");
}
if (isset($_POST['send'])) {
  include "Send.php";
}
$ID = $_SESSION['username'];                              //RETRIEVAL
$sql = "select * from userdetails where (name='$ID');";
$res2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($res2);
?>

<html>

<head>
  <link rel="stylesheet" href="style.css">
  <title>My Friend Circle</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).ready(function() {
      $("#div_refresh").load("load.php");
      setInterval(function() {
        $("#div_refresh").load("load.php");
      }, 1000);
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</head>

<body>
  <script>

  </script>
  <header class="header">
    <ul>
      <li><a href="home.php"><img src="logo.png" width="200" height="50"></a></li>
    
      <li><button onclick="document.location='logout.php'" class="logoutButton"> Logout</button></li>
    </ul>

  </header>

  <!-- Left Side of the page-->
  <div class="left">
    <div style="background-color:white;height:80px;border-radius: 20px 20px 0px 0px;">
      
    </div>
    <div class = "inner_form">
    <form method="POST">

      <table>
        <tr>
          <td><label>Friends Name :</label></td>
          <td><input type="text" name="Fname" placeholder="To..?" style="border-radius:25px; width: 500px;" ><i class="fas fa-ghost fa-lg"></i></td>
        </tr>

        <tr>
          <td><label>Your Message : </label></td>
          <td><textarea name="msg" id="msg"  style="border-radius:25px; width: 500px; height: 400px;" placeholder="Enter your message here"></textarea></td>
        </tr>
      </table>
      <button type="submit" name="send" style="transform:translate(320px);border-radius:25px;width:120px;font-weight:500;">Send</button>
    </form>
    </div>
  </div>
  <!--Right Side Of the page-->

  <div id="div_refresh" class="message">

  </div>


</body>

</html>