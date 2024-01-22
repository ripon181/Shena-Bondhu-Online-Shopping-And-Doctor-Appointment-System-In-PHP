<?php
session_start();
// Include your database connection code (e.g., include 'connection/db_connection.php')
include 'connection/db_connection.php';
if (!isset($_SESSION['army_logged_in']) || $_SESSION['army_logged_in'] !== true) {
    // Display the login modal when the user is not logged in
    echo '<script>$(document).ready(function() {
        $("#armyUsersLoginModal").modal("show");
    });</script>';
} else {
    // Retrieve the user's ID from the session
    $user_id =  $_SESSION["user_id"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];
    $phone_number = $_POST["phone_number"];
    $transaction_number = $_POST["transaction_number"];

    $status = "Pending";
    
    // Insert data into bookAppointments table with status set to 'Pending'
    $sql = "INSERT INTO bookAppointments (user_id, name, email, phone, address, date, time, message, phone_number, transaction_number, status) 
            VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$date', '$time', '$message', '$phone_number', '$transaction_number', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Appointment Booked successfully!"); window.location.href = "dashboard.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>