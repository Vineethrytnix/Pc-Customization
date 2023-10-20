<?php
session_start();
$uid = $_SESSION['uid'];
include '../connection/connect.php';
// $pay_id = $_REQUEST['pay_id'];
$cus_id = $_REQUEST['cus_id']

    ?>

<?php

$up="UPDATE `login` SET `status`='Rejected' WHERE `rid`='$cus_id' and `type`='SERVICE CENTRE'";

if ($conn->query($up) == TRUE) {
    echo "<script>alert('Approved Customization Center'); window.location = 'view_cus_centres.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_cus_centres.php';</script>";
}


?>