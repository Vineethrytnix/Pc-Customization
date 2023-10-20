<?php
session_start();
$cid = $_SESSION['uid'];
// echo $cid;
// $pid = $_REQUEST['pid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>

<section class="product_description_area">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-lg-6">
                    <div class="review_box">
                        <h4>Add Delivery Boy</h4>
                        <form class="row contact_form" method="post" novalidate="novalidate"
                            enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Address" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" id="email" name="password"
                                        placeholder="Enter Password" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="number" maxlength="10" minlength="10" pattern="[6789][0-9]{9}" name="phone"
                                        placeholder="Phone Number" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Profile Image</label>
                                    <input type="file" class="form-control" id="number" name="file"
                                        placeholder="Phone Number" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="address" required id="message" rows="4"
                                        style="height:150px" placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <center><button type="submit" name="submit" value="submit" class="btn_3">
                                        Submit Now
                                    </button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php
include './footer.php'
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
    $folder = '../image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `delivery_boy` WHERE `email` = '$Email' OR `phone` = '$Phone'";
        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist');
                window.location = 'add_deliveryboy.php';
            </script>";
        } else {

            $qryReg = "INSERT INTO `delivery_boy`(`dname`,`demail`,`dphone`,`daddress`,`dimage`,`cus_id`)values('$Name','$Email','$Phone','$Address','$filename','$cid')";
            $qryLog = "INSERT INTO `login` (`rid`, `email`, `password`, `type`) VALUES((select max(`did`) from `delivery_boy`),'$Email', '$Password', 'DELIVERY_BOY')";


            if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
                echo "<script>alert('Registration Success'); window.location = 'add_deliveryboy.php';</script>";
            } else {
                echo "<script>alert('Registration Failed'); window.location = 'add_deliveryboy.php';</script>";
            }
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
            window.location = 'add_deliveryboy.php';
        </script>";
    }
}

?>