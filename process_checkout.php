<?php
session_start();
include 'connection/db_connection.php';

// Check if the user is logged in and retrieve their ID

// Check if the user is logged in
// Check if the user is logged in
if (!isset($_SESSION['army_logged_in']) || $_SESSION['army_logged_in'] !== true) {
    // Display the login modal when the user is not logged in
    echo '<script>$(document).ready(function() {
        $("#armyUsersLoginModal").modal("show");
    });</script>';
} else {
    // Retrieve the user's ID from the session
    $user_id =  $_SESSION["user_id"];
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$bkashNumber = $_POST['bkashNumber'];
$tnxNumber = $_POST['tnxNumber'];

// Insert order information into the 'orders' table for each cart item
$select_cart_products = mysqli_query($conn, "SELECT * FROM cart");

while ($row = mysqli_fetch_assoc($select_cart_products)) {
    $product_name = $row['name'];
    $quantity = $row['quantity'];
    $total_price = $row['price'] * $quantity;

    // Insert order details into the 'orders' table
    $insert_order_query = "INSERT INTO orders (user_id, name, phone, email, address, bkashNumber, tnxNumber, product_name, quantity, total_price) 
                           VALUES ('$user_id', '$name', '$phone', '$email', '$address', '$bkashNumber', '$tnxNumber', '$product_name', '$quantity', '$total_price')";

    if (mysqli_query($conn, $insert_order_query)) {
        // Order successfully inserted into the database
        // You may also want to update the cart and perform other actions here
        // Redirect the user to a confirmation page
        $cart_item_id = $row['id'];
        mysqli_query($conn, "DELETE FROM cart WHERE id = $cart_item_id");
        header('Location: order_confirmation.php');
        exit();
    } else {
        // Handle the error if the insertion fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>
