<?php
include("../config/db.php");

$array_of_bookmarks = array();

if (isset($_GET['id']) && isset($_GET['bm'])) {
  $users_id = $_GET['id'];
  $algo_id = $_GET['bm'];

  $sql = "SELECT * FROM bookmark where users_id='$users_id'   ";
  $result = mysqli_query($con, $sql);
  // echo mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_assoc($result);
    $value = $rows['algo_id'];



    echo print_r(unserialize($value)) ;

    $array_of_bookmarks = unserialize($value);
    // print_r($array_of_bookmarks);

    array_push($array_of_bookmarks, $algo_id);
    $string_bookmark_array = serialize($array_of_bookmarks);

    $sql = "UPDATE bookmark SET algo_id='$string_bookmark_array'  WHERE users_id='$users_id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
      echo "UPDATE";
    } else {
      echo "NOT UPDATE";
      echo ("Error description: " . mysqli_error($con));
    }
  } else {
    array_push($array_of_bookmarks, $algo_id);
    $string_bookmark_array = serialize($array_of_bookmarks);


    $sql = "INSERT INTO bookmark(users_id,algo_id) VALUES('$users_id','$string_bookmark_array')";

    $result = mysqli_query($con, $sql);
    if ($result) {
      echo "INSERTED";
    } else {
      echo "NOT INSERTED";
      echo ("Error description: " . mysqli_error($con));
    }
  }







}
