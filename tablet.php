<?php
include "includes/config.php";

// Tablet category = 2
$category_id = 2;

// Fetch all tablet products
$sel_product_data = mysqli_query($conn, "SELECT * FROM product_master WHERE category_id='$category_id'");
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Junko - shop fullwidth</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "includes/stylesheet.php"; ?>
</head>

<body>

    <?php include "includes/header.php"; ?>
    <!--sticky header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Shop </li>
                            <li>Tablet</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--shop  area start-->
    <div class="shop_area shop_fullwidth mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <h3>Tablets</h3>
                        </div>

                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper">

                        <?php while ($product = mysqli_fetch_assoc($sel_product_data)) { ?>

                            <div class="col-lg-3 col-md-4 col-12 ">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">

                                            <!-- Product Image -->
                                            <a class="primary_img" href="product-view.php?id=<?php echo $product['id']; ?>">
                                                <img src="dashboard/uploads/<?php echo $product['pro_img1']; ?>" alt="">
                                            </a>

                                            <!-- Optional Secondary Image -->
                                            <?php if (!empty($product['pro_img2'])) { ?>
                                                <a class="secondary_img"
                                                    href="product-view.php?id=<?php echo $product['id']; ?>">
                                                    <img src="dashboard/uploads/<?php echo $product['pro_img2']; ?>" alt="">
                                                </a>
                                            <?php } ?>

                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>

                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li class="compare"><a href="#" title="compare"><span
                                                                class="ion-levels"></span></a></li>
                                                    <li class="quick_button">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                            title="quick view">
                                                            <span class="ion-ios-search-strong"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="add_to_cart">
                                                <a href="add_to_cart.php?id=<?php echo $product['id']; ?>"
                                                    title="add to cart">Add to cart</a>
                                            </div>

                                        </div>

                                        <!-- GRID VIEW CONTENT -->
                                        <div class="product_content grid_content">
                                            <div class="price_box">
                                                <span class="old_price">₹<?php echo $product['mrp']; ?></span>
                                                <span class="current_price">₹<?php echo $product['price']; ?></span>
                                            </div>

                                            <div class="product_ratings">
                                                <ul>
                                                    <li><i class="ion-android-star-outline"></i></li>
                                                    <li><i class="ion-android-star-outline"></i></li>
                                                    <li><i class="ion-android-star-outline"></i></li>
                                                    <li><i class="ion-android-star-outline"></i></li>
                                                    <li><i class="ion-android-star-outline"></i></li>
                                                </ul>
                                            </div>

                                            <h3 class="product_name grid_name">
                                                <a href="product-details.php?id=<?php echo $product['id']; ?>">
                                                    <?php echo $product['product_name']; ?>
                                                </a>
                                            </h3>
                                        </div>

                                        <div class="product_content list_content">
                                            <div class="left_caption">

                                                <div class="price_box">
                                                    <span class="old_price">₹<?php echo $product['mrp']; ?></span>
                                                    <span class="current_price">₹<?php echo $product['price']; ?></span>
                                                </div>

                                                <h3 class="product_name">
                                                    <a href="product-details.php?id=<?php echo $product['id']; ?>">
                                                        <?php echo $product['product_name']; ?>
                                                    </a>
                                                </h3>

                                                <div class="product_ratings">
                                                    <ul>
                                                        <li><i class="ion-android-star-outline"></i></li>
                                                        <li><i class="ion-android-star-outline"></i></li>
                                                        <li><i class="ion-android-star-outline"></i></li>
                                                        <li><i class="ion-android-star-outline"></i></li>
                                                        <li><i class="ion-android-star-outline"></i></li>
                                                    </ul>
                                                </div>

                                                <div class="product_desc">
                                                    <p><?php echo substr($product['description'], 0, 150); ?>...</p>
                                                </div>

                                            </div>

                                            <div class="right_caption">
                                                <div class="add_to_cart">
                                                    <a href="add_to_cart.php?id=<?php echo $product['id']; ?>"
                                                        title="add to cart">Add to cart</a>
                                                </div>

                                                <div class="action_links">
                                                    <ul>
                                                        <li class="wishlist"><i class="fa fa-heart-o"></i> Add to Wishlist
                                                        </li>
                                                        <li class="compare"><span class="ion-levels"></span> Compare</li>
                                                        <li class="quick_button">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modal_box">Quick View</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </figure>
                                </article>
                            </div>

                        <?php } // end while ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

    <?php include "includes/footer.php"; ?>

    <?php include "includes/js.php"; ?>



</body>

</html>