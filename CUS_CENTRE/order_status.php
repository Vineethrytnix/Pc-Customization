<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
$cart_id = $_REQUEST['cart_id'];
echo $cart_id;
$did = $_REQUEST['did'];
$dname = $_REQUEST['name'];
$user_id = $_REQUEST['uid'];
include '../connection/connect.php';
include './header.php';


date_default_timezone_set('Asia/Kolkata');
$current_time = date('h:i A');
// echo $current_time;
//date
$currentDate = date("Y-m-d");
$formattedDate = date("d M Y", strtotime($currentDate));

?>



<?php
$insert = "INSERT INTO `delivery_details`(`cus_id`,`uid`,`db_id`,`assign_date`,`dstatus`,`cart_id`)VALUES('$cid','$user_id','$did','$formattedDate','Assigned','$cart_id')";

$update = "UPDATE `cart` SET `shipping`='Order Packed' WHERE `cart_id`='$cart_id' AND `status`='Purchased'";
$update1 = "UPDATE `delivery_boy` SET `status`='Busy' WHERE `did`='$did'";

// $exe = mysqli_query($conn, $insert);
if ($conn->query($insert) == TRUE && $conn->query($update) == True && $conn->query($update1) == True) {
    echo "<script>alert('Order Assined to $dname '); window.location = 'assign_delivery_boy.php';</script>";
} else {
    echo "<script>alert('Fail to assign'); window.location = 'assign_delivery_boy.php';</script>";
}
?>

<?php
include './footer.php'
    ?>