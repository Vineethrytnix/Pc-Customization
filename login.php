<?php
session_start();
include './connection/connect.php';
include 'header.php';

?>


<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="#" class="btn_3">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome Back ! <br>
                            Please Sign in now</h3>
                        <form class="row contact_form"  method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="name" name="Email" value=""
                                    placeholder="Username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="Password" value=""
                                    placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group">
                                
                                <button type="submit" name="submit" value="submit" class="btn_3">
                                    log in
                                </button>
                                <!-- <a class="lost_pass" href="#">forget password?</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.php';
?>
<?php


if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['Email'];
    $password = $_REQUEST['Password'];
    $qry = "SELECT * FROM `login` WHERE `email` = '$email' AND `password` = '$password'";
    echo $qry;
    
    $result = mysqli_query($conn, $qry);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $uid = $data['rid'];
        $type = $data['type'];
        $status = $data['status'];

        // $_SESSION['uidd']= $uid;
        $_SESSION['uid'] = $uid;
        echo $uid;
        $_SESSION['type'] = $type;

        if ($type == 'ADMIN') {
            echo "<script>alert('Welcome to AdminHome '); window.location = 'ADMIN/index.php'</script>";
        } else if ($type == 'USER') {
            echo "<script>alert('Welcome User'); window.location = 'USER/index.php'</script>";
        } 
        else if ($type == 'DELIVERY_BOY') {
            echo "<script>alert('Welcome User'); window.location = 'DELIVERY_BOY/index.php'</script>";
        }
         else if ($type == 'SERVICE CENTRE') {
            if ($status == 'Approved') {
                echo "<script>alert('Welcome '); window.location = 'CUS_CENTRE/index.php?id=$uid'</script>";
            } else if ($status == 'Rejected') {
                echo "<script>alert('You Login Request Rejected by Admin '); window.location = 'login.php'</script>";
            } else {
                echo "<script>alert('Your Not Approved Yet '); window.location = 'login.php'</script>";
            }
        } 
        else {
            echo "<script>alert('Login Failed')</script>";
        }
    } else {
        echo "<script>alert('Invalid Email / Password'); window.location = 'login.php'</script>";
    }
}
?>