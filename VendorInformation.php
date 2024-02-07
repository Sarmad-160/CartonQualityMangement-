<?php

$success=false;
$error=false;

include 'dbconnected.php';
if ($_SERVER['REQUEST_METHOD']== "POST"){
    $Name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    

$sql="INSERT INTO `vendorinformation` (`name`, `address`, `phone`, `time`) VALUES ( '$Name',  '$address', '$phone', current_timestamp())";
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
    <title>Add Product</title>
    <link rel="stylesheet" href="wellcome.css">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="vendorinformation.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
             <a href="/Ali/product.php"><button class="butn"><i id="icon" class="fa-brands fa-product-hunt"></i><h4 class="text1">Product</h4></button></a>
             <a href="/Ali/orders.php"><button class="butn"><i id="icon" class="fa-solid fa-book"></i><h4 class="text1">Order</h4></button></a>

             <a href="/Ali/sales.php"><button class="butn"><i id="icon" class="fa-brands fa-salesforce"></i><h4 class="text1">Sales</h4></button></a>
            <a href="/Ali/VendorInformation.php"> <button class="butn"><i id="icon" class=" fa-solid fa-user"></i><h4 class="text1">Vendor Information</h4></button></a>
            <!-- <a href="/Ali/inventori.php"><button class="butn"><i id="icon" class="fa-solid fa-store"></i> <h4 class="text1">Inventory Manage</h4></button> -->


        </div>
        
        <div class="child2 "  >

            <div class="box1">
                <div class="box2">
                    <h1> Vendor Information</h1>
                </div>
                <div class="box3">
                    <button class="add">Add</button>
                    <button class="add">History</button>
                </div>

            </div>
            
                <br>
            <div class="form-container ">
               <form   action="/Ali/VendorInformation.php" method="post" > 
                <!-- <div class="form-group">
                    <label class="form-label"   >Select Category:</label>
                    <div class="form-checkbox">
                        <label for="corrugatedCarton">
                            <input type="checkbox" id="corrugatedCarton" name="category" value="corrugatedCarton" required >
                            Corrugated Carton
                        </label>
                    </div>
                    <div class="form-checkbox">
                        <label for="kraftCarton">
                            <input type="checkbox" id="kraftCarton" name="category" value="kraftCarton" required>
                            Kraft Carton
                        </label>
                    </div>
                </div> -->
                
        
                <!-- <div class="form-group">
                    <label class="form-label" for="quantity">Product Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-input"  placeholder="Enter Quantity " required>
                </div> -->
                
                
        
                <div class="form-group">
                    <label class="form-label" for="name">NAME:</label>
                    <input type="text" id="name" name="name" class="form-input"  placeholder="Enter Name" required>
                </div>
        
               
                <br>
        
                <div class="form-group">
                    <label class="form-label" for="height">Address:</label>
                    <input type="text" id="height" name="address" class="form-input"  placeholder="Enter Address  "  required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Phone:</label>
                    <input type="number" id="phone" name="phone" class="form-input"  placeholder="Enter Phone number "  required>
                </div>
        
                <button type="submit" class="form-submit">Save</button>
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
                          <div class="alert alert-warning alert-dismissible fade show  my-3 " role="alert">
                            <strong>Error</strong>Cannot Submit.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>';
                                  }
                ?>
                
            </div>
        </form>
           
                
                   
        </div>
        </div>
        <div class="container m-auto">
           <table class="table  my-1"  id="myTable">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">Vendor type</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Time</th>
      <th scope="col">Actions</th>


    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM `vendorinformation` ";
        $serial=0;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $serial=$serial +1;
        echo'  <tr>
        <th scope="row">'. $serial . '</th>
        <td>'. $row['name']  .'</td>
        <td>'. $row['type']  .'</td>
        <td>'. $row['address']  .'</td>
        <td>' .  $row['phone'] .'</td>
        <td>'.$row['time'].'</td>
        <td><Button  class=" d-inline btn btn-primary  "  ><a href="" style="padding-right:3px;" class="text-light" >Edit</a></Button><button class=" d-inline btn btn-danger "><a href="/del" class="text-light"> Delete</a></td></Button>
        </tr>';
          
        }

    ?>

    </tbody>
</table>
           
                
                   
        </div> 

</body>
</html>