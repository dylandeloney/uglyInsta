<?php
require("config/db.php");
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles.css">
    <title>Home</title>
  </head>
  <body>
    <div class="container">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="timeline.php" style="color: rgb(4, 142, 255)">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="userProfile.php" >Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" >Create Post</a>
            </li>
          </ul>
        </div>
      </nav>
        <div class="row">
          <div class="col-12">
            <!-- Modal form for adding post -->
              
              


            <!-- loop through to enter post -->
            <?php 
              $sql = "SELECT * FROM posts";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
                echo '<div class= post>
                  <div class= "postHeader"> <h3> '.$row["username"].' </h3> </div>
                  <div > <img class = "postImage" src= '.$row["image"].'> </div>
                  <div class= "postDescription"> <p>'.$row["description"].'
                  </p> </div>
                </div>';
              }
            ?>
          </div>
        </div>
    </div>
  </body>
</html>