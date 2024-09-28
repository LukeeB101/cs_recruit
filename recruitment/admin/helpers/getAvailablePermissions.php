<?php
// getAvailablePermissions.php
header('Content-Type: application/json');

require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');

$query = "SELECT id, permission_name FROM permissions";
$result = $conn->query($query);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$permissions = [];

while ($row = $result->fetch_assoc()) {
    $permissions[] = [
        'id' => $row['id'],
        'name' => $row['permission_name']
    ];
}

// Return the permissions as JSON
echo json_encode($permissions);
