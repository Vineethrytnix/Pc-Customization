<?php
session_start();
$uid = $_SESSION['uid'];
include '../connection/connect.php';
$pay_id=$_REQUEST['pay_id'];
$cart_id=$_REQUEST['cart_id']

?>

<?php

$del="DELETE FROM `cart` WHERE `cart_id`='$cart_id' AND `user_id`='$uid'";
$dell="DELETE FROM `payment` WHERE `pay_id`='$pay_id' AND `uid`='$uid'";

if ($conn->query($del) == TRUE && $conn->query($dell) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_orders.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_orders.php';</script>";
}


?>