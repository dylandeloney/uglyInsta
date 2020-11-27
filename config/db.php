<?php
$conn = mysqli_connect('localhost', 'root', '', 'users');
    
if(mysqli_connect_errno()){
    //connection failed
    echo "Failed to connect to MySQL " . mysqli_connect_errno();
}
?>