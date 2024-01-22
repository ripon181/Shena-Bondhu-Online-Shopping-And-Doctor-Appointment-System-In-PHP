<?php
include 'inc/header.php';
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>Delete Product</h2>
    <?php
    // Include your database connection
    include '../connection/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        // Get the product ID from the POST data
        $product_id = $_POST['id'];

        // Query to delete the product from the database
        $sql = "DELETE FROM products WHERE id = $product_id";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Product deleted successfully !!!."); window.location.href = "manageProduct.php";</script>';
        } else {
            echo '<div class="alert alert-danger">Error deleting product: ' . $conn->error . '</div>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
<style>
    .btn-danger:hover{
        color:#000;
    }
</style>
<?php
include 'inc/footer.php';
?>
