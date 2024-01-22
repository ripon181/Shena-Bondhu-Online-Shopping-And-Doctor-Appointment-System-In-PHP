<?php
include 'inc/header.php';
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <?php
    // Include your database connection
    include '../connection/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $product_id = $_GET['id'];
        // Query to get the product details from the database
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $product_name = $row['name'];
            $product_description = $row['description'];
            $product_price = $row['price'];
            $product_category = $row['category'];
        } else {
            echo '<p>Product not found.</p>';
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $product_id = $_POST['id'];
        $product_name = $_POST['name'];
        $product_description = $_POST['description'];
        $product_price = $_POST['price'];
        $product_category = $_POST['category'];

        // Query to update the product in the database
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, category = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $product_name, $product_description, $product_price, $product_category, $product_id);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Product updated successfully.</div>';
        } else {
            echo '<div class="alert alert-danger">Error updating product: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    }
    ?>

    <form method="post" action="editProduct.php">
        <input type="hidden" name="id" value="<?php echo $product_id; ?>">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product_name; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $product_description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (৳):</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product_price; ?>" min="0.01" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                <option value="1" <?php echo ($product_category == 1) ? 'selected' : ''; ?>>Grocery</option>
                <option value="2" <?php echo ($product_category == 2) ? 'selected' : ''; ?>>Medicine</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary w-100" value="Update Product">
    </form>
</div>

<?php
include 'inc/footer.php';
?>
