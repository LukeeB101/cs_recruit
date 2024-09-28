<?php
// Start the session and include necessary files (like database connection)
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;

    // Check if it's a delete request
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $role_id = intval($_POST['role_id']);
        $community_id = intval($_POST['community_id']);

        if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Roles')) {
            addAlert($_SESSION['uuid'], 'You do not have permission to do this request! ', 'danger', '7000');
            redirect('/recruitment/admin/manageRoles?id=' . $community_id);
        }

        // Prepare statement to delete the role
        $stmt = $conn->prepare("DELETE FROM community_roles WHERE id = ? AND community_id = ?");
        $stmt->bind_param("ii", $role_id, $community_id);
        
        if ($stmt->execute()) {
            // Also delete related permissions for the role
            $stmt = $conn->prepare("DELETE FROM community_role_permissions WHERE role_id = ? AND community_id = ?");
            $stmt->bind_param("ii", $role_id, $community_id);
            $stmt->execute();

            echo json_encode(['status' => 'success', 'message' => 'Role deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the role.']);
        }

        $stmt->close();
        exit();
    }

    // Check if it's an update request (assuming "role_id" is present for update)
    if (isset($_POST['role_id']) && isset($_POST['rolen'])) {
        $role_id = intval($_POST['role_id']);
        $role_name = filter_var($_POST['rolen'], FILTER_SANITIZE_STRING);
        $permissions = $_POST['perms']; // This is an array of selected permission IDs
        $community_id = intval($_POST['community_id']);

        if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Roles')) {
            addAlert($_SESSION['uuid'], 'You do not have permission to do this request! ', 'danger', '7000');
            redirect('/recruitment/admin/manageRoles?id=' . $community_id);
        }

        // Update role name
        $stmt = $conn->prepare("UPDATE community_roles SET role_name = ? WHERE id = ? AND community_id = ?");
        $stmt->bind_param("sii", $role_name, $role_id, $community_id);
        $stmt->execute();

        // Delete the existing permissions for the role
        $stmt = $conn->prepare("DELETE FROM community_role_permissions WHERE role_id = ?");
        $stmt->bind_param("i", $role_id);
        $stmt->execute();

        // Insert the updated permissions
        $stmt = $conn->prepare("INSERT INTO community_role_permissions (role_id, permission_id, community_id) VALUES (?, ?, ?)");
        foreach ($permissions as $permission_id) {
            $stmt->bind_param("iii", $role_id, $permission_id, $community_id);
            $stmt->execute();
        }

        echo json_encode(['status' => 'success', 'message' => 'Role updated successfully.']);
        exit();
    }

    // If it's a create role request (without role_id)
    if (!isset($_POST['role_id']) && isset($_POST['rolen'])) {
        $role_name = filter_var($_POST['rolen'], FILTER_SANITIZE_STRING);
        $permissions = $_POST['perms']; // This is an array of selected permission IDs
        $community_id = intval($_POST['community_id']);

        if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Roles')) {
            addAlert($_SESSION['uuid'], 'You do not have permission to do this request! ', 'danger', '7000');
            redirect('/recruitment/admin/manageRoles?id=' . $community_id);
        }

        // Insert new role
        $stmt = $conn->prepare("INSERT INTO community_roles (role_name, community_id) VALUES (?, ?)");
        $stmt->bind_param("si", $role_name, $community_id);
        $stmt->execute();

        $role_id = $stmt->insert_id;

        // Insert permissions for the new role
        $stmt = $conn->prepare("INSERT INTO community_role_permissions (role_id, permission_id, community_id) VALUES (?, ?, ?)");
        foreach ($permissions as $permission_id) {
            $stmt->bind_param("iii", $role_id, $permission_id, $community_id);
            $stmt->execute();
        }

        echo json_encode(['status' => 'success', 'message' => 'Role created successfully.']);
        exit();
    }

    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit();
}
?>