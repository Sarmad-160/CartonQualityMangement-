<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
    $loggedin=true;
  }
  else{
    $loggedin=false;
  }
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Ali/inventory.css">
    <link rel="stylesheet" href="/Ali/home.css">
   
    <title> Wellcome page  </title>
</head>
<body>

 <?php require "navi.php"   ?>
<div class="parent">
    <div class="child1">
         <button class="butn"><i class="fa fa-home" aria-hidden="true"></i><a href="wellcome.php">HOME</a></button>
         <button class="butn"><i class="fa-solid fa-store"></i><a href="../Ali/inventory.php"> Manage Inventory</a></button>
        <button class="butn"><i class="fa fa-exchange" aria-hidden="true"></i><a href="">Transaction</a></button>
        <button class="butn"><i class="fas fa-users"></i><a href="">Emoloyee</a></button>
         
    </div>
    <h1</h1>
    <div class="child2  my-0   py-4  px-5"  >

        <h1 class="text">Wellcome </h1>
        
        <div class="img2">
            <div class="img1">
                <img src="/Ali/Images/manger.jpg" alt="invalid" class="img3">
            </div>
       
        <div class="prof">
            <h1 class="name">UserName</h1>
            <h3 class="name1">example@gmail.com</h3>
        </div>
            
               
    </div>
</div>

</body>
</html>

