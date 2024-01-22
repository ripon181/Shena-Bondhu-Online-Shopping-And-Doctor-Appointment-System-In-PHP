<?php
include 'inc/header.php';
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>Delete Product</h2>
    <?php
    // Include your database connection
    include '../connection/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        // Get the product ID from the URL
        $product_id = $_GET['id'];

        // Define an array to map category values to category names
        $categoryNames = [
            1 => 'Grocery',
            2 => 'Medicine',
            // Add more categories if needed
        ];

        // Query to fetch product details for confirmation
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $product = $result->fetch_assoc();
            echo '<div class="alert alert-danger">
                <p>Are you sure you want to delete the following product?</p>
                <p><strong>Name:</strong> ' . $product['name'] . '</p>
                <p><strong>Description:</strong> ' . $product['description'] . '</p>
                <p><strong>Price (৳):</strong> ' . $product['price'] . '</p>
                <p><strong>Category:</strong> ' . $categoryNames[$product['category']] . '</p>
                <img src="uploads/' . $product['image'] . '" alt="' . $product['name'] . '" style="max-width: 100px;">
            </div>';

            echo '<form method="post" action="deleteProductAction.php">
                <input type="hidden" name="id" value="' . $product_id . '">
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>';
        } else {
            echo '<p>Product not found.</p>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
<style>
    .btn-danger:hover {
        color: #000;
    }
</style>
<?php
include 'inc/footer.php';
?>
