<?php
include 'dbconnected.php';

session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true ){
 header("location: login.php");
 exit;
}
  
?>
<?php

 include 'dbconnected.php';
//session_start();
$insert=false;
$err=false;

include 'dbconnected.php';
//session_start();
$insert = false;
$err = false;

if (isset($_POST['submit'])) {
    $quantity = $_POST['quanitty'];
    $hobi = $_POST['hobie'];
    $hobies = $_POST['hobies'];

    foreach ($hobi as $catagoryId) {
        foreach ($hobies as $measurementId) {
            $que = "INSERT INTO `product` (catagori_id, measurment_id, stockQuantity) VALUES ('$catagoryId', '$measurementId', '$quantity')";
            $query = mysqli_query($conn, $que);

            if ($query) {
                $insert = true;
            } else {
                $err = true;
            }
        }
    }
}
?>

<!-- Rest of your HTML code remains unchanged -->


    





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wellcome</title>
    <link rel="stylesheet" href="wellcome.css">
    <link rel="stylesheet" href="product.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f2f2f2;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
    </style>
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

             <a href="/Ali/orders.php"><button class="butn"><i id="icon" class="fa-solid fa-book"></i><h4 class="text1">Order</h4></button></a>
             <a href="/Ali/sales.php"><button class="butn"><i id="icon" class="fa-brands fa-salesforce"></i><h4 class="text1">Sales</h4></button></a>

            <button class="butn"><i id="icon" class=" fa-solid fa-user"></i><h4 class="text1">User</h4></button>

        </div>
        
        <div class="child2  my-0   py-4  px-5"  >

        
      

        <div class="box1">


                <div class="box2">
                    <h1  > Product</h1>
                </div>
                <div class="box3">
                    <button class="add">Add</button>
                    <button class="add"  name="clear"  > History</button>
                </div>

            </div>
        <?php 
        // if(isset($_SESSION['status'])){
        //     echo "<h4>".$_SESSION['status']."</h4>";
        //     unset($_SESSION['status']);
        // }
        ?>
        <div class="form-container  my-4 ">
        <div class="form-heading">Add Product</div>

        <form   method="POST"  action="product.php">
        
        <div class="form-group  my-4">
        <label class="form-label" for="">Product Catagory</label>
        <select   name="hobie[]" class="form-control multiple_select "     multiple  required>

            <?php
                $sql="SELECT * FROM `catagory`";
                $query_run=mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $rowcat){
                            ?>
                            <option   value="<?php echo $rowcat['catagori_id']; ?>" > <?php echo $rowcat['catagory_name']; ?> </option>

                            <?php
                        }
                }
                else{
                    echo "not found!";
                }
            ?>

        </select>    
        </div>

        
        <div class="form-group  my-4">
        <label class="form-label" for="">Select Measurement</label>
        <select   name="hobies[]" class="form-control multiple_select "    multiple  required>

            <?php
                $sql="SELECT * FROM `measurmentproduct`";
                $query_run=mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $rowcat){
                            ?>
                            <option   value="<?php echo $rowcat['measurment_id']; ?>" > <?php echo $rowcat['measurement_value']; ?> </option>

                            <?php
                        }
                }
                else{
                    echo "not found!";
                }
            ?>

        </select>  
        </div>
        <div class="form-group   my-4">
                <label for="height">Stock Quantity</label>
                <input type="number" class="form-control" id="height" name="quanitty" placeholder="Enter Stock Quantity"  required> 
              </div> 

        <div class="form-group">
        <label class="form-label" for="">Click to save</label>
        <button  type="submit"  name="submit"  class="btn btn-primary">  Add</<button>
        </div>
        

    </form>

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
    </div>     
        
    <!-- <div class="form-container  my-4">
    <div class="form-heading">Data Table</div>

   <table class="table  my-2"  id="myTable">
 <thead>
   <tr>
     <th scope="col">Serial</th>
     <th scope="col">Catagory name</th>
     <th scope="col">Measurement value</th>
     <th scope="col">Action</th>

     
   </tr>
 </thead>
 <tbody>

 <?php
       $sql="SELECT  measurmentproduct.measurement_value, catagory.catagory_name
       FROM measurmentproduct
       INNER JOIN catagory ON measurmentproduct.catagori_id =catagory.catagori_id";
       $serial=0;
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result)){
         $serial=$serial +1;
       echo'  <tr>
       <th scope="row">'. $serial . '</th>
       <td>'. $row['catagory_name']  .'</td>
       <td>' .  $row['measurement_value'] .'</td>
       
       
       <td><Button  class=" d-inline btn btn-primary  "  ><a href="" style="padding-right:3px;" class="text-light" >Edit</a></Button><button class=" d-inline btn btn-danger "><a href="your_php_file.php?delete_id=123">Delete Row</a>
       </td></Button>
       </tr>';
         
       }

   ?>
 </tbody>
</table>
</div> -->
        
                   
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
   // $(".blog").chosen();


    $(".multiple_select").select2({
        //maximumSelectionLength: 2
});
    </script>
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