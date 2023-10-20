<?php
include '../connection/connect.php';
include './header.php';

?>

<style>
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-familly: "Poppins", sans-serif;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #43345d;
        min-height: 800px;
    } */

    .containers {
        position: relative;
        width: 1100px;
        /* display: flex;
        align-items: center;
        justify-content: center; */
        flex-warp: warp;
        padding: 30px;
        margin-top: 50px;
    }

    .containers .cards {
        position: relative;
        max-width: 300px;
        height: 215px;
        background-color: #fff;
        margin: 30px 10px;
        padding: 20px 15px;

        display: flex;
        flex-direction: column;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        transition: 0.3s ease-in-out;
        border-radius: 15px;
    }

    .containers .cards:hover {
        height: 320px;
    }


    .containers .cards .image {
        position: relative;
        width: 260px;
        height: 260px;

        top: -40%;
        left: 8px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .containers .cards .image img {
        max-width: 100%;
        border-radius: 15px;
    }

    .containers .cards .content {
        position: relative;
        top: -140px;
        padding: 10px 15px;
        color: #111;
        text-align: center;

        visibility: hidden;
        opacity: 0;
        transition: 0.3s ease-in-out;

    }

    .containers .cards:hover .content {
        margin-top: 30px;
        visibility: visible;
        opacity: 1;
        transition-delay: 0.2s;

    }
</style>

<body><br> 
    <center><h1><b>View Users</b></h1></center>
    <section class="feature_part ">
        <div class="container">
            <div class="row ">
                <?php
                $view = "SELECT * FROM `user`";
                $exe = mysqli_query($conn, $view);
                while ($row = mysqli_fetch_array($exe)) {

                    ?>
                    <div class="col-lg-4 ">
                        <div class="containers">
                            <div class="cards">
                                <div class="image">
                                    <img href="#" src="../image/<?php echo $row['uimage'] ?>" style="border-radius:5px">
                                </div>
                                <div class="content">
                                    <h3><b>
                                            <?php echo $row['uname'] ?>
                                        </b></h3>
                                    <p>
                                        <?php echo $row['uemail'] ?>
                                    </p>
                                    <p>Contact :
                                        <?php echo $row['uphone'] ?><br>
                                        <?php echo $row['uaddress'] ?>
                                    </p>
                                    <br>
                                    <a href="delete_user.php?uid=<?php echo $row['uid'] ?>" class="btn btn-outline-info">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>



<!-- <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_1.png" alt="" height="250px">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_2.png" alt="" height="250px">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_4.png" height="250px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<?php
include './footer.php'
    ?>