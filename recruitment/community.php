<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once ($_SERVER['DOCUMENT_ROOT'].'/auth/functions/getAvatar.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffService.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/communityHelper.php');
require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffHelper.php');


if (!isset($_SESSION['loggedin'])) {
  $current_url = $_SERVER['REQUEST_URI'];
  $_SESSION['redirect_url'] = $current_url;

  header('Location: /auth/sign-in');
  exit();
}

$community_id = $_GET['id'];
$community = getCommunityInfo($conn, $community_id);

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
    <title><?php echo $community['name'] . ' (' . $_GET['id'] . ')'?> | Castaway Systems</title>


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
        if ($community !== false) { 

          ?>
            <div class="content">
              <section class="pt-5 pb-9">
                  <div class="container-small">
                    <nav class="mb-3" aria-label="breadcrumb">
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="/recruitment/index">Recruitment</a></li>
                          <li class="breadcrumb-item"><a href="/recruitment/index">Community</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><?php echo $community['name'] . ' (' . $_GET['id'] . ')'?></li>
                          <?php ?>
                      </ol> 
                    </nav>
                    <div id="alert-container" data-user-id="<?php echo htmlspecialchars($_SESSION['uuid']); ?>"></div>
                    <div class="card mb-5">
                      <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 214px; ">
                      <div class="hover-actions-trigger position-static">
                          <div class="bg-holder rounded-top" style="background-image:url(<?php echo getImagePath($community_id, 'banner'); ?>);">
                          </div>
                          <!--/.bg-holder-->

                      </div>
                      <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
                          <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                          <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="<?php echo getImagePath($community_id, 'logo'); ?>" alt="" /></div>
                          <label class="w-100 h-100 position-absolute z-1" for="upload-porfile-picture"></label>
                          </div>
                      </div>
                      </div>
                      <div class="card-body">
                      <div class="row justify-content-xl-between">
                          <div class="col-auto">
                          <div class="d-flex flex-wrap mb-3 align-items-center">
                              <h2 class="me-2"><?php echo $community['name']; ?></h2><?php if ($community['whitelist'] == '1') { echo '<span class="badge badge-phoenix badge-phoenix-primary">Whitelisted</span>';} ?>
                          </div>
                          <div class="mb-5">
                              <div class="d-md-flex align-items-center">
                              <div class="d-flex align-items-center"><span class="fa-solid fa-user-group fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">1 <span class="fw-semibold ms-1 me-4">Members</span></span></a></div>
                              <div class="d-flex align-items-center"><span class="fa-solid fa-user-group fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">1 <span class="fw-semibold ms-1 me-4">Applications</span></span></a></div>
                              </div>
                          </div>
                          </div>
                          <div class="col-auto">
                          <div class="row g-2">
                              <div class="col-auto order-xxl-2"><?php echo getJoinLeaveButton($conn, $_SESSION['uuid'], $_GET['id']); ?>
                              </div>
                              <div class="col-auto order-xxl-1">
                              <?php
                              if (!empty($community['discord_invite']) && filter_var($community['discord_invite'], FILTER_VALIDATE_URL)) {
                                echo '<a class="btn btn-phoenix-primary lh-1" href="' . htmlspecialchars($community['discord_invite'], ENT_QUOTES, 'UTF-8') . '"><span class="fa-solid fab fa-discord me-1"></span>Discord</a>';
                              } else {

                              }

                              ?>
                              </div>
                              <div class="col-auto">
                              <div class="position-static">
                                  <button class="btn btn-phoenix-secondary lh-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-chevron-down me-2"></span> More</button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><?php if (isCommunityOwner($community['owner_id'], $_SESSION['uuid'])) { echo '<a class="dropdown-item" href="#!"><span class="fa-solid fas fa-shield-alt text-body-secondary me-2"></span><span>Admin Portal</span></a>'; } ?><a class="dropdown-item" href="#!"><span class="fa-solid fa-flag text-body-secondary me-2"></span><span>Report Community</span></a>
                                  </div>
                              </div>
                              </div>
                          </div>
                          </div>
                      </div>
                      <h3>Description</h3>
                      <?php echo $community['desc']; ?>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-5">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                <div class="d-flex align-items-start mb-1">
                                  <div class="d-sm-flex align-items-center"><a class="fw-bold fs-6 lh-sm title line-clamp-1 me-sm-2" href="/recruitment/apply?id=<?php echo $_GET['id']?>&application-id=?">Application Name</a>
                                    <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs-9 text-body lh-2">Available</span></div>
                                  </div>
                                </div>
                                <p class="fs-9 fw-semibold text-body text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in duis neque placerat sociis lacinia dictum. Viverra class faucibus auctor pharetra sed urna sagittis. Parturient tellus id pulvinar eleifend urna rhoncus pulvinar.</p>
                              </div>
                              <div class="col-md-6 d-xl-flex justify-content-xl-end align-items-xl-center"><a class="btn btn-subtle-success me-1 mb-1" href="/recruitment/apply?id=<?php echo $_GET['id']?>&application-id=?" type="button">Apply</a></div>
                          </div>
                        </div>
                      </div>
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
    <script src="/assets/js/communityJoins.js"></script>
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
