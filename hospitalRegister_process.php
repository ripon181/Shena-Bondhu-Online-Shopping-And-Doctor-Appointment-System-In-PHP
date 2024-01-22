<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection/db_connection.php";

    $hospitalName = $_POST["hospitalName"];
    $hospitalEmail = $_POST["hospitalEmail"];
    $hospitalPhone = $_POST["hospitalPhone"];
    $hospitalAddress = $_POST["hospitalAddress"];
    $password = $_POST["password"]; // Remember to hash the password before storing

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database
    $sql = "INSERT INTO tbl_hospital (hospitalName, hospitalEmail, hospitalPhone, hospitalAddress, password) 
            VALUES ('$hospitalName', '$hospitalEmail', '$hospitalPhone', '$hospitalAddress', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registration Successfully!"); window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
