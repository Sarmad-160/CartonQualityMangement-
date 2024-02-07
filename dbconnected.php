<?php
$server="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die('<div class="alert alert-success" role="alert">
    Successfully Login. Are u want  <a href="/Project/logint.php" class="alert-link">Login</a>. Give it a click if you like.
  </div>'.mysqli_connect_error($conn));
}



?>