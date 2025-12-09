<?php include "includes/config.php";
include "includes/security.php";

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $colors = $_POST['color_id'];
    $brand_id = $_POST['brand_id'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $discount = $_POST['discount'];
    $stock_quality = $_POST['stock_quality'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $insert = mysqli_query($conn, "INSERT INTO product_master
        (product_name, category_id, sub_category_id, brand_id, price, mrp, discount, stock_quality, status, description)
        VALUES ('$product_name', '$category_id', '$sub_category_id', '$brand_id', '$price', '$mrp', '$discount', '$stock_quality', '$status', '$description')");
    $product_id = mysqli_insert_id($conn);

    foreach ($colors as $color_id) {
        mysqli_query($conn, "INSERT INTO product_color (product_id, color_id) VALUES ('$product_id', '$color_id')");
    }
    // Insert multiple images
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {// for each upload file
        $fileName = rand(1, 99) . time() . $_FILES['images']['name'][$key];// rand means unique name 
        $target = "uploads/" . $fileName;// Target path
        move_uploaded_file($tmp_name, $target);// Move file to target
        mysqli_query($conn, "INSERT INTO product_images (product_id, image) VALUES ('$product_id', '$fileName')");// Insert into database
    }
    foreach ($_POST['color_id'] as $color_id) {
        mysqli_query($conn, "INSERT INTO product_colors (product_id, color_id) 
                         VALUES ('$product_id', '$color_id')");
    }
    foreach ($_POST['color_id'] as $color_id) {
        if (!empty($_FILES["images_$color_id"]['name'][0])) {

            foreach ($_FILES["images_$color_id"]['tmp_name'] as $key => $tmp_name) {

                $fileName = rand(1000, 9999) . time() . $_FILES["images_$color_id"]['name'][$key];
                $target = "uploads/" . $fileName;

                move_uploaded_file($tmp_name, $target);

                mysqli_query($conn, "INSERT INTO product_images 
                                 (product_id, color_id, image) 
                                 VALUES ('$product_id', '$color_id', '$fileName')");
            }
        }
    }
    header("Location: product_master.php");
    exit();
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard - Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
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
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <form class="app-search d-none d-md-block">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <form action="logout.php" method="post">
                                <button type="submit" class="btn btn-primary" name="logout">Log out</button>
                            </form>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div class="dropdown sidebar-user m-1 rounded">
                <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center gap-2">
                        <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg"
                            alt="Header Avatar">
                        <span class="text-start">
                            <span class="d-block fw-medium sidebar-user-name-text">Admin</span>
                            <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                                    class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                                    class="align-middle">Online</span></span>
                        </span>
                    </span>
                </button>
            </div>
            <?php include "includes/sidebar.php"; ?>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Products</h4>
                                    <div class="flex-shrink-0">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form class="row g-3" method="post" enctype="multipart/form-data">
                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">Product</label>
                                                <input type="text" name="product_name" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Category</label>
                                                <select id="category_id" name="category_id"
                                                    onchange="validate_category()" class="form-select" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php
                                                    $select_cat_data = mysqli_query($conn, "SELECT * FROM category_master");
                                                    while ($fetch_data = mysqli_fetch_assoc($select_cat_data)) {
                                                        echo "<option value='" . $fetch_data['id'] . "'>" . $fetch_data['category_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Sub Category</label>
                                                <select id="sub_category" name="sub_category_id" class="form-select"
                                                    required>
                                                    <option value="">Choose Category First...</option>
                                                </select>
                                            </div>
                                            <?php
                                            $colors = mysqli_query($conn, "SELECT * FROM color_master");
                                            while ($row = mysqli_fetch_assoc($colors)) {
                                                ?>
                                                <div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">
                                                    <label>
                                                        <input type="checkbox" name="color_id[]" value="<?= $row['id'] ?>">
                                                        <?= $row['color'] ?>
                                                    </label>

                                                    <br><br>
                                                    <label>Upload Images for <?= $row['color'] ?></label>
                                                    <input type="file" name="images_<?= $row['id'] ?>[]" multiple>
                                                </div>
                                            <?php } ?>

                                            <div class="col-md-4">
                                                <label for="description" class="form-label">Brand</label>
                                                <select id="" name="brand_id" class="form-select" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php
                                                    $select_cat_data = mysqli_query($conn, "SELECT * FROM brand_master");
                                                    while ($fetch_data = mysqli_fetch_assoc($select_cat_data)) {
                                                        echo "<option value='" . $fetch_data['id'] . "'>" . $fetch_data['brand_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">Price</label>
                                                <input type="text" name="price" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">MRP</label>
                                                <input type="text" name="mrp" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">Discount</label>
                                                <input type="text" name="discount" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">Stock
                                                    Quality</label>
                                                <input type="text" name="stock_quality" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>


                                            <div class="col-md-4">
                                                <label for="validationDefault04" class="form-label">Status</label>
                                                <select class="form-select" name="status" id="validationDefault04"
                                                    required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>Available</option>
                                                    <option>Not-Available</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12"><label for="">Product Description</label>
                                                <textarea class="ckeditor" name="description"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" name="submit" type="submit">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Product Details</h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive table-card">
                                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Brand Name</th>
                                                        <th>Price(₹)</th>
                                                        <th>MRP(₹)</th>
                                                        <th>Discount(%)</th>
                                                        <th>Product Image</th>
                                                        <th>Status</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    $sel_products = mysqli_query($conn, "SELECT p.*, c.category_name, b.brand_name, sc.sub_category FROM product_master p JOIN category_master c ON p.category_id = c.id JOIN brand_master b ON p.brand_id = b.id JOIN sub_category sc ON p.sub_category_id = sc.id");
                                                    while ($fetch_data = mysqli_fetch_assoc($sel_products)) {
                                                        // print_r($fetch_data);
                                                        $i++;
                                                        $product_id = $fetch_data['id'];
                                                        $get_img = mysqli_query($conn, "SELECT image FROM product_images WHERE product_id='$product_id' LIMIT 1");
                                                        $img_row = mysqli_fetch_assoc($get_img);
                                                        $image = $img_row['image'] ?? "default.png";
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $fetch_data['product_name']; ?></td>
                                                            <td><?php echo $fetch_data['category_name']; ?></td>
                                                            <td><?php echo $fetch_data['sub_category']; ?></td>
                                                            <td><?php echo $fetch_data['brand_name']; ?></td>
                                                            <td><?php echo $fetch_data['price']; ?></td>
                                                            <td><?php echo $fetch_data['mrp']; ?></td>
                                                            <td><?php echo $fetch_data['discount']; ?></td>
                                                            <td>
                                                                <img src="uploads/<?php echo $image; ?>" width="60"
                                                                    height="60"
                                                                    style="object-fit: cover; border-radius: 6px;">
                                                            </td>
                                                            <td><?php echo $fetch_data['status']; ?></td>
                                                            <td><?php echo $fetch_data['description']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include "includes/footer.php"; ?>
            </div>

        </div>
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <?php include "includes/js.php"; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            function validate_category() {
                var category_id = $("#category_id").val();

                if (category_id !== "") {

                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        data: { category_id: category_id },
                        success: function (response) {
                            $("#sub_category").html(response);
                        }
                    });
                }
            }
            let imgCount = 1;

            document.getElementById("add_image_btn").onclick = function () {
                if (imgCount >= 5) {
                    alert("Maximum 5 images allowed");
                    return;
                }

                imgCount++;

                let newInput = document.createElement("input");
                newInput.type = "file";
                newInput.name = "images[]";
                newInput.className = "form-control mb-2";
                newInput.accept = "image/*";

                document.getElementById("image_wrapper").appendChild(newInput);
            };

            document.getElementById('validate_color').addEventListener('change', function () {
                let preview = document.getElementById('color-preview');
                preview.innerHTML = ""; // clear

                let selectedOptions = this.selectedOptions;

                for (let opt of selectedOptions) {
                    // Create color box
                    let box = document.createElement('div');
                    box.style.width = '30px';
                    box.style.height = '30px';
                    box.style.borderRadius = '5px';
                    box.style.border = '1px solid #ddd';
                    box.style.background = opt.getAttribute('data-code');
                    preview.appendChild(box);
                }
            });
            $(document).on("change", "input[type='file']", function () {

    const limits = {
        1: 3,   // color ID 1 → max 3 images
        2: 5,   // color ID 2 → max 5 images
        3: 10   // color ID 3 → max 10 images
    };

    let colorId = $(this).attr("name").match(/\d+/)[0];
    let maxImages = limits[colorId] || 5; // default 5

    if (this.files.length > maxImages) {
        alert("This color allows maximum " + maxImages + " images.");
        this.value = "";
    }
});

        </script>


</body>

</html>