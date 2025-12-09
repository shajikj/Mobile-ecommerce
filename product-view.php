<?php
include "includes/config.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sel_product_data = mysqli_query($conn, "SELECT * FROM product_master WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($sel_product_data);
    $sel_color = mysqli_query($conn, "SELECT pc.color_id, cm.color, cm.sel_color FROM product_color pc INNER JOIN color_master cm ON pc.color_id = cm.id WHERE pc.product_id = '$product_id'");
}
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['USER_ID']; // user must be logged in
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $ins_rev = mysqli_query($conn, "INSERT INTO product_reviews (product_id, user_id, rating, review)
         VALUES ('$product_id', '$user_id', '$rating', '$review')");
    // if (!$ins_rev) {
    //     echo "SQL Error: " . mysqli_error($conn);
    //     exit;
    // }
    header("Location: product_view.php?id=$product_id#reviews");
    exit;
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Details</title>
    <?php include "includes/stylesheet.php"; ?>
</head>

<body>
    <?php include "includes/header.php"; ?>

    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="hidden" id="selected_color" value="">
                    <?php
                    $images = mysqli_query($conn, "SELECT * FROM product_images WHERE product_id='$product_id'");
                    $first = mysqli_fetch_assoc($images);
                    $mainImage = $first ? $first['image'] : "no-image.png";
                    ?>
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="dashboard/uploads/<?php echo $mainImage; ?>"
                                    data-zoom-image="dashboard/uploads/<?php echo $mainImage; ?>">
                            </a>
                        </div>
                        <div id="product_gallery">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <?php
                                mysqli_data_seek($images, 0);
                                while ($img = mysqli_fetch_assoc($images)) { ?>
                                    <li>
                                        <a href="#" class="elevatezoom-gallery"
                                            data-image="dashboard/uploads/<?php echo $img['image']; ?>"
                                            data-zoom-image="dashboard/uploads/<?php echo $img['image']; ?>">
                                            <img src="dashboard/uploads/<?php echo $img['image']; ?>">
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <h1><?php echo $product['product_name']; ?></h1>
                        <div class="price_box">
                            <span class="current_price">₹<?php echo $product['mrp']; ?></span>
                            <span class="old_price">₹<?php echo $product['price']; ?></span>
                        </div>
                        <div class="product_desc">
                            <p><?php echo $product['description']; ?></p>
                        </div>
                        <div class="product_variant">
                            <label>Color</label>
                            <div style="display:flex; gap:10px; margin:10px 0;">
                                <?php while ($color = mysqli_fetch_assoc($sel_color)) {
                                    // print_r($color);
                                    ?>
                                    <label class="color-option" data-color="<?php echo $color['color_id']; ?>"
                                        style="cursor:pointer; display:inline-block;">
                                        <div style="width:30px;height:30px;border-radius:50%;
                                            background:<?php echo $color['sel_color']; ?>;
                                            border:2px solid #ccc;">
                                        </div>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="product_variant quantity">
                            <label>Quantity</label>
                            <input min="1" max="100" value="1" type="number">
                            <a href="javascript:void(0)" class="button" onclick="addToCart()">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_d_info mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Specification</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Reviews (1)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue
                                            nec
                                            est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare
                                            lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing
                                            cursus
                                            eu, suscipit id nulla.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Compositions</td>
                                                        <td>Mobile</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Styles</td>
                                                        <td>djjf</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Properties</td>
                                                        <td>8 GB</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="product_info_content">
                                        <p>Fashion has been creating well-designed collections since 2010. The brand
                                            offers
                                            feminine designs delivering stylish separates and statement dresses which
                                            have
                                            since evolved into a full ready-to-wear collection in which every item is a
                                            vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                            youthful elegance and unmistakable signature style. All the beautiful pieces
                                            are
                                            made in Italy and manufactured with the greatest attention. Now Fashion
                                            extends
                                            to a range of accessories including shoes, hats, belts and more!</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        <div class="product_review_form">
                                            <form method="POST">
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $product_id; ?>">
                                                <div class="product_ratting mb-10">
                                                    <h3>Your rating</h3>
                                                    <ul id="rating-stars">
                                                        <li data-value="1"><a><i class="fa fa-star"></i></a></li>
                                                        <li data-value="2"><a><i class="fa fa-star"></i></a></li>
                                                        <li data-value="3"><a><i class="fa fa-star"></i></a></li>
                                                        <li data-value="4"><a><i class="fa fa-star"></i></a></li>
                                                        <li data-value="5"><a><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <input type="hidden" name="rating" id="rating" required>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review</label>
                                                        <textarea name="review" id="review_comment" required></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" name="submit">Submit</button>
                                            </form><br>
                                            <?php
                                            $reviews = mysqli_query(
                                                $conn,
                                                "SELECT * FROM product_reviews WHERE product_id='$product_id' ORDER BY id DESC"
                                            );

                                            while ($row = mysqli_fetch_assoc($reviews)) {
                                                //print_r($row);
                                                ?>
                                                <div class="reviews_comment_box">
                                                    <div class="comment_thmb">
                                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                                    </div>
                                                    <div class="comment_text">
                                                        <div class="reviews_meta">
                                                            <div class="star_rating">
                                                                <ul>
                                                                    <?php for ($i = 1; $i <= $row['rating']; $i++) { ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                            <span><?php echo $row['review']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        $(document).on("click", ".color-option", function () {
            let color_id = $(this).data("color");

            // store selected color in hidden input
            $("#selected_color").val(color_id);

            $.ajax({
                url: "dashboard/ajax.php",
                type: "POST",
                data: {
                    product_id: <?php echo $product_id; ?>,
                    color_id: color_id
                },
                success: function (response) {
                    $("#product_gallery").html(response);

                    $('.single-product-active').owlCarousel({
                        loop: true,
                        nav: true,
                        dots: false,
                        items: 4,
                        margin: 10
                    });

                    $('.zoomContainer').remove();

                    $("#zoom1").elevateZoom({
                        zoomType: "lens",
                        lensShape: "round",
                        lensSize: 200
                    });
                }
            });
        });

    </script>
    <script>function addToCart() {
            let color_id = $("#selected_color").val();
            let product_id = <?php echo $product_id; ?>;

            if (color_id === "" || color_id === undefined) {
                alert("Please select a color first!");
                return;
            }

            window.location.href = "add_to_cart.php?id=" + product_id + "&color_id=" + color_id;
        }
        const stars = document.querySelectorAll("#rating-stars li");
        const ratingInput = document.getElementById("rating");

        stars.forEach(star => {
            star.addEventListener("click", function () {
                const rating = this.getAttribute("data-value");
                ratingInput.value = rating;

                stars.forEach(s => s.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    </script>

    <style>
        #rating-stars li.selected i {
            color: gold;
        }
    </style>


</body>

</html>