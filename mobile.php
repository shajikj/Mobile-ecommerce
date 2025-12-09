<?php
include "includes/config.php";
$category_id = 1;
$product_data = mysqli_query($conn, "SELECT * FROM product_master WHERE category_id = '$category_id'");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce - Mobiles</title>
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
                            <li>Mobiles</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Smart Phones</h2>
                    </div>
                </div>
            </div>

            <div class="product_slick product_slick_column5">

                <?php while ($fetch_data = mysqli_fetch_assoc($product_data)) { ?>
                    <article class="single_product">
                        <figure>
                            <?php
                            $product_id = $fetch_data['id'];
                            $img_query = mysqli_query($conn, "SELECT image FROM product_images WHERE product_id='$product_id' LIMIT 1");
                            $img = mysqli_fetch_assoc($img_query);
                            $thumb = $img ? $img['image'] : "no-image.png";
                            ?>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-view.php?id=<?php echo $product_id; ?>">
                                    <img src="dashboard/uploads/<?php echo $thumb; ?>" alt="">
                                </a>
                                <a class="secondary_img" href="product-view.php?id=<?php echo $product_id; ?>">
                                    <img src="dashboard/uploads/<?php echo $thumb; ?>" alt="">
                                </a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="#" title="Add to Wishlist">
                                                <i class="fa fa-heart-o"></i></a>
                                        </li>
                                        <li class="quick_button">
                                            <a href="product-view.php?id=<?php echo $fetch_data['id']; ?>"
                                                title="quick view">
                                                <span class="ion-ios-search-strong"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="add_to_cart">
                                    <a href="add_to_cart.php?id=<?php echo $fetch_data['id']; ?>" title="add to cart">
                                        Add to cart
                                    </a>
                                </div>
                            </div>

                            <figcaption class="product_content">
                                <div class="price_box">
                                    <span class="current_price">₹<?php echo $fetch_data['price']; ?></span>
                                </div>

                                <h3 class="product_name">
                                    <a href="product-view.php?id=<?php echo $fetch_data['id']; ?>">
                                        <?php echo $fetch_data['product_name']; ?>
                                    </a>
                                </h3>
                            </figcaption>
                        </figure>
                    </article>
                <?php } ?>

            </div>
        </div>
    </section>


    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>


</body>

</html>