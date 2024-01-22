<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection/db_connection.php";

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // Check the database for matching email
    $sql = "SELECT * FROM tbl_army WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc(); // Fetch the data from the result set
        $_SESSION["army_logged_in"] = true;
        $_SESSION['GenLuserdata'] = $row['email'];
        $_SESSION["user_name"] = $row["name"]; // Store the user's name
        $_SESSION["user_id"] = $row["id"]; // Store the user's name
        header("Location: dashboard.php");
    } else {
        echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "index.php";</script>';
    }

    $conn->close();
}
?>
