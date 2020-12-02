<?php
include("../config/db.php");

// $array_of_courses = array();129
$array_of_courses=array('BFS'=>0,'DFS'=>0,'Dijkstra'=>0,'A star'=>0,'Best'=>0,'Bubble'=>0,'Selection'=>0,'Insertion'=>0,'Merge'=>0,'Quick'=>0,'Heap'=>0,'Linear'=>0,'Jump'=>0,'Binary'=>0,'Exponential'=>0,);

if (isset($_GET['id']) && isset($_GET['bm'])) {
    $users_id = $_GET['id'];
    $algo_id = $_GET['bm'];
    $sql = "SELECT * FROM algo where algo_id='$algo_id'   ";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($result);
    $name = $rows['name'];

    $sql = "SELECT * FROM course where user_id='$users_id'   ";
    $result = mysqli_query($con, $sql);

    // echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['course_completion'];



        // echo print_r(unserialize($value)) ;

        $array_of_courses = unserialize($value);
        // print_r($array_of_bookmarks);
        $array_of_courses[$name]=1;
        // array_push($array_of_bookmarks, $algo_id);
        $string_course_array = serialize($array_of_courses);

        $sql = "UPDATE course SET course_completion	='$string_course_array'  WHERE user_id='$users_id'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "UPDATE";
        } else {
            echo "NOT UPDATE";
            echo("Error description: " . mysqli_error($con));
        }
    } else {
        // array_push($array_of_bookmarks, $algo_id);
       



        $array_of_courses[  $name]=1;
         $string_course_array = serialize($array_of_courses);
        // print_r($array_of_courses);
    
        $sql = "INSERT INTO course (user_id,course_completion) VALUES('$users_id','$string_course_array')";
                $result = mysqli_query($con, $sql);
        if ($result) {
          echo "INSERTED";
        } else {
          echo "NOT INSERTED";
          echo ("Error description: " . mysqli_error($con));
        }
}
}


