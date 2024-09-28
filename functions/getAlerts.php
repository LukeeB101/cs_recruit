<?php
include($_SERVER['DOCUMENT_ROOT'].'/connection.php');

// Assuming user_id is passed as a GET parameter
$user_id = $_GET['user_id']; // Use intval() to ensure $user_id is an integer

// Fetch unread alerts for the specific user
$sql = "SELECT * FROM alerts WHERE status = 'unread' AND uuid = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id); // Bind the user_id parameter

$stmt->execute();
$result = $stmt->get_result();

$alerts = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $alerts[] = $row;
    }
}

// Return the alerts as JSON
echo json_encode($alerts);

$stmt->close();
$conn->close();
?>