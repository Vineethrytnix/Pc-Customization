<?php
session_start();
$did = $_SESSION['uid'];
// echo $cid;
$cart_id = $_REQUEST['cart_id'];
$dd_id = $_REQUEST['delivery_details'];
// echo $pid;

include '../connection/connect.php';
// include './header.php';

?>





<?php

$up="UPDATE `cart` SET `shipping`='Order Delivered & Completed' WHERE `cart_id`='$cart_id'";
$update1="UPDATE `delivery_boy` SET `status`='Free' WHERE `did`='$did'";
$update="UPDATE `delivery_details` SET `dstatus`='Order Delivered & Completed' WHERE `cart_id`='$cart_id' AND `delivery_id`='$dd_id'";
if ($conn->query($up) == TRUE && $conn->query($update) == True && $conn->query($update1) == True) {
    echo "<script>alert('Order Completed And Delivered Successfully'); window.location = 'my_orders.php';</script>";
} else {
    echo "<script>alert('Fail'); window.location = 'my_orders.php';</script>";
}

// include './footer.php'
    ?>