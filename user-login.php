<?php
include "includes/config.php";
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = md5($_POST['password']);
    $sel_data = mysqli_query($conn, "SELECT * FROM users WHERE email='$username' AND password='$password'");
    $count = mysqli_num_rows($sel_data);
    if ($count >= 1) {
        $data = mysqli_fetch_assoc($sel_data);
        $_SESSION['USER_LOGIN'] = 1;
        $_SESSION['USER_ID'] = $data['id'];
        $_SESSION['USERNAME'] = $data['username'];
        header("Location: index.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce - login</title>
    <meta name="description" content="mobile Shopping site">
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
                            <li><a href="index.html">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form method="post">
                            <p>
                                <label>Username<span>*</span></label>
                                <input type="text" name="email">
                            </p>
                            <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit" name="submit">login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>



</body>



</html>