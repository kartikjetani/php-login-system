
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
<?php
  require 'navbar.php';
  require_once 'db_config.php';
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST['user'];
    $password=$_POST['pass'];
    $confirm_pass=$_POST['confirm-pass'];

  $sql="SELECT * FROM users WHERE username = '$user'";
 
  $result=mysqli_query($conn,$sql);
  $numrow= mysqli_num_rows($result);

  if($numrow==0 && trim($user)!=NULL){
      if(trim($password)==trim($confirm_pass)){
        $hash_pass=password_hash($password,PASSWORD_BCRYPT) ;
      $sql="INSERT INTO `users` (`sno`, `username`, `password`, `Date`) VALUES (NULL, '$user', '$hash_pass', current_timestamp())";
      $result=mysqli_query($conn,$sql);

      if($result){
      echo '<div class="alert alert-success alert-dismissible fade show msg" role="alert">
    <strong>Congratulation!</strong> Your account has been created successfully. Now login to continue
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';}
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show msg" role="alert">
    <strong>Error!</strong> Something went wrong (database related problem) try after some time.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'; 
  }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show msg" role="alert">
    <strong>Error!</strong> you entered different confirm password. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'; 
  }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show msg" role="alert">
    <strong>Error!</strong> Please select different username.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'; 
  }
}

  ?>

  <h1 class="text-center">SIGN UP PAGE</h1>
  <div class="container w-25">
  <form action='/php-demo/signup.php' method='post'>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name='user' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='pass'class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name='confirm-pass'class="form-control" id="exampleInputPassword2">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>