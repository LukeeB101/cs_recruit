<?php
include($_SERVER['DOCUMENT_ROOT'].'/connection.php');

function escape($data, $context = 'html') {
    switch ($context) {
        case 'html':
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        case 'attr':
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        case 'url':
            return urlencode($data);
        case 'js':
            return json_encode($data);
        default:
            throw new InvalidArgumentException('Invalid context for escaping.');
    }
}

function addAlert($uuid, $message, $type, $duration) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO alerts (uuid, message, type, status, duration) VALUES (?, ?, ?, 'unread', ?)");
    $stmt->bind_param("sssi", $uuid, $message, $type, $duration);
    $stmt->execute();
    $stmt->close();
}

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>';
        exit;
    }
}

?>