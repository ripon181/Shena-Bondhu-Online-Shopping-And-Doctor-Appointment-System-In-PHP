<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection/db_connection.php";

    $hospitalEmail = $_POST["hospitalEmail"];
    $password = md5($_POST["password"]);

    // Check the database for matching email
    $sql = "SELECT * FROM tbl_hospital WHERE hospitalEmail = '$hospitalEmail' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION["hospital_logged_in"] = true;
        $_SESSION['GenLuserdata'] = $row['hospitalEmail'];
        $_SESSION['hospitalName'] = $row['hospitalName'];
        header("Location: hospital/dashboard.php");
    
    } else {
        echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "index.php";</script>';
    }

    $conn->close();
}
?>
