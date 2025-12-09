<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>

                    <div class="support_info">
                        <p>Telephone Enquiry: <a href="tel:0123456789">0123456789</a></p>
                    </div>

                    <div class="top_right text-end">
                        <ul>
                            <?php if (isset($_SESSION['USER_ID'])) { ?>
                                <li><a href="my-account.php"><?php echo $_SESSION['USER_NAME']; ?></a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php } else { ?>
                                <li><a href="user-login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="search_container">
                        <form action="#">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori">
                                    <option selected value="1">All Categories</option>
                                    <option value="2">Earbuds</option>
                                    <option value="3">Mobiles</option>
                                    <option value="4">Tablets</option>
                                    <option value="5">Gadgets</option>
                                </select>
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="wishlist.php"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <span class="wishlist_quantity">3</span>
                        </div>

                        <div class="mini_cart_wrapper">
                            <a href="logout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                            <span class="cart_quantity">2</span>
                            <div class="mini_cart">
                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="cart.php">View cart</a>
                                    </div>
                                    <div class="cart_button">
                                        <a href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menu" class="text-start ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="mobile.php">Mobiles</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="earbuds.php">Earbuds</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="tablet.php">Tablet</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="gadgets.php">gadgets.php</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="Offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="main_header">

        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="support_info">
                            <p>Telephone Enquiry: <a href="tel:0123456789">0123456789</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-end">
                            <ul>
                                <?php if (isset($_SESSION['USER_ID'])) { ?>
                                    <li><a href="my-account.php"><?php echo $_SESSION['USERNAME']; ?></a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                <?php } else { ?>
                                    <li><a href="user-login.php">Login</a></li>
                                    <li><a href="register.php">Register</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">

                            <div class="search_container">
                                <form action="#">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori1">
                                            <option selected value="1">All Categories</option>
                                            <option value="2">Earbuds</option>
                                            <option value="3">Mobiles</option>
                                            <option value="4">Tablets</option>
                                            <option value="5">Gadgets</option>
                                        </select>
                                    </div>

                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>

                            <div class="middel_right_info">
                                <div class="header_wishlist">
                                    <a href="add_to_cart.php">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </a>
                                    <span class="wishlist_quantity">
                                        <?php
                                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                            echo array_sum(array_column($_SESSION['cart'], 'qty'));
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </span>
                                </div>


                                <!-- <div class="mini_cart_wrapper">
                                    <a href="checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                    <span class="cart_quantity">2</span>
                                </div> -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="main_menu_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">ALL CATEGORIES</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li class="menu_item_children"><a href="earbuds.php">Earbuds<i
                                                class="fa fa-angle-right"></i></a></li>
                                    <li class="menu_item_children"><a href="mobile.php">Mobiles<i
                                                class="fa fa-angle-right"></i></a></li>
                                    <li class="menu_item_children"><a href="tablet.php"> Tablet <i
                                                class="fa fa-angle-right"></i></a></li>
                                    <li class="menu_item_children"><a href="gadget.php"> Gadgets <i
                                                class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">Home</a></li>
                                    <li><a href="mobile.php">Mobiles</a></li>
                                    <li><a href="earbuds.php">Earbuds</a></li>
                                    <li><a href="tablet.php">Tablet</a></li>
                                    <li><a href="gadgets.php">Gadgets</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</header>