<?php
// session_start();
include "includes/config.php";

$product_id = $_GET['product_id'];
$color_id = $_GET['color_id'];

if (isset($_SESSION['USER_LOGIN'])) {
    $user_id = $_SESSION['USER_ID'];
    mysqli_query($conn,
        "DELETE FROM cart 
         WHERE user_id='$user_id' 
         AND product_id='$product_id'
         AND color_id='$color_id'"
    );
} else {
    unset($_SESSION['cart'][$product_id][$color_id]);
}

header("Location: cart.php");
exit;

?>