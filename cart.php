<?php
// include "includes/config.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    // Get product details
    $product_query = mysqli_query($conn, "SELECT * FROM product_master WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($product_query);

    // If cart not created yet
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If product already in cart → increase qty
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['qty'] += 1;
    } else {
        // Add new product to cart
        $_SESSION['cart'][$product_id] = [
            "id" => $product_id,
            "name" => $product['product_name'],
            "price" => $product['price'],
            "image" => $product['image'],
            "qty" => 1
        ];
    }
    header("Location: cart.php");
    exit;
}


?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Junko - cart page</title>
    <meta name="description" content="">
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
                            <li><a href="index.php">home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <?php ?>

                                    <tbody>
                                        <?php
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $item) {
                                                $total = $item['price'] * $item['qty'];
                                                ?>
                                                <tr>
                                                    <td class="product_remove">
                                                        <a href="remove_cart.php?id=<?php echo $item['id']; ?>">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>

                                                    <td class="product_thumb">
                                                        <a href="#"><img src="dashboard/uploads/<?php echo $item['pro_img1']; ?>"
                                                                alt=""></a>
                                                    </td>

                                                    <td class="product_name">
                                                        <a href="#"><?php echo $item['name']; ?></a>
                                                    </td>

                                                    <td class="product-price">
                                                        ₹<?php echo $item['price']; ?>
                                                    </td>

                                                    <td class="product_quantity">
                                                        <label>Quantity</label>
                                                        <input type="number" value="<?php echo $item['qty']; ?>" min="1"
                                                            readonly>
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
                                            <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
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