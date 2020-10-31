<?php
error_reporting(E_ALL ^ E_NOTICE);?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager</title>
    <!-- CSS only -->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar shadow-sm p-3 mb-5 rounded" role="navigation">
        <div class="navbar_brand">
            <img src="./logo.png" alt="">
        </div>
        <p class="my-3 h3 col-lg-8 navbar_title"> ATTENDANCE MANAGER
          <button type="button" class="btn btn-light pull-right your_tweet_button" data-toggle="modal" data-target="#yourTweet">
            <!--<i class="fa fa-twitter"></i>-->
            Log Out</button>  
        </p>
        
    </nav>
     
    <div class="analysis_body">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center h2 font-weight-bold">
                      PRESENT STATUS
                    </div>
                    <div class="statistics_covid d-flex justify-content-around">
                        <span>
                            <span class="font-weight-bold" id="total_cases"></span>
                            <p class="text-small h4">ACTIVE</p>
                        </span>
                    </div>
                  </div>
                  <div class="card my-3">
                    <div class="card-body">
                      
                      
                      <h4 class="text-center font-weight-bold">
                        USER INFORMATION
                      </h4>
                      <br>
                      <p>Enter the user id to know the details about the user.</p>
                      <form name="form" method="post" action="">
                        <label><strong>User ID:</strong></label><br />
                        <input type="text" name="userid" class="username" value="" placeholder=" ">

                        <input type="submit" name="submit" value="Submit">
                      <br>
                      <br>
                      </form>
<?php 

    $con = mysqli_connect("localhost","root","","dbprj");
    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
    }

$userid=$_POST['userid1'];
$sql="SELECT * FROM user where userid='$userid'";
$result = mysqli_query($con,$sql);

while($row = $result->fetch_assoc()){
  echo "NAME:" . $row['name'];
  echo "</br>"; 
  echo "USER ID:" . $row['userid'];
  echo "</br>"; 
  echo "AGE:" . $row['age'];
  echo "</br>"; 
  echo "DEPARTMENT ID:" . $row['deptid'];
  echo "</br>"; 
  echo "ADDRESS:" . $row['address'];
  echo "</br>"; 
  echo "CITY:" . $row['city'];
  echo "</br>"; 
  echo "STATE:" . $row['state'];
  echo "</br>"; 
  echo "CONTACT NUMBER:" . $row['contactno'];
}

mysqli_close($con);
?>
                    </div>
                  </div>
            </div>
            <div class="col-lg-5">
              <div class="card" style="height: 563px;">
                    <div class="card-body">
                      <h4 class="text-center font-weight-bold">
                        LEAVE REQUEST 
                      </h4>
                      <br>
                      <p>To request for leave, enter the below form.
                        All the below fields are mandatory and should be filled. </p>
                      <br>
                      <form name="form" method="post" action="http://localhost/leaverecord.php">
                        <label><strong>User ID:</strong></label><br />
                        <input type="text" name="userid" class="username" value="" placeholder="User ID"><br />
                        <label><strong>Name:</strong></label><br />
                        <input type="text" name="name" class="username" value="" placeholder="Name"><br />
                        <label><strong>Number of Days:</strong></label><br />
                        <input type="text" name="numdays" class="username" value="" placeholder="Days"><br />
                        <label><strong>Start Date:</strong></label><br />
                        <input type="date" name="startdate" />
                        <br />
                        <br />
                        <input type="submit" name="submit" value="Submit">
                      </form>  
                      
                      
                      </div>
                  </div>
            </div>
        </div>

        <div class="row mx-3 pull-right ">
          <div class="col-lg-12 contact">
              <h6></h6>
              <h6 id="email">EMAIL: zephyrs3416@gmail.com</h6> 
              <h6 id="phone">PHONE: +91 8825723971</h6>
              <h6>Copyright © zephyrs</h6>
          </div>
        </div>  
           <!-- The Modal -->
  <div class="modal" id="yourTweet">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CONFIRM LOGOUT ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <!-- Modal body -->
        <div class="modal-body mx-auto">
          <form name="form" method="post" action="http://localhost/logout.php">
            <label><strong>CONFIRM User ID:</strong></label><br />
            <input type="text" name="username" class="username" value="" placeholder="User ID"><br />
            
        <!--<textarea name="DETAILS" id="tweet" cols="40" rows="3" form="feed"></textarea>-->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type ="submit" value="Confirm Logout" onclick="javascript:clear()"/>
            </form>  
          <!--<button type="button" class="btn btn-danger" data-dismiss="modal" >Tweet</button>--> 
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    
</body>
</html>

<?php
?>
