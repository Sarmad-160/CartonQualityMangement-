
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
  $loggedin=true;
}
else{
  $loggedin=false;
}

echo '

    <div class="container1">
        <div class="logo">
            <img src="/Ali/images/logo.jpeg" alt="invalid"  class="img">
        </div>
        
        <div class="nav"  id="bb">';
        if(!$loggedin){
            echo'
            <button><a href="/Ali/login.php">Login</a></button>
            <button><a href="/Ali/signup.php">Signup</a></button>
            <button><a href="/Ali/wellcome.php">Home</a></button>';}
        if(!$loggedin){
            echo '
            
            <button><a href="/Ali/login.php">Logout</a></button>';
        }
        echo '   
          

        </div>
    </div>
    <div class="space">

    </div>
';
?>