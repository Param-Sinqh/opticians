<?php
session_start();
include("../config/confile.php");

// Check if the search query parameter is set
if (isset($_GET['sw']) && !empty($_GET['sw'])) {
    // Sanitize the search query to prevent SQL injection
    $sw = $con->real_escape_string($_GET['sw']);

    // Query to fetch matching results from the database
    $sql = "SELECT * FROM " . $_SESSION['tb_cust'] . " WHERE cname LIKE '%$sw%' ORDER BY cname";
    $result = $con->query($sql);

    // Check if there are any matching results
    if ($result->num_rows > 0) {
        $output = "";
        // Echo the table header for the body
        $output .= "<table class='table table-hover'>";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th style='user-select: none;'>Name</th>";
        $output .= "<th style='user-select: none;'>Address</th>";
        $output .= "<th style='user-select: none;'>Phone</th>";
        $output .= "</tr>";
        $output .= "</thead>";

        // Build the HTML for the table rows
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            // Start row with onclick event to redirect to view_cust.php
            $output .= "<tr onclick=\"window.location='view_cust.php?cust_id=" . $row['cust_id'] . "'\" style=\"cursor: pointer;\">";
            $output .= "<td style='user-select: none;'>" . $row['cname'] . "</td>";
            $output .= "<td style='user-select: none;'>" . $row['address'] . "</td>";
            $output .= "<td style='user-select: none;'>" . $row['phone'] . "</td>";
            $output .= "</tr>";
        }
        // Close the table body
        $output .= "</tbody>";
        // Close the table
        $output .= "</table>";
        // Echo the HTML output
        echo $output;
    } else {
        // If no matching results found, echo a message without selectable text
        echo "<tr><td colspan='5' style='user-select: none;'>No results found.</td></tr>";
    }
} else if (isset($_GET['allCust_sw']) && isset($_GET['sortDirectionAsc']) && isset($_GET['sortOption'])) {
    // Sanitize the search query to prevent SQL injection
    $allCust_sw = $con->real_escape_string($_GET['allCust_sw']);
    $sortDirectionAsc = ($_GET['sortDirectionAsc'] === 'true'); // Convert string to boolean
    $sortOption = $con->real_escape_string($_GET['sortOption']);

    if (strtolower(trim($sortOption)) == 'name') {
        $sortOption = 'cname';
    } elseif (strtolower(trim($sortOption)) == 'date added') {
        $sortOption = 'date_added';
    } elseif (strtolower(trim($sortOption)) == 'date updated') {
        $sortOption = 'date_updated';
    }

    // Determine the sorting direction based on the sortDirectionAsc parameter
    $sortDirection = $sortDirectionAsc ? 'ASC' : 'DESC';

    // Query to fetch matching results from the database
    if (empty($allCust_sw)) {
        $sql = "SELECT * FROM " . $_SESSION['tb_cust'] . " ORDER BY $sortOption $sortDirection";
    } else {
        $sql = "SELECT * FROM " . $_SESSION['tb_cust'] . " WHERE cname LIKE '%$allCust_sw%' ORDER BY $sortOption $sortDirection";
    }

    printTable($con->query($sql));
}

function printTable($result)
{

    // Check if there are any matching results
    if ($result->num_rows > 0) {
        $output = "";
        // Echo the table header for the body
        $output .= "<table class='table table-hover'>";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th data-label='Name' style='user-select: none;'>Name</th>";
        $output .= "<th data-label='Address' style='user-select: none;'>Address</th>";
        $output .= "<th data-label='Phone' style='user-select: none;'>Phone</th>";
        $output .= "<th data-label='Date Added' style='user-select: none;'>Date Added</th>";
        $output .= "</tr>";
        $output .= "</thead>";

        // Build the HTML for the table rows
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            // Start row with onclick event to redirect to view_cust.php
            $output .= "<tr onclick=\"window.location='view_cust.php?cust_id=" . $row['cust_id'] . "'\" style=\"cursor: pointer;\">";
            $output .= "<td data-label='Name' style='user-select: none;'>" . $row['cname'] . "</td>";
            $output .= "<td data-label='Address' style='user-select: none;'>" . $row['address'] . "</td>";
            $output .= "<td data-label='Phone' style='user-select: none;'>" . $row['phone'] . "</td>";
            $date = new DateTime($row['date_added']);
            $output .= "<td data-label='Date Added' style='user-select: none;'>" . $date->format('d-m-Y') . "</td>";
            $output .= "</tr>";
        }
        // Close the table body
        $output .= "</tbody>";
        // Close the table
        $output .= "</table>";
        // Echo the HTML output
        echo $output;
    } else {
        // If no matching results found, echo a message without selectable text
        echo "<tr><td colspan='5' style='user-select: none;'>No results found.</td></tr>";
    }
}

// Close the database connection
$con->close();
?>