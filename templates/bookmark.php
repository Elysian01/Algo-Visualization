<?php

include('../functions/display_functions.php');

include('../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/homepage.css">
  <link rel="icon" href="../images/logo.png">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <?php display_header(); ?>
  <!-- print_bookmark_cards -->
  <br>
  <h1 class="container"><i class="fas fa-graduation-cap"></i>Your Favourite Algorithms</h1>
  <br>
  <div class="card-deck" id="card-decks">

  </div>
  <?php display_footer(); ?>
  <script>
    // console.log(document.getElementById("card-decks"))
    loadData();

    function loadData() {
      var request = new XMLHttpRequest();
      request.open("GET", "http://localhost/Algo-Visualization/templates/view_bookmark.php", true);
      request.send();
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          console.log(request.responseText);
          document.getElementById("card-decks").innerHTML = request.responseText;
        }
      }
    }

    function deletebookmark(data, user_id) {


      var request = new XMLHttpRequest();
      request.open("GET", "http://localhost/Algo-Visualization/templates/delete_bookmark.php?bm=" + data + "&id=" + user_id, true);
      request.send();
      request.onreadystatechange = function() {
        console.log(request.responseText);
      }
      loadData();
    }
  </script>
</body>

</html>