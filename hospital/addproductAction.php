<?php
include '../connection/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];

    // Handle file upload (product image)
    $upload_dir = 'uploads/'; // Create this directory in your project
    $image_filename = basename($_FILES['image']['name']);
    $target_file = $upload_dir . $image_filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // File upload was successful, insert product into the database
        $sql = "INSERT INTO products (name, description, price, image, category) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsi", $product_name, $product_description, $product_price, $image_filename, $product_category);

        if ($stmt->execute()) {
            // Product added successfully
            echo '<script>alert("Product Added Successfully!."); window.location.href = "dashboard.php";</script>';
            exit();
        } else {
            // Error inserting product
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error uploading the image
        echo "Error uploading the image.";
    }
}
?>
