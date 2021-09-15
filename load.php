<?php
            include "DB_Conn.php";
            session_start();
            $ID = $_SESSION['username'];                              //RETRIEVAL
            $sql="select * from userdetails where (name='$ID');";
            $res2=mysqli_query($conn,$sql);
            if (mysqli_num_rows($res2) > 0) {
              $ID = mysqli_fetch_array($res2)['ID'];
          }
          
            $sql = "SELECT * FROM usermsg WHERE (RecvID ='$ID' or SenderID = '$ID') ;";
                                                            //retrives the messages which where sent to him
            $res = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($res);
            echo'<link rel="stylesheet" href="style.css" type="text/css">';
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($res)){
                  $sql2= "SELECT Name FROM userdetails WHERE (ID ='$row[SenderID]') ;";

                  $res2 = mysqli_query($conn,$sql2);
                  $row2 = mysqli_fetch_assoc($res2);
                  if($row['SenderID'] == $ID){
                    echo'   <div class="container">
                              <div class="inner-container2">
                                <p style="font-weight: 1000;"> '."$row2[Name]". '</p>
                                <p>'." $row[Messages]".' </p> 
                            </div> </div><br>';
                  }
                  else{
                    echo'<div class="container">
                          <div class="inner-container1">
                            <p style="font-weight: 1000;"> '."$row2[Name]". '</p>
                            <p>'." $row[Messages]".' </p> 
                         </div> </div><br>';
                }
              }
            }
            else{
              echo "You have no messages !!";
            }
            ?>