<?php
include "includes/config.php";
include "includes/security.php";
if (isset($_POST['submit'])) {
    $subcategory = $_POST['sub_category'];
    $categoryid = $_POST['category_id'];
    $status = $_POST['status'];
    $insert_data = mysqli_query(
        $conn,
        "INSERT INTO sub_category (sub_category, category_id, status) VALUES ('$subcategory', '$categoryid', '$status')"
    );
    header("Location: sub-category.php");
    exit();
}

?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard - Sub Category</title>
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
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span>
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
                            <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Sub Category</h4>
                                    <div class="flex-shrink-0">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form class="row g-3" method="post">
                                            <div class="col-md-4">
                                                <label for="validationDefault01" class="form-label">Sub-Category</label>
                                                <input type="text" name="sub_category" class="form-control"
                                                    id="validationDefault01" value="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="description" class="form-label">Parent Category</label>
                                                <select id="" name="category_id" class="form-select" required>
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
                                                <label for="validationDefault04" class="form-label">Status</label>
                                                <select class="form-select" name="status" id="validationDefault04"
                                                    required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>Active</option>
                                                    <option>De-active</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" name="submit"
                                                    type="submit">Submit</button>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Category Details</h4>

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
                                                        <th scope="col">S.No</th>
                                                        <th scope="col">Sub-Category</th>
                                                        <th scope="col">Parent Category</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                    <?php
                                                    $i = 0;
                                                    $sel_cat_data = mysqli_query($conn,  "SELECT s.id, s.sub_category, s.status, c.category_name FROM sub_category AS s INNER JOIN category_master AS c ON s.category_id = c.id");
                                                    while ($fetch_data = mysqli_fetch_assoc($sel_cat_data)) {
                                                        $i++;
                                                        ?>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $i; ?>
                                                            </td>
                                                            <td><?php echo $fetch_data['sub_category']; ?></td>
                                                            <td><?php echo $fetch_data['category_name']; ?></td>
                                                            <td><?php echo $fetch_data['status']; ?></td>
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
</body>

</html>