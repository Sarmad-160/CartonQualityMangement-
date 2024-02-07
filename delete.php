<?php
// delete.php

// Assuming you have a database connection
include('dbconnected.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $delete_sql = "DELETE FROM Product WHERE product_id = $id";

    if (mysqli_query($conn, $delete_sql)) {
        echo "Record deleted successfully!";
        header("location: inventori.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
