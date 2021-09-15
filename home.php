<?php
include "DB_Conn.php";
session_start();
if(!isset($_SESSION['username'])){
  echo "login first";
  header("Refresh:1; url=index.html");
} 
if(isset($_POST['send'])){
  include "Send.php";
}
?>

<html>
  <head>
    <link rel="stylesheet" href="style.css">
      <title>My Friend Circle</title>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script>
        $(document).ready(function(){
		 $("#div_refresh").load("load.php");
        setInterval(function() {
            $("#div_refresh").load("load.php");
        }, 1000);
    });
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
    }
      </script>

  </head>

  <body>
      <header class="header">
      <ul>
        <li><a href = "home.php">My Friend Circle !!..</a></li>
        <li style="padding-left: 67%;"><a href = "logout.php"> Logout</a></li>
      </ul>
      </header>
  
      <!-- Left Side of the page-->
      <form method="POST" >
  
      <table>
          <tr><td><label>Friends Name :</label></td>
          <td><input type="text" name = "Fname" placeholder="To..?"></td></tr>

          <tr><td><label>Your Message :  </label></td>
          <td><textarea name="msg" id = "msg" rows="10" cols="40"> Enter your message here </textarea></td></tr>
        </table>
        <button type="submit" name="send" style="transform:translate(226px);">Send</button>
      </form>
  <!--Right Side Of the page-->

  <div id="div_refresh" class = "message">
    
  </div>

  </body>
  </html>