<?php

include('../functions/display_functions.php');

include('../config/db.php');
?>

<?php 
if (isset($_SESSION['user_id'])) {
      $users_id=$_SESSION['user_id'];
      $sql = "SELECT * FROM bookmark where users_id='$users_id'   ";
      $result = mysqli_query($con, $sql);
      $rows = mysqli_fetch_assoc($result);
      $value = $rows['algo_id'];
      $array_of_bookmarks = unserialize($value);
      foreach ($array_of_bookmarks as $item) {
        print_bookmark_cards($item);
      }
    }
?>