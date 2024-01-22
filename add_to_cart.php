<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    echo "Add to Cart button clicked";
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1 // Initial quantity is 1
    ];

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $product_id) {
            $item['quantity']++; // Increment quantity if the product is already in the cart
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $cart_item; // Add the product to the cart
    }
}

// Redirect back to the shop page
header("Location: groceryshop.php");
exit();
?>
