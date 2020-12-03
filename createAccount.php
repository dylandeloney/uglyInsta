<!-- TODO -->
<!-- ADD PARAMETER CHECKS FOR MINIMUM LENGTH OF PASSWORD AND USERNAME -->

<?php
require("config/db.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT * FROM registeredUsers";
    $result = mysqli_query($conn,$sql);
    $query = "INSERT INTO registeredUsers (username, password) VALUES ('$myusername', '$mypassword')";
    $addUser = mysqli_query($conn,$query)or die("Could Not Perform the Query");

    if(mysqli_affected_rows($conn) == 1){ 
        header("location: index.php");
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<title>Create an Account</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
           <form action="createAccount.php" method="POST">
               <h2 class="text-center">Create An Account</h2>       
               <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter Desired Username" required="required" name = "username">
               </div>
               <div class="form-group">
                   <input type="password" class="form-control" placeholder="Enter Password" required="required" name = "password">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-block">Create Account</button>
               </div>       
           </form>
       </div>
    </div>
</body>
</html>                                		