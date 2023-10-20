<?php
session_start();
$uid = $_SESSION['uid'];
$cus_id = $_REQUEST['cus_id'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>
<section class="product_description_area">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-lg-6">
                    <div class="review_box">
                        <h4>Add Your System Requirement</h4>
                        <form class="row contact_form" method="post" novalidate="novalidate"
                            enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter What Your want to build" required />
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Address" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="number" name="number"
                                        placeholder="Phone Number" />
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="desc" required id="message" rows="4"
                                        style="height:150px" placeholder="Message"></textarea>
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
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['desc'];
    // $amount = $price * $qty;
    date_default_timezone_set('Asia/Kolkata');
    $current_time = date('h:i A');
    // echo $current_time;

    //date
    $currentDate = date("Y-m-d");
    $formattedDate = date("d M Y", strtotime($currentDate));

    $ins = "INSERT INTO `requirements`(`system`,`desc`,`date`,`uid`,`cus_id`,`status`,`payment`)VALUES('$name','$desc','$formattedDate','$uid','$cus_id','Requested','not paid')";
    // echo $ins,$amount;
    // $exe=mysqli_query($conn,$ins);
    if ($conn->query($ins) == TRUE) {
        echo "<script>alert('System requirement added'); window.location = 'view_cus_centres.php';</script>";
    } else {
        echo "<script>alert('Failed'); window.location = 'view_cus_centres.php';</script>";
    }

}



?>