<?php
include "includes/config.php";

if (isset($_POST['category_id'])) {

    $category_id = $_POST['category_id'];

    $query = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id='$category_id'");

    echo "<option value='' disabled selected>Choose Subcategory...</option>";

    while ($row = mysqli_fetch_assoc($query)) {
        echo "<option value='" . $row['id'] . "'>" . $row['sub_category'] . "</option>";
        //  print_r($query);
    }
}

if (isset($_POST['product_id']) && isset($_POST['color_id'])) {
    $product_id = $_POST['product_id'];
    $color_id = $_POST['color_id'];
    $query = mysqli_query($conn, "SELECT * FROM product_images WHERE product_id='$product_id' AND color_id='$color_id'");
    if (mysqli_num_rows($query) == 0) {
        $query = mysqli_query($conn, "SELECT * FROM product_images WHERE product_id='$product_id'");
    }
    //  echo '<ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">';
    // Build gallery HTML
    while ($row = mysqli_fetch_assoc($query)) {
        $image = $row['image'];
        echo '
<div class="item">
    <a href="#" class="elevatezoom-gallery"
       data-image="dashboard/uploads/' . $image . '"
       data-zoom-image="dashboard/uploads/' . $image . '">
        <img src="dashboard/uploads/' . $image . '" alt="">
    </a>
</div>';

    }
}
?>