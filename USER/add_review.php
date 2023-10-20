<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
$cus_id = $_REQUEST['cus_id'];
// $cus_id = $_REQUEST['cid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

    /* html,
    body {
        height: 100%
    }

    body {
        display: grid;
        place-items: center;
        font-family: 'Manrope', sans-serif;
        background: red;

    } */

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        padding: 20px;
        width: 450px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
    }

    .comment-box {

        padding: 5px;
    }



    .comment-area textarea {
        resize: none;
        border: 1px solid #ad9f9f;
    }


    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px rgb(255, 0, 0) !important;
    }

    .send {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000;
    }

    .send:hover {
        color: #fff;
        background-color: #f50202;
        border-color: #f50202;
    }


    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left;
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #ffe600;
        cursor: pointer;
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Add Review & Rating</title>
</head>

<body>
    <center><br><br>
        <h1><b>Add Review & Rating</b></h1>
        <br><br>
        <div class="card">
            <div class="row">
                <?php
                $vie = "SELECT * FROM `customizing_centre` WHERE `cid`='$cus_id'";
                $exe = mysqli_query($conn, $vie);
                while ($ro = mysqli_fetch_array($exe)) {
                    ?>
                    <div class="col-2">
                        <img src="../image/<?php echo $ro['cimage'] ?>" width="300px" class="rounded-circle mt-3">
                    </div>
                <?php } ?>
                <div class="col-10">
                    <form action="" method="post">
                        <div class="comment-box ml-2">
                            <h4>Add a comment</h4>
                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <div class="comment-area">
                                <textarea class="form-control" name="review" placeholder="What is your view?"
                                    rows="4"></textarea>
                            </div>
                            <div class="comment-btns mt-2">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-6">
                                        <center>
                                            <button class="btn btn-success" type="submit" style="width: 100px;"
                                                name="submit">Send<i class="fa fa-long-arrow-right ml-1"></i></button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>

    <?php
    if (isset($_POST['submit'])) {
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        // Make sure to define $cus_id and $uid appropriately
    
        // Check if cus_id and uid already exist in the rating table
        $checkQuery = "SELECT * FROM `rating` WHERE `cus_id`='$cus_id' AND `uid`='$uid'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
            echo "<script>alert('Review & Rating already Added'); window.location = 'view_cus_centres.php';</script>";
        } else {
            // If the combination doesn't exist, then insert the new record
            $ins = "INSERT INTO `rating`(`cus_id`,`rating`,`review`,`uid`) VALUES('$cus_id','$rating','$review','$uid')";

            if ($conn->query($ins) == TRUE) {
                echo "<script>alert('Review & Rating Added'); window.location = 'view_cus_centres.php';</script>";
            } else {
                echo "<script>alert('Failed'); window.location = 'add_review.php';</script>";
            }
        }
    }
    ?>

</body>

</html>


<?php
include './footer.php'
    ?>