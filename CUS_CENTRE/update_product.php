<?php
session_start();
$cid = $_SESSION['uid'];
include '../connection/connect.php';
include './header.php';
$cus_id = $_REQUEST['cid'];
$pid = $_REQUEST['pid'];


?>

<style>
    #inp {
        border: 1px solid rgb(125, 128, 128);
        background-color: aliceblue;
    }

    body {
        background-color: rgb(243, 243, 243);
    }
</style>

<section class="contact-section padding_top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2 class="contact-title">Update Product Details</h2><br>
                </center>
            </div>
            <div class="col-md-2"></div>
            <div class="col-lg-8">
                <form class="form-contact " action="" enctype="multipart/form-data" method="post" id=""
                    novalidate="novalidate">
                    <?php
                    $sel = "SELECT * FROM `products` WHERE `pid`='$pid' AND `cus_id`='$cus_id'";
                    $exe = mysqli_query($conn, $sel);
                    while ($row = mysqli_fetch_array($exe)) {

                        ?>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="inp" type="text"
                                        onfocus="this.placeholder = ''" value="<?php echo $row['pname'] ?>"
                                        onblur="this.placeholder = 'Enter your name'" placeholder='Product name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="windows" id="inp" type="text"
                                        onfocus="this.placeholder = ''" value="<?php echo $row['pwindow'] ?>"
                                        onblur="this.placeholder = 'Specify Windows'" placeholder='Specify Windows'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="price" value="<?php echo $row['price'] ?>" id="inp"
                                        type="text" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter your name'" placeholder='Price'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="Prossesor" id="inp" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                        placeholder='Prossesor'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="brand" value="<?php echo $row['pbrand'] ?>" id="inp"
                                        type="text" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Subject'" placeholder='Brand Name'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="display" value="<?php echo $row['display'] ?>"
                                        id="inp" type="text" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Subject'" placeholder='Display Size'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="file" id="inp" type="file"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                        placeholder='Display Size'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" value="" name="desc" id="inp" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                        placeholder='Enter Detailed Description'><?php echo $row['desc'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <center><button type="submit" name="submit" class="btn_3 button-contactForm">Add Product</a>
                            </center>
                            <!-- <img src="../" alt=""> -->
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>




<?php


if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $brand = $_REQUEST['brand'];
    $windows = $_REQUEST['windows'];
    $price = $_REQUEST['price'];
    $Prossesor = $_REQUEST['Prossesor'];
    $display = $_REQUEST['display'];
    $desc = $_REQUEST['desc'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = '../image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryReg = "UPDATE `products` SET `pname`='$name',`pbrand`='$brand',`pwindow`='$windows',`price`='$price',`prossoser`='$prossoser',`display`='$display',`p_image`='$filename',`desc`='$desc' WHERE `pid`='$pid' AND `cus_id`='$cid'";

        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert('Product Added'); window.location = 'add_products.php';</script>";
        } else {
            echo "<script>alert('Failed'); window.location = 'add_products.php';</script>";
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
        window.location = 'user_register.php';
    </script>";
    }
}
?>





<?php
include './footer.php'
    ?>