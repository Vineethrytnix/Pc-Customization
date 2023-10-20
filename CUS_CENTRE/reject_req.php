<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
$req_id=$_REQUEST['req_id'];
include '../connection/connect.php';
// include './header.php';

?>




<?php

$up="UPDATE `requirements` SET `status`='Rejected' WHERE `req_id`='$req_id'";
if ($conn->query($up) == TRUE) {
    echo "<script>alert('Rejected'); window.location = 'view_requirements.php';</script>";
} else {
    echo "<script>alert('Fail'); window.location = 'view_requirements.php';</script>";
}



    ?>