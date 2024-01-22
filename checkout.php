<?php
session_start();
include 'includes/header.php';

// Check if the user is logged in or has filled out their shipping information
// You may need to implement user authentication and shipping information collection

// Assuming you have a session variable for user authentication, e.g., $_SESSION['user_id']


// Include the database connection and any necessary functions
include 'connection/db_connection.php';

// Fetch the user's cart items
$select_cart_products = mysqli_query($conn, "SELECT * FROM cart");


// Check if the user is logged in
if (!isset($_SESSION['army_logged_in']) || $_SESSION['army_logged_in'] !== true) {
    // Display the login modal when the user is not logged in
    echo '<script>$(document).ready(function() {
        $("#armyUsersLoginModal").modal("show");
    });</script>';
}

?>

<div class="container" style="margin-top: 150px;margin-bottom: 500px;background:#06396c40;padding:30px;border-radius:6px;">
    <h2>CHECKOUT</h2>
    <div class="row">
    <div class="col-md-8">
    <h3>SHIPPING INFORMATION</h3>
    <form action="process_checkout.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <!-- Add more fields as needed -->
        <hr>
        <div class="form-group">
           <h6> ***Please make your payment on this number(Bkash-01749475566) Then place your phone number and Transction Number.</h6>
            <label for="bkashNumber">Phone:</label>
            <input type="text" class="form-control" id="bkashNumber" name="bkashNumber" required>
        </div>
        <div class="form-group">
            <label for="tnxNumber">Tnx Number:</label>
            <input type="text" class="form-control" id="tnxNumber" name="tnxNumber" required>
        </div>
        <button type="submit" class="btn btn-info w-100">PLACE ORDER</button>
    </form>
</div>

        <div class="col-md-4" style="background:#06396c40;padding:30px;border-radius:6px;">
            <h3>ORDER SUMMERY</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_order_price = 0;

                    while ($row = mysqli_fetch_assoc($select_cart_products)) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        $subtotal = $row['quantity'] * $row['price'];
                        $total_order_price += $subtotal;
                        echo '<td>৳ ' . $subtotal . '/-</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <p>Total: ৳ <?php echo $total_order_price; ?>/-</p>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
include 'includes/modal.php';
?>
