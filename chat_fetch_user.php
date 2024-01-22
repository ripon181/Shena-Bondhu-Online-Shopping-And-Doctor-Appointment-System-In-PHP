<?php

include 'connection/db_connection.php';

// Get the last displayed message identifier from the query parameter
$lastMessageId = isset($_GET['lastMessageId']) ? intval($_GET['lastMessageId']) : 0;

// Fetch and display new chat messages from the database
$sql = "SELECT cm.id, cm.message, cm.sender_type, cm.timestamp, ta.name AS parent_name FROM chat_messages cm
        LEFT JOIN tbl_army ta ON cm.sender_id = ta.id
        WHERE cm.id > $lastMessageId";

$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messageSender = ($row['sender_type'] === 'parent') ? $row['parent_name'] : 'Hospital';
        echo '<p data-message-id="' . $row['id'] . '"><strong>' . $messageSender . ': </strong>' . $row['message'] . '</p>';
    }
}
?>
