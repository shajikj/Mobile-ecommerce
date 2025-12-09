<?php 
    #Post #GET
    if(isset($_POST['calculate_two_numbers'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $sum = $num1 + $num2;
        echo "The sum of $num1 and $num2 is: $sum";
    }
?>