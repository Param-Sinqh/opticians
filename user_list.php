<?php

session_start();
if ($_SESSION['auth'] != 1) {
    header("Location: index.php?session_expired=1");
}
?>

<html lang="en">

<head>
    <title>All Customers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="assets/icons/opticians.ico">
    <link rel="stylesheet" href="assets/vender/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/view_cust.css"> -->
    <link rel="stylesheet" href="assets/css/user_list.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/responsive_table.css">

    <!--=============== Remixicon.css ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.min.css">

</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container">
        <br><br><br>
        <div class="d-flex justify-content-center align-items-center m-0">
            <div class="col-md-12 lf">
                <?php
                if (isset($_GET['msg'])) {
                    echo "<div id='alert' class='alert alert-danger'>No User Found</div>";
                    echo "<script>setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 2000);</script>";
                }
                ?>
                <div class="search-sort-container">

                    <input type="text" class="form-control" placeholder="Search Existing Customers" name="allCust_sw"
                        id="searchInput" required autocomplete="off">

                    <div class="sort-container">
                        <label for="sortOptions" style="margin: 0;">Sort by:</label>
                        <div class="dropdown">
                            <button id="sortBtn" class="dropbtn">Name</button>
                            <div class="dropdown-content">
                                <a href="#" onclick="setSortOption('Name')">Name</a>
                                <a href="#" onclick="setSortOption('Date added')">Date added</a>
                                <a href="#" onclick="setSortOption('Date updated')">Date updated</a>
                            </div>
                        </div>
                        <a id="rotateIcon" class="rotate0 ri-arrow-up-s-line text-decoration-none text-dark" href="#" onclick="toggleRotation()"></a>

                    </div>
                </div>
                <div style="overflow-y: overlay; max-height: 70dvh;">
                    <table id="searchResults" class="table table-hover">
                        <!-- This table will be updated dynamically with search results -->
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>

        let rotated = false;
        let sortOption = 'Name'; // Initial sort option

        function toggleRotation() {
            const icon = document.getElementById('rotateIcon');

            // Toggle the rotated variable
            rotated = !rotated;

            // Toggle the active class based on the state of the rotated variable
            if (rotated) {
                icon.classList.remove('rotate0');
                icon.classList.add('rotate180', 'active');
            } else {
                icon.classList.remove('rotate180');
                icon.classList.add('rotate0', 'active');
            }

            // Call the function to update search results with additional parameters
            updateSearchResults();
        }

        function setSortOption(option) {
            document.getElementById("sortBtn").innerText = option;
            sortOption = option;

            // Call the function to update search results with additional parameters
            updateSearchResults();
        }

        document.addEventListener('DOMContentLoaded', function () {
            // When the page loads, send AJAX request with null allCust_sw
            updateSearchResults();
        });

        document.getElementById('searchInput').addEventListener('input', function () {
            // When input changes, send AJAX request with the input value
            updateSearchResults();
        });

        function updateSearchResults() {
            var searchValue = document.getElementById('searchInput').value.trim(); // Get the trimmed value from the input field

            // Send AJAX request to fetch matching results
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the table with fetched results
                    document.getElementById('searchResults').innerHTML = this.responseText;
                }
            };

            // Construct the URL with additional parameters
            var url = "backend/fetch_search_results.php?allCust_sw=" + encodeURIComponent(searchValue) +
                "&sortDirectionAsc=" + !rotated +
                "&sortOption=" + encodeURIComponent(sortOption);

            xhr.open("GET", url, true);
            xhr.send();
        }

    </script>

    <script src="assets/vender/jquery-3.7.1.slim.min.js"></script>
    <script src="assets/vender/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>

</body>