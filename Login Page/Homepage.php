<?php
session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="css/Home.css" rel="stylesheet" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

  <form action="Homepage.php" method="post">
    <h1 id="Head1">Welcome <?php echo $_SESSION['username']?>
    </h1>
  <input type="submit" class="btn btn-group btn-danger" name="logout" value="Log Out" />
  <?php
  if(isset($_POST['logout']))
  {
    session_destroy();
    header('location:Login.php');
  }
   ?>
  </form>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
