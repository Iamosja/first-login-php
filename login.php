<?php
session_start();
require("includes/conn.php");
$usererror = false;
$show = false;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashpass = password_hash($password,PASSWORD_DEFAULT);
  $verifypass = password_verify($password,$hashpass);

  $sql1 = "SELECT * FROM login WHERE username = '$username'";
  $res2 = mysqli_query($conn,$sql1);
  $row2 = mysqli_num_rows($res2);
  if ($row2 > 0) {
      $sql = "SELECT * FROM `login` WHERE `username`= '$username'";
      while ($row2 = mysqli_fetch_assoc($res2)) {
        if (password_verify($password,$row2['password'])) {
            $res = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($res);
        if ($row > 0) {
            $show = TRUE;
            $_SESSION['name'] = $_POST['username'];
            header("Location: ../login/welcome.php");
        }
        }
        else
        {
            $error = TRUE;
        }
    }

  }else{
    $usererror = TRUE;
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - ISecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include('includes/navbar.php')?>
    <?php
    if ($show == TRUE) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Its Done!</strong> You Are Logged in To Our Website Enjoy It!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }else{
            if ($error == TRUE) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error in Login!</strong> Invailid Password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    }
    if ($usererror == TRUE) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error in Login!</strong> Invailid Username!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    if (!empty($_GET['message'])) {
        $message = $_GET['message'];
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> You Have been LoggedOut!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        
    }
    ?>
    <div class="container display-flex justify-content-center">

      <h1 class='mt-1 mb-1 text-center'>Login To Our Website</h1>
      <form class='container col-10' action='login.php' method='post' enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name='username' maxlength="15" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" maxlength="20" name='password' class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>

















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>