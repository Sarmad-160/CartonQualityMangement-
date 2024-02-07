<?php

$insert=false;
$err=false;
include 'dbconnected.php';
if ($_SERVER['REQUEST_METHOD']== "POST"){
    $length=$_POST['lenght'];
    $width=$_POST['width'];
    $height=$_POST['height'];

    $sqq="INSERT INTO `inventory` ( `Length`, `width`, `height`, `TimeStamp`) VALUES ( '$length', '$width', '$height', current_timestamp())";
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
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="editModal">
  Edit Modal
</button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
        
        <form action="/Ali/inventory.php" method="post">
            <h2 class="my-3"> Product Measurement</h2>
            <div class="form-group">
              <label for="lenght">Lenght</label>
              <input type="number" class="form-control" id="lenght" name="lenght" aria-describedby="emailHelp" placeholder="Enter Carton Length"  required>
            </div>
            <div class="form-group">
              <label for="width">Width</label>
              <input type="number" class="form-control" id="width"name="width" placeholder="Enter Carton Width"  required>
            </div>
            <div class="form-group">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height" name="height" placeholder="Enter Carton height"  required> 
              </div>    
            <button type="submit" class="btn btn-primary  px-3">Add</button>
          </form>
          <div class="container  my-4">
   
    <table class="table  my-2"  id="myTable">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Product Lenght</th>
      <th scope="col">Product Width</th>
      <th scope="col">Product Height</th>
      <th scope="col">TimeStamp</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
 
  <?php
        $sql="SELECT * FROM `inventory`";
        $serial=0;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $serial=$serial +1;
        echo'  <tr>
        <th scope="row">'. $serial . '</th>
        <td>'. $row['Length']  .'</td>
        <td>' .  $row['width'] .'</td>
        <td>'.$row['height'].'</td>
        <td>'.$row['TimeStamp'].'</td>
        <td><Button  class=" d-inline btn btn-primary  "  ><a href="" style="padding-right:3px;" class="text-light" >Edit</a></Button><button class=" d-inline btn btn-danger "><a href="/del" class="text-light"> Delete</a></td></Button>
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