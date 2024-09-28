<?php
include($_SERVER['DOCUMENT_ROOT'].'/connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
    $login_error = "We couldn't process the details, please try again.";
	header('Location: /auth/sign-in');
    exit(0);
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    exit('CSRF token validation failed.');
}

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, uuid, first_name, last_name, email, password FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $email);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $uuid, $first_name, $last_name, $email, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['fname'] = $first_name;
            $_SESSION['lname'] = $last_name;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['uuid'] = $uuid;

            unset($_SESSION['csrf_token']);

            if (isset($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']); // Unset it after use
            } else {
                // If no redirect URL, redirect to a default page
                $redirect_url = '/recruitment/index'; // or whatever default page
            }
        
            // Redirect the user to the appropriate page
            header('Location: ' . $redirect_url);
            exit();

        } else {
            // Incorrect password
			$login_error = "Incorrect email/password, please try again.";
            header('Location: /auth/sign-in');
            exit(0);
        }
    } else {
        // Incorrect username
		$login_error = "Incorrect email/password, please try again.";
		header('Location: /auth/sign-in');
		exit(0);
    }

	$stmt->close();
}
?>