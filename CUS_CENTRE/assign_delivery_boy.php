<?php
session_start();
$cid = $_SESSION['uid'];
$cart_id = $_REQUEST['cart_id'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?>


<style>
    table {
        text-align: center;
    }
</style>


<center><br><br>
    <b>
        <h1>Assign Order to Delivery Boy <img src="../img/delivery-boy.png" width="50px" alt=""></h1>
    </b><br><br><br>
</center>
<section class="cart_area ">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $view = "SELECT `delivery_boy`.*,`user`.*,`cart`.* FROM `user`,`delivery_boy`,`cart` WHERE `delivery_boy`.`cus_id`=`cart`.`cus_id` AND `cart`.`user_id`=`user`.`uid` AND `delivery_boy`.`cus_id`='$cid'";
                        $exe = mysqli_query($conn, $view);
                        $total = 0;

                        // Check if there are products in the cart
                        if (mysqli_num_rows($exe) > 0) {
                            while ($row = mysqli_fetch_array($exe)) {

                                $did = $row['did'];
                                $cus_id = $row['cus_id'];
                                // $cartId = $row['cart_id'];
                                // $amount = $row['tamount'];
                                // $qty = $row['qty'];
                                // $cus_id = $row['cus_id'];
                                // $subtotal = $price * $quantity;
                                // $total += $subtotal; 
                                ?>
                                <tr>
                                    <td>
                                        <img src="../image/<?php echo $row['dimage']; ?>" width="100px" alt="">
                                    </td>
                                    <td>
                                        <?php echo $row['dname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['demail']; ?>

                                    <td>
                                        <?php echo $row['dphone'];
                                        ; ?>
                                    </td>
                                    <td>

                                        <?php echo $row['daddress'];
                                        ; ?>

                                    </td>
                                    <td>
                                        <?php if ($row['status'] == "Free") { ?>
                                            <a href="order_status.php?did=<?php echo $did; ?>&name=<?php echo $row['dname']; ?>&uid=<?php echo $row['user_id']; ?>&cart_id=<?php echo $cart_id; ?>"
                                                class="btn btn-outline-info">Assign</a>
                                        <?php } else { ?>
                                            <a href="" class="btn btn-outline-warning"><?php echo $row[7]; ?></a>
                                      <?php  } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // No products in cart
                            echo '<tr><th colspan="6"><center><h1>No products in cart <img src="../img/empty-cart.png" width="60px" alt=""></h1></center></th></tr>';
                        }
                        ?>
                        <tr>
                            <th colspan="6">
                                <div class="cupon_text float-right">

                                    <!-- <p>Total: &#8377; <span id="total">
                                            <?php
                                            $vi = "SELECT SUM(tamount) AS total FROM `cart` WHERE `cus_id`='$cid' and `status`='Purchased' and `payment`='Paid'";
                                            $ex = mysqli_query($conn, $vi);
                                            while ($rows = mysqli_fetch_array($ex)) {
                                                $amt = $rows['total'];
                                                if (mysqli_num_rows($ex) > 0) {

                                                    echo "<b>$amt.00</br>";
                                                }
                                            }

                                            ?>
                                        </span>
                                    </p> -->
                                </div>
                            </th>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>


<?php
include './footer.php'
    ?>