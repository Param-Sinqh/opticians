<!doctype html>

<html lang="en">

<head>
  <title>Opticians</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
  <link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/global.css">
  <style>
    body {
      background: url('assets/images/login_bg.avif') no-repeat center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-6 lf m-0">
        <h1>LOGIN</h1>
        <?php
        if (isset($_GET['auth_error'])) {
          echo "<div id='alert' class='alert alert-danger'>Incorrect username or password</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 3000);</script>";
        } else if (isset($_GET['session_expired'])) {
          echo "<div id='alert' class='alert alert-warning'>Session expired. Login again!</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 3000);</script>";
        } else if (isset($_GET['auth_logout'])) {
          echo "<div id='alert' class='alert alert-info'>You've been logged out</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 3000);</script>";
        }

        ?>
        <form action="backend/dologin.php" method="POST">
          <input type="text" class="form-control mb-3" placeholder="Username" name="uname" required>
          <input type="password" class="form-control mb-3" placeholder="Password" name="pwd" required>
          <input type="submit" class="btn btn-primary btn-block" value="LOGIN">
        </form>
      </div>
    </div>
  </div>

  <script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
  <script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>