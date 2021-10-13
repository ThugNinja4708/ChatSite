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

  <header class="header">
    <ul style="display: flex;justify-content:space-between;">
      <li><a href="home.php"><img src="logo.png" width="250px" height="70px"></a></li>
      <li><button onclick="document.location='logout.php'" class="logoutButton"> Logout</button></li>
    </ul>

  </header>

  <!-- Left Side of the page-->
  <div class="left">
    <ul class="status">
      <li><img src="avatar.jpg" width="75px" height="75px"></li>
      <li><?php echo '<p><b>' . ucfirst($_SESSION['username']) . '</b></p>' ?></li>
    </ul>
    <div class="inner_form">
      <form method="POST">

        <table>
          <tr>
            <td><label>Friends Name :</label></td>
            <td><input type="text" name="Fname"id="Fname" placeholder="To..?" style="border-radius:25px; width: 500px;background-color:gray"><i class="fas fa-search"></i></td>
          </tr>

          <tr>
            <td><label>Your Message : </label></td>
            <td><textarea name="msg" id="msg" style="border-radius:25px; width: 500px; height: 300px; background-color:gray;" placeholder="Enter your message here"></textarea></td>
          </tr>
        </table>
        <button type="submit" name="send" style="border-radius:25px;width:150px; height:50px;font-weight:bold;">Send</button>
      </form>
    </div>
  </div>
  <!--Right Side Of the page-->

  <div id="div_refresh" class="message">

  </div>


</body>

</html>