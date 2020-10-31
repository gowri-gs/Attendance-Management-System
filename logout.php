<?php
error_reporting(E_ALL ^ E_NOTICE);?>
<?php

    $con = mysqli_connect("localhost","root","","dbprj");
    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_POST['username'];
    $check_p = "select * from login 
                where loginid = '$userid'";
    $res_p = mysqli_query($con,$check_p);

    if(mysqli_num_rows($res_p)==0)
    {
      echo "<script type='text/javascript'>
      alert('Incorrect userid!');</script>";
      header("refresh: 0.01; url=loggedin.html");
      exit();
    }

    else
    {
     date_default_timezone_set("Asia/Kolkata");
     $time=date("h:i:s");
     $year=date("Y");
     $month=date("m");
     $date=date("d");
     $hour=date("h");
     $minu=date("i");
     $sec=date("s");
     $attid=$date.$month.$userid;
     $sql="UPDATE ATTENDANCE SET outtime='$time' 
           where attendanceid='$attid'";
     if (mysqli_query($con, $sql)) {
     header("refresh: 0.01; url=login.html");
     echo "<script type='text/javascript'>
           alert('Logged out successfully!!');
           </script>";
     }

     }
?>

