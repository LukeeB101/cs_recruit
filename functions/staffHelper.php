<?php

function staffUserRole($conn, $uuid) {
    $stmt = $conn->prepare("SELECT r.role_name FROM accounts u JOIN staff_roles r ON u.staff_role = r.id WHERE u.uuid = ?");
    $stmt->bind_param("s", $uuid);
    $stmt->execute();
    $stmt->bind_result($role_name);
    $stmt->fetch();
    $stmt->close();
    
    return $role_name;
}

function getStaffPermissions($conn, $uuid) {
    $stmt = $conn->prepare("
        SELECT p.permission_name
        FROM accounts u
        JOIN staff_roles r ON u.staff_role = r.id
        JOIN staff_role_permissions rp ON r.id = rp.role_id
        JOIN staff_permissions p ON rp.permission_id = p.id
        WHERE u.uuid = ?
    ");
    $stmt->bind_param("s", $uuid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $permissions = [];
    while ($row = $result->fetch_assoc()) {
        $permissions[] = $row['permission_name'];
    }
    
    $stmt->close();
    
    return $permissions;
}

function staffuserHasPermission($conn, $uuid, $permission_name) {
    $stmt = $conn->prepare("
        SELECT COUNT(*)
        FROM accounts u
        JOIN staff_roles r ON u.staff_role = r.id
        JOIN staff_role_permissions rp ON r.id = rp.role_id
        JOIN staff_permissions p ON rp.permission_id = p.id
        WHERE u.uuid = ? AND p.permission_name = ?
    ");
    $stmt->bind_param("ss", $uuid, $permission_name);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    return $count > 0;
}
?>