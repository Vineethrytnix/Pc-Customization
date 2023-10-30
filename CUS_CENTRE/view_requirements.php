<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
include '../connection/connect.php';
include './header.php';

?>


<section class="confirmation_part ">
    <br>
    <br>
    <center>
        <h1><b>View My Requirements</b></h1>
    </center>
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">System</th>
                                <th scope="col">ServiceCentre</th>
                                <th scope="col">Requirements</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                                <th scope="col">Customer Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $view = "SELECT `requirements`.*,`customizing_centre`.*,`user`.* FROM `customizing_centre`,`requirements`,`user` WHERE `customizing_centre`.`cid`=`requirements`.`cus_id` AND `requirements`.`uid`=`user`.`uid` AND `requirements`.`cus_id`='$cid'";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                $cart_id = $row['req_id'];
                                $status = $row['status'];
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

                                    <th>
                                        <?php if ($status == "Requested") { ?>

                                            <span>
                                                <a href="approve_req.php?req_id=<?php echo $row['req_id'] ?>"
                                                    class="btn btn-outline-success">Approve</a>
                                                <a href="reject_req.php?req_id=<?php echo $row['req_id'] ?>"
                                                    class="btn btn-outline-danger" style="margin-top:10px">Reject</a>
                                            </span>

                                        <?php } else if ($status == "Approved") {
                                            ?>
                                                <a class="btn btn-outline-info" style="margin-top:10px">Approved</a>

                                        <?php } else { ?>
                                                <a class="btn btn-outline-danger" style="margin-top:10px">Rejected</a>

                                        <?php } ?>

                                    </th>
                                    <th><a href="view_users.php?uid=<?php echo $row['uid'] ?>">View <img src="../img/social-media.png" width="30px" alt=""></a></th>
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