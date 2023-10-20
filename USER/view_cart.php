<?php
session_start();
$uid = $_SESSION['uid'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>

<style>
    table {
        text-align: center;
    }
</style>


<center><br><br>
    <b>
        <h1>Shopping Cart <img src="../img/cart.png" width="50px" alt=""></h1>
    </b><br><br><br>
</center>
<section class="cart_area ">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $view = "SELECT `cart`.*,`products`.* FROM `products`,`cart` WHERE `cart`.`pid`=`products`.`pid` AND `cart`.`user_id`='$uid' AND `cart`.`status`='incart'";
                        $exe = mysqli_query($conn, $view);
                        $total = 0;

                        // Check if there are products in the cart
                        if (mysqli_num_rows($exe) > 0) {
                            while ($row = mysqli_fetch_array($exe)) {
                                $price = $row['price'];
                                $pid = $row['pid'];
                                $cartId = $row['cart_id'];
                                $amount = $row['tamount'];
                                $qty = $row['qty'];
                                $cus_id = $row['cus_id'];
                                // $subtotal = $price * $quantity;
                                // $total += $subtotal; 
                                ?>
                                <tr>
                                    <td>
                                        <img src="../image/<?php echo $row['p_image']; ?>" width="100px" alt="">
                                    </td>
                                    <td>
                                        <?php echo $row['pname']; ?>
                                    </td>
                                    <td>&#8377;
                                        <?php echo $price; ?>

                                    <td>
                                        <?php echo $qty; ?>
                                    </td>
                                    <td>
                                        &#8377;
                                        <?php echo $amount; ?>

                                    </td>
                                    <td>
                                        <a href="delete_cart.php?cart_id=<?php echo $cartId; ?>"><img src="../img/delete.png"
                                                width="30px" alt="hsedhjdsvhj"></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // No products in cart
                            echo '<tr><th colspan="6"><center><h1>No products in cart <img src="../img/empty-cart.png" width="60px" alt=""></h1></center></th></tr>';
                        }
                        ?>
                        <tr>
                            <th colspan="6">
                                <div class="cupon_text float-right">

                                    <p>Total: &#8377; <span id="total">
                                            <?php
                                            $vi = "SELECT SUM(tamount) AS total FROM `cart` WHERE `user_id`='$uid' and `status`='incart' and `payment`='not paid'";
                                            $ex = mysqli_query($conn, $vi);
                                            while ($rows = mysqli_fetch_array($ex)) {
                                                $amt = $rows['total'];
                                                if (mysqli_num_rows($ex) > 0) {

                                                    echo "<b>$amt.00</br>";
                                                }
                                            }

                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6">
                                <div class="cupon_text float-right">
                                    <?php
                                    if (mysqli_num_rows($exe) > 0) {
                                        // Display the "Proceed to checkout" button if there are products in the cart
                                        $url = 'payment1.php?amount=' . $amount .'&cart_id=' . $cartId . '&cus=' . $cus_id . '&pid=' . $pid;
                                        echo '<a class="btn_1" href="' . $url . '">Proceed to checkout</a>';
                                    }
                                    ?>
                                </div>

                            </th>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>


<script>
    // JavaScript code for updating quantity and calculating total
    const quantityInputs = document.querySelectorAll('.quantity');
    const totalElement = document.getElementById('total');
    const checkoutButton = document.getElementById('checkout');

    // Function to update the subtotal and total
    function updateTotals() {
        let newTotal = 0;
        quantityInputs.forEach(input => {
            const cartId = input.getAttribute('data-cart-id');
            const price = parseFloat(input.parentElement.previousElementSibling.textContent.slice(2)); // Remove '&#8377;'
            const quantity = parseInt(input.value);
            const subtotal = price * quantity;
            newTotal += subtotal;
            document.querySelector(`[data-cart-id="${cartId}"]`).parentElement.nextElementSibling.textContent = `₹ ${subtotal.toFixed(2)}`;
        });
        totalElement.textContent = `${newTotal.toFixed(2)}`;
    }

    // Event listeners for quantity input changes
    quantityInputs.forEach(input => {
        input.addEventListener('input', () => {
            updateTotals();
        });
    });

    // Event listener for checkout button
    checkoutButton.addEventListener('click', () => {
        // Add your code to handle the checkout process here
        alert('Checkout button clicked');
    });

    // Initial total calculation
    updateTotals();
</script>
</body>


<?php
include 'footer.php'
    ?>