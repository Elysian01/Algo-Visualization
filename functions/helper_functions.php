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
