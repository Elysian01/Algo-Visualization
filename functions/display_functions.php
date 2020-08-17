<?php

session_start();
include("helper_functions.php");

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
