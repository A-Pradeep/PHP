<?php
require 'dbconfig\config.php';

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link href="css/register.css" rel="stylesheet" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body id="Mainbody" >
  <div id="main-wrapper">
<center>
<h1>Login</h1>
<img src="Images\New_User.jpg" class="avatar" class="img-responsive"/>
</center>
<br />

<form class="myform" action="Registration.php" method="post" style="text-align:center">
<div  class="form-group form-inline">
<label> USN Number </label>
  <input name="user" type="text" placeholder="USN" class="inputvalue form-control in1" required />
</div>
<div  class="form-group form-inline" >
  <label>New Password</label>
    <input name="pass" type="password" placeholder="Password" class="inputvalue form-control in2 " required/>
</div>
<div  class="form-group form-inline" >
  <label>Confirm Password</label>
    <input name="confirm" type="password" placeholder="Confirm Password" class="inputvalue form-control in2 " required />
</div>
<input name="submit_btn" type="submit" class="btn  btn-primary form-control" value="Sign Up" />
</form>
<a href="Login.php" class="btn btn-default btn-warning form-control">Login</a>
<?php
if (isset($_POST['submit_btn']))
{
  //echo '<script type="text/javascript">alert("Sign Up Success")</script>';
$username=$_POST['user'];
$password=$_POST['pass'];
$cpassword=$_POST['confirm'];

if($password==$cpassword)
{
  $query="select * from userdetails WHERE USN='$username'";
  $query_run=mysqli_query($con,$query);
  if(mysqli_num_rows($query_run)>0)
  {
    echo '<script type="text/javascript">alert("User Already Exists")</script>';
  }
  else
  {
    $query="insert into userdetails values('$username','$password')";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
      echo '<script type="text/javascript">alert("User Registered ... Proceed to Login Page!")</script>';
    }
    else
    {
        echo '<script type="text/javascript">alert("Error ! ")</script>';
    }
  }
}
else {
  echo '<script type="text/javascript">alert("Error Password not match! ")</script>';
}
}
 ?>

</div>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
