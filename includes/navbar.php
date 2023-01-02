<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ISecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
      if (isset($_SESSION['name'])) {
        
        echo '<li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../login/welcome.php">Home</a>
        </li>';
      }
      if (!isset($_SESSION['name'])) {
        echo'
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../login/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../login/signup.php">Signup</a>
        </li>';
      }
        if (isset($_SESSION['name'])) {
          echo'
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../login/logout.php">Logout</a>
          </li>';
        }
        echo '
          </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
';
?>