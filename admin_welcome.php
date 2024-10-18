<?php
	session_start();
	if($_SESSION['auth']!=1)
	{
		header("Location: index.php");
	}
?>
<html lang="en">
  <head>
    <title>OPTICIANS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
	<style>	
		body, .cf{
			background: #008ad3;
		}
		.lf{
			background: #d6d9e0;
			
		}
		.shd{
			box-shadow: 0px 0px 10px 10px gray;
		}
	</style>
  </head>
  <body>
	<?php
		include("admin_bar.php");
	?>
    <div class="container"> 
		<br/><br/><br/>
        <div class="row lf">
			<h1 class="text-center">Admin Welcome</h1>
			<div class="col-md-6 col-md-offset-3">
				<img src="images/admin.jpg" class="img img-responsive shd" />
				<br/><br/>
			</div>
		</div>
    </div>
	<script src="js/jquery.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
</body>
</html>