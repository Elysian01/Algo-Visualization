<?php
include("../functions/display_functions.php");
include("../config/db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="icon" href="../images/logo.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Algo Visualization</title>
</head>

<body>
    <?php display_header(); ?>

    <br>
    <h1 class="container"><i class="fas fa-graduation-cap"></i> Explore Awesome Algorithms !</h1>
    <br>
    <div class="card-deck">
        <?php
        if (isset($_GET['grp_id'])) {
            $id = $_GET['grp_id'];
            print_cards($id);
        }
        ?>
    </div>

</body>

</html>