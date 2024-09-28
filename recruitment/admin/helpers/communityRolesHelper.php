<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function getUserCommunityRole($conn, $user_id, $community_id) {
    $stmt = $conn->prepare("
        SELECT r.role_name
        FROM community_user_roles ur
        JOIN community_roles r ON ur.role_id = r.id
        WHERE ur.user_id = ? AND ur.community_id = ?
    ");
    $stmt->bind_param("ii", $user_id, $community_id);
    $stmt->execute();
    $stmt->bind_result($role_name);
    $stmt->fetch();
    $stmt->close();

    return $role_name;
}

function getUserCommunityPermissions($conn, $user_id, $community_id) {
    $stmt = $conn->prepare("
        SELECT p.permission_name
        FROM community_user_roles ur
        JOIN community_roles r ON ur.role_id = r.id
        JOIN community_role_permissions rp ON r.id = rp.role_id
        JOIN permissions p ON rp.permission_id = p.id
        WHERE ur.user_id = ? AND ur.community_id = ?
    ");
    $stmt->bind_param("ii", $user_id, $community_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $permissions = [];
    while ($row = $result->fetch_assoc()) {
        $permissions[] = $row['permission_name'];
    }

    $stmt->close();
    
    return $permissions;
}

function userHasCommunityPermission($conn, $user_id, $community_id, $permission_name) {
    $stmt = $conn->prepare("
        SELECT COUNT(*)
        FROM community_user_roles ur
        JOIN community_roles r ON ur.role_id = r.id
        JOIN community_role_permissions rp ON r.id = rp.role_id
        JOIN permissions p ON rp.permission_id = p.id
        WHERE ur.user_id = ? AND ur.community_id = ? AND p.permission_name = ?
    ");
    $stmt->bind_param("iis", $user_id, $community_id, $permission_name);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    return $count > 0;
}

function getCommunityRolesWithPermissions($conn, $community_id) {
    // Prepare the SQL query to fetch roles, their IDs, and their permissions for a given community
    $stmt = $conn->prepare("
        SELECT cr.id as role_id, cr.role_name, p.permission_name
        FROM community_roles cr
        JOIN community_role_permissions crp ON cr.id = crp.role_id
        JOIN permissions p ON crp.permission_id = p.id
        WHERE cr.community_id = ?
    ");
    $stmt->bind_param("i", $community_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize an empty array to store roles and permissions
    $roles = [];

    // Fetch the results and organize them into an array
    while ($row = $result->fetch_assoc()) {
        $role_id = $row['role_id'];
        $role_name = $row['role_name'];
        $permission_name = $row['permission_name'];

        // Store roles by their IDs
        if (!isset($roles[$role_id])) {
            $roles[$role_id] = [
                'role_name' => $role_name,
                'permissions' => []
            ];
        }

        // Add the permission to the role
        $roles[$role_id]['permissions'][] = $permission_name;
    }

    $stmt->close();
    return $roles;
}

if (isset($_POST['create-role'])) {
    // Get form data
    global $conn;
    $role_name = filter_var($_POST['rolen'], FILTER_SANITIZE_STRING);
    $permissions = $_POST['perms']; // This is an array of selected permission IDs
    $community_id = intval($_POST['community_id']);

    print_r($permissions);

    // Validate the role name and selected permissions
    if (empty($role_name) || empty($permissions)) {
        addAlert($_SESSION['uuid'], 'Oops, Unfortunately we couldn\'t process this request. Please try again!', 'danger', '7000');
        header("Location: /recruitment/admin/manageRoles?id=" . $community_id);
        exit;
    }

    if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Roles')) {
        addAlert($_SESSION['uuid'], 'You do not have permission to do this request! ', 'danger', '7000');
        redirect('/recruitment/admin/manageRoles?id=' . $community_id);
    }

    // Step 1: Check if the role name already exists for the community
    $stmt = $conn->prepare("SELECT COUNT(*) FROM community_roles WHERE role_name = ? AND community_id = ?");
    $stmt->bind_param("si", $role_name, $community_id);
    $stmt->execute();
    $stmt->bind_result($role_count);
    $stmt->fetch();
    $stmt->close();

    if ($role_count > 0) {
        // If the role name exists for this community, display an error message
        addAlert($_SESSION['uuid'], 'Oops! A role is already created with the name ' . $role_name, 'danger', '7000');
        header("Location: /recruitment/admin/manageRoles?id=" . $community_id);
        exit;
    }

    // Insert the new role into the community_roles table
    $stmt = $conn->prepare("INSERT INTO community_roles (role_name, community_id) VALUES (?, ?)");
    $stmt->bind_param("si", $role_name, $community_id);
    $stmt->execute();

    // Get the ID of the newly inserted role
    $role_id = $stmt->insert_id;

    // Close the statement
    $stmt->close();

    // Now insert the selected permissions into the community_role_permissions table
    $stmt = $conn->prepare("INSERT INTO community_role_permissions (role_id, permission_id, community_id) VALUES (?, ?, ?)");
    
    foreach ($permissions as $permission_id) {
        $stmt->bind_param("iii", $role_id, $permission_id, $community_id);
        $stmt->execute();
    }

    // Close the statement after all permissions have been inserted
    $stmt->close();

    addAlert($_SESSION['uuid'], 'Successfully created ' . $role_name, 'success', '7000');
    header("Location: /recruitment/admin/manageRoles?id=" . $community_id);
    exit;
}
?>