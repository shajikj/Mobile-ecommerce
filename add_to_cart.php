<?php
// session_start();
include "includes/config.php";

if (isset($_GET['id']) && isset($_GET['color_id'])) {

    $product_id = $_GET['id'];
    $color_id = $_GET['color_id'];

    $query = mysqli_query($conn, "SELECT * FROM product_master WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($query);

    $img_q = mysqli_query($conn, "SELECT image FROM product_images WHERE product_id='$product_id' AND color_id='$color_id' ORDER BY id ASC LIMIT 1");
    $image = "default.png";
    if (mysqli_num_rows($img_q) > 0) {
        $img_row = mysqli_fetch_assoc($img_q);
        $image = $img_row['image'];
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // unique key → product + color
    $cart_key = $product_id . "_" . $color_id;

    if (isset($_SESSION['cart'][$cart_key])) {
        $_SESSION['cart'][$cart_key]['qty'] += 1;
    } else {
        $_SESSION['cart'][$cart_key] = [
            "id" => $product_id,
            "name" => $product['product_name'],
            "price" => $product['price'],
            "image" => $image,
            "color_id" => $color_id,
            "qty" => 1
        ];
    }
    header("Location: add_to_cart.php");
    exit;
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mobile Shop - Ecommerce</title>
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
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping_cart_area mt-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_name">Product Name</th>
                                        <th class="product_thumb">Product Image</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // print_r($_SESSION);
                                    // die();
                                    if (!empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $cart_key => $item) {
                                            $total = $item['price'] * $item['qty'];
                                            ?>
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="remove_cart.php?key=<?php echo $cart_key; ?>">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                                <td class="product_name">
                                                    <?php echo $item['name']; ?>
                                                </td>
                                                <td class="product_thumb">
                                                    <img src="dashboard/uploads/<?php echo $item['image'];
                                                    ?>" width="80">
                                                </td>

                                                <td class="product-price">
                                                    ₹<?php echo $item['price']; ?>
                                                </td>
                                                <td class="product_quantity">
                                                    <input type="number" value="<?php echo $item['qty']; ?>" readonly>
                                                </td>
                                                <td class="product_total">
                                                    ₹<?php echo $total; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">Your Cart is Empty</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border"
                            id="checkout-elem">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="m-0 text-muted">Total:</h5>
                                <div class="px-2">
                                    <h5 class="m-0" id="cart-item-total">
                                        ₹
                                        <?php
                                        $grand_total = 0;
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $item) {
                                                $grand_total += ($item['price'] * $item['qty']);
                                            }
                                        }
                                        echo $grand_total;
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <?php if (!empty($_SESSION['cart'])) { ?>
                                <a href="checkout.php" class="btn btn-success text-center w-100">
                                    Checkout
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>

</body>

</html>