
<?php
require("config/db.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT ID FROM registeredUsers WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['ID'];
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("location: timeline.php");
    }else {
       $error = "Your Login Name or Password is invalid";
       echo $error;
    }
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Stylesheet links -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
           <form action= "index.php" method="POST">
               <h2 class="text-center">Log in</h2>       
               <div class="form-group">
                   <input type="text" class="form-control" placeholder="Username" required="required" name = "username">
               </div>
               <div class="form-group">
                   <input type="text" class="form-control" placeholder="Password" required="required" name = "password">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-block" name = "loginButton" value = "loginButton" >Log in</button>
               </div>       
           </form>
           <p class="text-center"><a href="createAccount.php">Create an Account</a></p>
       </div>
    </div>
</body>
</html>                                		

