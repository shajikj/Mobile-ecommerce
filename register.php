<?php
include 'includes/config.php';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$check_data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password = '$password'");
if (mysqli_num_rows($check_data) > 0) {
    echo "Email already registered";
    exit;
}
$insert_data = mysqli_query($conn, "INSERT INTO users(name, email, phone, password) 
        VALUES('$name', '$email', '$phone', '$password')");

if ($insert_data) {
    echo "Inserted";
} else {
    echo "Error";
}
header("Location: register.php");
die();
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce - Registration</title>
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
                        <h2>Registration</h2>
                        <form method="post">
                            <p>
                                <label>Name<span>*</span></label>
                                <input type="text" name="name" placeholder="Full name" required>
                            </p>
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="text" name="email" placeholder="email" required>
                            </p>
                            <p>
                                <label for="">Mobile Number<span>*</span></label>
                                <input type="text" name="phone" placeholder="Enter Mobile Number" required>
                            </p>
                            <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" required>
                            </p>
                            <div class="login_submit">
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit" name="submit">Register</button>
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