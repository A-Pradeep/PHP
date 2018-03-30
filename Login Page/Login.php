<?php
session_start();
require 'dbconfig\config.php';

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <script>
    $('#myButton').on('click', function () {
      var $btn = $(this).button('loading')
      // business logic...
      $btn.button('reset')
    })
  </script>


</head>
<body id="body">
  <div id="main-wrapper">
<center>
<h1>Login</h1>
<img src="Images\User.jpg" class="avatar" class="img-responsive"/>
</center>
<br />

<form action="Login.php" method="post" style="text-align:center">
<div  class="form-group form-inline" >
  <input type="text" name="username" placeholder="USN" class="inputvalue form-control in1" required />
  <input type="text" name="password" placeholder="Password" class="inputvalue form-control in2 " required />
</div>
<div class="form-group form-inline">
  <input type="submit" name="Login" class="btn  btn-primary form-control" value="Login" id="myButton" data-loading-text="Loading..."autocomplete="off" />
  <a href="Registration.php" class="btn  btn-primary form-control">Register</a>
</div>
<a href="#" onclick="$('#pwdModal').modal({'backdrop': 'static'});"class="btn btn-group-justified  btn-primary">Forget Password</a>
</form>

</div>


<!--modal-->
<div tabindex="-1" class="modal fade" id="pwdModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
          <h1 class="text-center">What's My Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                          <p>If you have forgotten your password you can reset it here.</p>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                      <input type="text" placeholder="E-Mail" class="inputvalue form-control form-control input-lg" />
                                      </div>
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Send Password Link"/>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
              <input type="submit" class="btn btn-success" value="Cancel"  data-dismiss="modal"  />
		  </div>
      </div>
  </div>
  </div>
</div>

<?php
if (isset($_POST['Login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query="select * from userdetails WHERE USN='$username'AND password='$password'";
  $query_run=mysqli_query($con,$query);
  if(mysqli_num_rows($query_run)>0)
  {
    echo '<script type="text/javascript">alert("Welcome!")</script>';
    $_SESSION['username']=$username;
    header('location:Homepage.php');
  }
  else{
    echo '<script type="text/javascript">alert("Invalid User!")</script>';
  }
}
 ?>


 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
