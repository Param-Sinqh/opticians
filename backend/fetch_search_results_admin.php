<?php
session_start();
include("../config/confile.php");

// Check if the search query parameter is set
if (isset($_GET['sw'])) {
    // Sanitize the search query to prevent SQL injection
    $sw = $con->real_escape_string($_GET['sw']);

    // Query to fetch matching results from the database
    if (empty($sw)) {
        $sql = "SELECT * FROM busers WHERE id != 1 ORDER BY comp_name;";
    } else {
        $sql = "SELECT * FROM busers WHERE id != 1 AND LOWER(comp_name) LIKE '%" . strtolower($sw) . "%' ORDER BY comp_name";
    }
    $result = $con->query($sql);

    // Check if there are any matching results
    if ($result->num_rows > 0) {
        $output = "";
        // Echo the table header for the body
        $output .= "<table class='table table-hover'>";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th style='user-select: none;'>Name</th>";
        $output .= "</tr>";
        $output .= "</thead>";

        // Build the HTML for the table rows
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            // Start row with onclick event to redirect to view_cust.php
            $output .= "<tr>";
            $output .= "<td>" . $row['comp_name'] . "</td>";
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
        echo "<tr><td colspan='5'>No results found.</td></tr>";
    }
}

// Close the database connection
$con->close();
?>