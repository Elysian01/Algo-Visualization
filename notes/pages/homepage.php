<?php
include("functions/display_functions.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="./css/homepage.css">
     <title>Homepage</title>
</head>

<body>
     <!-- <nav>
          <div class="logo">Algo <span>Visualization</span></div>

          <label for="btn" class="icon">
               <span class="fa fa-bars"></span>
          </label>
          <input type="checkbox" id="btn">

          <ul>
               <li>
                    <label for="btn-1" class="show">Pathfinding + </label>
                    <a href="#">Pathfinding</a>
                    <input type="checkbox" id="btn-1">
                    <ul>
                         <li><a href="#">Dijkstra</a></li>
                         <li><a href="#">A star</a></li>
                         <li><a href="#">BFS</a></li>
                         <li><a href="#">DFS</a></li>
                         <li><a href="#">Bidirectional</a></li>
                    </ul>
               </li>
               <li>
                    <label for="btn-2" class="show">Searching + </label>
                    <a href="#">Searching</a>
                    <input type="checkbox" id="btn-2">
                    <ul>
                         <li><a href="#">Linear</a></li>
                         <li><a href="#">Jump</a></li>
                         <li><a href="#">Binary</a></li>
                         <li><a href="#">Exponential</a></li>
                         <li><a href="#">Fibonacci</a></li>
                    </ul>
               </li>
               <li>
                    <label for="btn-3" class="show">Sorting + </label>
                    <a href="#">Sorting</a>
                    <input type="checkbox" id="btn-3">
                    <ul>
                         <li><a href="#">Linear</a></li>
                         <li><a href="#">Bubble</a></li>
                         <li><a href="#">Merge</a></li>
                         <li><a href="#">Quick</a></li>
                         <li><a href="#">Insertion</a></li>
                         <li><a href="#">Selection</a></li>
                         <li><a href="#">Heap</a></li>
                    </ul>
               </li>

               <li>
                    <label for="btn-4" class="show">More + </label>
                    <a href="#">More</a>
                    <input type="checkbox" id="btn-4">
                    <ul>
                         <li><a href="./templates/authentication.php">Login</a></li>
                         <li><a href="./templates/about.php">About</a></li>
                    </ul>
               </li>

               <li><a href="#">Notes</a></li>
               <li><a href="#">Bookmarks</a></li>

          </ul>
     </nav> -->

     <?php display_header(); ?>
     <br>
     <h1 class="container"><i class="fas fa-graduation-cap"></i> Explore Algorithms</h1>

     <br>
     <div class="card-deck">
          <div class="card">
               <img class="card-image" src="./images/sort2.gif" alt="Sorting image">
               <div class="container">
                    <div class="card-title">
                         <h2>Sorting Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary">Tutorials</button>
                         <button class="btn-danger">Visualize</button>
                    </div>
               </div>
               <br>
          </div>
          <div class="card">
               <img class="card-image" src="./images/pathfinding.gif" alt="Pathfinding image">
               <div class="container">
                    <div class="card-title">
                         <h2>Pathfinding Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary">Tutorials</button>
                         <button class="btn-danger">Visualize</button>
                    </div>
               </div>
               <br>
          </div>
          <div class="card">
               <img class="card-image" src="./images/avl.gif" alt="Searching image">
               <div class="container">
                    <div class="card-title">
                         <h2>Searching Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary">Tutorials</button>
                         <button class="btn-danger">Visualize</button>
                    </div>
               </div>
               <br>
          </div>
     </div>

</body>

</html>