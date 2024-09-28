<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include($_SERVER['DOCUMENT_ROOT'].'/auth/functions/getAvatar.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffService.php');

if (!isset($_SESSION['loggedin'])) {
  header('Location: /auth/sign-in');
}
?>

<!DOCTYPE html>
<html data-navigation-type="horizontal">

  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Home | Castaway Systems</title>


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
    <main>
      <div class="container-fluid">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/recruitment/includes/header.php'); ?>

        <div class="content">
        <section class="pt-5 pb-9">
          <div class="container-small">
            <nav class="mb-3" aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/index">Recruitment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
            <?php echo '<h2 class="mb-1">👋 Welcome back, ' . escape($_SESSION['fname'], 'html') . '! </h2>'; ?>
            <p class="mb-5 text-body-tertiary fw-semibold">Dashboard</p>
            <div id="alert-container" data-user-id="<?php echo htmlspecialchars($_SESSION['uuid']); ?>"></div>
            <div class="row gx-3 gy-5">
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="/assets/img/brands/avatar-rounded.webp" alt="Dell Technologies" /></div>
                <h5 class="mb-2">Community Name</h5>
                <div class="mb-1 fs-9"><span class="badge badge-phoenix badge-phoenix-primary">Owner</span>
                </div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">Total Members: 1000</p><a class="btn btn-link p-0" href="#!">View<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of .container-->

          </section>
        </div>
      </div>
    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/assets/js/getAlerts.js"></script>
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

  </body>

</html>
