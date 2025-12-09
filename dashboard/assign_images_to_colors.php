<?php
include "includes/config.php";
include "includes/security.php";

if (!isset($_GET['product_id'])) {
    die("Product ID is required");
}

$product_id = $_GET['product_id'];

// When form is submitted, save mappings
if (isset($_POST['submit'])) {

    // Clear old mappings so we can insert fresh ones
    mysqli_query($conn, "DELETE FROM product_color_image WHERE product_id='$product_id'");

    // Loop through selected mappings
    foreach ($_POST['mapping'] as $color_id => $image_id) {

        if ($image_id != "") { // if image selected
            mysqli_query($conn, "INSERT INTO product_color_image (product_id, color_id, image_id)
                                 VALUES ('$product_id', '$color_id', '$image_id')");
        }
    }
    echo "<script>alert('Color → Image mapping saved successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ecommerce - Assign Images to Colors</title>
    <style>
        .image-box {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 2px solid #ddd;
            margin: 5px;
            border-radius: 5px;
        }

        .color-block {
            background: #f3f3f3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <h2>Assign Images to Colors</h2>
    <hr>

    <form method="POST">

        <?php
        // Fetch colors for this product
        $color_query = mysqli_query(
            $conn,
            "SELECT pc.color_id, cm.color, cm.sel_color FROM product_color pc JOIN color_master cm ON pc.color_id = cm.id
     WHERE pc.product_id='$product_id'"
        );

        // Fetch all images for this product
        $image_query = mysqli_query(
            $conn,
            "SELECT id, image FROM product_images WHERE product_id='$product_id'"
        );

        $images = [];
        while ($img = mysqli_fetch_assoc($image_query)) {
            $images[] = $img;
        }

        // Loop through each color and show image options
        while ($color = mysqli_fetch_assoc($color_query)) {
            $color_id = $color['color_id'];
            ?>

            <div class="color-block">
                <h3 style="color: <?php echo $color['sel_color']; ?>;">
                    <?php echo $color['color']; ?> Color
                </h3>
                <p>Select image for this color:</p>
                <select name="mapping[<?php echo $color_id; ?>]" required>
                    <option value="">-- Select Image --</option>
                    <?php foreach ($images as $img) { ?>
                        <option value="<?php echo $img['id']; ?>">
                            <?php echo $img['image']; ?>
                        </option>
                    <?php } ?>

                </select>

                <br><br>
            </div>

        <?php } ?>

        <button type="submit" name="submit">Save Mapping</button>

    </form>

</body>

</html>