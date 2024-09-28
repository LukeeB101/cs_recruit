<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');

// Get the user ID and community ID from POST data
$user_id = $_POST['user_id'];
$community_id = $_POST['community_id'];
$action = $_POST['action'];

// Sanitize input
$user_id = htmlspecialchars($user_id);
$community_id = htmlspecialchars($community_id);

// Handle JOIN action
if ($action === 'join') {
    // Check if the user is already a member
    $check_query = $conn->prepare("SELECT * FROM memberships WHERE user_id = ? AND community_id = ?");
    $check_query->bind_param("ss", $user_id, $community_id);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows === 0) {
        // User is not a member, insert new row
        $join_query = $conn->prepare("INSERT INTO memberships (user_id, community_id) VALUES (?, ?)");
        $join_query->bind_param("ss", $user_id, $community_id);
        if ($join_query->execute()) {
            echo "Successfully joined the community!";
        } else {
            echo "Error joining the community: " . $join_query->error;
        }
    } else {
        echo "You are already a member of this community.";
    }
}

// Handle LEAVE action
if ($action === 'leave') {
    $leave_query = $conn->prepare("DELETE FROM memberships WHERE user_id = ? AND community_id = ?");
    $leave_query->bind_param("ss", $user_id, $community_id);
    if ($leave_query->execute()) {
        echo "Successfully left the community!";
    } else {
        echo "Error leaving the community: " . $leave_query->error;
    }
}

// Close the database connection
$conn->close();
?>