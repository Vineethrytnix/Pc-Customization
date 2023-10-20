<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?>


<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>awesome <span>products</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <?php
                            $sel = "SELECT * FROM `products`";
                            $exe = mysqli_query($conn, $sel);
                            while ($row = mysqli_fetch_array($exe)) {

                                ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="../image/<?php echo $row['p_image'] ?>" width="200px" alt="">
                                        <div class="single_product_text">
                                            <h4><?php echo $row['pname'] ?></h4>
                                            <h3>&#8377; <?php echo $row['price'] ?>.00</h3>
                                            <center><a href="view_more.php?pid=<?php echo $row['pid'] ?>&cid=<?php echo $row['cus_id'] ?>" style="font-size: medium;">view more</a></center>
                                            <!-- <a href="update_product.php?pid=<?php echo $row['pid'] ?>&cid=<?php echo $row['cus_id'] ?>" class="btn btn-secondary" style="color:white">Update Details</a> -->
                                            <!-- <i class="ti-heart"></i> -->
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include './footer.php'
    ?>