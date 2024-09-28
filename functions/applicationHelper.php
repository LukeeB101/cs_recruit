<?php
function getApplicationInfo($conn, $community_id, $application_id) {
    // Validate and sanitize the community_id to ensure it's a positive integer
    if (!filter_var($community_id, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
        return false; // Invalid community ID
    }

    if (!filter_var($application_id, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
        return false; // Invalid community ID
    }

    // Prepare the SQL query to prevent SQL injection
    $query = "SELECT community_id, name, description, date_created, created_by, date_modified, restricted, status, ban_status FROM applications WHERE community_id = ? AND id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        // Log the error or handle it appropriately
        error_log('MySQL prepare error: ' . $conn->error);
        return false; // Prevent further execution
    }

    // Bind the community ID parameter to the prepared statement
    $stmt->bind_param("ii", $community_id, $application_id);

    // Execute the query
    if (!$stmt->execute()) {
        // Log the error or handle it appropriately
        error_log('MySQL execute error: ' . $stmt->error);
        return false; // Prevent further execution
    }

    // Bind the result variables
    $stmt->bind_result($community_id, $name, $description, $date_created, $created_by, $date_modified, $restricted, $status, $ban_status);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Check if any data was fetched
    if ($name === null) {
        return false; // No data found for the given community ID
    }

    // Return the data as an associative array
    return [
        'community_id' => htmlspecialchars($community_id, ENT_QUOTES, 'UTF-8'), // Escaping for output safety
        'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'), // Escaping for output safety
        'desc' => htmlspecialchars($description, ENT_QUOTES, 'UTF-8'), // Escaping for output safety
        'date_created' => htmlspecialchars($date_created, ENT_QUOTES, 'UTF-8'), // Casting to integer for safety
        'created_by' => htmlspecialchars($created_by, ENT_QUOTES, 'UTF-8'),
        'date_modified' => htmlspecialchars($date_modified, ENT_QUOTES, 'UTF-8'),
        'restricted' => (int)$restricted,
        'status' => htmlspecialchars($status, ENT_QUOTES, 'UTF-8'),
        'ban_status' => htmlspecialchars($ban_status, ENT_QUOTES, 'UTF-8')
    ];
}

function timeAgo($datetime) {
    $createdDate = new DateTime($datetime);
    $currentDate = new DateTime();

    $interval = $currentDate->diff($createdDate);

    if ($interval->y > 0) {
        return $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
    } elseif ($interval->m > 0) {
        return $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
    } elseif ($interval->d > 0) {
        return $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
    } elseif ($interval->h > 0) {
        return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
    } elseif ($interval->i > 0) {
        return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
    } else {
        return "Just now";
    }
}
?>