<?php
include '../connection/db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $status = $_POST["status"];

    // Update the order status in the database
    $update_sql = "UPDATE bookappointments SET status = '$status' WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        echo '<script>alert("Order status updated successfully!"); window.location.href = "manageAppointment.php";</script>';
    } else {
        echo "Error updating order status: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
