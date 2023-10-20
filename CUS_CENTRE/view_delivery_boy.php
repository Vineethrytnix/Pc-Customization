<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
// $pid = $_REQUEST['pid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>

<div class="container py-5">
    <div class="row text-center text-white">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Delivery Boy</h1>
        </div>
    </div>
</div><!-- End -->


<div class="container">
    <div class="row text-center">
        <?php
        $view = "SELECT * FROM `delivery_boy` WHERE `cus_id`='$cid'";
        $exe = mysqli_query($conn, $view);
        while ($row = mysqli_fetch_array($exe)) {

            ?>
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4" style="border:1px solid dimgrey;"><img
                        src="../image/<?php echo $row['dimage'] ?>" alt="" width="100"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><?php echo $row['dname'] ?></h5><span class="small text-uppercase text-muted">User</span><span class="small text-uppercase text-muted">Email : <?php echo $row['demail'] ?></span>
                    <span class="small text-uppercase text-muted">Contact : <?php echo $row['dphone'] ?></span>
                    <span class="small text-uppercase text-muted">Address : <?php echo $row['daddress'] ?></span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php
include './footer.php'
    ?>