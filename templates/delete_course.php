<?php
include("../config/db.php");

$array_of_bookmarks = array();

if (isset($_GET['id']) && isset($_GET['bm'])) {
    $users_id = $_GET['id'];
    $algo_delete_id = $_GET['bm'];
    $sql = "SELECT * FROM algo where algo_id='$algo_delete_id'   ";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($result);
    $name = $rows['name'];

    $sql = "SELECT * FROM course where user_id='$users_id'   ";
    $result = mysqli_query($con, $sql);
    // echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['course_completion'];
         $array_of_courses = unserialize($value);
         $array_of_courses[$name]=0;

        $string_course_array = serialize($array_of_courses);

        $sql = "UPDATE course SET course_completion='$string_course_array'  WHERE user_id='$users_id'";
    
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