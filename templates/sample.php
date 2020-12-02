<?php

include('../functions/display_functions.php');

include('../config/db.php');
?>
        <!-- addbookmark(data, user_id); -->
<?php
        // $a=array(1=>0,2=>1,3=>1,4=>0,10=>1,11=>1,12=>0,13=>0,14=>0,15=>1,23=>1,24=>1,25=>1,26=>1,);
    // echo mysqli_num_rows($result);
    $sql = "SELECT * FROM course where user_id='10'   ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['course_completion'];



        // echo print_r(unserialize($value)) ;

        $a = unserialize($value);
   
        perecentage_calculator(1, $a);
        perecentage_calculator(2, $a);
        perecentage_calculator(3, $a);
    }
        ?>
