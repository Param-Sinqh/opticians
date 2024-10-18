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

	<script>
		function sureDel() {
			return confirm("Sure to delete ?");
		}
	</script>
</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">
		<br /><br /><br />
		<form method="post" action="save_nc.php">
			<div class="row lf">
				<div class="col">
					<h1 class="text-center">New Customer</h1>

					<div class="row justify-content-center">
						<div class="col-md-6	">
							<div class="form-group">
								<label for="cname">Customer Name</label>
								<input type="text" class="form-control" id="cname" name="cname"
									placeholder="Enter Customer Name" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email"
									placeholder="Enter Email">
							</div>
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="tel" class="form-control" id="phone" name="phone"
									placeholder="Enter Phone Number" required>
							</div>
							<div class="form-group">
								<label for="pin">Pin Code</label>
								<input type="text" class="form-control" id="pin" name="pin"
									placeholder="Enter Pin Code" />
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<textarea class="form-control" id="address" name="address" rows="3"
									placeholder="Enter Address"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row lf">
				<div class="col-md-12 col-md-offset-2" style="text-align: center;">
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
							<td><input type="text" name="dv_right_sph" class="form-control"></td>
							<td><input type="text" name="dv_right_cyl" class="form-control"></td>
							<td><input type="text" name="dv_right_axis" class="form-control"></td>
							<td><input type="text" name="dv_right_prism" class="form-control"></td>
							<td><input type="text" name="dv_right_add" class="form-control"></td>
						</tr>

						<tr>
							<td>Left (OS)</td>
							<td><input type="text" name="dv_left_sph" class="form-control"></td>
							<td><input type="text" name="dv_left_cyl" class="form-control"></td>
							<td><input type="text" name="dv_left_axis" class="form-control"></td>
							<td><input type="text" name="dv_left_prism" class="form-control"></td>
							<td><input type="text" name="dv_left_add" class="form-control"></td>
						</tr>

						<tr>
							<td>Visual acuity (VA)</td>
							<td colspan="5"><input type="text" name="dv_va" class="form-control"></td>
						</tr>

						<tr>
							<td>Pupil Distance (PD)</td>
							<td colspan="5"><input type="text" name="dv_pd" class="form-control"></td>
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
							<td><input type="text" name="nv_right_sph" class="form-control"></td>
							<td><input type="text" name="nv_right_cyl" class="form-control"></td>
							<td><input type="text" name="nv_right_axis" class="form-control"></td>
							<td><input type="text" name="nv_right_prism" class="form-control"></td>
							<td><input type="text" name="nv_right_add" class="form-control"></td>
						</tr>

						<tr>
							<td>Left (OS)</td>
							<td><input type="text" name="nv_left_sph" class="form-control"></td>
							<td><input type="text" name="nv_left_cyl" class="form-control"></td>
							<td><input type="text" name="nv_left_axis" class="form-control"></td>
							<td><input type="text" name="nv_left_prism" class="form-control"></td>
							<td><input type="text" name="nv_left_add" class="form-control"></td>
						</tr>

						<tr>
							<td>Visual acuity (VA)</td>
							<td colspan="5"><input type="text" name="nv_va" class="form-control"></td>
						</tr>

						<tr>
							<td>Pupil Distance (PD)</td>
							<td colspan="5"><input type="text" name="nv_pd" class="form-control"></td>
						</tr>
					</table>

					<!-- Additional Values -->
					<b style="display: inline-block; margin: 10px;">Additional Values</b>
					<table id="tbv" class="table">
						<tr>
							<td>Base Curve (BC)</td>
							<td><input type="text" name="bc" class="form-control"></td>
						</tr>
						<tr>
							<td>Diameter (DIA)</td>
							<td><input type="text" name="dia" class="form-control"></td>
						</tr>
					</table>

				</div>
				<div class="col-md-12 col-md-offset-2">
					<br><br>
					<input type="submit" class="btn btn-success" value="SAVE" />
					<br /><br />
				</div>
			</div>
		</form>

		<div class="row lf">

			<?php
			include("confile.php");
			$tb_cust = $_SESSION['tb_cust'];
			$sql = "select * from $tb_cust order by cust_id desc";
			$res = $con->query($sql);
			if ($res->num_rows > 0) {
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = $res->fetch_assoc()) {
							?>
							<tr>
								<td>
									<?php echo $row['cname']; ?>
								</td>
								<td>
									<?php echo $row['address']; ?>
								</td>
								<td>
									<?php echo $row['phone']; ?>
								</td>
								<td><a href="edit_cust.php?cust_id=<?php echo $row['cust_id']; ?>"><img
											src="icons/Edit_Square_stroke.svg" /></a></td>
								<td><a onclick="return sureDel(); "
										href="del_cust.php?cust_id=<?php echo $row['cust_id']; ?>"><img
											src="icons/Delete_stroke.svg" /></a></td>
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

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>