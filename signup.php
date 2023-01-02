<?php
require("includes/conn.php");
$existerror = false;
$error = false;
$show = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  
  $sql = "SELECT * FROM login WHERE username = '$username'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($res);
  if ($row == NULL) {
    if ($password == $cpassword) {
      $hashpass = password_hash($password,PASSWORD_DEFAULT);
      # code...
      $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$hashpass')";
      $res = mysqli_query($conn,$sql);
      if ($res) {
        $show = TRUE;
      }
    }else{
      $error = TRUE;
    }
  }else{
    $existerror = TRUE;
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up - ISecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include('includes/navbar.php')?>
    <?php
    if ($show == TRUE) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Its Done! </strong>You Can Now Login To Our Website And Enjoy
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($error == TRUE) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error in Signup! </strong> Password Does Not Match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($existerror == TRUE) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error in Signup! </strong> Username has been already Exist.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container display-flex justify-content-center">

      <h1 class='mt-1 mb-1 text-center'>Signup To Our Website</h1>
      <form class='container col-10' action='signup.php' method='post' enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name='username' maxlength="15" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" maxlength="20" name='password' class="form-control" id="exampleInputPassword1">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" maxlength="20" name='cpassword' class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>

















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>