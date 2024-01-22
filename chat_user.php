<?php
include 'includes/header.php';
include 'connection/db_connection.php';
// chat_parent.php - Parent-Staff Chat Page

// Include your database connection and other necessary files here
// Ensure that the user is logged in as a parent
// Implement user authentication as needed

// Check if the user is logged in
if (!isset($_SESSION['GenLuserdata'])) {
    // Redirect to the login page if the user is not logged in
    exit();
}

// Get the logged-in user's name
$loggedInUserName = $_SESSION['GenLuserdata'];

// ... (Your code for handling authentication and database connection) ...

// Get the parent's ID based on their email (modify as needed)
// Check if the form is submitted (message is sent)
if (isset($_POST['message']) && isset($_POST['senderType'])) {
    $message = $_POST['message'];
    $senderType = $_POST['senderType'];

    // Get the parent's ID based on their email (modify as needed)
    $getParentIdQuery = "SELECT id FROM tbl_army WHERE email = '$loggedInUserName'";
    $result = mysqli_query($conn, $getParentIdQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $parentId = $row['id'];

        // Now you have the parent's ID, you can insert the message with sender_id
        $result = sendMessage($message, $senderType, $parentId); // Pass parentId to sendMessage

        if ($result) {
            // Message sent successfully
        } else {
            // Failed to send message, handle the error as needed
        }
    }
}

// Function to send a message to the database
function sendMessage($message, $senderType, $senderId) {
    global $conn;
    // Sanitize and validate the message to prevent SQL injection and other security issues
    $message = mysqli_real_escape_string($conn, $message);
    // Get the current timestamp to store with the message
    $timestamp = date('Y-m-d H:i:s');
    // Insert the message into the database
    $sql = "INSERT INTO chat_messages (message, sender_type, sender_id, timestamp) VALUES ('$message', '$senderType', $senderId, '$timestamp')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat with Hospital</title>
    <!-- Bootstrap 5 CSS -->
</head>
<body>
<style type="text/css">
		
        .hospital-message {
            text-align: right;
            color: #fff;
            background-color: #00647496;
            padding: 5px;
            border-radius: 10px;
            margin-bottom: 10px;

        }
        div#chat-box {
    background: #00e5ff59;
    color: #fff;
    padding: 12px;
    border-radius: 5px;
        }
        .parent-message {
            text-align: left;
            color: #fff;
            background-color: #008504a8;
            padding: 5px;
            border-radius: 10px;
            margin-bottom: 10px;

        }
	
	</style>
<div class="container" style="margin-top: 150px; margin-bottom: 350px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
  <div class="card-body">
            <h2 class="mb-4" style="color:#fff;">CHAT HERE</h2>
            <div id="chat-box" class="bg-light p-3" style="height: 300px; border: 1px solid #ccc; overflow-y: scroll;">
                <?php
                // Fetch and display previous chat messages from the database
                // ...

                // Fetch and display previous chat messages from the database
                $sql = "SELECT cm.message, cm.sender_type, ta.name AS sender_name, h.hospitalName AS hospital_name FROM chat_messages cm
                    LEFT JOIN tbl_army ta ON cm.sender_id = ta.id
                    LEFT JOIN tbl_hospital h ON cm.sender_id = h.id
                    WHERE cm.sender_type IN ('parent', 'hospital')";

                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Check the sender_type to apply the appropriate class
                        $messageClass = ($row['sender_type'] === 'hospital') ? 'hospital-message' : 'parent-message';
                        $sender = ($row['sender_type'] === 'hospital') ? $row['hospital_name'] : $row['sender_name'];
                        echo '<p class="' . $messageClass . '"><strong>' . $sender . ': </strong>' . $row['message'] . '</p>';
                    }
                }
                ?>
                <!-- The chat messages will be displayed here -->
                <!-- You can fetch and display previous chat messages here -->
            </div>
            <form method="post" class="input-group mt-3" id="chat-form">
                <input type="text" name="message" id="message-input" class="form-control" placeholder="Type your message...">
                <input type="hidden" name="senderType" value="parent">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
    var lastMessageId = 0;
</script>
<script>
    document.getElementById('chat-form').addEventListener'submit', function(event) {
        // ... Your previous code to send messages ...

        // Fetch and display messages on page load and update lastMessageId
        window.onload = function () {
            fetchAndDisplayMessages();
        };
    }

    // Function to fetch and display chat messages
    function fetchAndDisplayMessages() {
        var chatBox = document.getElementById('chat-box');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the chat box with new messages
                    chatBox.innerHTML = xhr.responseText;
                    // Scroll to the bottom to show the latest messages
                    chatBox.scrollTop = chatBox.scrollHeight;
                    // Update the lastMessageId variable with the highest message identifier
                    var messages = chatBox.getElementsByTagName('p');
                    if (messages.length > 0) {
                        lastMessageId = parseInt(messages[messages.length - 1].getAttribute('data-message-id'));
                    }
                } else {
                    // Error fetching messages, handle the error as needed
                }
            }
        };
        xhr.open('GET', 'chat_fetch_parent.php?lastMessageId=' + lastMessageId, true);
        xhr.send();
    }

    // Fetch and display messages on page load and update lastMessageId
    window.onload = function () {
        fetchAndDisplayMessages();
    };
</script>

</body>
</html>

<?php
include 'includes/footer.php';
include 'includes/modal.php';
?>
