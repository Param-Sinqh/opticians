<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php?session_expired=1");
}
?>
<html lang="en">

<head>
	<title>Opticians-Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
	<link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/global.css">
	
</head>

<body>
	<?php
	include("admin_navbar.php");
	?>


	<div class="container">
		<br /><br /><br />
		
		<div class="col-md-6 offset-md-3 text-center">
			<h1 style="font-size: 2.6rem;">Opticians</h1>
			<h1 style="font-size: 2rem; font-weight: bold; text-decoration: underline">Admin</h1>
			<br><br>
		</div>

		<div class="d-flex justify-content-center align-items-center">
			<div class="col-md-8 lf m-0">
				<input type="search" class="form-control" placeholder="Search Existing Businesses" name="sw"
					id="searchInput" autocomplete="off">
				<div style="overflow-y: overlay; max-height: 45dvh;">
					<table id="searchResults" class="table table-hover">
						<!-- This table will be updated dynamically with search results -->
					</table>
				</div>
			</div>

		</div>
	</div>

	<script>
		window.addEventListener("load", function () {
			// When the page loads, send AJAX request with null allRest_sw
			updateSearchResults("");

			document.getElementById("searchInput").addEventListener("input", function () {
				// When input changes, send AJAX request with the input value
				updateSearchResults(this.value.trim());
			});
		});

		function updateSearchResults(searchValue) {

			// Send AJAX request to fetch matching results
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					// Update the table with fetched results
					document.getElementById('searchResults').innerHTML = this.responseText;
				}
			};
			xhr.open("GET", "backend/fetch_search_results_admin.php?sw=" + encodeURIComponent(searchValue), true);
			xhr.send();
		}

	</script>


	<script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>

</html>