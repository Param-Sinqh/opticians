<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php?session_expired=1");
}
?>
<html lang="en">

<head>
	<title>Add New Customer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
	<link rel="stylesheet" href="assets/css/global.css">
	<link rel="stylesheet" href="assets/css/responsive_table.css">

</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">
		<br /><br /><br />
		<form method="post" action="backend/save_nc.php">
			<div class="lf">
				<div class="col">
					<h1 class="text-center">New Customer</h1>

					<div class="row justify-content-center">
						<div class="col-md-6">
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

			<div class="lf">
				<div class="col-md-12 col-md-offset-2" style="text-align: center;">
					<!-- Distant Vision -->
					<h4 style="display: inline-block; margin: 10px;">Distant Vision</h4>
					<div class="table-responsive">
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
									<td data-label="#">Right (OD)</td>
									<td data-label="Sph"><input type="text" name="dv_right_sph" class="form-control">
									</td>
									<td data-label="Cyl"><input type="text" name="dv_right_cyl" class="form-control">
									</td>
									<td data-label="Axis"><input type="text" name="dv_right_axis" class="form-control">
									</td>
									<td data-label="Prism"><input type="text" name="dv_right_prism"
											class="form-control">
									</td>
									<td data-label="Add"><input type="text" name="dv_right_add" class="form-control">
									</td>
								</tr>

								<tr>
									<td data-label="#">Left (OS)</td>
									<td data-label="Sph"><input type="text" name="dv_left_sph" class="form-control">
									</td>
									<td data-label="Cyl"><input type="text" name="dv_left_cyl" class="form-control">
									</td>
									<td data-label="Axis"><input type="text" name="dv_left_axis" class="form-control">
									</td>
									<td data-label="Prism"><input type="text" name="dv_left_prism" class="form-control">
									</td>
									<td data-label="Add"><input type="text" name="dv_left_add" class="form-control">
									</td>
								</tr>

								<tr>
									<td data-label="VA">Visual acuity (VA)</td>
									<td colspan="5"><input type="text" name="dv_va" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="PD">Pupil Distance (PD)</td>
									<td colspan="5"><input type="text" name="dv_pd" class="form-control"></td>
								</tr>
							</tbody>

						</table>
					</div>
					<br>
					<br>

					<!-- Near Vision -->
					<h4 style="display: inline-block; margin: 10px;">Near Vision</h4>
					<div class="table-responsive">
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
									<td data-label="#">Right (OD)</td>
									<td data-label="Sph"><input type="text" name="nv_right_sph" class="form-control">
									</td>
									<td data-label="Cyl"><input type="text" name="nv_right_cyl" class="form-control">
									</td>
									<td data-label="Axis"><input type="text" name="nv_right_axis" class="form-control">
									</td>
									<td data-label="Prism"><input type="text" name="nv_right_prism"
											class="form-control">
									</td>
									<td data-label="Add"><input type="text" name="nv_right_add" class="form-control">
									</td>
								</tr>

								<tr>
									<td data-label="#">Left (OS)</td>
									<td data-label="Sph"><input type="text" name="nv_left_sph" class="form-control">
									</td>
									<td data-label="Cyl"><input type="text" name="nv_left_cyl" class="form-control">
									</td>
									<td data-label="Axis"><input type="text" name="nv_left_axis" class="form-control">
									</td>
									<td data-label="Prism"><input type="text" name="nv_left_prism" class="form-control">
									</td>
									<td data-label="Add"><input type="text" name="nv_left_add" class="form-control">
									</td>
								</tr>

								<tr>
									<td data-label="VA">Visual acuity (VA)</td>
									<td colspan="5"><input type="text" name="nv_va" class="form-control"></td>
								</tr>

								<tr>
									<td data-label="PD">Pupil Distance (PD)</td>
									<td colspan="5"><input type="text" name="nv_pd" class="form-control"></td>
								</tr>
							</tbody>

						</table>
					</div>
					<br>
					<br>

					<!-- Additional Values -->
					<h4 style="display: inline-block; margin: 10px;">Additional Values</h4>
					<div class="table-responsive">
						<table id="tbv" class="table">
							<tr>
								<td data-label="BC">Base Curve (BC)</td>
								<td><input type="text" name="bc" class="form-control"></td>
							</tr>
							<tr>
								<td data-label="DIA">Diameter (DIA)</td>
								<td><input type="text" name="dia" class="form-control"></td>
							</tr>
						</table>
					</div>

				</div>
				<div class="col-md-12 col-md-offset-2">
					<br><br>
					<input type="submit" class="btn btn-primary btn-block" value="Save" />
					<br /><br />
				</div>
			</div>
		</form>

		<div class="lf text-center">

			<?php
			include("config/confile.php");
			$tb_cust = $_SESSION['tb_cust'];
			$sql = "select * from $tb_cust order by date_updated desc";
			$res = $con->query($sql);
			if ($res->num_rows > 0) {
				?>
				<table id="all_cust" class="table table-hover">
					<thead>
						<tr>
							<th data-label="Name">Name</th>
							<th data-label="Address">Address</th>
							<th data-label="Phone">Phone</th>
							<th data-label="Edit">Edit</th>
							<th data-label="Delete">Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = $res->fetch_assoc()) {
							?>
							<tr>
								<td data-label="Name">
									<?php echo $row['cname']; ?>
								</td>
								<td data-label="Address">
									<?php echo $row['address']; ?>
								</td>
								<td data-label="Phone">
									<?php echo $row['phone']; ?>
								</td>
								<td data-label="Edit"><a href="edit_cust.php?cust_id=<?php echo $row['cust_id']; ?>"><img
											src="assets/icons/Edit_Square_stroke.svg" /></a></td>
								<td data-label="Delete"><a onclick="return confirm('Are you sure you want to delete?'); "
										href="backend/del_cust.php?cust_id=<?php echo $row['cust_id']; ?>"><img
											src="assets/icons/Delete_stroke.svg" /></a></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<?php
			} else {
				echo "No user found. Start registering!";
			}
			?>
		</div>

	</div>

	<script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>

</body>

</html>