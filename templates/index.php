<?php
include("../functions/display_functions.php");
include("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../css/homepage.css">
     <link rel="icon" href="../images/logo.png">
     <title>Algo Visualization</title>
</head>

<body>

     <?php display_header(); ?>

     <br>
     <h1 class="container"><i class="fas fa-graduation-cap"></i> Explore Awesome Algorithms !</h1>

     <br>
     <div class="card-deck">
          <div class="card">
               <img class="card-image" src="../images/sort2.gif" alt="Sorting image">
               <div class="container">
                    <div class="card-title">
                         <h2>Sorting Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary"><a href="./tutorial_nav.php?grp_id=2">Tutorials</a></button>
                         <a href="sorting.html"><button class="btn-danger">Visualize</button></a>
                    </div>
               </div>
               <br>
          </div>
          <div class="card">
               <img class="card-image" src="../images/pathfinding.gif" alt="Pathfinding image">
               <div class="container">
                    <div class="card-title">
                         <h2>Pathfinding Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary"><a href="./tutorial_nav.php?grp_id=1">Tutorials</a></button>
                         <a href="./pathfinding.html"><button class="btn-danger">Visualize</button></a>
                    </div>
               </div>
               <br>
          </div>
          <div class="card">
               <img class="card-image" src="../images/avl.gif" alt="Searching image">
               <div class="container">
                    <div class="card-title">
                         <h2>Searching Algorithms</h2>
                    </div>
                    <div class="card-buttons">
                         <button class="btn-primary"><a href="./tutorial_nav.php?grp_id=3">Tutorials</a></button>
                         <a href="search.html"> <button class="btn-danger">Visualize</button></a>
                    </div>
               </div>
               <br>
          </div>
     </div>

</body>

</html>