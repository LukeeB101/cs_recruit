<?php

  include($_SERVER['DOCUMENT_ROOT'].'/auth/functions/generateUUID.php');
  include($_SERVER['DOCUMENT_ROOT'].'/connection.php');
  session_start();

  if (!isset($_POST['username'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    // Could not get the data that should have been sent.
    header('Location: /auth/sign-up?error=no-data1');
    exit(0);
  }
  // Make sure the submitted registration values are not empty.
  if (empty($_POST['email']) || empty($_POST['password'])) {
      // One or more values are empty.
      header('Location: /auth/sign-up?error=no-data2');
      exit(0);
  }

  if ($_POST['password'] !== $_POST['confirmPassword']) {
      header('Location: /auth/sign-up?error=passowrd-mismatch');
      exit(0);
  }

  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    exit('CSRF token validation failed.');
  }

  // We need to check if the account with that username exists.
  if ($stmt = $conn->prepare('SELECT id, password, email FROM accounts WHERE email = ?')) {
      // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
      $myuuid = guidv4();
      $stmt->bind_param('s', $_POST['email']);
      $stmt->execute();
      $stmt->store_result();
      // Store the result so we can check if the account exists in the database.
      if ($stmt->num_rows > 0) {
          // Email already exists
          header('Location: /auth/sign-up?error=email-taken');
          exit(0);
      } else {
          // Email doesnt exists, insert new account
          if ($stmt = $conn->prepare('INSERT INTO accounts (uuid, username, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?, ?)')) {
              $myuuid = guidv4();

              $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
              $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
              $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
              $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

              if (!$email) {
                // Handle invalid email error
                exit('Invalid email address.');
              }

              // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
              $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
              $stmt->bind_param('ssssss', $myuuid, $username, $fname, $lname, $email, $password);
              $stmt->execute();
              session_regenerate_id(true);
              
              $_SESSION['loggedin'] = TRUE;
              $_SESSION['username'] = $_POST['username'];
              $_SESSION['email'] = $_POST['email'];
              $_SESSION['fname'] = $_POST['fname'];
              $_SESSION['lname'] = $_POST['lname'];
              $_SESSION['account-id'] = $stmt->insert_id;
              $_SESSION['uuid'] = $myuuid;

              unset($_SESSION['csrf_token']);
              
              header('Location: /recruitment/index');
              exit(0);
          } else {
              // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
              header('Location: /auth/sign-up?error=statement-error');
              exit(0);
          }
      }
      $stmt->close();
  } else {
      // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
      header('Location: /auth/sign-up?error=statement-error');
      exit(0);
  }

?>