<?php

include("../config/db.php");

function get_search_algo()
{
    global $con;

    $query = "select * from algo where grp_id = 3";

    $run_query = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($run_query)) {
        $name = $row['name'];
        $algoid = $row['algo_id'];
        // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        echo "<li><a href='./tutorial-content.php?id=$algoid'>$name</a></li>";
    }
}

function get_sort_algo()
{
    global $con;

    $query = "select * from algo where grp_id = 2";

    $run_query = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($run_query)) {
        $name = $row['name'];
        $algoid = $row['algo_id'];
        // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        echo "<li><a href='./tutorial-content.php?id=$algoid'>$name</a></li>";
    }
}

function get_pathfinding_algo()
{
    global $con;

    $query = "select * from algo where grp_id = 1";

    $run_query = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($run_query)) {
        $name = $row['name'];
        $algoid = $row['algo_id'];
        // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        echo "<li><a href='./tutorial-content.php?id=$algoid'>$name</a></li>";
    }
}

function perecentage_calculator($algo,$algo_array){
// echo $algo;
// print_r($algo_array); 
// echo  "\r\n";
// echo "<pre>";
if($algo==1){
    // print_r(array_slice($algo_array,0,4));
    $sub_array=array_slice($algo_array,0,4);
    $sum_of_sub_array=array_sum($sub_array);
    $percent=round(($sum_of_sub_array/5)*100,2);
    $_SESSION["pathfinding_percent"] =  $percent;
// echo $_SESSION["pathfinding_percent"];
}elseif($algo==2){
    // print_r(array_slice($algo_array,4,6));
    $sub_array=array_slice($algo_array,4,6);
    $sum_of_sub_array=array_sum($sub_array);
    $percent=round(($sum_of_sub_array/6)*100,2);
    $_SESSION["sorting_percent"] =  $percent;
    // echo $_SESSION["sorting_percent"];
}elseif($algo==3){
    // print_r(array_slice($algo_array,10));
    $sub_array=array_slice($algo_array,10);
    $sum_of_sub_array=array_sum($sub_array);
    $percent=round(($sum_of_sub_array/4)*100,2);
    $_SESSION["searching_percent"] =  $percent;
    // echo $_SESSION["searching_percent"];
}else{
    echo "ERROR";
}

// echo "</pre>";

}