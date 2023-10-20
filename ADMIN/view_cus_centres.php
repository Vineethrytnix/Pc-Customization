<?php
include '../connection/connect.php';
include './header.php';

?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");

    .containers {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .containers .box {
        position: relative;
        width: 20rem;
        /* Reduced the width */
        height: 20rem;
        /* Reduced the height */
        margin: 2rem;
        /* Reduced the margin */
    }

    .containers .box:hover .imgBox {
        transform: translate(0, -4.5rem);
    }

    .containers .box:hover .content {
        transform: translate(0, 4.5rem);
    }

    .imgBox {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        transition: all 0.5s ease-in-out;
    }

    .imgBox img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 1rem;
        /* Reduced padding */
        display: flex;
        justify-content: center;
        background-color: #fff;
        z-index: 1;
        align-items: flex-end;
        text-align: center;
        transition: 0.5s ease-in-out;
    }

    .content h2 {
        display: block;
        font-size: 1.5rem;
        /* Reduced font size */
        color: #111;
        font-weight: 500;
        line-height: 1.5rem;
        /* Reduced line height */
        letter-spacing: 1px;
    }

    .content span {
        color: #555;
        font-size: 1rem;
        /* Reduced font size */
        font-weight: 300;
        letter-spacing: 1px;
        /* Reduced letter spacing */
    }

    @media (max-width: 600px) {
        .containers .box:hover .content {
            transform: translate(0, 2.5rem);
        }

        .containers .box:hover .imgBox {
            transform: translate(0, -2.5rem);
        }
    }

    /*# sourceMappingURL=main.css.map */
</style>
<br><br><br>
<center>
    <h1><b>View Customization Centres</b></h1>
    <p>Requests</p>
</center><br><br>
<div class="containers">
    <?php
    $view = "SELECT `customizing_centre`.*,`login`.* FROM `customizing_centre`,`login` WHERE `login`.`rid`=`customizing_centre`.`cid` AND `login`.`type`='SERVICE CENTRE' AND `login`.`status`='nil'";
    $exe = mysqli_query($conn, $view);
    while ($row = mysqli_fetch_array($exe)) {

        ?>
        <div class="box">
            <div class="imgBox">
                <img src="../image/<?php echo $row['cimage'] ?>" alt="">
            </div>
            <div class="content">
                <h2>
                    <?php echo $row['cname'] ?></br>
                    <span>
                        <?php echo $row['caddress'] ?>
                        <?php echo $row['cphone'] ?>
                    </span><br>
                    <span>
                        <?php echo $row['cemail'] ?>
                    </span><br><br>
                    <a href="approve_pc_cus.php?cus_id=<?php echo $row['cid'] ?>" class="btn btn-outline-info">Approve</a>
                    <a href="reject_cs.php?cus_id=<?php echo $row['cid'] ?>" class="btn btn-outline-danger">Delete</a>
                </h2>
            </div>
        </div>
    <?php } ?>
</div>
<br><br>

<center>

    <h2><b style="color: #555;">Approved Customization </b></h2><br><br>

    <table class="table table-bordered" style="width:80%; vertical-align: middle;text-align: center;">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>]
                <th scope="col">Status</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            $view = "SELECT `customizing_centre`.*,`login`.* FROM `customizing_centre`,`login` WHERE `login`.`rid`=`customizing_centre`.`cid` AND `login`.`type`='SERVICE CENTRE' AND `login`.`status`='Approved'";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {

                ?>
                <tr>
                    <th scope="row"><img src="../image/<?php echo $row['cimage'] ?>" width="50px" alt=""></th>
                    <td><?php echo $row['cname'] ?></td>
                    <td><?php echo $row['cemail'] ?></td>
                    <td><?php echo $row['cphone'] ?></td>
                    <td><?php echo $row['caddress'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</center>

<?php
include './footer.php'
    ?>