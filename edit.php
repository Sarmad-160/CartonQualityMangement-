<?php
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true ){
 header("location: login.php");
 exit;
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wellcome <?php echo $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="wellcome.css">
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
             <button class="butn"><i id="icon" class="fa-solid fa-house"></i><h4 class="text1">Home</h4></button>
             <a href="/Ali/productMeasurment.php"><button class="butn"><i id="icon" class="fa-brands fa-product-hunt"></i><h4 class="text1">Product Measurment</h4></button></a>

             <a href="/Ali/product.php"><button class="butn"><i id="icon" class="fa-brands fa-product-hunt"></i><h4 class="text1">Product</h4></button></a>
             <a href="/Ali/inventori.php"><button class="butn"><i id="icon" class="fa-solid fa-store"></i> <h4 class="text1">Inventory Managment</h4></button></a>

             <a href="/Ali/sales.php"><button class="butn"><i id="icon" class="fa-brands fa-salesforce"></i><h4 class="text1">Sales</h4></button></a>
             <a href="/Ali/order.php"><button class="butn"><i id="icon" class="fa-solid fa-book"></i><h4 class="text1">Order</h4></button></a>
             <a href="/Ali/VendorInformation.php"><button class="butn"><i id="icon" class=" fa-solid fa-user"></i><h4 class="text1">Vendor Infromation</h4></button>

        </div>
        
        <div class="child2  my-0   py-4  px-5"  >

    
           <div class="container">
            

           <div class="alert alert-primary" role="alert"  >
                <h4 class="alert-heading">Wellcome<h1><?php echo $_SESSION['username'] ?></h1></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to exit this page and want to logout the press this link <a href="/Ali/logout.php">Logout</a></p>
              </div>

           </div>
           
                
<?php
// edit.php

// Assuming you have a database connection

include('dbconnected.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record based on the provided ID
    $sql = "SELECT * FROM Product WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Display a form with the existing values for editing
        echo '<div class="container my-5">
                 <form action="update.php" method="post">
                    <h1> STOCK UPDATE</h1>
                     <input type="hidden" name="id" value="' . $row['product_id'] . '">
                     <div class="form-group">
                         <label for="category">Product Category:</label>
                         <input type="text" class="form-control" name="category" value="' . $row['catagori_id'] . '">
                     </div>
                     
                         <!-- Add other input fields for measurement, stock quantity, etc. -->
                        <div class="form-group   my-4">
                    <label for="height">Stock Quantity</label>
                    <input type="number" class="form-control" id="height" name="quanitty" placeholder="Enter Stock Quantity"  required> 
              </div> 
                     
                     <button type="submit" class="btn btn-primary">Update</button>
                     <span>If I want to Updated Measurement Value ?</span><a href="productMeasurment.php">Measurment updated</a>
                 </form>
             </div>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

                  
                   
        </div>
    </div>
</body>
</html>

