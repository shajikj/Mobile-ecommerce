<?php
session_start();
include "includes/config.php";
if (empty($_SESSION['cart'])) {
    header("Location: add_to_cart.php");
    exit;
}
if (isset($_POST['submit'])) {

    $name       = $_POST['name'];
    $phone      = $_POST['phone'];
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $city       = $_POST['city'];
    $state      = $_POST['state'];
    $pincode    = $_POST['pincode'];
    $country    = $_POST['country'];
    $notes      = $_POST['order_note'];
    $payment    = $_POST['payment_type'];

    // Build full address
    $full_address = $address . ", " . $city . ", " . $state . " - " . $pincode . ", " . $country;

    // Calculate total
    $total_amount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_amount += $item['price'] * $item['qty'];
    }

    // INSERT INTO orders table
    $user_id = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : 0;

    $insert_order = "INSERT INTO orders 
        (user_id, full_name, phone, email, address, payment_type, total_amount) 
        VALUES 
        ('$user_id', '$name', '$phone', '$email', '$full_address', '$payment', '$total_amount')";
    
    mysqli_query($conn, $insert_order);

    // Get the new order ID
    $order_id = mysqli_insert_id($conn);

    // Insert products into order_items table
    foreach ($_SESSION['cart'] as $item) {

        $pid        = $item['id'];
        $pname      = $item['name'];
        $price      = $item['price'];
        $qty        = $item['qty'];
        $total      = $price * $qty;

        mysqli_query($conn, 
            "INSERT INTO order_items (order_id, product_id, product_name, price, qty, total)
             VALUES ('$order_id', '$pid', '$pname', '$price', '$qty', '$total')");
    }

    // Clear cart after placing order
    unset($_SESSION['cart']);

    // Redirect to success page
    header("Location: order_success.php?id=".$order_id);
    exit;
}

?>
