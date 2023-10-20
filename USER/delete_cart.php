<?php
session_start();
$uid = $_SESSION['uid'];
include '../connection/connect.php';
// $pid=$_REQUEST['pid'];
$cart_id=$_REQUEST['cart_id']

?>

<?php

$del="DELETE FROM `cart` WHERE `cart_id`='$cart_id' AND `user_id`='$uid'";

if ($conn->query($del) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_cart.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_cart.php';</script>";
}


?>