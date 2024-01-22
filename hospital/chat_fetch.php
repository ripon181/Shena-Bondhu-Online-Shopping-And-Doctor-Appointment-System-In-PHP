<?php
// chat_fetch.php - Fetch and display chat messages

// Include your database connection here
require_once "../connection/db_connection.php";
session_start(); 
// Get the last displayed message identifier from the query parameter
$lastMessageId = isset($_GET['lastMessageId']) ? intval($_GET['lastMessageId']) : 0;

// Fetch chat messages from the database, including the sender's name
if ($lastMessageId > 0) {
    $sql = "SELECT cm.*, ta.name AS sender_name FROM chat_messages cm
            LEFT JOIN tbl_army ta ON cm.sender_id = ta.id
            WHERE cm.id > $lastMessageId";
} else {
    $sql = "SELECT cm.*, ta.name AS sender_name FROM chat_messages cm
            LEFT JOIN tbl_army ta ON cm.sender_id = ta.id";
}

$result = mysqli_query($conn, $sql);
$messages = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

// Return messages as JSON data
header('Content-Type: application/json');
echo json_encode(['messages' => $messages]);
?>
