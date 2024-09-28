<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
  require_once ($_SERVER['DOCUMENT_ROOT'].'/auth/functions/getAvatar.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffService.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/communityHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

  
  
  if (!isset($_SESSION['loggedin'])) {
    header('Location: /auth/sign-in');
  }
  
  $community_id = htmlspecialchars($_GET['id']);
  $community = getCommunityInfo($conn, $community_id);

  if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Community')) {
    addAlert($_SESSION['uuid'], 'You do not have permission to view this page! ', 'danger', '5000');
    redirect('/recruitment/index');
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
    <title>Settings | Castaway Systems</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <link href="/vendors/dropzone/dropzone.css" rel="stylesheet" />
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
        <?php include($_SERVER['DOCUMENT_ROOT'].'/recruitment/admin/includes/sidebar.php'); ?>

        <div class="content">
          <div>
            <h2 class="mb-2">Community Settings</h2>
            <h5 class="text-body-tertiary fw-semibold">Manage your community configuration here!</h5>
          </div>

          <section>
            <div>
              <div id="alert-container" data-user-id="<?php echo htmlspecialchars($_SESSION['uuid']); ?>"></div>
              <form action="/recruitment/admin/helpers/ConfigurationUpdaterHelper" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="community_id" value="<?php echo $_GET['id']; ?>"> 
                <h4 class="mb-3">Community Name</h4>
                <input class="form-control mb-5" type="text" name="commuity_name" id="commuity_name" placeholder="<?php echo $community['name'];?>" />
                <div class="mb-6">
                  <h4 class="mb-3">Description</h4>
                  <textarea class="tinymce" name="content" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'><?php echo $community['desc']; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-3">Logo</h1><img class="rounded-circle mb-4" src="<?php echo getImagePath($community_id, 'logo'); ?>" style="max-width:150px;max-height:150px;" name="logo" id="logo"/>
                        <div><input type="file" name="logo" id="logo"/></div>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="mb-3">Banner</h1>
                        <div><img class="rounded mb-4" src="<?php echo getImagePath($community_id, 'banner'); ?>" style="max-width:200px;max-height:150px;"/></div>
                        <div><input type="file" name="banner" id="banner"/></div>
                    </div>
                </div>
                <div class="mt-4 text-end">
                  <button class="btn btn-subtle-primary me-1 mb-1" type="submit" name="update-settings">Update</button>
                </div>
              </form>
            </div>          
          </section>
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
    <script src="/vendors/tinymce/tinymce.min.js"></script>
    <script src="/vendors/dropzone/dropzone-min.js"></script>

  </body>

</html>
