<?php

include('../functions/display_functions.php');

include('../config/db.php');
?>

<?php 
// echo $_SESSION['user_id'];
if (isset($_SESSION['user_id'])) {
      $users_id=$_SESSION['user_id'];
      $sql = "SELECT * FROM bookmark where users_id='$users_id'   ";

      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {

      $rows = mysqli_fetch_assoc($result);
      $value = $rows['algo_id'];
      $array_of_bookmarks = unserialize($value);
 
      if (empty($array_of_bookmarks)) {
        // list is empty.
        echo "<h1 style=' display: flex;
        justify-content: center;
        align-items: center;'>No Bookmarks yet !</h1>";
   }else{
    foreach ($array_of_bookmarks as $item) {
      print_bookmark_cards($item);
    }
   }
     }
      else{
        echo "<h1 style=' display: flex;
        justify-content: center;
        align-items: center;'>No Bookmarks yet !</h1>";
      }
    }else{
      echo '     <div class="container">
      <h1>Please Login First !</h1>
      <br>
      <button class="btn-primary btn-hover mr-50"><a href="./authentication.php">Login</a></button>
      <button class="btn-dark btn-hover"><a href="../index.php">Back to Homepage <i class="fa fa-arrow-right"></i></a></button>
 </div>';
    }
?>