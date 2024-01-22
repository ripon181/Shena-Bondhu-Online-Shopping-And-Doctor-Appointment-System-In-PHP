<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection/db_connection.php";

    $adminEmail = $_POST["adminEmail"];
    $adminPassword = md5($_POST["adminPassword"]);

    $sql = "SELECT * FROM admin WHERE adminEmail = '$adminEmail' AND adminPassword = '$adminPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin/dashboard.php");
    } else {
        echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "index.php";</script>';
    }

    $conn->close();
}
?>
