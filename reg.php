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
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
		.lf {
			background: #d5effd;
		}

		#tbv td {
			border: solid 2px #008ad3;
		}
	</style>
</head>

<body>
	<?php
	include("admin_bar.php");
	?>
	<div class="container" style="box-shadow: 0px 0px 10px 10px gray;">
		<br /><br /><br />
		<form method="post" action="save_reg.php">
			<div class="row lf">
				<h1 class="text-center">New Company</h1>
				<div class="col-md-8 col-md-offset-2">
					<input type="text" class="form-control" name="comp_name" placeholder="ENTER COMPANY NAME" />
					<br />
					<input type="text" class="form-control" name="un" placeholder="ENTER USERNAME" />
					<br />
					<input type="text" class="form-control" name="pw" placeholder="ENTER PASSWORD" />
					<br />

				</div>
			</div>
			<div class="row lf">
				<div class="col-md-8 col-md-offset-2">
					<input type="submit" class="btn btn-success" value="REGISTER" />
					<br /><br />
				</div>
			</div>
		</form>
		<?php
		include("confile.php");
		$sql = "select * from busers order by comp_name";
		$res = $con->query($sql);
		if ($res->num_rows > 0) {
			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Company</th>
						<th>Username</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = $res->fetch_assoc()) {
						?>
						<tr>
							<td>
								<?php echo $row['id']; ?>
							</td>
							<td>
								<?php echo $row['comp_name']; ?>
							</td>
							<td>
								<?php echo $row['un']; ?>
							</td>

						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
		}
		?>

	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>