<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php?session_expired=1");
}
?>
<html lang="en">

<head>
	<title>Register New Business</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
	<link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/global.css">
	<link rel="stylesheet" href="assets/css/responsive_table.css">

	<style>
		#tbv td {
			border: solid 2px #008ad3;
		}
	</style>
</head>

<body>
	<?php
	include("admin_navbar.php");
	?>
	<div class="container">
		<br /><br /><br />
		<form method="post" action="backend/save_reg.php">
			<div class="lf">
				<div class="col">
					<h1 class="text-center">Business Registration</h1>

					<div class="row justify-content-center">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="comp_name" placeholder="Company Name"
									required />
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="tel" class="form-control" id="phone" name="phone"
									placeholder="Phone Number">
							</div>
							<div class="form-group">
								<textarea class="form-control" id="address" name="address" rows="3"
									placeholder="Address"></textarea>
							</div>
							<br>
							<div class="form-group">
								<input type="text" class="form-control" name="un" maxlength="45" title="maxlength 45"
									placeholder="Username" required />
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="pw" maxlength="45" title="maxlength 45"
									placeholder="Password" required />
							</div>
							<div>
								<br>
								<input type="submit" class="btn btn-secondary btn-block" value="Register" />
								<br />
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="lf">
			<?php
			include("config/confile.php");
			$sql = "SELECT * FROM busers WHERE id!=1 ORDER BY comp_name";
			$res = $con->query($sql);
			if ($res->num_rows > 0) {
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Company</th>
							<th>Username</th>
							<th>Phone</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = $res->fetch_assoc()) {
							?>
							<tr>
								<td data-label="ID"><?php echo $row['id']; ?></td>
								<td data-label="Company"><?php echo $row['comp_name']; ?></td>
								<td data-label="Username"><?php echo $row['un']; ?></td>
								<td data-label="Phone"><?php echo $row['phone']; ?></td>
								<td data-label="Address"><?php echo $row['address']; ?></td>
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
	</div>

	<script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>