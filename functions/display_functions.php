<?php

session_start();
include("helper_functions.php");


function print_cards($id)
{
     global $con;

     $query = "select * from algo where grp_id = $id";

     $run_query = mysqli_query($con, $query);

     while ($row = mysqli_fetch_array($run_query)) {
          $name = $row['name'];
          // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";

          echo "
          <div class='card'>
            <img class='card-image' src='../images/sort2.gif' alt='Sorting image'>
            <div class='container'>
                <div class='card-title'>
                    <h2>$name Algorithms</h2>
                </div>
                <div class='card-buttons'>
                    <button class='btn-primary'><a href='#'>Tutorials</a></button>
                    <button class='btn-danger'>Visualize</button>
                </div>
            </div>
            <br>
        </div>
     ";
     }
}


function display_header()
{

     $auth = "Login";
     if (isset($_SESSION['name'])) {
          $auth = "Logout";
     }


     echo "
          <nav>
          <div class='logo'><a href = 'index.php'>Algo <span>Visualization</span></a></div>

          <label for='btn' class='icon'>
               <span class='fa fa-bars'></span>
          </label>
          <input type='checkbox' id='btn'>

          <ul>
               <li>
                    <label for='btn-1' class='show'>Pathfinding + </label>
                    <a href='#'>Pathfinding</a>
                    <input type='checkbox' id='btn-1'>
                    <ul>
                         ";
     get_pathfinding_algo();
     echo "
                    </ul>
               </li>
               <li>
                    <label for='btn-2' class='show'>Searching + </label>
                    <a href='#'>Searching</a>
                    <input type='checkbox' id='btn-2'>
                    <ul>
                         ";
     get_search_algo();
     echo "
                    </ul>
               </li>
               <li>
                    <label for='btn-3' class='show'>Sorting + </label>
                    <a href='#'>Sorting</a>
                    <input type='checkbox' id='btn-3'>
                    <ul>
                         ";
     get_sort_algo();
     echo "
                    </ul>
               </li>

               <li>
                    <label for='btn-4' class='show'>More + </label>
                    <a href='#'>More</a>
                    <input type='checkbox' id='btn-4'>
                    <ul> ";

     if (isset($_SESSION['user_id'])) {
          echo "<li><a href='../functions/logout.php'>Logout</a></li>";
     } else {
          echo "<li><a href='../templates/authentication.php'>Login</a></li>";
     }

     echo "
                         <li><a href='./templates/about.php'>About</a></li>
                    </ul>
               </li>";

     if (isset($_SESSION['user_id'])) {
          echo "
               <li><a href='#'>Notes</a></li>
               <li><a href='#'>Bookmarks</a></li>
               ";
     } else {
          echo "
               <li><a href='../templates/invalid_access.php'>Notes</a></li>
               <li><a href='../templates/invalid_access.php'>Bookmarks</a></li>
               ";
     }

     echo "</ul></nav>";
}
