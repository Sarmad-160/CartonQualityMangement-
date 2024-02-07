
<?php

$success=false;
$error=false;
include 'dbconnected.php';
if ($_SERVER['REQUEST_METHOD']== "POST"){
    $customer=$_POST['CustomerName'];
    $shipping=$_POST['ShippingAddress'];

    $catagory=$_POST['category'];
    $quantity=$_POST['quantity'];
    $length=$_POST['length'];

    $width=$_POST['width'];
    $height=$_POST['height'];

$sql="INSERT INTO `order` ( `CustomerName`, `ShippingAddress`,  `Quantity`, `length`, `width`, `height`, `catagory`, `Data/Time`) VALUES ( '$customer', '$shipping',  '$quantity', '$length', '$width', ' $height', '$catagory', current_timestamp())";
$result=mysqli_query($conn,$sql);
if($result){
    $success=true;
}
else{
    $error=true;
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Order </title>
    <link rel="stylesheet" href="wellcome.css">
    <link rel="stylesheet" href="product.css">

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
             

             <a href="/Ali/order.php"><button class="butn"><i id="icon" class="fa-solid fa-book"></i><h4 class="text1">Order</h4></button></a>
             <a href="/Ali/sale.php"><button class="butn"><i id="icon" class="fa-brands fa-salesforce"></i><h4 class="text1">Sales</h4></button></a>

             <button class="butn"><i id="icon" class=" fa-solid fa-user"></i><h4 class="text1">User</h4></button>

        </div>
        
        <div class="child2  my-0   py-4  px-5"  >
      
    
        <div class="box1">
    

                <div class="box2">
                    <h1>Place Order</h1>
                </div>
                <div class="box3">
                    <button class="add">Add</button>
                    <button class="add">History</button>
                </div>

            </div>
            
            <div class="form-container  my-4">
            <?php
                if($success){
                    echo '
                  <div class="alert alert-success alert-dismissible fade show  my-3 " role="alert">
                    <strong>Successfully</strong> Submit.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                          </button>
                            </div>';
                          }
                          if($error){
                            echo '
                          <div class="alert alert-primary alert-dismissible fade show  my-3 " role="alert">
                            <strong>Error</strong>Cannot Submit.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>';
                                  }
                ?>
                <div class="form-heading">Place Order</div>
               <form   action="/Ali/order.php" method="post"> 
                <div class="form-group">
                    <label class="form-label"   > Catagory</label>
                    <div class="form-checkbox">
                        <label for="pay">
                            <input type="checkbox" id="pay" name="category" value="corrugatedCarton"  >
                            Corrugated Carton
                        </label>
                    </div>
                    <div class="form-checkbox">
                        <label for="kraftCarton">
                            <input type="checkbox" id="kraftCarton" name="category" value="kraftCarton" >
                            Kraft Carton
                        </label>
                    </div>
                </div>
                <div class="form-heading">Customer Details</div>

                <div class="form-group">
                    <label class="form-label" for="customer">Customer Name:</label>
                    <input type="text" id="customer" name="CustomerName" class="form-input"  placeholder="Enter Quantity " required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="add">Shipping Address</label>
                    <input type="text" id="add" name="ShippingAddress" class="form-input"  placeholder="Enter Quantity " required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="quantity"> Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-input"  placeholder="Enter Quantity " required>
                </div>
                
                
                <div class="form-heading">Product Measurement</div>
        
                <div class="form-group">
                    <label class="form-label" for="length">Length:</label>
                    <input type="text" id="length" name="length" class="form-input"  placeholder="Enter Length" required>
                </div>
        
                <div class="form-group">
                    <label class="form-label" for="width">Width:</label>
                    <input type="text" id="width" name="width" class="form-input"   placeholder="Enter width " required>
                </div>
        
                <div class="form-group">
                    <label class="form-label" for="height">Height:</label>
                    <input type="text" id="height" name="height" class="form-input"  placeholder="Enter Heigth "  required>
                </div>
        
                <button type="submit" class="form-submit">Submit</button>
                
            </div>
        </form>
           
                
                   
        </div>
</body>
</html>