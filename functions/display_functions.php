<?php

session_start();
include("helper_functions.php");


function print_cards($id)
{
     global $con;

     $query = "select * from algo where grp_id = $id";

     if ($id == 1) {
          $link = "./pathfinding.html";
     } elseif ($id == 2) {
          $link = "./sorting.html";
     } else {
          $link = "./search.html";
     }

     $run_query = mysqli_query($con, $query);

     while ($row = mysqli_fetch_array($run_query)) {
          $name = $row['name'];
          $image = $row['image'];
          $algo_id=$row['algo_id'];
          // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
          $tutorial_link="./tutorial-content.php?id=".$algo_id;
          echo "
          <div class='card'>
            <img class='card-image' src='../images/preview/$image' alt='Sorting image'>
            <div class='container'>
                <div class='card-title'>
                    <h2>$name Algorithm</h2>
                </div>
                <div class='card-buttons'>
                    <button class='btn-primary'><a href='$tutorial_link'>Tutorials</a></button>
                    <a href='$link'><button class='btn-danger'>Visualize</button></a>
                </div>
            </div>
            <br>
        </div>
     ";
     }
}

function print_bookmark_cards($id)
{
     global $con;

     $query = "select * from algo where algo_id = $id";
     $sesion_user_id = $_SESSION['user_id'];

     $run_query = mysqli_query($con, $query);

     while ($row = mysqli_fetch_array($run_query)) {
          $name = $row['name'];
          $image = $row['image'];
          $grp_id = $row['grp_id'];
          if ($grp_id == 1) {
               $link = "./pathfinding.html";
          } elseif ($grp_id == 2) {
               $link = "./sorting.html";
          } else {
               $link = "./search.html";
          }

          // echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
          $tutorial_link = "./tutorial-content.php?id=" . $id;
          echo "
          <div class='card'>
            <img class='card-image' src='../images/preview/$image' alt='Sorting image'>
            <div class='container'>
                <div class='card-title'>
                    <h2>$name Algorithm</h2>
                </div>
                <div class='card-buttons'>
                    <button class='btn-primary'><a href='$tutorial_link'>Tutorials</a></button>
                    <a href='$link'><button class='btn-danger'>Visualize</button></a>
                    <br>
                    <button onclick=\"deletebookmark( $id,$sesion_user_id)\" class='btn-danger mt-2'  style='margin-top:3px;'>Delete</button>
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
          ";

     if (!isset($_SESSION['email'])) {
          echo "<li><a href='../templates/authentication.php'>Login</a></li>";
     }

     echo "
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
               </li>";


     if (isset($_SESSION['email'])) {
          echo "
               <li><a href='../templates/courses.php'>Course</a></li>
               <li><a href='../templates/bookmark.php'>Bookmarks</a></li>
               ";
     } else {
          echo "
               <li><a href='../templates/invalid_access.php'>Course</a></li>
               <li><a href='../templates/invalid_access.php'>Bookmarks</a></li>
               ";
     }

     if (isset($_SESSION['email'])) {
          echo "<li><a href='logout.php'>Logout</a></li>";
     }

     echo "</ul></nav>";
}
function display_footer(){
  echo ' <div class="grid-container">
     <div class="inner-container">
     Ansh Mitesh Chhadva
     </div>
     <div class="inner-container">
     Gladina Raymond
     </div>
     <div class="inner-container">
     Abhishek Gupta 
     </div>
     </div>';
}