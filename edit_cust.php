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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/nc.css">

</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">>
		<br /><br /><br />
		<?php
		include("confile.php");
		$tb_cust = $_SESSION['tb_cust'];

		$cust_id = $con->real_escape_string($_GET['cust_id']);
		$sql = "select * from $tb_cust where cust_id='$cust_id'";
		$res = $con->query($sql);
		if ($res->num_rows == 0) {
			echo "<h1>No record found.</h1>";
		} else {
			$row = $res->fetch_assoc();
			$_SESSION['cust_id'] = $row['cust_id'];
			?>
			<form method="post" action="upd_cust.php">
				<div class="row lf">
					<h1 class="text-center">Edit Customer Info</h1>
					<div class="col-md-8 col-md-offset-2">
						<input type="text" class="form-control" name="cname" value="<?php echo $row['cname']; ?>"
							placeholder="Enter Customer Name" />
						<br />
						<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>"
							placeholder="Enter Customer address" />
						<br />
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>"
							placeholder="Enter Customer Phone Number" />
						<br />

					</div>
				</div>
				<div class="row lf">
					<div class="col-md-12 col-md-offset-2">
						<!-- Distant Vision -->
						<b style="display: inline-block; margin: 10px;">Distant Vision</b>
						<table id="tbv" class="table">
							<tr>
								<td>#</td>
								<td>Sphere (Sph)</td>
								<td>Cylinder (Cyl)</td>
								<td>Axis</td>
								<td>Prism</td>
								<td>Add</td>
							</tr>

							<tr>
								<td>Right (OD)</td>
								<td><input type="text" name="dv_right_sph" value="<?php echo $row['dv_right_sph']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_right_cyl" value="<?php echo $row['dv_right_cyl']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_right_axis" value="<?php echo $row['dv_right_axis']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_right_prism"
										value="<?php echo ($row['dv_right_prism'] == null) ? '-' : $row['dv_right_prism']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_right_add"
										value="<?php echo ($row['dv_right_add'] == null) ? '-' : $row['dv_right_add']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Left (OS)</td>
								<td><input type="text" name="dv_left_sph" value="<?php echo $row['dv_left_sph']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_left_cyl" value="<?php echo $row['dv_left_cyl']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_left_axis" value="<?php echo $row['dv_left_axis']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_left_prism"
										value="<?php echo ($row['dv_left_prism'] == null) ? '-' : $row['dv_left_prism']; ?>"
										class="form-control"></td>
								<td><input type="text" name="dv_left_add"
										value="<?php echo ($row['dv_left_add'] == null) ? '-' : $row['dv_left_add']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Visual acuity (VA)</td>
								<td colspan="5"><input type="text" name="dv_va"
										value="<?php echo ($row['dv_va'] == null) ? '-' : $row['dv_va']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Pupil Distance (PD)</td>
								<td colspan="5"><input type="text" name="dv_pd"
										value="<?php echo ($row['dv_pd'] == null) ? '-' : $row['dv_pd']; ?>"
										class="form-control"></td>
							</tr>
						</table>

						<!-- Near Vision -->
						<b style="display: inline-block; margin: 10px;">Near Vision</b>
						<table id="tbv" class="table">
							<tr>
								<td>#</td>
								<td>Sphere (Sph)</td>
								<td>Cylinder (Cyl)</td>
								<td>Axis</td>
								<td>Prism</td>
								<td>Add</td>
							</tr>

							<tr>
								<td>Right (OD)</td>
								<td><input type="text" name="nv_right_sph" value="<?php echo $row['nv_right_sph']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_right_cyl" value="<?php echo $row['nv_right_cyl']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_right_axis" value="<?php echo $row['nv_right_axis']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_right_prism"
										value="<?php echo ($row['nv_right_prism'] == null) ? '-' : $row['nv_right_prism']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_right_add"
										value="<?php echo ($row['nv_right_add'] == null) ? '-' : $row['nv_right_add']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Left (OS)</td>
								<td><input type="text" name="nv_left_sph" value="<?php echo $row['nv_left_sph']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_left_cyl" value="<?php echo $row['nv_left_cyl']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_left_axis" value="<?php echo $row['nv_left_axis']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_left_prism"
										value="<?php echo ($row['nv_left_prism'] == null) ? '-' : $row['nv_left_prism']; ?>"
										class="form-control"></td>
								<td><input type="text" name="nv_left_add"
										value="<?php echo ($row['nv_left_add'] == null) ? '-' : $row['nv_left_add']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Visual acuity (VA)</td>
								<td colspan="5"><input type="text" name="nv_va"
										value="<?php echo ($row['nv_va'] == null) ? '-' : $row['nv_va']; ?>"
										class="form-control"></td>
							</tr>

							<tr>
								<td>Pupil Distance (PD)</td>
								<td colspan="5"><input type="text" name="nv_pd"
										value="<?php echo ($row['nv_pd'] == null) ? '-' : $row['nv_pd']; ?>"
										class="form-control"></td>
							</tr>
						</table>

						<!-- Additional Values -->
						<b style="display: inline-block; margin: 10px;">Additional Values</b>
						<table id="tbv" class="table">
							<tr>
								<td>Base Curve (BC)</td>
								<td><input type="text" name="bc"
										value="<?php echo ($row['bc'] == null) ? '-' : $row['bc']; ?>" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Diameter (DIA)</td>
								<td><input type="text" name="dia"
										value="<?php echo ($row['dia'] == null) ? '-' : $row['dia']; ?>"
										class="form-control"></td>
							</tr>
						</table>
						<br><br>
					</div>
					<div class="col-md-12 col-md-offset-2">
						<input type="submit" class="btn btn-success" value="UPDATE" />
						<br /><br />
					</div>
				</div>

			</form>
			<?php
		}
		?>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>