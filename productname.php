<?php

$insert=false;
$err=false;
include 'dbconnected.php';

if ($_SERVER['REQUEST_METHOD']== "POST"){
    $productname=$_POST['product_name'];
    $catagoryid=$_POST['category_id'];
    $measurmement=$_POST['measurement_unit'];
    $hspecification=$_POST['specifications'];


    $sqq="INSERT INTO `products` (`product_name`, `category_id`, `measurement_unit`, `specifications`, `Timestamp`) VALUES ('$productname', '$catagoryid', '$measurmement', '$hspecification',  current_timestamp())";
    $re=mysqli_query($conn, $sqq);
    if($re){
        $insert=true;

    }
    else{
        $err=true;
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome Inventory  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
    <link rel="stylesheet" href="/Ali/inventory.css">
    
</head>
<body>
    

<?php require "navi.php"   ?>
   
<div class="parent">
    <div class="child1">
         <button class="butn"><i class="fa fa-home" aria-hidden="true"></i><a href="wellcome.php">HOME</a></button>
         <button class="butn"><i class="fa-solid fa-store"></i><a href="/ALi/inventory.php">ManageInventory</a></button>
        <button class="butn"><i class="fa fa-exchange" aria-hidden="true"></i><a href="/Ali/productcatagori.php">Product Catagory</a></button>
        <button class="butn"><i class="fas fa-users"></i><a href="/ALi/productname.php">Product Details</a></button>
        <button class="butn"><i class="fas fa-users"></i><a href="/ALi/vendorinfo.php">Vendors details</a></button>

         
    </div>
    <div class="child3  my-2   px-5"  >

        <?php
            if($insert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            if($err){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Not Added
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }

        ?>
        <h1 class="text">Inventory</h1>
        
        <form action="/Ali/productname.php" method="post">
            <h2 class="my-3"> Products Details</h2>
            <div class="form-group">
              <label for="product_name">Product_name</label>
              <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name"  required>
            </div>
            <div class="form-group">
              <label for="category_id">Category id</label>
              <input type="number" class="form-control" id="category_id"name="category_id" placeholder="Enter Catagory id"  required>
            </div>
            <div class="form-group">
                <label for="measurement_unit">Measure Unit</label>
                <input type="text" class="form-control" id="measurement_unit" name="measurement_unit" placeholder="Enter Measure Unit in e.g(nxn)"  required> 
              </div>
              <div class="form-group">
                <label for="specifications">Specifications</label>
                <input type="text" class="form-control" id="specifications" name="specifications" placeholder="Enter Specfication  required"  required> 
              </div>
            <button type="submit" class="btn btn-primary  px-3">Add</button>
          </form>
          <div class="container  my-4">
   
    <table class="table  my-2"  id="myTable">
  <thead>
    <tr>
      <th scope="col">Product_id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Category_id</th>
      <th scope="col">Measurement_unit</th>
      <th scope="col">Specifications</th>
      <th scope="col">TimeStamp</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
 
<?php
        $sql="SELECT * FROM `products`";
       
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        echo'  <tr>
        <th scope="row">'. $row['product_id'] . '</th>
        <td>'. $row['product_name']  .'</td>
        <td>' .  $row['category_id'] .'</td>
        <td>' .  $row['measurement_unit'] .'</td>

        <td>'.$row['specifications'].'</td>
        <td>'.$row['Timestamp'].'</td>
        <td><a href="" style="padding-right:3px;"  >Edit</a><a href=""> Delete</a></td>
        </tr>';
          
        }

?>
  </tbody>
</table>
</div>
               
    </div>
</div>


    
   
 
</body>
</html>