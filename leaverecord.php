<?php
error_reporting(E_ALL ^ E_NOTICE);?>
<?php

    $con = mysqli_connect("localhost","root","","dbprj");
    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $check_p = "select * from user where userid = '$userid' 
                and name = '$name'";
    $res_p = mysqli_query($con,$check_p);

    if(mysqli_num_rows($res_p)==0)
    {
      echo "<script type='text/javascript'>alert('Incorrect userid!');
            </script>";
      header("refresh: 0.01; url=loggedin.html");
      exit();
    }

    else
    {
    date_default_timezone_set("Asia/Kolkata");
    $time=date("h:i:s");
    $month=date("m");
    $date=date("d");
    $leaveid=$date.$month.$userid;
    $sql = "INSERT INTO leaverecord 
           (leaveid, userid, name, days, datestart, rectime)VALUES
           ('$leaveid','$_POST[userid]','$_POST[name]',
           '$_POST[numdays]', '$_POST[startdate]','$time')";

    if (mysqli_query($con, $sql)) {
    echo "<script type='text/javascript'>
          alert('Your request has been recorded successfully!');
          </script>";
    header("refresh: 0.01; url=loggedin.html");
    }
    }
?>
