<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranaz</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"><b><span style="color: darkslategrey;">PC</span>
                                Wizardry</b></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">
                                        Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_1" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        View
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="view_products.php">Products</a>
                                        <a class="dropdown-item" href="view_cart.php">Shopping cart</a>
                                        <a class="dropdown-item" href="view_pc_requirements.php">Added Requirement</a>

                                        <a class="dropdown-item" href="view_orders.php">My Orders</a>


                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_1" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <!-- <a class="dropdown-item" href="add_requirement.php">Requirement</a> -->
                                        <a class="dropdown-item" href="view_cus_centres.php">Customization Centre</a>

                                        <a class="dropdown-item" href="view_orders.php">My Orders</a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> login</a>
                                        <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li> -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="view_cus_centres.php">Service Centre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_users.php">User</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="../login.php"><img src="./img/logins.png" width="20px"
                                            alt="">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href=""><i class="ti-heart"></i></a>
                            <div class="dropdown cart">
                                <?php
                                $cart = "SELECT COUNT(*) FROM `cart` WHERE `status` = 'incart' AND `payment` = 'not paid'";
                                $exe = mysqli_query($conn, $cart);
                                while ($row = mysqli_fetch_array($exe)) {
                                    $cnt = $row['COUNT(*)'];


                                    ?>
                                    <a class="dropdown-toggle" href="view_cart.php" id="navbarDropdown3" role="button"
                                        data-toggle="dropdown" aria-haspopup="<?php echo $cnt ?>" aria-expanded="false">
                                        <i class="fas fa-cart-plus"></i>
                                        <?php echo $cnt ?>
                                    </a>

                                <?php } ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Pc Customization <br>& Service </h2>
                            <p>Home <span>-</span> contact us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>