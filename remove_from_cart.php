<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];

    // Loop through the cart items and remove the one with a matching ID
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            echo 'success';
            exit();
        }
    }
}

echo 'failure'; // If the removal fails
?>
