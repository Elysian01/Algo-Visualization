<?php
include("../functions/display_functions.php");
include("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_SESSION['user_id'])) {
$users_id = $_SESSION['user_id'];
$sql = "SELECT * FROM course where user_id=$users_id 	  ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['course_completion'];

        $a = unserialize($value);
   perecentage_calculator(1, $a);
        perecentage_calculator(2, $a);
        perecentage_calculator(3, $a);
    }}

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="icon" href="../images/logo.png">
    <title>Algo | Courses</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #e7e7e7;
        }

        button {
            outline: none;
        }

        button:focus {
            outline: none;
        }

        :root {
            --sort-color: #e40046;
            --search-color: #7579e7;
            --pathfinding-color: #00bdaa;
        }

        .course {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            max-width: 100%;
            width: 700px;
            margin: 50px auto;
        }

        .course h6 {
            opacity: 1;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .course h2 {
            opacity: 1;
            margin: 10px 0;
            font-size: 23px;
        }

        .sort-preview {
            background: var(--sort-color);
            color: #fff;
            padding: 30px;
            width: 250px;
            position: relative;
        }

        .search-preview {
            background: var(--search-color);
            color: #fff;
            padding: 30px;
            width: 250px;
            position: relative;
        }

        .pathfinding-preview {
            background: var(--pathfinding-color);
            color: #fff;
            padding: 30px;
            width: 250px;
            position: relative;
        }

        .sort-preview a,
        .search-preview a,
        .pathfinding-preview a {
            color: #fff;
            font-size: 12px;
            margin-top: 30px;
            opacity: 1;
            text-decoration: none;
        }

        .sort-preview a:hover,
        .search-preview a:hover,
        .pathfinding-preview a:hover {
            text-decoration: underline;
        }

        .info {
            padding: 30px;
            position: relative;
            width: 100%;
        }

        .progress-wrapper {
            position: absolute;
            top: 27px;
            right: 20px;
            text-align: right;
            width: 150px;
        }

        .sort-progress {
            background-color: #ddd;
            border-radius: 3px;
            height: 8px;
            width: 100%;
        }

        .search-progress {
            background-color: #ddd;
            border-radius: 3px;
            height: 8px;
            width: 100%;
        }

        .pathfinding-progress {
            background-color: #ddd;
            border-radius: 3px;
            height: 8px;
            width: 100%;
        }

        .sort-progress::after {
            content: '';
            border-radius: 3px;
            position: absolute;
            background-color: var(--sort-color);
            top: 0;
            left: 0;
            height: 8px;
            width: <?php echo $_SESSION["sorting_percent"]; ?>%;
        }

        .search-progress::after {
            content: '';
            border-radius: 3px;
            position: absolute;
            background-color: var(--search-color);
            top: 0;
            left: 0;
            height: 8px;
            width: <?php echo $_SESSION["searching_percent"]; ?>%;
        }

        .pathfinding-progress::after {
            content: '';
            border-radius: 3px;
            position: absolute;
            background-color: var(--pathfinding-color);
            top: 0;
            left: 0;
            height: 8px;
            width: <?php echo $_SESSION["pathfinding_percent"]; ?>%;
            
        }

        .sort-progress-text {
            font-size: 15px;
            opacity: 0.8;
            letter-spacing: 1px;
            position: absolute;
            top: 10px;
            right: 5px;
            color: var(--sort-color);
            font-weight: bold;
        }

        .search-progress-text {
            font-size: 15px;
            opacity: 0.8;
            letter-spacing: 1px;
            position: absolute;
            top: 10px;
            right: 5px;
            color: var(--search-color);
            font-weight: bold;
        }

        .pathfinding-progress-text {
            font-size: 15px;
            opacity: 0.8;
            letter-spacing: 1px;
            position: absolute;
            top: 10px;
            right: 5px;
            color: var(--pathfinding-color);
            font-weight: bold;
        }

        .info-title {
            color: #000;
            font-weight: bold;
            position: absolute;
            top: 8px;
            line-height: 16px;
        }

        .sort span {
            color: var(--sort-color);
        }

        .search span {
            color: var(--search-color);
        }

        .pathfinding span {
            color: var(--pathfinding-color);
        }

        .algo-btns {
            width: 100%;
            display: inline;
        }

        .sort-algo-btn {
            padding: 10px 15px;
            margin: 4px;
            margin-top: 8px;
            border-radius: 30px;
            background-color: transparent;
            color: var(--sort-color);
            border: 1px solid var(--sort-color);
            font-weight: bold;
            transition: all 0.4s ease;
            cursor: pointer;

        }

        .search-algo-btn {
            padding: 10px 15px;
            margin: 4px;
            margin-top: 8px;
            border-radius: 30px;
            background-color: transparent;
            color: var(--search-color);
            border: 1px solid var(--search-color);
            font-weight: bold;
            transition: all 0.4s ease;
            cursor: pointer;

        }

        .pathfinding-algo-btn {
            padding: 10px 15px;
            margin: 4px;
            margin-top: 8px;
            border-radius: 30px;
            background-color: transparent;
            color: var(--pathfinding-color);
            border: 1px solid var(--pathfinding-color);
            font-weight: bold;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .sort-algo-btn:hover {
            background-color: var(--sort-color);
            color: #fff;
            transform: scale(1.2);
        }

        .search-algo-btn:hover {
            background-color: var(--search-color);
            color: #fff;
            transform: scale(1.2);
        }

        .pathfinding-algo-btn:hover {
            background-color: var(--pathfinding-color);
            color: #fff;
            transform: scale(1.2);
        }

        .sort-visualize {
            display: inline;
            float: right;
            padding: 10px 15px;
            margin: 5px;
            background-color: var(--sort-color);
            color: #fff;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 2px 4px 8px 3px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
        }

        .search-visualize {
            display: inline;
            float: right;
            padding: 10px 15px;
            margin: 5px;
            background-color: var(--search-color);
            color: #fff;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 2px 4px 8px 3px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
        }

        .pathfinding-visualize {
            display: inline;
            float: right;
            padding: 10px 15px;
            margin: 5px;
            background-color: var(--pathfinding-color);
            color: #fff;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 2px 4px 8px 3px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
        }

        .sort-visualize:hover {
            background-color: transparent;
            color: var(--sort-color);
            transform: scale(1.2);
            border: 1px solid var(--sort-color);
        }

        .search-visualize:hover {
            background-color: transparent;
            color: var(--sort-color);
            transform: scale(1.2);
            border: 1px solid var(--search-color);
        }

        .pathfinding-visualize:hover {
            background-color: transparent;
            color: var(--pathfinding-color);
            transform: scale(1.2);
            border: 1px solid var(--pathfinding-color);
        }

        footer {

            position: relative !important;
        }



        @media(max-width:768px) {
            .course {
                flex-direction: column;
                width: 90%;
            }

            .sort-preview,
            .search-preview,
            .pathfinding-preview {
                width: 100%;
            }

            .sort-preview h2,
            .search-preview h2,
            .pathfinding-preview h2 {
                margin: 8px 0 0;
            }

            .sort-preview a,
            .search-preview a,
            .pathfinding-preview a {
                margin-top: 10px;
            }

            .info h2 {
                margin: 20px
            }

            .algo-btns {
                display: block;
            }

            .info-title {
                position: relative;
                line-height: 28px;
            }

            .no-mobile {
                display: none;
            }

            .pathfinding-algo-btn,
            .search-algo-btn,
            .sort-algo-btn {
                padding: 10px 12px;
                margin: 3px;
            }
    </style>
</head>

<body>
    <?php display_header(); ?>

    <br>
    <h1 class="container"><i class="fas fa-graduation-cap"></i> Start Learning Awesome Algorithms Now!</h1>

    <div class="container">

        <div class="course">
            <div class="sort-preview">
                <h6>Course</h6>
                <h2>Sorting Algorithms</h2>
                <a href="./tutorial_nav.php?grp_id=2">View All Chapters</a>
            </div>

            <div class="info">
                <h2 class="info-title sort"><span><i class="fab fa-battle-net"></span></i> Start <span>Learning !!</span></h2>
                <div class="progress-wrapper">
                    <div class="sort-progress">
                        <span class="sort-progress-text"><?php echo $_SESSION["sorting_percent"]; ?>%</span>
                    </div>
                </div>
                <br class="no-mobile">

                <div class="algo-btns">
                <?php
                                global $con;

                                $query = "select * from algo where grp_id = 2";
                                
                                $run_query = mysqli_query($con, $query);
                                
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $name = $row['name'];
                                    $algoid = $row['algo_id'];
                                   $link= './tutorial-content.php?id='.$algoid;
                                   echo  "<a href='$link'><button class='sort-algo-btn'>$name</button></a>";
                                }
                ?>

               
                </div>

                <a href="sorting.html"><button class="sort-visualize">Visualize</button></a>
            </div>
        </div>

        <div class="course">
            <div class="search-preview">
                <h6>Course</h6>
                <h2>Searching Algorithms</h2>
                <a href="./tutorial_nav.php?grp_id=3">View All Chapters</a>
            </div>

            <div class="info">
                <h2 class="info-title search"><span><i class="fab fa-battle-net"></span></i> Start <span>Learning !!</span></h2>
                <div class="progress-wrapper">
                    <div class="search-progress">
                        <span class="search-progress-text"><?php echo $_SESSION["searching_percent"]; ?>%</span>
                    </div>
                </div>
                <br class="no-mobile">

                <div class="algo-btns">
                <?php
                                global $con;

                                $query = "select * from algo where grp_id = 3";
                                
                                $run_query = mysqli_query($con, $query);
                                
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $name = $row['name'];
                                    $algoid = $row['algo_id'];
                                   $link= './tutorial-content.php?id='.$algoid;
                                   echo  "<a href='$link'><button class='search-algo-btn'>$name</button></a>";
                                }
                ?>
                </div>

                <a href="search.html"><button class="search-visualize">Visualize</button></a>
            </div>
        </div>

        <div class="course">
            <div class="pathfinding-preview">
                <h6>Course</h6>
                <h2>Pathfinding Algorithms</h2>
                <a href="tutorial_nav.php?grp_id=1">View All Chapters</a>
            </div>

            <div class="info">
                <h2 class="info-title pathfinding"><span><i class="fab fa-battle-net"></span></i> Start <span>Learning !!</span></h2>
                <div class="progress-wrapper">
                    <div class="pathfinding-progress">
                        <span class="pathfinding-progress-text"><?php echo $_SESSION["pathfinding_percent"]; ?>%</span>
                    </div>
                </div>
                <br class="no-mobile">

                <div class="algo-btns">
                <?php
                                global $con;

                                $query = "select * from algo where grp_id = 1";
                                
                                $run_query = mysqli_query($con, $query);
                                
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $name = $row['name'];
                                    $algoid = $row['algo_id'];
                                   $link= './tutorial-content.php?id='.$algoid;
                                   echo  "<a href='$link'><button class='pathfinding-algo-btn'>$name</button></a>";
                                }
                ?>
                </div>

                <a href="pathfinding.html"><button class="pathfinding-visualize">Visualize</button></a>
            </div>
        </div>
    </div>
    <br>

    <?php display_footer(); ?>



</body>

</html>