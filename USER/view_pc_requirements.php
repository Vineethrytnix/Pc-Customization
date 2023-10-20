<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?>


<section class="confirmation_part ">
    <br>
    <br><center><h1><b>View My Requirements</b></h1></center>
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">System</th>
                                <th scope="col">Service Centre</th>
                                <th scope="col">Requirements</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $view = "SELECT `requirements`.*,`customizing_centre`.* FROM `customizing_centre`,`requirements` WHERE `customizing_centre`.`cid`=`requirements`.`cus_id` AND `requirements`.`uid`='$uid'";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                $cart_id = $row['req_id'];
                                ?>
                                <tr>
                                    <th colspan="2"><span>
                                            <?php echo $row['system'] ?>
                                        </span></th>
                                    <th>
                                        <?php echo $row['cname'] ?>
                                    </th>
                                    <th> <span>
                                            <?php echo $row['desc'] ?>
                                        </span></th>
                                    <th> <span>
                                            <?php echo $row['date'] ?>
                                        </span></th>
                                        
                                    <th> <span>
                                            <a
                                                href="delete_req.php?req_id=<?php echo $row['req_id'] ?>"><img
                                                    src="../img/trash.png" width="30px" alt=""></a>
                                        </span></th>
                                </tr>

                                <!-- <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th> <span>$2160.00</span></th>
                                </tr> -->
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
include './footer.php'
    ?>