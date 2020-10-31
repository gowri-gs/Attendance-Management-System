<?php
error_reporting(E_ALL ^ E_NOTICE);?>
<?php

    $con = mysqli_connect("localhost","root","","dbprj");
    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_POST['username'];
    $password = $_POST['password'];

    $check_p = "select * from login where loginid = '$userid' and password = '$password'";

    $res_p = mysqli_query($con,$check_p);

    if(mysqli_num_rows($res_p)==0)
    {
      echo "<script type='text/javascript'>alert('Incorrect userid or password!!');</script>";
      header("refresh: 0.01; url=login.html");
      exit();
    }

    else
    {
     echo "<script type='text/javascript'>alert('Logged in successfully!!');</script>";
     date_default_timezone_set("Asia/Kolkata");
     $month=date("m");
     $date=date("d");
     $time=date("h:i:s");
     $attid = $date.$month.$userid;
     $sql = "INSERT INTO attendance (attendanceid,userid,year, month, date, intime, outtime)
                       VALUES('$attid','$userid','$year','$month','$date','$time','$time')";

     if (mysqli_query($con, $sql)) {
     header("refresh: 0.01; url=loggedin.html");
     }
    }
?>
