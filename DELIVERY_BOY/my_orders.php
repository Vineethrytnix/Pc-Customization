<?php
session_start();
$did = $_SESSION['uid'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?><br><br>
<center><h1><b>Assigned Orders</b></h1></center><br><br>
<section class="product_list ">
    <div class="container">
        <div class="row">
            <?php
            $sel = "
            SELECT c.*, dd.*, u.*, p.*,d.*
            FROM `cart` AS c
            INNER JOIN `delivery_details` AS dd ON c.`cart_id` = dd.`cart_id`
            INNER JOIN `products` AS p ON c.`pid` = p.`pid`
            INNER JOIN `user` AS u ON c.`user_id` = u.`uid`
            INNER JOIN `delivery_boy` AS d ON  dd.`db_id`= d.`did`
            WHERE dd.`db_id` = '1' ";
            $exe = mysqli_query($conn, $sel);
            while ($row = mysqli_fetch_array($exe)) {
                $status = $row['dstatus'];
                ?>
                <div class="col-sm-5">
                    <div class="card">
                        <center>
                            <div class="card-body">
                                <h3 class="card-title">
                                    <b>
                                        <?php echo $row['pname'] ?>
                                    </b>
                                </h3>
                                <p class="card-text">Customer :
                                    <?php echo $row['uname'] ?>
                                </p>
                                <p class="card-text">Contact :
                                    <?php echo $row['uphone'] ?> <br>
                                    <?php echo $row['uaddress'] ?>
                                </p> Payment :<span style=color:red;> <?php echo $row['payment'] ?></span><br><br>
                                <?php
                                if ($status == "Order Shipped") {
                                    ?>
                                    <a href="deliver_order.php?cart_id=<?php echo $row['cart_id'] ?>&delivery_details=<?php echo $row['delivery_id'] ?>"
                                        class="btn btn-outline-success">Complete Deliver Order</a>
                                <?php } else if ($status == "Order Delivered & Completed") {
                                    ?>

                                        <a class="btn btn-outline-success">Order Delivered & Completed</a>

                                <?php } else {
                                    ?>
                                        <a href="take_order.php?cart_id=<?php echo $row['cart_id'] ?>&delivery_details=<?php echo $row['delivery_id'] ?>"
                                            class="btn btn-outline-success">take Order</a>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php
include './footer.php'

    ?>