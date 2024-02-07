<?php
$login=false;
$showError=false;

if ($_SERVER['REQUEST_METHOD']== "POST"){
  include 'dbconnected.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
        
    
        $sql="SELECT  * from `user` where username='$username' ";
        $result=mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==1){
            while($rwo=mysqli_fetch_assoc($result)){
              if(password_verify($password,$rwo['password'])){
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                header("location: welcome.php");

              }
              else{
                $showError="Invalid Credentials";

              }
            }
           
        }    
        else{
            $showError="Invalid Credentials";
        }

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/FINALPROJECT/signup.css">
</head>
<body>
    <div class="container">
        <div class="img1">
        <img class="img2"  src="/FINALPROJECT/images/v1_401.png"    >
        
        </div>
        
        <div class="form1   form3">
            <h1 class="heading1">Login</h1>
            <p class="para">see your growth and support</p>
            <form  class="form2"  action="/ALI/login.php"  method="post" >
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
               
                
                <div class="btn  btn2">
                    <button class="btn1">LOGIN</button>
                </div>
                <?php
                if($login){
                  echo '
                <div class="alert alert-primary alert-dismissible fade show  my-3 " role="alert">
                  <strong>Successfully</strong> LoggedIN.
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