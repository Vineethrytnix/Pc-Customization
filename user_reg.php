<?php
include './connection/connect.php';
include 'header.php';

?>
<style>
    .form-control {
        border: 1px solid cadetblue;
        background-color: rgb(32, 89, 139);
    }

    body {
        background-color: rgb(238, 248, 248);
    }
</style>

<br><br>
<section class="contact-section ">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <center>
                    <h2 class="contact-title"><b style="color: darkslategray">User Registration</b></h2>
                </center>
            </div><br><br>
            <div class="col-md-2"></div>
            <div class="col-lg-8">
                <form class="form-contact " enctype="multipart/form-data" method="post" id="contactForm"
                    novalidate="novalidate" style="background-color: rgb(255, 255, 255); padding: 50px;">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                    placeholder='Enter your name' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" required name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder='Enter email address'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" maxlength="10" minlength="10" pattern="[6789][0-9]{9}"
                                    name="phone" id="phone" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Mob number'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" name="password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    id="password" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Subject'" required
                                    placeholder='Enter Enter Your Password'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" required name="file" id="file" type="file"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                    placeholder='Enter Password'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <textarea class="form-control w-100" required name="address" id="address" cols="30"
                                    rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                    placeholder='Enter Your Address'></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <center><button type="submit" name="submit" class="btn_3 button-contactForm">Register</button>
                        </center>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>



<?php

include 'footer.php';
?>


<?php

if (isset($_POST['submit'])) {

    $Name = $_REQUEST['name'];
    $Phone = $_REQUEST['phone'];
    $Address = $_REQUEST['address'];
    $Email = $_REQUEST['email'];
    $Password = $_REQUEST['password'];
    $currentDate = date("Y-m-d");


    $formattedDate = date("d M Y", strtotime($currentDate));
    echo $formattedDate;

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = './image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `user` WHERE `uemail` = '$Email' OR `uphone` = '$Phone'";
        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Email or phone number already exists');
                window.location = 'user_reg.php';
            </script>";
        } else {
            $qryReg = "INSERT INTO `user`(`uname`,`uemail`,`uphone`,`uaddress`,`uimage`) VALUES('$Name','$Email','$Phone','$Address','$filename')";
            $qryLog = "INSERT INTO `login` (`rid`, `email`, `password`, `type`) VALUES((SELECT MAX(`uid`) FROM `user`),'$Email', '$Password', 'USER')";

            if ($conn->query($qryReg) === TRUE && $conn->query($qryLog) === TRUE) {
                echo "<script>alert('Registration Success'); window.location = 'login.php';</script>";
            } else {
                echo "<script>alert('Registration Failed'); window.location = 'user_reg.php';</script>";
            }
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
            window location = 'user_reg.php';
        </script>";
    }

}

?>