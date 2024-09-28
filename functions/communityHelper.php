<?php
$baseUploadDir = '/community/uploads/';

function getCommunityInfo($conn, $community_id) {
    // Validate and sanitize the community_id to ensure it's a positive integer
    if (!filter_var($community_id, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
        return false; // Invalid community ID
    }

    // Prepare the SQL query to prevent SQL injection
    $query = "SELECT community_id, name, description, owner_id, discord_link, whitelisted FROM communities WHERE community_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        // Log the error or handle it appropriately
        error_log('MySQL prepare error: ' . $conn->error);
        return false; // Prevent further execution
    }

    // Bind the community ID parameter to the prepared statement
    $stmt->bind_param("i", $community_id);

    // Execute the query
    if (!$stmt->execute()) {
        // Log the error or handle it appropriately
        error_log('MySQL execute error: ' . $stmt->error);
        return false; // Prevent further execution
    }

    // Bind the result variables
    $stmt->bind_result($id, $name, $description, $owner_id, $discord_link, $whitelisted);

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
        'id' => htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?? '', // Escaping for output safety
        'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?? '', // Escaping for output safety
        'desc' => $description ?? 'This is a default community', // Escaping for output safety
        'owner_id' => htmlspecialchars($owner_id, ENT_QUOTES, 'UTF-8') ?? '', // Casting to integer for safety
        'discord_invite' => htmlspecialchars($discord_link, ENT_QUOTES, 'UTF-8') ?? '',
        'whitelist' => (int)$whitelisted
    ];
}

function isCommunityOwner($community_owner_id, $user_uuid) {
    // Check if $user_uuid is set and valid
    if (empty($user_uuid)) {
        return false;
    }

    // Perform the ownership check
    return $community_owner_id == $user_uuid;
}

function getJoinLeaveButton($conn, $user_id, $community_id) {
    // Query to check if the user is already a member of the community
    $check_query = $conn->prepare("SELECT * FROM memberships WHERE user_id = ? AND community_id = ?");
    $check_query->bind_param("ss", $user_id, $community_id);
    $check_query->execute();
    $result = $check_query->get_result();

    // Determine if the user is a member
    $is_member = $result->num_rows > 0;

    // Close the database connection
    $conn->close();

    // Generate the button based on membership status
    if ($is_member) {
        // Return "Leave" button if user is a member
        return '<button class="btn btn-primary lh-1" id="joinLeaveButton" data-action="leave" data-community-id="' . htmlspecialchars($community_id) . '" data-user-id="' . htmlspecialchars($user_id) . '">
                    <span class="fa-solid fas fa-angle-left me-2"></span>Leave Community
                </button>';
    } else {
        // Return "Join" button if user is not a member
        return '<button class="btn btn-primary lh-1" id="joinLeaveButton" data-action="join" data-community-id="' . htmlspecialchars($community_id) . '" data-user-id="' . htmlspecialchars($user_id) . '">
                    <span class="fa-solid fas fa-angle-right me-2"></span>Join Community
                </button>';
    }
}

function getImagePath($communityId, $imageType, $extensions = ['jpg', 'jpeg', 'png'], $placeholder = '/assets/img/team/avatar-rounded.webp') {
    global $baseUploadDir;

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $baseUploadDir . $communityId . '/';
    
    // Loop through extensions to find the first valid image file
    foreach ($extensions as $ext) {
        $filePath = $uploadDir . $imageType . '.' . $ext;

        if (file_exists($filePath)) {
            return $baseUploadDir . $communityId . '/' . $imageType . '.' . $ext;
        }
    }
    return $placeholder; // Return placeholder if no valid file is found
}
?>