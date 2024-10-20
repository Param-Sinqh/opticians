<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php?session_expired=1");
}
?>
<html lang="en">

<head>
	<title>Edit Customer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
	<link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/global.css">
	<link rel="stylesheet" href="assets/css/responsive_table.css">

</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">>
		<br /><br /><br />
		<?php
		include("config/confile.php");
		$tb_cust = $_SESSION['tb_cust'];

		$cust_id = $con->real_escape_string($_GET['cust_id']);
		$sql = "select * from $tb_cust where cust_id='$cust_id'";
		$res = $con->query($sql);
		if ($res->num_rows == 0) {
			echo "<h1>No record found.</h1>";
		} else {
			$row = $res->fetch_assoc();
			?>
			<form method="post" action="backend/upd_cust.php">
				<div class="column lf">
					<h1 class="text-center">Edit Customer Info</h1>
					<div class="col-md-12 col-md-offset-2">

						<input type="hidden" name="cust_id" value="<?php echo $row['cust_id']; ?>">

						<div class="form-group">
							<label for="cname">Customer Name</label>
							<input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Customer Name" value="<?php echo $row['cname']; ?>" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $row['phone']; ?>" required>
						</div>
						<div class="form-group">
							<label for="pin">Pin Code</label>
							<input type="text" class="form-control" id="pin" name="pin" placeholder="Enter Pin Code" value="<?php echo $row['pin']; ?>" />
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"><?php echo $row['address']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="row lf">
					<div class="col-md-12 col-md-offset-2 text-center">
						<!-- Distant Vision -->
						<h4 style="display: inline-block; margin: 10px;">Distant Vision</h4>
						<table id="tbv" class="table">
							<thead>
								<tr>
									<td data-label="#">#</td>
									<td data-label="Sphere (Sph)">Sphere (Sph)</td>
									<td data-label="Cylinder (Cyl)">Cylinder (Cyl)</td>
									<td data-label="Axis">Axis</td>
									<td data-label="Prism">Prism</td>
									<td data-label="Add">Add</td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td data-label="Right (OD)">Right (OD)</td>
									<td data-label="Sph"><input type="text" name="dv_right_sph" value="<?php echo $row['dv_right_sph']; ?>" class="form-control"></td>
									<td data-label="Cyl"><input type="text" name="dv_right_cyl" value="<?php echo $row['dv_right_cyl']; ?>" class="form-control"></td>
									<td data-label="Axis"><input type="text" name="dv_right_axis" value="<?php echo $row['dv_right_axis']; ?>" class="form-control"></td>
									<td data-label="Prism"><input type="text" name="dv_right_prism" value="<?php echo ($row['dv_right_prism'] == null) ? '-' : $row['dv_right_prism']; ?>" class="form-control"></td>
									<td data-label="Add"><input type="text" name="dv_right_add" value="<?php echo ($row['dv_right_add'] == null) ? '-' : $row['dv_right_add']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="Left (OS)">Left (OS)</td>
									<td data-label="Sph"><input type="text" name="dv_left_sph" value="<?php echo $row['dv_left_sph']; ?>" class="form-control"></td>
									<td data-label="Cyl"><input type="text" name="dv_left_cyl" value="<?php echo $row['dv_left_cyl']; ?>" class="form-control"></td>
									<td data-label="Axis"><input type="text" name="dv_left_axis" value="<?php echo $row['dv_left_axis']; ?>" class="form-control"></td>
									<td data-label="Prism"><input type="text" name="dv_left_prism" value="<?php echo ($row['dv_left_prism'] == null) ? '-' : $row['dv_left_prism']; ?>" class="form-control"></td>
									<td data-label="Add"><input type="text" name="dv_left_add" value="<?php echo ($row['dv_left_add'] == null) ? '-' : $row['dv_left_add']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="VA">Visual acuity (VA)</td>
									<td colspan="5"><input type="text" name="dv_va" value="<?php echo ($row['dv_va'] == null) ? '-' : $row['dv_va']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="PD">Pupil Distance (PD)</td>
									<td colspan="5"><input type="text" name="dv_pd" value="<?php echo ($row['dv_pd'] == null) ? '-' : $row['dv_pd']; ?>" class="form-control"></td>
								</tr>
							</tbody>

						</table>

						<!-- Near Vision -->
						<h4 style="display: inline-block; margin: 10px;">Near Vision</h4>
						<table id="tbv" class="table">
							<thead>
								<tr>
									<td data-label="#">#</td>
									<td data-label="Sphere (Sph)">Sphere (Sph)</td>
									<td data-label="Cylinder (Cyl)">Cylinder (Cyl)</td>
									<td data-label="Axis">Axis</td>
									<td data-label="Prism">Prism</td>
									<td data-label="Add">Add</td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td data-label="Right (OD)">Right (OD)</td>
									<td data-label="Sph"><input type="text" name="nv_right_sph" value="<?php echo $row['nv_right_sph']; ?>" class="form-control"></td>
									<td data-label="Cyl"><input type="text" name="nv_right_cyl" value="<?php echo $row['nv_right_cyl']; ?>" class="form-control"></td>
									<td data-label="Axis"><input type="text" name="nv_right_axis" value="<?php echo $row['nv_right_axis']; ?>" class="form-control"></td>
									<td data-label="Prism"><input type="text" name="nv_right_prism" value="<?php echo ($row['nv_right_prism'] == null) ? '-' : $row['nv_right_prism']; ?>" class="form-control"></td>
									<td data-label="Add"><input type="text" name="nv_right_add" value="<?php echo ($row['nv_right_add'] == null) ? '-' : $row['nv_right_add']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="Left (OS)">Left (OS)</td>
									<td data-label="Sph"><input type="text" name="nv_left_sph" value="<?php echo $row['nv_left_sph']; ?>" class="form-control"></td>
									<td data-label="Cyl"><input type="text" name="nv_left_cyl" value="<?php echo $row['nv_left_cyl']; ?>" class="form-control"></td>
									<td data-label="Axis"><input type="text" name="nv_left_axis" value="<?php echo $row['nv_left_axis']; ?>" class="form-control"></td>
									<td data-label="Prism"><input type="text" name="nv_left_prism" value="<?php echo ($row['nv_left_prism'] == null) ? '-' : $row['nv_left_prism']; ?>" class="form-control"></td>
									<td data-label="Add"><input type="text" name="nv_left_add" value="<?php echo ($row['nv_left_add'] == null) ? '-' : $row['nv_left_add']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="VA">Visual acuity (VA)</td>
									<td colspan="5"><input type="text" name="nv_va" value="<?php echo ($row['nv_va'] == null) ? '-' : $row['nv_va']; ?>" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="PD">Pupil Distance (PD)</td>
									<td colspan="5"><input type="text" name="nv_pd" value="<?php echo ($row['nv_pd'] == null) ? '-' : $row['nv_pd']; ?>" class="form-control"></td>
								</tr>
							</tbody>

						</table>

						<!-- Additional Values -->
						<h4 style="display: inline-block; margin: 10px;">Additional Values</h4>
						<table id="tbv" class="table">
							<tr>
								<td data-label="BC">Base Curve (BC)</td>
								<td><input type="text" name="bc" value="<?php echo ($row['bc'] == null) ? '-' : $row['bc']; ?>" class="form-control">
								</td>
							</tr>
							<tr>
								<td data-label="DIA">Diameter (DIA)</td>
								<td><input type="text" name="dia" value="<?php echo ($row['dia'] == null) ? '-' : $row['dia']; ?>" class="form-control"></td>
							</tr>
						</table>
						<br><br>
					</div>
					<div class="col-md-12 col-md-offset-2">
						<input type="submit" class="btn btn-primary btn-block" value="UPDATE" />
						<br /><br />
					</div>
				</div>

			</form>
			<?php
		}
		?>
	</div>
	<script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>