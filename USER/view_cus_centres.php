<?php
session_start();
$uid = $_SESSION['uid'];
// echo $cid;
// $pid = $_REQUEST['pid'];
// $cus_id = $_REQUEST['cid'];
// echo $pid;

include '../connection/connect.php';
include './header.php';

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Inter, sans-serif;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: #f5f5f5;
    } */

    .wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 20px;
        display: flex;
        align-content: center;
        justify-content: center;
        gap: 24px;
        flex-wrap: wrap;
    }

    .card {
        position: relative;
        width: 325px;
        height: 450px;
        background: #000;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        color: white;
    }

    .poster {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .poster::before {
        content: '';
        position: absolute;
        bottom: -45%;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        transition: .3s;
    }

    .card:hover .poster::before {
        bottom: 0;
    }

    .poster img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .3s;
    }

    .card:hover .poster img {
        transform: scale(1.1);
    }

    .details {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        height: auto;
        padding: 1.5em 1.5em 2em;
        background: #000a;
        backdrop-filter: blur(16px) saturate(120%);
        transition: .3s;
        color: #fff;
        z-index: 2;
    }

    .card:hover .details {
        bottom: 0;
    }

    .details h1,
    .details h2 {
        font-weight: 700;
    }

    .details h1 {
        font-size: 1.5em;
        margin-bottom: 5px;
    }

    .details h2 {
        font-weight: 400;
        font-size: 1em;
        margin-bottom: 10px;
        opacity: .6;
    }

    .details .rating {
        position: relative;
        margin-bottom: 15px;
        display: flex;
        gap: .25em;
    }

    .details .rating i {
        color: #e3c414;
    }

    .details .rating span {
        margin-left: 0.25em;
    }

    .details .tags {
        display: flex;
        gap: .375em;
        margin-bottom: .875em;
        font-size: .85em;
    }

    .details .tags span {
        padding: .35rem .65rem;
        color: #fff;
        border: 1.5px solid rgba(255 255 255 / 0.4);
        border-radius: 4px;
        border-radius: 50px;
    }

    .details .desc {
        color: #fff;
        opacity: .8;
        line-height: 1.5;
        margin-bottom: 1em;
    }

    .details .cast h3 {
        margin-bottom: .5em;
    }

    .details .cast ul {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        gap: 0.625rem;
        width: 100%;
    }

    .details .cast ul li {
        list-style: none;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        overflow: hidden;
        border: 1.5px solid #fff;
    }

    .details .cast ul li img {
        width: 100%;
        height: 100%;
    }
</style><br><br>
<center>
    <h1><b>Customizing Centre</b></h1>
</center>
<br><br>
<section class="product_list ">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="wrapper">
                    <?php
                    $view = "SELECT * FROM `customizing_centre`";
                    $exe = mysqli_query($conn, $view);
                    while ($row = mysqli_fetch_array($exe)) {
                        $cus_id = $row['cid'];

                        ?>
                        <div class="card">
                            <div class="poster"><img src="../image/<?php echo $row['cimage'] ?>" alt="Location Unknown">
                            </div>
                            <div class="details">
                                <h1 style="color:white;">
                                    <?php echo $row['cname'] ?>
                                </h1>
                                <h2 style="color:white;">
                                    <?php echo $row['cemail'] ?>
                                </h2>
                                <?php
                                $cnt_query = "SELECT COUNT(*) FROM `rating` WHERE `cus_id`='$cus_id'";
                                $sum_query = "SELECT SUM(`rating`) FROM `rating` WHERE `cus_id`='$cus_id'";

                                // Execute the count query
                                $count_result = mysqli_query($conn, $cnt_query);
                                $count_row = mysqli_fetch_row($count_result);
                                $count = $count_row[0];

                                // Execute the sum query
                                $sum_result = mysqli_query($conn, $sum_query);
                                $sum_row = mysqli_fetch_row($sum_result);

                                if ($count > 0) {
                                    $sum = $sum_row[0];
                                    $total_rating = $sum / $count;
                                    // echo $total_rating;
                            
                                    ?>
                                    <?php if ($total_rating == 5) { ?>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>

                                            <!-- <i class="far fa-star"></i> no start -->
                                            <span>
                                                <?php echo $total_rating ?>/5
                                            </span>
                                        </div>
                                    <?php } else if ($total_rating == 4) { ?>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>
                                                <?php echo $total_rating ?>/5
                                                </span>
                                            </div>
                                    <?php } else if ($total_rating == 3) { ?>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <span>
                                                <?php echo $total_rating ?>/5
                                                    </span>
                                                </div>
                                    <?php } else if ($total_rating == 2) { ?>
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span>
                                                <?php echo $total_rating ?>/5
                                                        </span>
                                                    </div>
                                    <?php } else if ($total_rating == 1) { ?>
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <span>
                                                <?php echo $total_rating ?>/5
                                                            </span>
                                                        </div>
                                    <?php } else { ?>

                                    <?php } ?>

                                <?php } else { ?>
                                    No Ratings Yet
                                <?php } ?>
                                <p class="desc">
                                    Contact :
                                    <?php echo $row['cphone'] ?><br>
                                    Address :
                                    <?php echo $row['caddress'] ?>
                                </p>
                                <div class="tags">
                                    <!-- <h3>Cast</h3> -->
                                    <center><a href="add_requirement.php?cus_id=<?php echo $row['cid'] ?>"> <span
                                                class="tag">Add Requirements</span></a>
                                        <a href="add_review.php?cus_id=<?php echo $row['cid'] ?>"> <span class="tag">Add
                                                Rating & Review</span></a>
                                    </center>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
include './footer.php'
    ?>