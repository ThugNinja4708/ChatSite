<?php

    $Fname = $_POST['Fname'];
    $msg = $_POST['msg'];
    $ID = $_SESSION['username'];
    
    $sql="select * from userdetails where (name='$Fname');";
    $res1=mysqli_query($conn,$sql);
    $sql="select * from userdetails where (name='$ID');";
    $res2=mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($res2) > 0) {
        $ID = mysqli_fetch_array($res2)['ID'];
    }
    
    if (mysqli_num_rows($res1) > 0) {
        $RecvID = mysqli_fetch_array($res1)['ID'];
    
        $sql = "INSERT INTO usermsg (SenderID,RecvID,Messages) VALUES ('$ID','$RecvID','$msg')";
            $iquery = mysqli_query($conn,$sql);
            if(!$iquery){
                echo "not inserted !!";
            }
            else{
                echo "inserted !!";
            }
    }
    else{
        echo "Friend details not found !!";
    }
?>