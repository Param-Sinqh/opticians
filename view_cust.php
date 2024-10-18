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
	<link rel="stylesheet" href="css/view_cust.css">
</head>

<body>
	<?php
	include("navbar.php");
	?>



	<div class="container">
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

			<div class="row lf">
				<div class="col-md-12 col-md-offset-2" style="text-align: left;">
					<h1 style="text-align: left; margin-bottom: 0px">
						<?php echo $row['cname']; ?>
					</h1>
					<br />
					<?php echo $row['address']; ?>
					<?php echo "| pin - " . $row['pin']; ?>
					<br />
					<?php echo $row['email']; ?>
					<br />
					<?php echo $row['phone']; ?>
					<br />

				</div>
			</div>
			<figure style="position: relative" >
			
				<div class="gopher-proximity"></div>

				<!-- Gopher eye follow  -->
				<div class="gopher" style="transform: scale(0.55); transform-origin: top left;">

					<img id="anchor" src="Gopher_eye_follow\gopher.png" alt="gopher">
					<div id="eyes">
						<img id="eye_L" class="eye" src="Gopher_eye_follow\eye_L.svg" alt="eye"
							style="top: -47px; left: -12px; ">
						<img id="eye_R" class="eye" src="Gopher_eye_follow\eye_R.svg" alt="eye"
							style="top: -39px; left: -62px; ">
					</div>

				</div>

				<div class="row lf" style="z-index: 1;">

					<div class="col-md-12 col-md-offset-2" style="text-align: center;">

						<div style="display: flex; justify-content: space-between;">
							<div>
								<button id="editButton" class="btn edit"></button>
								<button id="saveButton" class="btn save" style="display: none"></button>
							</div>
							<div>
								<button id="deleteButton" class="btn delete" onclick="return sureDel();"
									href="del_cust.php?cust_id=<?php echo $row['cust_id']; ?>"></button>
								<button id="cancelButton" class="btn cancel" style="display: none"></button>
							</div>
						</div>

						<!-- ________________________________________________________________________________Distant Vision -->
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
								<td class="editable" data-column-name="dv_right_sph">
									<?php echo $row['dv_right_sph']; ?>
								</td>
								<td class="editable" data-column-name="dv_right_cyl">
									<?php echo $row['dv_right_cyl']; ?>
								</td>
								<td class="editable" data-column-name="dv_right_axis">
									<?php echo $row['dv_right_axis']; ?>
								</td>
								<td class="editable" data-column-name="dv_right_prism">
									<?php echo ($row['dv_right_prism'] == null) ? '-' : $row['dv_right_prism']; ?>
								</td>
								<td class="editable" data-column-name="dv_right_add">
									<?php echo ($row['dv_right_add'] == null) ? '-' : $row['dv_right_add']; ?>
								</td>
							</tr>

							<tr>
								<td>Left (OS)</td>
								<td class="editable" data-column-name="dv_left_sph">
									<?php echo $row['dv_left_sph']; ?>
								</td>
								<td class="editable" data-column-name="dv_left_cyl">
									<?php echo $row['dv_left_cyl']; ?>
								</td>
								<td class="editable" data-column-name="dv_left_axis">
									<?php echo $row['dv_left_axis']; ?>
								</td>
								<td class="editable" data-column-name="dv_left_prism">
									<?php echo ($row['dv_left_prism'] == null) ? '-' : $row['dv_left_prism']; ?>
								</td>
								<td class="editable" data-column-name="dv_left_add">
									<?php echo ($row['dv_left_add'] == null) ? '-' : $row['dv_left_add']; ?>
								</td>
							</tr>

							<tr class="spacer-row"></tr>

							<tr>
								<td>Visual acuity (VA)</td>
								<td class="editable" colspan="5" data-column-name="dv_va">
									<?php echo ($row['dv_va'] == null) ? '-' : $row['dv_va']; ?>
								</td>
							</tr>
							<tr>
								<td>Pupil Distance (PD)</td>
								<td class="editable" colspan="5" data-column-name="dv_pd">
									<?php echo ($row['dv_pd'] == null) ? '-' : $row['dv_pd']; ?>
								</td>
							</tr>
						</table>

						<!-- ________________________________________________________________________________Near Vision -->
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
								<td class="editable" data-column-name="nv_right_sph">
									<?php echo $row['nv_right_sph']; ?>
								</td>
								<td class="editable" data-column-name="nv_right_cyl">
									<?php echo $row['nv_right_cyl']; ?>
								</td>
								<td class="editable" data-column-name="nv_right_axis">
									<?php echo $row['nv_right_axis']; ?>
								</td>
								<td class="editable" data-column-name="nv_right_prism">
									<?php echo ($row['nv_right_prism'] == null) ? '-' : $row['nv_right_prism']; ?>
								</td>
								<td class="editable" data-column-name="nv_right_add">
									<?php echo ($row['nv_right_add'] == null) ? '-' : $row['nv_right_add']; ?>
								</td>
							</tr>

							<tr>
								<td>Left (OS)</td>
								<td class="editable" data-column-name="nv_left_sph">
									<?php echo $row['nv_left_sph']; ?>
								</td>
								<td class="editable" data-column-name="nv_left_cyl">
									<?php echo $row['nv_left_cyl']; ?>
								</td>
								<td class="editable" data-column-name="nv_left_axis">
									<?php echo $row['nv_left_axis']; ?>
								</td>
								<td class="editable" data-column-name="nv_left_prism">
									<?php echo ($row['nv_left_prism'] == null) ? '-' : $row['nv_left_prism']; ?>
								</td>
								<td class="editable" data-column-name="nv_left_add">
									<?php echo ($row['nv_left_add'] == null) ? '-' : $row['nv_left_add']; ?>
								</td>
							</tr>

							<tr class="spacer-row"></tr>

							<tr>
								<td>Visual acuity (VA)</td>
								<td class="editable" colspan="5" data-column-name="nv_va">
									<?php echo ($row['nv_va'] == null) ? '-' : $row['nv_va']; ?>
								</td>
							</tr>
							<tr>
								<td>Pupil Distance (PD)</td>
								<td class="editable" colspan="5" data-column-name="nv_pd">
									<?php echo ($row['nv_pd'] == null) ? '-' : $row['nv_pd']; ?>
								</td>
							</tr>
						</table>

						<!-- ________________________________________________________________________________Additional Values -->
						<b style="display: inline-block; margin: 10px;">Additional Values</b>
						<table id="tbv" class="table">
							<tr>
								<td>Base Curve (BC)</td>
								<td class="editable" data-column-name="bc">
									<?php echo ($row['bc'] == null) ? '-' : $row['bc']; ?>
								</td>
							</tr>
							<tr>
								<td>Diameter (DIA)</td>
								<td class="editable" data-column-name="dia">
									<?php echo ($row['dia'] == null) ? '-' : $row['dia']; ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</figure>
			<?php
		}
		?>
	</div>

	<!-- Footer with details -->
	<footer class="footer" style="margin-top: 150px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>An optician typically requires several values or measurements to create a prescription for
						eyeglasses or contact lenses. These values are obtained through an eye examination conducted by
						an
						optometrist or ophthalmologist. Some of the common values or measurements include:</h4>
					<ul>
						<li><strong>Sphere (Sph):</strong> This indicates the lens power needed to correct
							nearsightedness
							(myopia) or farsightedness (hyperopia). It is measured in diopters (D).</li>
						<li><strong>Cylinder (Cyl):</strong> This indicates the amount of astigmatism present in the
							eye. It
							represents the difference in power between two principal meridians of the eye. It is also
							measured in diopters (D).</li>
						<li><strong>Axis:</strong> This indicates the orientation of the cylinder power in degrees. It
							ranges from 0 to 180 degrees.</li>
						<li><strong>Addition (Add):</strong> This is the additional magnifying power needed for reading
							or
							close work in bifocal or progressive lenses. It is typically used for presbyopia correction.
						</li>
						<li><strong>Pupil Distance (PD):</strong> This is the distance between the centers of the pupils
							of
							the eyes. It is essential for ensuring proper alignment of the lenses.</li>
						<li><strong>Base Curve (BC):</strong> This is a measurement for contact lenses and refers to the
							curvature of the lens. It affects the fit and comfort of the lenses.</li>
						<li><strong>Diameter (DIA):</strong> This is also for contact lenses and represents the size of
							the
							lens. It ensures proper coverage of the cornea.</li>
						<li><strong>Prism:</strong> In some cases, prism correction may be needed for eye misalignment
							issues such as double vision (diplopia).</li>
					</ul>
					<p>These are some of the primary values required for creating prescription eyewear. The specific
						values
						needed may vary based on the individual's prescription and any particular requirements for their
						lenses. It's essential to have a comprehensive eye examination conducted by a qualified eye care
						professional to obtain accurate measurements.</p>
				</div>
			</div>
		</div>
	</footer>


	<script src="js/table_cel_event_listeners.js"></script>
	<script src="Gopher_eye_follow/gopher.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>