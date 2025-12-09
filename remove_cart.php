<?php
session_start();

if (isset($_GET['key'])) {
    $cart_key = $_GET['key'];

    if (isset($_SESSION['cart'][$cart_key])) {
        unset($_SESSION['cart'][$cart_key]);
    }
}

header("Location: add_to_cart.php");
exit;
?>
