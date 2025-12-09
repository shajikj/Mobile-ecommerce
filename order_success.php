<?php
// session_start();
// include "includes/config.php";

$order_id = $_GET['id'];
?>

<!doctype html>
<html>
<head>
    <title>Order Success</title>
    <?php include "includes/stylesheet.php"; ?>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="container mt-5">
    <h2>Your Order Has Been Placed Successfully!</h2>
    <p>Order ID: <strong>#<?php echo $order_id; ?></strong></p>
    <p>Thank you for shopping with us.</p>

    <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
</div>

<?php include "includes/footer.php"; ?>

</body>
</html>
