<?php
include 'inc/header.php';
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>Manage Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price (৳)</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include your database connection
            include '../connection/db_connection.php';

            // Define an array to map category values to category names
            $categoryNames = [
                1 => 'Grocery',
                2 => 'Medicine',
                // Add more categories if needed
            ];

            // Fetch all products from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    // Display category name based on category value
                    echo '<td>' . $categoryNames[$row['category']] . '</td>';
                    echo '<td><img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '" style="max-width: 100px;"></td>';
                    echo '<td>
                        <a href="editProduct.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>
                        <a href="deleteProduct.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No products found.</td></tr>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<style>
    .btn-danger:hover {
        color: #000;
    }
</style>
<?php
include 'inc/footer.php';
?>
