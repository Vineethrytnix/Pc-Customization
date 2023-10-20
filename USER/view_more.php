<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
$pid = $_REQUEST['pid'];
$cus_id = $_REQUEST['cid'];
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
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false">Reviews</a>
            </li>
        </ul>
    </div>
</section>

<div class="product_image_area ">

    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <?php
            $sel = "SELECT * FROM `products` where `pid`='$pid'";
            $exe = mysqli_query($conn, $sel);
            while ($row = mysqli_fetch_array($exe)) {
                $price = $row['price'];
    // echo $price;


                ?>
                <div class="col-lg-7 col-xl-7">
                    <div class="product_slider_img">
                        <div id="vertical">
                            <div data-thumb="../image/<?php echo $row['p_image'] ?>" style="height: 500px;">
                                <img src="../image/<?php echo $row['p_image'] ?>" style="height: 500px;"/>
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
                        <form action="" method="post">
                            <div class="card_area d-flex justify-content-between align-items-center">

                                <div class="product_count">
                                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" value="1" min="0" max="10" name="qty">
                                    <span class="number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <button type="submit" name="submit" class="btn_3">add to cart</button>
                                <a href="#" class="like_us"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>


<?php
include './footer.php'
    ?>



<?php
if (isset($_REQUEST['submit'])) {
    $qty = $_REQUEST['qty'];
    $amount=$price*$qty;

    $ins = "INSERT INTO `cart`(`pid`,`user_id`,`cus_id`,`price`,`qty`,`tamount`,`status`,`payment`)VALUES('$pid','$uid','$cus_id','$price','$qty','$amount','incart','not paid')";
    // echo $ins,$amount;
    // $exe=mysqli_query($conn,$ins);
    if ($conn->query($ins) == TRUE) {
        echo "<script>alert('Product Added To cart'); window.location = 'view_products.php';</script>";
    } else {
        echo "<script>alert('Failed'); window.location = 'view_products.php';</script>";
    }

}



?>