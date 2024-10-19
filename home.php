<?php

session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php?session_expired=1");
}
?>
<html lang="en">

<head>
	<title>Opticians-Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
	<link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/global.css">
	<link rel="stylesheet" href="assets/css/gopher.css">
	<link rel="stylesheet" href="assets/css/responsive_table.css">

	<!--=============== Remixicon.css ===============-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.min.css">

</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">
		<br /><br /><br />

		<div class="col-md-6 offset-md-3 text-center">
			<h1 style="font-size: 60px; font-weight: bold;">Welcome</h1>
			<h1>
				<?php echo $_SESSION['cn']; ?>
			</h1>
			<br><br>
		</div>

	</div>



	<div class="container position-relative">

		<!----------------------------------------------------- Gopher eye follow  -->
		<div class="gopher-proximity"></div>
		<div class="gopher" style="transform: scale(0.55); transform-origin: top left;">
			<img id="anchor" src="assets/Gopher_eye_follow/gopher.png" alt="gopher">
			<div id="eyes">
				<img id="eye_L" class="eye" src="assets/Gopher_eye_follow/eye_L.svg" alt="eye"
					style="top: -47px; left: -12px; ">
				<img id="eye_R" class="eye" src="assets/Gopher_eye_follow/eye_R.svg" alt="eye"
					style="top: -39px; left: -62px; ">
			</div>
		</div>
		<!--------------------------------------------------------------------------->

		<div class="d-flex justify-content-center align-items-center">
			<div class="col-md-12 lf m-0">
				<input type="search" class="form-control" placeholder="Search by Name, Address, OR Phone" name="sw"
					id="searchInput" autocomplete="off">
				<div id="searchResults" class="text-center" style="overflow-y: overlay; max-height: 45dvh;">
					<!-- This will be updated dynamically with search results -->
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
			xhr.open("GET", "backend/fetch_search_results.php?sw=" + encodeURIComponent(searchValue), true);
			xhr.send();
		});
	</script>

	<script src="assets/Gopher_eye_follow/gopher.js"></script>
	<script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>