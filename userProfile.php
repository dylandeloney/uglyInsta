
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
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
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
              <tbody>
                <!-- USE PHP TO LOOP THROUGH POST DATABASE FROM THIS USER BY POST ID AND OUTPUT IMAGE AND INFO HOPEFULLY IN REVERSE-->
                <?php
                    $sql = "SELECT * FROM posts WHERE username = '$username'";
                    $result = mysqli_query($conn,$sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                      if($counter % 3 == 0){
                        Echo  '<tr>
                                <td><img class = "tableImage" src= '.$row["image"].'>
                                <form method = "POST">
                                    <input type="hidden" name="id" value= '.$row["ID"].' />
                                    <input type="hidden" name="image" value= '.$row["image"].' />
                                    <input type = "submit" name = "delete" value = "Delete" class="btn btn-danger btn-lg" >
                                </form>
                                </td> ';
                        $counter++;
                      }else if($counter % 3 == 2){
                        Echo '<td><img class = "tableImage" src= '.$row["image"].'>
                        <form method = "POST">
                            <input type="hidden" name="id" value= '.$row["ID"].' />
                            <input type="hidden" name="image" value= '.$row["image"].' />
                            <input type = "submit" name = "delete" value = "Delete" class="btn btn-danger btn-lg" >
                        </form> 
                        </td></tr>';
                       $counter++;
                      }else{
                        Echo '<td><img class = "tableImage" src= '.$row["image"].'>
                        <form method = "POST">
                            <input type="hidden" name="id" value= '.$row["ID"].' />
                            <input type="hidden" name="image" value= '.$row["image"].' />
                            <input type = "submit" name = "delete" value = "Delete" class="btn btn-danger btn-lg" >
                        </form>
                        </td>';
                        Echo $row["image"];
                       $counter++;
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $postToDelete = mysqli_real_escape_string($conn,$_POST['id']);
        $filename = mysqli_real_escape_string($conn,$_POST['image']);
        

        $sql = "DELETE FROM posts WHERE ID = '$postToDelete'";

          if (file_exists($filename)) {
            unlink($filename);
            echo 'File '.$filename.' has been deleted';
          } else {
            echo 'Could not delete '.$filename.', file does not exist';
          }
        
        $deletePost = mysqli_query($conn,$sql);

        if(mysqli_affected_rows($conn) == 1)
            { 
              header("location: userProfile.php");
            }
            else 
            {
              $error = "Could not delete post.";
              echo $error;
            }
        
        
}

?>