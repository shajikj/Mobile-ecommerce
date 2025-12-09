<?php
include "includes/config.php";
include "includes/security.php";

if (!isset($_GET['order_id'])) {
    header("Location: order_master.php");
    exit;
}
$order_id = $_GET['order_id'];
$order_q = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$order_id'");
$order = mysqli_fetch_assoc($order_q);
//print_r($order);
if (!$order) {
    echo "Invalid Order ID";
    exit;
}

$items_q = mysqli_query($conn, "
    SELECT oi.*, pm.product_name,
           (SELECT image 
            FROM product_images 
            WHERE product_images.product_id = oi.product_id 
            LIMIT 1) AS product_image
    FROM order_items oi 
    JOIN product_master pm 
        ON oi.product_id = pm.id 
    WHERE oi.order_id = '$order_id'
");

// if (!$items_q) {
//     die("SQL Error: " . mysqli_error($conn));
// }


?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Order Details - #<?php echo $order_id; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/stylesheet.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span><span></span><span></span>
                            </span>
                        </button>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="logout.php" method="post">
                            <button type="submit" class="btn btn-primary" name="logout">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" height="22"></span>
                    <span class="logo-lg"><img src="assets/images/logo-dark.png" height="17"></span>
                </a>
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" height="22"></span>
                    <span class="logo-lg"><img src="assets/images/logo-light.png" height="17"></span>
                </a>
            </div>

            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3 class="mb-4">Order Details (Order #<?php echo $order['order_id']; ?>)</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Customer Information</h4>
                                </div>
                                <div class="card-body">
                                    <p><strong>Name:</strong> <?php echo $order['full_name']; ?></p>
                                    <p><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
                                    <p><strong>Address:</strong> <?php echo $order['address']; ?></p>
                                    <p><strong>Payment Type:</strong> <?php echo $order['payment_type']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Items in This Order</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-bordered align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $i = 0;
                                                $grand_total = 0;
                                                while ($item = mysqli_fetch_assoc($items_q)) {
                                                    $total = $item['price'] * $item['qty'];
                                                    $grand_total += $total;
                                                    // print_r($item);
                                                    // print_r($item);
                                                    // print_r($total);
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $item['product_name']; ?></td>
                                                        <td>
                                                            <img src="../dashboard/uploads/<?php echo $item['product_image']; ?>"
                                                                width="60">

                                                        </td>
                                                        <td>₹<?php echo $item['price']; ?></td>
                                                        <td><?php echo $item['qty']; ?></td>
                                                        <td>₹<?php echo $total; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-end">Grand Total</th>
                                                    <th>₹<?php echo $grand_total; ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ORDER STATUS UPDATE -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Update Order Status</h4>
                                </div>
                                <div class="card-body">
                                    <form action="order_status_update.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                        <select name="order_status" class="form-control" required>
                                            <option value="Pending" <?php if ($order['order_status'] == 'Pending')
                                                echo 'selected'; ?>>Pending</option>
                                            <option value="Processing" <?php if ($order['order_status'] == 'Processing')
                                                echo 'selected'; ?>>Processing</option>
                                            <option value="Shipped" <?php if ($order['order_status'] == 'Shipped')
                                                echo 'selected'; ?>>Shipped</option>
                                            <option value="Delivered" <?php if ($order['order_status'] == 'Delivered')
                                                echo 'selected'; ?>>Delivered</option>
                                            <option value="Cancelled" <?php if ($order['order_status'] == 'Cancelled')
                                                echo 'selected'; ?>>Cancelled</option>
                                        </select>
                                        <button class="btn btn-primary mt-3" type="submit">Update Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include "includes/footer.php"; ?>
            </div>
        </div>
        <?php include "includes/js.php"; ?>
    </div>
</body>

</html>