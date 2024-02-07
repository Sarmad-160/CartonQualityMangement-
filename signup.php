<?php
$showAlert=false;
$showError=false;
include 'dbconnected.php';
if ($_SERVER['REQUEST_METHOD']== "POST"){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $exist=false;
    $exitsql="select * from user where username='$username'";
        $exitresult=mysqli_query($conn,$exitsql);
        $exitsrow=mysqli_num_rows($exitresult);
        if($exitsrow > 0){
          $exist=true;
          $showError="Username does not match";
        

        }
        else {
          $exist=false;
        
          if (($password == $cpassword) ){
              $hash=password_hash($password,  PASSWORD_DEFAULT);
              $chash=password_hash($cpassword,  PASSWORD_DEFAULT);
              $sql="INSERT INTO `user` ( `username`, `password`, `cpassword`, `TimeStamp`) VALUES ( '$username', '$hash', '$chash', current_timestamp())";
              $result=mysqli_query($conn,$sql);
              if($result){
                  $showAlert=true;
                  header("location: login.php");

                  
              }
            }
              else{
                  $showError="Passoword does not match";
              }

          }
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/Ali/signup.css">
</head>
<body>
    <div class="container">
        <div class="img1">
        <img class="img2"  src="/FINALPROJECT/images/v1_401.png"    >
        
        </div>
        
        <div class="form1">
            <h1 class="heading1">Signup</h1>
            <p class="para">see your growth and support</p>
            <form  class="form2"   action="/Ali/signup.php"  method="post">
                <div class="text1">
                  <label for="username">UserName</label>
                  </div>
                  <div>
                  <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                </div>
                <div class="text1">
                  <label for="password">Password</label>
                  </div>
                  <div>
                  <input type="password" class="form-control" id="password"  name="password" placeholder="Password"  required>
                </div>
                <div class="text1">
                  <label for="cpassword">Confirm Password</label>
                </div>
                <div class="text">  
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password"  required>
                </div > 
                <div>
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
              
                </div>
                <div class="checkbox">
                    <input  class="input1" type="checkbox" required><small class="rr">Remember me</small> 
                </div> 
                <div class="btn">
                    <button class="btn1">SIGNUP</button>
                </div>
                <?php
                if($showAlert){
                  echo '
                <div class="alert alert-primary alert-dismissible fade show  my-3 " role="alert">
                  <strong>Successfully</strong> Created 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                        </button>
                          </div>';
                        }
               
                 if($showError){
                  echo '
                <div class="alert alert-danger alert-dismissible fade show  my-3 " role="alert">
                  <strong>Error!</strong> '.$showError.' 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                        </button>
                          </div>';
                        }
                ?>
               
              </form>
            </div>
        
    </div>
</body>
</html>