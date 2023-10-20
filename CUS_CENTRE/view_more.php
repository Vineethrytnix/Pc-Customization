<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
$pid = $_REQUEST['pid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
    </div>
</section>

<div class="product_image_area ">

    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <?php
            $sel = "SELECT * FROM `products` where `pid`='3' and `cus_id`='1'";
            $exe = mysqli_query($conn, $sel);
            while ($row = mysqli_fetch_array($exe)) {

                ?>
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="../image/<?php echo $row['p_image'] ?>">
                            <img src="../image/<?php echo $row['p_image'] ?>" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h5>Product <span>|</span>Details</h5>
                    <h3>
                        <?php echo $row['pname'] ?>
                    </h3>
                    <h2>$
                        <?php echo $row['price'] ?>.99
                    </h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Brand</span> : <b style="color :darkslategray;">
                                    <?php echo $row['pbrand'] ?>
                                </b></a>
                        </li>
                        <li>
                            <a href="#"> <span>Windows</span> :
                                <?php echo $row['pwindow'] ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"> <span>Processor</span> :
                                <?php echo $row['prossoser'] ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"> <span>Display</span> :
                                <?php echo $row['display'] ?>
                            </a>
                        </li>
                    </ul>
                    <p>
                        <?php echo $row['desc'] ?>
                    </p>
                    <!-- <div class="card_area d-flex justify-content-between align-items-center">
                            <div class="product_count">
                                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" value="1" min="0" max="10">
                                <span class="number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            <a href="#" class="btn_3">add to cart</a>
                            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                        </div> -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>


<?php
include './footer.php'
    ?>