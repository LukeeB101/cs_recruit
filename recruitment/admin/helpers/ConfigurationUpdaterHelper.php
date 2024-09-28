<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

if (isset($_POST['update-settings'])) {
    global $conn;
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    $communityId = intval($_POST['community_id']);
    $uploadDir = ($_SERVER['DOCUMENT_ROOT']. '/community/uploads/' . $communityId . '/');
    $community_name = filter_var($_POST['commuity_name'], FILTER_SANITIZE_STRING);

    $purifier = new HTMLPurifier();
    $description = $_POST['content']; // Get the raw input
    $clean_description = $purifier->purify($description); // Clean the HTML


    // Create the community folder if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function handleFileUpload($fileInputName, $imageType, $uploadDir, $allowedExtensions, $maxFileSize, $communityId) {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
            $file = $_FILES[$fileInputName];
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            // Validate file extension and size
            if (in_array($fileExt, $allowedExtensions) && $file['size'] <= $maxFileSize) {
                // Delete any existing file for the logo/banner (if editing)
                foreach ($allowedExtensions as $ext) {
                    $existingFile = $uploadDir . $imageType . '.' . $ext;
                    if (file_exists($existingFile)) {
                        unlink($existingFile); // Delete old file
                    }
                }

                // Move the new uploaded file (this works for both create and edit cases)
                $newFilePath = $uploadDir . $imageType . '.' . $fileExt;
                if (move_uploaded_file($file['tmp_name'], $newFilePath)) {
                    return "Successfully updated $imageType!<br>";
                } else {
                    addAlert($_SESSION['uuid'], 'Failed to upload the new ' . $imageType . ' file.', 'danger', '7000');
                    header('Location: /recruitment/admin/configuration?id=' . $communityId);
                    exit;
                }
            } else {
                addAlert($_SESSION['uuid'], 'Invalid ' . $imageType . ' file. Only JPEG and PNG are allowed, and the size must be under 5MB.', 'danger', '7000');
                header('Location: /recruitment/admin/configuration?id=' . $communityId);
                exit;
            }
        }
        return ""; // Return empty if no file was uploaded
    }

    $logo = handleFileUpload('logo', 'logo', $uploadDir, $allowedExtensions, $maxFileSize, $communityId);

    $banner = handleFileUpload('banner', 'banner', $uploadDir, $allowedExtensions, $maxFileSize, $communityId);
    
    if ($community_name === '') {
        $stmt = $conn->prepare("UPDATE communities SET description = ? WHERE community_id = ?");
        $stmt->bind_param("si", $clean_description, $communityId);
    } else {
        $stmt = $conn->prepare("UPDATE communities SET name = ?, description = ? WHERE community_id = ?");
        $stmt->bind_param("ssi", $community_name, $clean_description, $communityId);
    }

    // Execute the update
    $stmt->execute();

    $stmt->close();

    addAlert($_SESSION['uuid'], 'Successfully updated the community settings!', 'success', '4000');
    header('Location: /recruitment/admin/configuration?id=' . $communityId);

}
?>