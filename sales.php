<?php
include 'dbconnected.php';
// if ($query) {
//     $insert = true;

//     // Fetch order details
//     $orderId = mysqli_insert_id($conn);
//     $orderDetailsQuery = "SELECT * FROM `Ordrs` WHERE order_id = $orderId";
//     $orderDetailsResult = mysqli_query($conn, $orderDetailsQuery);

//     if ($orderDetailsResult) {
//         while ($orderRow = mysqli_fetch_assoc($orderDetailsResult)) {
//             $productId = $orderRow['product_id'];
//             $vendorId = $orderRow['vendor_id'];
//             $orderQuantity = $orderRow['order_quantity'];
//             $cost = $orderRow['cost'];

//             // Insert into sales table
//             $salesInsertQuery = "INSERT INTO `sales` (product_id, vendor_id, order_quantity, cost) VALUES ('$productId', '$vendorId', '$orderQuantity', '$cost')";
//             $salesInsertResult = mysqli_query($conn, $salesInsertQuery);

//             if (!$salesInsertResult) {
//                 $err = true;
//                 break;
//             }

//             // Subtract order quantity from product quantity
//             $updateProductQuantityQuery = "UPDATE `product` SET quantity = quantity - $orderQuantity WHERE product_id = $productId";
//             $updateProductQuantityResult = mysqli_query($conn, $updateProductQuantityQuery);

//             if (!$updateProductQuantityResult) {
//                 $err = true;
//                 break;
//             }
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="wellcome.css">
    <link rel="stylesheet" href="inventori.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container1">
        <div class="left">
            <i class="fa-sharp fa-solid fa-bars"></i>
        </div>
        <div class="right">
            <i class="fa-solid fa-magnifying-glass" id="ii"></i>
            <i class="fa-solid fa-bell" id="io" ></i>
            <a href="/Ali/login.php"  id="lo"><span id="logout">Logout</span><i class="fa fa-sign-out" aria-hidden="true" id="log"></i></a>


        </div>
    </div>
    <div class="parent">
        <div class="child1">
        <a href="/Ali/welcome.php"><button class="butn"><i id="icon" class="fa-solid fa-house"></i><h4 class="text1">Home</h4></button></a>
             <a href="/Ali/productMeasurment.php"><button class="butn"><i id="icon" class="fa-brands fa-product-hunt"></i><h4 class="text1">Product Measurment</h4></button></a>

             <a href="/Ali/product.php"><button class="butn"><i id="icon" class="fa-brands fa-product-hunt"></i><h4 class="text1">Product</h4></button></a>

             <a href="/Ali/inventori.php"><button class="butn"><i id="icon" class="fa-solid fa-store"></i> <h4 class="text1">Inventory Managment</h4></button></a>

             <a href="/Ali/sales.php"><button class="butn"><i id="icon" class="fa-brands fa-salesforce"></i><h4 class="text1">Sales</h4></button></a>
             <a href="/Ali/orders.php"><button class="butn"><i id="icon" class="fa-solid fa-book"></i><h4 class="text1">Order</h4></button></a>
             <a href="/Ali/VendorInformation.php"><button class="butn"><i id="icon" class=" fa-solid fa-user"></i><h4 class="text1">Vendor Infromation</h4></button></a>

        </div>
        
        <div class="child2  my-0   py-4  px-5"  >

    
           
        <div class="box1">
                <div class="box2">
                    <h1>Sales</h1>
                </div>
                <div class="box3">
                    <button class="add">Update</button>
                    <button class="add">Delete</button>
                </div>
</div>
<div class="form-container my-4">
    <div class="form-heading"><h1>Sales Table</h1></div>
    <table class="table my-2" id="myTable">
        <thead>
            <tr>
            <th scope="col">Serial</th>

                <th scope="col">Product ID</th>
                <th scope="col">Vendor ID</th>
                <th scope="col">Order Quantity</th>
                <th scope="col">Cost</th>
                <th scope="col">Sale Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $salesQuery = "SELECT  ordrs.product_id, ordrs.vendor_id, ordrs.order_quantity, ordrs.cost, ordrs.order_data , product.stockQuantity
            FROM Ordrs
            INNER JOIN product ON ordrs.product_id = product.product_id";
            $salesResult = mysqli_query($conn, $salesQuery);
            if ($salesResult) {
                $serial=0;
                while ($row = mysqli_fetch_assoc($salesResult)) {
                    $serial=$serial+1;
                    echo '<tr>
                        <td>' . $serial . '</td>
                        <td>' . $row['product_id'] . '</td>
                        <td>' . $row['vendor_id'] . '</td>
                        <td>' . $row['order_quantity'] . '</td>
                        <td>' . $row['cost'] . '</td>
                        <td>' . $row['order_data'] . '</td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
</body>
</html>