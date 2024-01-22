<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection/db_connection.php";

    $name = $_POST["name"];
    $army_id = $_POST["army_id"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password using bcrypt
    $hashedPassword = md5($password);

    // Insert the data into the database
    $sql = "INSERT INTO tbl_army (name, army_id, phone, email, password) 
            VALUES ('$name', '$army_id', '$phone', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registration Successfully!"); window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
