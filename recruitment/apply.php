<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once ($_SERVER['DOCUMENT_ROOT'].'/auth/functions/getAvatar.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffService.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/communityHelper.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/applicationHelper.php');


if (!isset($_SESSION['loggedin'])) {
  $current_url = $_SERVER['REQUEST_URI'];
  $_SESSION['redirect_url'] = $current_url;

  header('Location: /auth/sign-in');
  exit();
}

$community_id = $_GET['id'];
$applicaton_id = $_GET['application-id'];
$community = getCommunityInfo($conn, $community_id);
$applicaton = getApplicationInfo($conn, $community_id, $applicaton_id);

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
    <title><?php echo $community['name']; ?> | Castaway Systems</title>


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
        
        <?php
        if ($applicaton !== false) { 

          ?>
            <div class="content">
              <section class="pt-5 pb-9">
                  <div class="container-small">
                    <nav class="mb-3" aria-label="breadcrumb">
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="/recruitment/index">Recruitment</a></li>
                          <li class="breadcrumb-item"><a href="/recruitment/index">Community</a></li>
                          <li class="breadcrumb-item"><a href="/recruitment/community?id=<?php echo $_GET['id']?>"><?php echo $community['name'] . ' (' . $_GET['id'] . ')'?></a></li>
                          <li class="breadcrumb-item active" aria-current="page">Applying (<?php echo $_GET['id'];?>)</li>
                      </ol>
                    </nav>
                    <div id="alert-container" data-user-id="<?php echo htmlspecialchars($_SESSION['uuid']); ?>"></div>
                    <div class="pb-9">
                      <div class="row align-items-center justify-content-between g-3 mb-4">
                        <div class="col-12 col-md-auto">
                          <h2 class="mb-0">Application</h2>
                        </div>
                        <div class="col-12 col-md-auto d-flex">
                          <button class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span class="fa-solid fa-edit me-sm-2"></span><span class="d-none d-sm-inline">Edit		</span></button>
                          <div>
                            <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                            <ul class="dropdown-menu dropdown-menu-end p-0" style="z-index: 9999;">
                              <li><a class="dropdown-item" href="#!">View profile</a></li>
                              <li><a class="dropdown-item" href="#!">Report</a></li>
                              <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                              <li><a class="dropdown-item text-danger" href="#!">Delete Lead</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="row g-4 g-xl-6">
                        <div class="col-xl-5 col-xxl-4">
                          <div class="sticky-leads-sidebar">
                            <div class="card mb-3">
                              <div class="card-body">
                                <div class="row align-items-center g-3">
                                  <div class="col-12 col-sm-auto flex-1">
                                    <h3 class="fw-bolder mb-2 line-clamp-1"><?php echo $applicaton['name']; ?></h3>
                                    <div class="d-flex align-items-center mb-4">
                                      <span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold text-body me-2"><?php echo $applicaton['status']; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border-top border-dashed pt-2">
                                      <div class="mb-2">
                                        <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-calendar-alt"></span>
                                          <h5 class="text-body-highlight mb-0">Date Created</h5>
                                        </div>
                                        <p class="mb-0 text-body-secondary"><?php echo timeAgo($applicaton['date_created']); ?></p>
                                      </div>
                                      <div class="mb-2">
                                        <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-building"></span>
                                          <h5 class="text-body-highlight mb-0">Community</h5>
                                        </div>
                                        <p class="mb-0 text-body-secondary"><?php echo $community['name']; ?></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-body">
                                <h4 class="mb-3">Form Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui justo cum nam donec commodo mattis ridiculus hendrerit montes tellus ac suspendisse enim. Nostra sociosqu ultricies rutrum tincidunt nisl mi erat nisl lacinia ac curae eu aliquam. Feugiat condimentum tempor urna volutpat nec sagittis cras curabitur eget aliquam sapien etiam amet. Pharetra ligula venenatis lectus lorem tellus hac primis velit facilisi mus torquent eleifend montes. Curabitur maecenas consectetur integer nec dapibus nunc eu himenaeos aenean euismod in torquent quis.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-7 col-xxl-8">

                        </div>
                      </div>
                    </div>
              </section>
            </div>
          <?php
        } else {
          if (isset($_SESSION['loggedin'])) {
            addAlert($_SESSION['uuid'], 'Community not found or invalid community ID.', 'danger', '5000');
            redirect('/recruitment/index');

          } else {
            echo '<div class="content"><div class="card mb-5"><h1 class="text-center">Community not found or invalid community ID.</h1></div></div>';
          }
        }
        ?>
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
