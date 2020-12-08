<?php
namespace Verot\Upload;

require("config/db.php");

//**********************************************
// LYLE COMM - class upload session - from https://www.verot.net/php_class_upload.html
require("class.upload.php");
//**********************************************

session_start();
$username = $_SESSION['username'];


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_FILES["file1"]["name"]; 

//**************************************
    $myimage = new upload($_FILES['file1']); 
    if ($myimage->uploaded) {
    $myimage->file_new_name_body   = $clientName;

    // LYLE - Resizing of images
    // Make sure the image is resized
    $myimage->image_resize  = true;
    // Set the width of the image
    $myimage->image_x  = 800;
    // Ensure the height of the image is calculated based on ratio
    $myimage->image_y = 700;
    // Process the image resize and save the uploaded file to the directory
    $myimage->process("images/");
    // Proceed if image processing completed sucessfully
    if($myimage->processed) {
        // Your image has been resized and saved
        echo 'image resized';
        // Reset the properties of the upload object
        $myimage->clean();
    }else{
        // Write the error to the screen
        echo 'error : ' . $myimage->error;}
        //**********************************************
    }
  $mydescription = mysqli_real_escape_string($conn,$_POST['description']); 
  $myimageLocation = "images/" . $myimage->file_dst_name;
   

  $query = "INSERT INTO posts (image, username, description) VALUES ('$myimageLocation', '$username', '$mydescription')";
  $addUser = mysqli_query($conn,$query)or die("Could Not Perform the Query");

  if(mysqli_affected_rows($conn) == 1){ 
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
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

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
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="timeline.php" style="color: rgb(4, 142, 255)">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="userProfile.php" >Profile</a>
            </li>
            <li class="nav-item">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                 Create Post</button>
            </li>
          </ul>
        </div>
      </nav>
        <div class="row">
          <div class="col-12">
            <!-- loop through to enter post -->
            <?php 
              $sql = "SELECT * FROM posts ORDER BY ID DESC";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
                echo '<div class= "post">
                  <div class= "postHeader"> <h3> '.$row["username"].' </h3> </div>
                  <div > <img class = "postImage" src= '.$row["image"].'> </div>
                  <div class= "postDescription"> <p>'.$row["description"].'
                  </p> </div>
                </div>';
              }
            ?>
          <!-- Modal form for adding post -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form enctype="multipart/form-data" action= "timeline.php" method="POST">       
                      <div class="form-group">
                          <input type="file" class="form-control"  required="required" name = "file1">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Description" required="required" name = "description">
                      </div>   
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block" name = "createPostButton" value = "createPostButton" >Submit</button>
                      </div>     
                  </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <!--  -->
          </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>