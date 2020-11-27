<?php
include("../config/db.php");

$array_of_bookmarks = array();

if (isset($_GET['id']) && isset($_GET['bm'])) {
    $users_id = $_GET['id'];
    $algo_delete_id = $_GET['bm'];

    $sql = "SELECT * FROM bookmark where users_id='$users_id'   ";
    $result = mysqli_query($con, $sql);
    // echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['algo_id'];
         $array_of_bookmarks = unserialize($value);
          array_splice($array_of_bookmarks, array_search($algo_delete_id, $array_of_bookmarks), 1);

        $string_bookmark_array = serialize($array_of_bookmarks);

        $sql = "UPDATE bookmark SET algo_id='$string_bookmark_array'  WHERE users_id='$users_id'";
    
        $result = mysqli_query($con, $sql);
        if ($result) {
          echo "DELETED";
        } else {
          echo "NOT DELETED";
          echo ("Error description: " . mysqli_error($con));
        }

        

       

    }
}

?>