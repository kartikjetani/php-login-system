<?php
require 'navbar.php';
require_once 'db_config.php';
$flag=0;
// session_start();

if(isset($_SESSION['username'])){
    echo ($_SESSION['username']);
    echo ' You are already logged in';
    exit();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST['user'];
    $password=$_POST['pass'];

    $sql="SELECT * FROM users WHERE username = '$user'";

  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($result);


  if(password_verify($password,$row['password']) && $password!=NULL && $user==$row['username']){

    echo '<div class="alert alert-success alert-dismissible fade show msg" role="alert">
    <strong>Success!</strong> Login done.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    $flag=1;

  session_start();
  $_SESSION['username'] = $user;
  $_SESSION['password'] =$password;

  header("Location:http://localhost/php-demo/index.php");
  exit;
  
}
else{
    echo  '<div class="alert alert-danger alert-dismissible fade show msg" role="alert">
    <strong>Invalid Credentials!</strong> Try again...
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}

}
if($flag==1){
    exit;
}

?>
    <h1 class='text-center  '>Welcome to my login page</h1>
    <div class="container w-25">
    <form action='/php-demo/login.php' method='post'>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name='user' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='pass'class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>