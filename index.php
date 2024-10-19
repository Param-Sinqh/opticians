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
      background: url('assets/images/CB_SquareGlasses_011.webp') no-repeat left fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-start align-items-center" style="height: 100vh;">
      <div class="col-md-6 text-center m-0">
        <h1>LOGIN</h1>

        <?php
        if (isset($_GET['session_expired'])) {
          echo "<div id='alert' class='alert alert-warning'>Session expired. Login again!</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 3000);</script>";
        } else if (isset($_GET['auth_logout'])) {
          echo "<div id='alert' class='alert alert-info'>You've been logged out</div>";
          echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 3000);</script>";
        } else {
          echo '<div id="alert" class="alert" style="display: none;"></div>';
        }

        ?>



        <form id="loginForm">
          <input type="text" id="uname" class="form-control mb-3" placeholder="Username" name="uname" required>
          <input type="password" id="pwd" class="form-control mb-3" placeholder="Password" name="pwd" required>
          <button type="submit" class="btn btn-secondary btn-block">LOGIN</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent the form from submitting traditionally

      const uname = document.getElementById('uname').value;
      const pwd = document.getElementById('pwd').value;

      fetch('backend/dologin.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `uname=${encodeURIComponent(uname)}&pwd=${encodeURIComponent(pwd)}`
      })
        .then(response => response.json())
        .then(data => {
          const alertDiv = document.getElementById('alert');

          if (data.status === 'admin') {
            window.location.href = 'admin_home.php';
          } else if (data.status === 'user') {
            window.location.href = 'home.php';
          } else {
            alertDiv.textContent = data.message;
            alertDiv.className = 'alert alert-danger';
            alertDiv.style.display = 'block';
            setTimeout(() => {
              alertDiv.style.display = 'none';
            }, 3000);
          }
        })
        .catch(error => console.error('Error:', error));
    });
  </script>

  <script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>