<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
// $pid = $_REQUEST['pid'];
// $cus_id = $_REQUEST['cid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>


<section class="confirmation_part padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="confirmation_tittle">
                    <span>Thank you. Your order has been received.</span>
                </div> -->
            </div>
            <?php
            $view = "SELECT `cart`.*,`products`.*,`user`.* FROM `products`,`cart`,`user` WHERE `cart`.`pid`=`products`.`pid` AND `cart`.`status`='Purchased' AND `cart`.`payment`='Paid' AND `cart`.`user_id`=`user`.`uid`";
            $exe = mysqli_query($conn, $view);
            if (mysqli_num_rows($exe) > 0) {
                while ($row = mysqli_fetch_array($exe)) {

                    ?>
                    <div class="col-lg-6 col-lx-4">
                        <div class="confirmation_tittle">
                            <span>Thank you. Your order has been received.</span>
                        </div>
                        <div class="single_confirmation_details">
                            <div class="single_product_item">
                                <img src="../img/shopping-cart.png" width="200px" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-lx-4">
                        <div class="single_confirmation_details">
                            <h4>shipping Address</h4>
                            <ul>
                                <li>
                                    <p>Product</p><span>:
                                        <?php echo $row['pname'] ?>
                                    </span>
                                </li>
                                <li>
                                    <p>Quantity</p><span>:
                                        <?php echo $row['qty'] ?>
                                    </span>
                                </li>
                                <li>
                                    <p>Price</p><span>:
                                        <?php echo $row['price'] ?>
                                    </span>
                                </li>
                                <li>
                                    <p>Address</p><span>:
                                        <?php echo $row['uaddress'] ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php }
            } else {
                // If there are no products, display "No Orders"
                echo '
                <center><span>No Order.</span></center>
            ';
            }
            ?>
            
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $view = "SELECT `cart`.*,`products`.*,`user`.*,`payment`.* FROM `products`,`cart`,`user`,`payment` WHERE `cart`.`pid`=`products`.`pid` AND `cart`.`status`='Purchased' AND `cart`.`payment`='Paid' AND `cart`.`user_id`=`user`.`uid` AND `payment`.`cart_id`=`cart`.`cart_id`";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                $cart_id = $row['cart_id'];
                                ?>
                                <tr>
                                    <th colspan="2"><span>
                                            <?php echo $row['pname'] ?>
                                        </span></th>
                                    <th>
                                        <?php echo $row['pname'] ?>
                                    </th>
                                    <th> <span>
                                            <?php echo $row['price'] ?>.00
                                        </span></th>
                                    <th> <span>
                                            <a
                                                href="delete_ordered.php?cart_id=<?php echo $row['cart_id'] ?>&pay_id=<?php echo $row['pay_id'] ?>"><img
                                                    src="../img/trash.png" width="30px" alt=""></a>
                                        </span></th>
                                </tr>

                                <!-- <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th> <span>$2160.00</span></th>
                                </tr> -->
                            <?php } ?>
                        </tbody>
                        <tfoot>

                            <?php
                            $vi = "SELECT SUM(tamount) AS total FROM `cart` WHERE `user_id`='$uid' and `status`='Purchased' and `payment`='Paid'";
                            $ex = mysqli_query($conn, $vi);
                            while ($rows = mysqli_fetch_array($ex)) {
                                $amt = $rows['total'];
                                if (mysqli_num_rows($ex) > 0) {

                                    echo "<tr>
                                                    <th scope='col' colspan='3'>Quantity</th>
                                                    <th scope='col'>Total = $$amt</th>
                                                </tr>";

                                }
                            }

                            ?>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
include './footer.php'
    ?>