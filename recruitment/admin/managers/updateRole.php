<?php
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');

// Get the JSON input data
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!isset($data['role_id']) || !isset($data['role_name']) || !is_array($data['perms']) || !isset($data['community_id'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid data provided.']);
    exit;
}

$role_id = intval($data['role_id']);
$role_name = htmlspecialchars($data['role_name']);
$permissions = $data['perms'];  // Array of selected permission IDs
$community_id = intval($data['community_id']);  // Ensure community_id is being passed

// Check if role_id, role_name, and community_id are valid
if (empty($role_id) || empty($role_name) || empty($community_id)) {
    echo json_encode(['success' => false, 'error' => 'Role ID, role name, or community ID is missing.']);
    exit;
}

// Check if permissions array is empty
if (empty($permissions)) {
    echo json_encode(['success' => false, 'error' => 'No permissions selected.']);
    exit;
}

// Begin transaction to avoid partial updates
$conn->begin_transaction();

try {
    // Update the role name
    $stmt = $conn->prepare("UPDATE community_roles SET role_name = ? WHERE id = ?");
    $stmt->bind_param('si', $role_name, $role_id);
    $stmt->execute();
    $stmt->close();

    // Delete existing permissions for the role
    $stmt = $conn->prepare("DELETE FROM community_role_permissions WHERE role_id = ?");
    $stmt->bind_param('i', $role_id);
    $stmt->execute();
    $stmt->close();

    // Insert the updated permissions, including community_id
    $stmt = $conn->prepare("INSERT INTO community_role_permissions (role_id, permission_id, community_id) VALUES (?, ?, ?)");
    foreach ($permissions as $permission_id) {
        $perm_id = intval($permission_id);  // Store the result in a variable
        $stmt->bind_param('iii', $role_id, $perm_id, $community_id);  // Pass role_id, permission_id, and community_id
        $stmt->execute();
    }
    $stmt->close();

    // Commit the transaction
    $conn->commit();

    // Return success
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    
    // Return error response
    echo json_encode(['success' => false, 'error' => 'An error occurred while updating the role.']);
}
?>
