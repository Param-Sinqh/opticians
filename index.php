<!doctype html>

<?php include('header.php'); ?>

<html lang="en">

<head>
  <title>OPTICIANS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="icons\opticians.ico">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1576451674177-6ab18eba087c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }

    .lf {
      background: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
    }

    .lf h1 {
      font-size: 28px;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    .lf input[type="text"],
    .lf input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .lf input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #008ad3;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }

    .lf input[type="submit"]:hover {
      background-color: #00578a;
    }

    .alert {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-6 lf">
        <h1>OPTICIANS LOGIN</h1>
        <?php
        if (isset($_GET['msg'])) {
          echo "<div id='alert' class='alert alert-danger'>Incorrect username or password</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 2000);</script>";
        }

        ?>
        <form action="dologin.php" method="POST">
          <input type="text" class="form-control" placeholder="Username" name="uname" required>
          <input type="password" class="form-control" placeholder="Password" name="pwd" required>
          <input type="submit" class="btn btn-primary" value="LOGIN">
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>