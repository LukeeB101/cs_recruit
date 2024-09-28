<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_SESSION['loggedin'])) {
  addAlert($_SESSION['uuid'], 'You are already logged in!', 'success', '4000');
  header('Location: /recruitment/index');
}

?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Register | Castaway Systems</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/vendors/simplebar/simplebar.min.js"></script>
    <script src="/assets/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container">
        <div class="row flex-center min-vh-100 py-5">
          <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="/index">
              <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="/assets/img/icons/logo.png" alt="phoenix" width="58" />
              </div>
            </a>
            <div class="text-center mb-7">
              <h3 class="text-body-highlight">Register</h3>
              <p class="text-body-tertiary">Create your account with us today!</p>
            </div>
            <form class="needs-validation" method="POST" action="/auth/functions/register" novalidate>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="fname">First Name</label>
                        <input class="form-control" id="fname" name="fname"  type="text" placeholder="First Name" required/>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="lname">Last Name</label>
                        <input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name" required/>
                    </div>
                </div>
              <div class="mb-3 text-start">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required/>
              </div>
              <div class="mb-3 text-start">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required/>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-sm-6">
                  <label class="form-label" for="password">Password</label>
                  <div class="position-relative" data-password="data-password">
                    <input class="form-control form-icon-input pe-6" id="password" name="password" type="password" placeholder="Password" data-password-input="data-password-input" required/>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="confirmPassword">Confirm Password</label>
                  <div class="position-relative" data-password="data-password">
                    <input class="form-control form-icon-input pe-6" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password" data-password-input="data-password-input" required/>
                  </div>
                </div>
              </div>
              <?php echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">'; ?>
              <div class="form-check mb-3">
                <input class="form-check-input" id="termsService" type="checkbox" required/>
                <label class="form-label fs-9 text-transform-none" for="termsService">I read and accept the <a href="#!">Terms of Service </a>and <a href="#!">Privacy Policy</a></label>
                <div class="invalid-feedback mt-0">You must agree before submitting.</div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-3">Sign up</button>
              <div class="text-center"><a class="fs-9 fw-bold" href="/auth/sign-in">Sign in to an existing account</a></div>
            </form>
          </div>
        </div>
      </div>
      <script>
        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.setAttribute('data-navbar-appearance', 'darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVertical && navbarVerticalStyle === 'darker') {
          navbarVertical.setAttribute('data-navbar-appearance', 'darker');
        }
      </script>

      <script>
      (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
      })()
      </script>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/vendors/popper/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/anchorjs/anchor.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/vendors/lodash/lodash.min.js"></script>
    <script src="/vendors/list.js/list.min.js"></script>
    <script src="/vendors/feather-icons/feather.min.js"></script>
    <script src="/vendors/dayjs/dayjs.min.js"></script>
    <script src="/assets/js/phoenix.js"></script>
    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            event.preventDefault(); // Prevent form submission
        }
    });
    </script>

  </body>

</html>