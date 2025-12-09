<?php include "includes/config.php"; ?>
<?php include "includes/security.php"; ?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
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
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Good Morning, Admin</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your store
                                                    today.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Total Orders</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                                            +16.24 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                                class="counter-value" data-target="559.25">0</span>k
                                                        </h4>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Total Users</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-danger fs-14 mb-0">
                                                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                                            -3.57 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                                class="counter-value" data-target="36894">0</span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Customers</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                                            +29.08 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                                class="counter-value" data-target="183.35">0</span>M
                                                        </h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            My Balance</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                                class="counter-value" data-target="165.89">0</span>k
                                                        </h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="card">
                                                <div class="card-header border-0 align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                            ALL
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                            1M
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                            6M
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-soft-primary material-shadow-none btn-sm">
                                                            1Y
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="card-header p-0 border-0 bg-light-subtle">
                                                    <div class="row g-0 text-center">
                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1"><span class="counter-value"
                                                                        data-target="7585">0</span></h5>
                                                                <p class="text-muted mb-0">Orders</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1">$<span class="counter-value"
                                                                        data-target="22.89">0</span>k</h5>
                                                                <p class="text-muted mb-0">Earnings</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1"><span class="counter-value"
                                                                        data-target="367">0</span></h5>
                                                                <p class="text-muted mb-0">Refunds</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-3">
                                                            <div
                                                                class="p-3 border border-dashed border-start-0 border-end-0">
                                                                <h5 class="mb-1 text-success"><span
                                                                        class="counter-value"
                                                                        data-target="18.92">0</span>%</h5>
                                                                <p class="text-muted mb-0">Conversation Ratio</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body p-0 pb-2">
                                                    <div class="w-100">
                                                        <div id="customer_impression_charts"
                                                            data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                                                            data-colors-minimal='["--vz-light", "--vz-primary", "--vz-info"]'
                                                            data-colors-saas='["--vz-success", "--vz-info", "--vz-danger"]'
                                                            data-colors-modern='["--vz-warning", "--vz-primary", "--vz-success"]'
                                                            data-colors-interactive='["--vz-info", "--vz-primary", "--vz-danger"]'
                                                            data-colors-creative='["--vz-warning", "--vz-primary", "--vz-danger"]'
                                                            data-colors-corporate='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                                            data-colors-galaxy='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]'
                                                            data-colors-classic='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                                            data-colors-vintage='["--vz-success", "--vz-primary", "--vz-secondary"]'
                                                            class="apex-charts" dir="ltr"></div>
                                                    </div </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">

                                                <div class="card card-height-100">
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0 flex-grow-1">Sales by Locations</h4>
                                                        <div class="flex-shrink-0">
                                                            <button type="button"
                                                                class="btn btn-soft-primary material-shadow-none btn-sm">
                                                                Export Report
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">

                                                        <div id="sales-by-locations"
                                                            data-colors='["--vz-light", "--vz-success", "--vz-primary"]'
                                                            data-colors-interactive='["--vz-light", "--vz-info", "--vz-primary"]'
                                                            style="height: 269px" dir="ltr"></div>

                                                        <div class="px-2 py-2 mt-1">
                                                            <p class="mb-1">Canada <span class="float-end">75%</span>
                                                            </p>
                                                            <div class="progress mt-2" style="height: 6px;">
                                                                <div class="progress-bar progress-bar-striped bg-primary"
                                                                    role="progressbar" style="width: 75%"
                                                                    aria-valuenow="75" aria-valuemin="0"
                                                                    aria-valuemax="75"></div>
                                                            </div>

                                                            <p class="mt-3 mb-1">Greenland <span
                                                                    class="float-end">47%</span>
                                                            </p>
                                                            <div class="progress mt-2" style="height: 6px;">
                                                                <div class="progress-bar progress-bar-striped bg-primary"
                                                                    role="progressbar" style="width: 47%"
                                                                    aria-valuenow="47" aria-valuemin="0"
                                                                    aria-valuemax="47"></div>
                                                            </div>

                                                            <p class="mt-3 mb-1">Russia <span
                                                                    class="float-end">82%</span></p>
                                                            <div class="progress mt-2" style="height: 6px;">
                                                                <div class="progress-bar progress-bar-striped bg-primary"
                                                                    role="progressbar" style="width: 82%"
                                                                    aria-valuenow="82" aria-valuemin="0"
                                                                    aria-valuemax="82"></div>
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