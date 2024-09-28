<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');

header('Content-Type: application/json');
$community_id = $_GET['community_id'];
$roles = getCommunityRolesWithPermissions($conn, $community_id);
echo json_encode($roles);
?>