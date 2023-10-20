<?php
session_start();
// $uid = $_SESSION['uid'];
include '../connection/connect.php';
$uid=$_REQUEST['uid'];


?>

<?php

$del="DELETE FROM `user` WHERE `uid`='$uid'";
$dell="DELETE FROM `login` WHERE `rid`='$uid' and `type`='USER'";

if ($conn->query($del) == TRUE && $conn->query($dell) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_users.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_users.php';</script>";
}


?>