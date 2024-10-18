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
    <style>
        .lf input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            /* Add background image */
            background-image: url('icons/Search.svg');
            background-repeat: no-repeat;
            background-position: 10px center;
            /* Adjust the position as needed */
            /* Ensure the text is not overlapped by the icon */
            padding-left: 40px;
            /* Adjust based on the width of the icon */
        }


        /* Style the dropdown container */
        .sort-container {
            display: flex;
            align-items: center;
        }

        /* Style the dropdown button */
        .dropbtn {
            background-color: transparent;
            color: #000;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
        }

        /* Style the dropdown content (hidden by default) */
        .dropdown-content {
            backdrop-filter: blur(10px);
            user-select: none;
            border-radius: 10px;
            padding: 5px;
            display: none;
            position: absolute;
            background: rgba(255, 255, 255, 1);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Style the links inside the dropdown */
        .dropdown-content a {
            border-radius: 10px;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Style the label */
        .sort-container label {
            margin-right: 10px;
        }

        .search-sort-container {
            align-items: center;
        }

        .sort-container {
            /* margin-right: 10px; */
            /* Adjust margin as needed */
        }

        .rotate180 {
            transition: transform 0.3s ease;
        }

        .rotate0 {
            transition: transform 0.3s ease;
        }

        .rotate180.active {
            transform: rotate(-180deg);
        }

        .rotate0.active {
            transform: rotate(0deg);

        }
    </style>
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div>
        <br><br><br>
        <div class="row justify-content-center align-items-center" style="margin: 0">
            <div class="col-md-8 lf">
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
                            </div>
                        </div>
                        <a id="rotateIcon" href="#" onclick="toggleRotation()"><img src="icons/Arrow - Up 2.svg"
                                class="rotate0" id="iconImage" />
                        </a>

                    </div>
                </div>
                <div style="overflow-y: overlay; max-height: 28rem;">
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
            const icon = document.getElementById('iconImage');
            const rotateIcon = document.getElementById('rotateIcon');

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
            var url = "fetch_search_results.php?allCust_sw=" + encodeURIComponent(searchValue) +
                "&sortDirectionAsc=" + !rotated +
                "&sortOption=" + encodeURIComponent(sortOption);

            xhr.open("GET", url, true);
            xhr.send();
        }

    </script>

</body>