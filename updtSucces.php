<?php
// update.php

// Assuming you have a database connection
// include('dbconnected.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_POST['id'];
//     $category = $_POST['category'];
//     $measurement = $_POST['measurment'];
//     $stock_quantity = $_POST['quanitty'];

//     // Update the record in the database
//     $update_sql = "UPDATE Product 
//                    SET catagori_id = '$category',
//                         measurment_id = '$measurement',
//                        stockQuantity = '$stock_quantity'
//                    WHERE product_id = $id";

//     if (mysqli_query($conn, $update_sql)) {
//         echo "Record updated successfully!";
//     } else {
//         echo "Error updating record: " . mysqli_error($conn);
//     }
// }

// // Close the database connection
// mysqli_close($conn);

// update.php

// Assuming you have a database connection
include('dbconnected.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $measurment= $_POST['measurment'];

    // Add other fields as needed

    // Update the record in the database
    $update_sql = "UPDATE measurmentproduct SET  measurement_value = '$measurment' WHERE measurment_id = $id";

    if (mysqli_query($conn, $update_sql)) {
        header("location: productMeasurment.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);


?>
