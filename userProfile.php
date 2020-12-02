<?php
require("config/db.php");
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
    <title>My Profile</title>
  </head>
  <body>
    <div class="container">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="timeline.php" >Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="userProfile.php"  style="color: rgb(4, 142, 255)">Profile</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Table with images -->
        <div class="row">
          <div class="col-12">
            <table class="table table-image">
              <thead>
                <tr>
                  <th scope="col">Post</th>
                  <th scope="col">Image</th>
                  <th scope="col">Description</th>
                  <th scope="col">User</th> 
                </tr>
              </thead>
              <tbody>
                <!-- USE PHP TO LOOP THROUGH POST DATABASE FROM THIS USER BY POST ID AND OUTPUT IMAGE AND INFO HOPEFULLY IN REVERSE-->
              </tbody>
            </table>
          </div>
        </div>
    </div>
    </div>
  </body>
</html>