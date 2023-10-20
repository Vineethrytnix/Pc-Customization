<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?>
<br><br>
<center>
    <div class="confirmation_tittle">
        <span>Orders Details.</span>
    </div>
</center>
<!-- 
<style>
    th{
        
    }
</style> -->

<section class="confirmation_part ">
    <div class="container">

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
                                <th scope="col" colspan="2" style="padding-left:70px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $view = "SELECT `cart`.*,`products`.*,`user`.*,`payment`.* FROM `products`,`cart`,`user`,`payment` WHERE `cart`.`pid`=`products`.`pid` AND `payment`.`cart_id`=`cart`.`cart_id` AND `cart`.`cus_id`='$cid' AND `cart`.`user_id`=`user`.`uid` AND `cart`.`status`='Purchased' AND `cart`.`payment`='Paid'";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                $cart_id = $row['cart_id'];
                                ?>
                                <tr>
                                    <th colspan="2"><span>
                                            <?php echo $row['pname'] ?>
                                        </span></th>
                                    <th>
                                        <?php echo $row['qty'] ?> x
                                        <?php echo $row['price'] ?>
                                    </th>
                                    <th> <span>
                                            <?php echo $row['price'] ?>.00
                                        </span></th>
                                    <th> <span>
                                            <a
                                                href="delete_ordered.php?cart_id=<?php echo $row['cart_id'] ?>&pay_id=<?php echo $row['pay_id'] ?>"><img
                                                    src="../img/trash.png" width="30px" alt=""></a>
                                        </span></th>
                                    <th> <span>
                                            <a href="assign_delivery_boy.php?cart_id=<?php echo $row['cart_id'] ?>&pay_id=<?php echo $row['pay_id'] ?>" class="btn btn-outline-info">Assign Order</a>
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
                            $vi = "SELECT SUM(tamount) AS total FROM `cart` WHERE `cus_id`='$cid' and `status`='Purchased' and `payment`='Paid'";
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