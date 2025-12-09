<?php
// session_start();
include "includes/config.php";
$grand_total = 0;
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce - Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "includes/stylesheet.php"; ?>
</head>

<body>

<?php include "includes/header.php"; ?>

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="Checkout_section mt-60">
    <div class="container">

        <form method="post" action="place_order.php">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 mb-20">
                                <label>Name <span>*</span></label>
                                <input type="text" name="name" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" required>
                            </div>

                            <div class="col-12 mb-20">
                                <label>Address <span>*</span></label>
                                <input type="text" name="address" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>City <span>*</span></label>
                                <input type="text" name="city" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>State <span>*</span></label>
                                <input type="text" name="state" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>Pincode <span>*</span></label>
                                <input type="text" name="pincode" required>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>Country <span>*</span></label>
                                <input type="text" name="country" value="India" required>
                            </div>

                            <div class="col-12">
                                <div class="order-notes">
                                    <label>Order Notes</label>
                                    <textarea name="order_note"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <h3>Your Order</h3>

                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {
                                            $subtotal = $item['price'] * $item['qty'];
                                            $grand_total += $subtotal;
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="dashboard/uploads/<?php echo $item['image']; ?>"
                                                 width="50" style="margin-right:10px;">
                                            <?php echo $item['name']; ?> × <?php echo $item['qty']; ?>
                                        </td>
                                        <td>₹<?php echo $subtotal; ?></td>
                                    </tr>
                                    <?php }} else { ?>
                                    <tr>
                                        <td colspan="2">Your cart is empty</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                                <tfoot>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>₹<?php echo $grand_total; ?></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="payment_method">

                            <div class="panel-default">
                                <input id="cod" name="payment_type" value="COD" type="radio" checked>
                                <label for="cod">Cash on Delivery</label>
                            </div>

                            <div class="panel-default mt-2">
                                <input id="online" name="payment_type" value="Online" type="radio">
                                <label for="online">Online Payment</label>
                            </div>

                            <div class="order_button mt-3">
                                <button type="submit" class="btn btn-success" name="submit">Place Order</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/js.php"; ?>

</body>
</html>
