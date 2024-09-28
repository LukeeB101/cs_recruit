<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Output</title>
</head>
<body>
    <?php
    function escape($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    $username = "<script>alert('XSS');</script>";
    echo '<p>Escaped Username: ' . escape($username) . '</p>';
    ?>
</body>
</html>