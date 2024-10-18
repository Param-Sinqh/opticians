<?php

session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php");
}
?>
<html lang="en">

<head>
	<title>OPTICIANS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="icons/opticians.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			background: url('https://images.unsplash.com/photo-1577400983943-874919eca6ce?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
			background-size: cover;
			font-family: Arial, sans-serif;
		}

		.lf {
			background: rgba(255, 255, 255, 0.8);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(10px);
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

		/* Custom CSS for the FAB */
		.fab-container {
			box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
			background: rgba(255, 255, 255, 0.8);
			border-radius: 10px;
			backdrop-filter: blur(5px);
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 1000;
		}

		.fab-container :hover {
			box-shadow: 0px 0px 10px 5px white;
			border-radius: 10px;
			background-color: #f4d2c4;
		}
	</style>
</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">
		<br /><br /><br />
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<h1 style="font-size: 60px; font-family: 'Arial', sans-serif; font-weight: bold;">
					Welcome</h1>
				<h1 style="font-family: 'Arial', sans-serif;">
					<?php echo $_SESSION['cn']; ?>
				</h1>
				<br><br>
			</div>

		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-8 lf">
				<?php
				if (isset($_GET['msg'])) {
					echo "<div id='alert' class='alert alert-danger'>No User Found</div>";
					echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 2000);</script>";
				}
				?>
				<form action="home.php" method="get">
					<input type="text" class="form-control" placeholder="Search Existing Customers" name="sw"
						id="searchInput" required autocomplete="off">
				</form>
				<div style="overflow-y: overlay; max-height: 20rem;">
					<table id="searchResults" class="table table-hover">
						<!-- This table will be updated dynamically with search results -->
					</table>
				</div>
			</div>

		</div>
	</div>

	<script>
		document.getElementById('searchInput').addEventListener('input', function () {
			var searchValue = this.value.trim(); // Get the trimmed value from the input field

			// Send AJAX request to fetch matching results
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					// Update the table with fetched results
					document.getElementById('searchResults').innerHTML = this.responseText;
				}
			};
			xhr.open("GET", "fetch_search_results.php?sw=" + encodeURIComponent(searchValue), true);
			xhr.send();
		});
	</script>

	<!-- Floating Action Button -->
	<div class="fab-container">
		<a href="nc.php" class="btn btn-lg">Add New Customer</a>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>