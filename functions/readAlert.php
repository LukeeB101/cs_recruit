<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include($_SERVER['DOCUMENT_ROOT'].'/connection.php');

// Get the alert ID and user ID from the POST request
$alert_id = intval($_POST['alert_id']);
$user_id = $_POST['user_id']; // Ensure the user_id is sent via POST

// Update the alert's status to 'read' only if it belongs to the user
$sql = "UPDATE alerts SET status = 'read' WHERE id = ? AND uuid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $alert_id, $user_id);

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>