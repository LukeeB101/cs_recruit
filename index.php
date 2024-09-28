<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Castaway Systems</title>


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
    <link href="/vendors/mapbox-gl/mapbox-gl.css" rel="stylesheet">
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


  <body style="--phoenix-scroll-margin-top: 1.2rem;">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php'); ?>

      <section class="bg-body-emphasis pb-8" id="home">
        <div class="container-small hero-header-container px-lg-7 px-xxl-3">
          <div class="row align-items-center">
            <div class="col-12 col-lg-auto order-0 order-md-1 text-end order-1">
              <div class="position-relative p-5 p-md-7 d-lg-none">
                <div class="bg-holder" style="background-image:url(/assets/img/bg/bg-23.png);background-size:contain;">
                </div>
                <!--/.bg-holder-->

                <div class="position-relative"><img class="w-100 shadow-lg d-dark-none rounded-2" src="/assets/img/bg/bg-31.png" alt="hero-header" /><img class="w-100 shadow-lg d-light-none rounded-2" src="/assets/img/bg/bg-30.png" alt="hero-header" /></div>
              </div>
              <div class="hero-image-container position-absolute top-0 bottom-0 end-0 d-none d-lg-block">
                <div class="position-relative h-100 w-100">
                  <div class="position-absolute h-100 top-0 d-flex align-items-center end-0 hero-image-container-bg"><img class="pt-7 pt-md-0 w-100" src="/assets/img/bg/bg-1-2.png" alt="hero-header" /></div>
                  <div class="position-absolute h-100 top-0 d-flex align-items-center end-0"><img class="pt-7 pt-md-0 w-100 shadow-lg d-dark-none rounded-2" src="/assets/img/bg/bg-28.png" alt="hero-header" /><img class="pt-7 pt-md-0 w-100 shadow-lg d-light-none rounded-2" src="/assets/img/bg/bg-29.png" alt="hero-header" /></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 text-lg-start text-center pt-8 pb-6 order-0 position-relative">
              <h1 class="fs-3 fs-lg-2 fs-md-1 fs-lg-2 fs-xl-1 fs fw-black mb-4"><span class="text-primary me-3">Recruitment</span><br />for your community</h1>
              <p class="mb-5">
              Elevate your recruitment process with our seamless management portal. Say goodbye to the hassles of Google Forms and focus on finding the perfect candidates. Our solution handles the heavy lifting, so you can concentrate on what matters most—selecting the right talent.</p><a class="btn btn-lg btn-primary rounded-pill me-3" href="#!" role="button">Sign up</a><a class="btn btn-link me-2 fs-8 p-0" href="#!" role="button">Check Demo<span class="fa-solid fa-angle-right ms-2 fs-9"></span></a>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <communitys selection> begin ============================-->
      
      <!-- <section class="py-5 pt-xl-13 bg-body-emphasis">

        <div class="container-small px-lg-7 px-xxl-3">
          <div class="row g-0">
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-translucent border-end"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-translucent border-end-md"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-translucent border-end border-end-md"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-translucent border-end-lg-0"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end border-bottom border-translucent border-bottom-md-0"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end-md border-bottom border-translucent border-bottom-md-0"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end border-translucent"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
            <div class="col-6 col-md-3">
              <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end-lg-0 border-translucent"><img class="w-100" src="/assets/img/brand/" alt="" /></div>
            </div>
          </div>
        </div> -->
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-15 pb-0" id="feature">

        <div class="container-small px-lg-7 px-xxl-3">
          <div class="position-relative z-2">
            <div class="row">
              <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                <h4 class="text-primary fw-bolder mb-4">Features</h4>
                <h2 class="mb-3 text-body-emphasis lh-base">Seamless Power: A Fully <br class="d-md-none" />Integrated Recruitment System</h2>
                <p class="mb-5">Unlock the full potential of your recruitment process with Castaway Systems. Our advanced application system streamlines your hiring, allowing you to find the perfect talent, shortlist candidates, and accelerate your hiring process—all while you stay focused on what truly matters for your organization. </p><a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="#!" role="button">Find out more<i class="fa-solid fa-angle-right ms-2"></i></a>
              </div>
              <div class="col-sm-6 col-lg-3 mt-7 text-center text-lg-start">
                <div class="h-100 d-flex flex-column justify-content-between">
                  <div class="border-start-lg border-translucent border-dashed ps-4"><img class="mb-4" src="/assets/img/icons/illustrations/bolt.png" width="48" height="48" alt="" />
                    <div>
                      <h5 class="fw-bolder mb-2">Lightning Speed</h5>
                      <p class="fw-semibold lh-sm">Present everything you need in one place within minutes! Grow with Phoenix!</p>
                    </div>
                    <div><a class="btn btn-link me-2 p-0 fs-9" href="#!" role="button">Check Demo<span class="fa-solid fa-angle-right ms-2"></span></a></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mt-7 text-center text-lg-start">
                <div class="h-100 d-flex flex-column">
                  <div class="border-start-lg border-translucent border-dashed ps-4"><img class="mb-4" src="/assets/img/icons/illustrations/pie.png" width="48" height="48" alt="" />
                    <div>
                      <h5 class="fw-bolder mb-2">All-in-one solution</h5>
                      <p class="fw-semibold lh-sm">Show your production and growth graph in one place with Phoenix!</p>
                    </div>
                    <div><a class="btn btn-link me-2 p-0 fs-9" href="#!" role="button">Check Demo<i class="fa-solid fa-angle-right ms-2"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-12 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
              <div class="col-lg-5"><img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="/assets/img/spot-illustrations/22_2.png" alt="" /><img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="/assets/img/spot-illustrations/dark_22.png" alt="" /></div>
              <div class="col-lg-6">
                <h6 class="text-primary mb-2 ls-2">ALL IN ONE</h6>
                <h3 class="fw-bolder mb-3">Everythings in one place</h3>
                <p class="mb-4 px-md-7 px-lg-0">Say goodbye to juggling multiple forms, scattered communications, and losing track of applicants progress. Our portal streamlines everything—track progress, maintain communication, and keep all your documentation in one organized place to allow for easy onboarding.</p>
              </div>
            </div>
            <div class="row mt-2 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
              <div class="col-lg-5 order-0 order-lg-1"><img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="/assets/img/spot-illustrations/23_2.png" height="394" alt="" /><img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="/assets/img/spot-illustrations/dark_23.png" height="394" alt="" /></div>
              <div class="col-lg-6">
                <h6 class="text-primary mb-2 ls-2">INTERGRATION</h6>
                <h3 class="fw-bolder mb-3">Discord you say</h3>
                <p class="mb-4 px-md-7 px-lg-0">Integrate our application system seamlessly with Discord for enhanced communication, real-time application status updates, and effortless role management—all in one place!</p>
              </div>
            </div>
            <div class="row mt-2 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
              <div class="col-lg-5"><img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="/assets/img/spot-illustrations/24_2.png" height="394" alt="" /><img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="/assets/img/spot-illustrations/dark_24.png" height="394" alt="" /></div>
              <div class="col-lg-6 text-center text-lg-start">
                <h6 class="text-primary mb-2 ls-2">SECURED</h6>
                <h3 class="fw-bolder mb-3">Security in mind</h3>
                <p class="mb-4 px-md-7 px-lg-0">
                We ensure your information is submitted securely and protected from unauthorized access, giving you peace of mind and the freedom to focus on what matters most—without worrying about data safety.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <div class="position-relative">
        <div class="bg-holder z-2 d-none d-md-block" style="background-image:url(/assets/img/bg/13.png);background-size:auto;background-position:right;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder z-2 d-none d-md-block d-lg-none d-xl-block" style="background-image:url(/assets/img/bg/bg-12.png);background-size:auto;background-position:left;">
        </div>
        <!--/.bg-holder-->

      </div>
      <div class="position-relative">
        <div class="bg-holder world-map-bg" style="background-image:url(/assets/img/bg/bg-13.png);">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder z-2 opacity-25 " style="background-image:url(/assets/img/bg/bg-right-21.png);background-size:auto;background-position:right;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder z-2 mt-9 opacity-25" style="background-image:url(/assets/img/bg/bg-left-21.png);background-size:auto;background-position:left;">
        </div>
        <!--/.bg-holder-->

        <svg class="w-100 position-relative" preserveAspectRatio="none" viewBox="0 0 1920 368" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-emphasis-bg" d="M1920 0.44L0 367.74V0H1920V0.44Z"></path>
        </svg>
        
        <section class="overflow-hidden z-2">
          <div class="container-small px-lg-7 px-xxl-3" data-bs-theme="light">
            <div class="position-relative">
              <div class="row mb-6">
                <div class="col-xl-6 text-center text-md-start">
                  <h1 class="fs-md-3 fs-xl-2 fw-black text-gradient-info text-uppercase mb-4 mb-md-0">FEEDBACK</h1>
                  <h2 class="text-white mb-2">from our customers is our main priority</h2>
                </div>
                <div class="col-xl-6 text-center text-md-start">
                  <p class="text-white">You can get all the reports, data analysis, and growth maps you need with the help of Phoenix's power, and you may review and modify them whenever you want. These features make this dashboard outstanding.</p><span class="typed-text text-primary" data-typed-text="[&quot;&lt;span class=text-primary&gt;TRIP!&lt;/span&gt;&quot;,&quot;&lt;span class=text-warning&gt;TOUR?&lt;/span&gt;&quot;, &quot;&lt;span class=text-info&gt;SOJOURN?&lt;/span&gt;&quot;, &quot;&lt;span class=text-success&gt;VACAY?&lt;/span&gt;&quot;]"></span>
                </div>
              </div>
              <div class="carousel testimonial-carousel slide position-relative dark__bg-gray-1100" id="carouselExampleIndicators" data-bs-ride="carousel">
              <div class="bg-holder d-none d-xl-block" style="background-image:url(../../assets/img/bg/39.png);background-size:186px;background-position:top 20px right 20px;">
              </div>
              <!--/.bg-holder-->
              <img class="position-absolute d-none d-lg-block" src="../../assets/img/bg/bg-left-22.png" width="150" alt="" style="top: -100px; left: -70px" /><img class="position-absolute d-none d-lg-block" src="../../assets/img/bg/bg-right-22.png" width="150" alt="" style="bottom: -80px; right: -80px" />
              <div class="carousel-inner">
                <div class="carousel-item text-center py-8 px-5 px-xl-15 active"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
                  <h3 class="text-white fw-semibold fst-italic mt-3 mb-8 w-xl-70 mx-auto lh-base">Pending verifications</h3>
                  <div class="d-flex align-items-center justify-content-center gap-3 mx-auto">
                    <div class="avatar avatar-3xl ">
                      <img class="rounded-circle border border-2 border-primary" src="/assets/img/team/ph-image.webp" alt="" />

                    </div>
                    <div class="text-start">
                      <h5 class="text-white">Pending</h5>
                      <p class="text-white mb-0">Pending</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-indicators">
                <button class="active" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
              </div>
            </div>
              </div>
            </div>
          </section>
          <svg class="w-100 position-relative" viewBox="0 0 1920 368" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-emphasis-bg" d="M0 368L1920 0.730011L1920 368L0 368Z"></path>
          </svg>
      </div>
      
      <section class="bg-body-emphasis pt-lg-0 pt-xl-8">
        <div class="bg-holder d-none d-md-block" style="background-image:url(/assets/img/bg/bg-left-15.png);background-position:left;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-md-block" style="background-image:url(/assets/img/bg/bg-right-15.png);background-position:right;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container-small position-relative px-lg-7 px-xxl-3">
          <div class="mb-4 text-center text-sm-start">
            <h4 class="text-primary fw-bolder mb-3">Pricing</h4>
            <h2>Choose the best deal for you</h2>
          </div>
          <p class="column-md-2 text-center text-sm-start">Entice your customers with Phoenix admin dashboard. Show your best deal in this section to help customers choose from your best offers and place them all in one place with this efficient template. If you are availing more than one offer to your customers, let them compare among them and search for what they need to get. Show offer details here and entice them to buy.</p>
          <div class="row pt-9 g-3 g-xl-0">
            <div class="col-md-6 col-xl-3">
              <div class="card h-100 rounded-end-xl-0 rounded-start">
                <div class="card-body px-6">
                  <div class="px-5">
                    <div class="text-center pt-5"><img src="/assets/img/icons/illustrations/pie.png" width="48" height="48" alt="" />
                      <h3 class="fw-semibold my-4">Starter</h3>
                    </div>
                    <div class="text-center">
                      <h1 class="fw-semibold text-primary">$<span class="fw-bolder">6</span><span class="text-body-emphasis fs-7 ms-1 fw-bolder">USD</span></h1>
                      <h5 class="mb-4 text-body"></h5>
                      <button class="btn btn-lg mb-6 w-100 btn-outline-primary">Buy</button>
                    </div>
                  </div>
                  <ul class="fa-ul pricing-list">
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Timeline</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Advanced Search</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Custom fields</span><span class="badge badge-phoenix badge-phoenix-warning ms-2 fs-10 opacity-50">New</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Task dependencies</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Private teams &amp; projects</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="card h-100  rounded-top-0 rounded-xl-0 border border-2 border-primary mt-5 mt-md-0">
                <div class="position-absolute d-flex flex-center bg-primary-subtle rounded-top py-1 end-0 start-0 badge-pricing">
                  <p class="text-primary-dark mb-0">Most popular</p>
                </div>
                <div class="card-body px-6">
                  <div class="px-5">
                    <div class="text-center pt-5"><img src="/assets/img/icons/illustrations/bolt.png" width="48" height="48" alt="" />
                      <h3 class="fw-semibold my-4">Team</h3>
                    </div>
                    <div class="text-center">
                      <h1 class="fw-semibold text-primary">$<span class="fw-bolder">12</span><span class="text-body-emphasis fs-7 ms-1 fw-bolder">USD</span></h1>
                      <h5 class="mb-4 text-body"></h5>
                      <button class="btn btn-lg mb-6 w-100 btn-primary">Buy</button>
                    </div>
                  </div>
                  <ul class="fa-ul pricing-list">
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Timeline</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Advanced Search</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Custom fields</span><span class="badge badge-phoenix badge-phoenix-warning ms-2 fs-10">New</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Task dependencies</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Private teams &amp; projects</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="card h-100 rounded-start rounded-start-xl-0 mt-5 mt-md-0">
                <div class="card-body px-6">
                  <div class="px-5">
                    <div class="text-center pt-5"><img src="/assets/img/icons/illustrations/edit.png" width="48" height="48" alt="" />
                      <h3 class="fw-semibold my-4">Business</h3>
                    </div>
                    <div class="text-center">
                      <h1 class="fw-semibold text-primary">$<span class="fw-bolder">23</span><span class="text-body-emphasis fs-7 ms-1 fw-bolder">USD</span></h1>
                      <h5 class="mb-4 text-body"></h5>
                      <button class="btn btn-lg mb-6 w-100 btn-outline-primary">Buy</button>
                    </div>
                  </div>
                  <ul class="fa-ul pricing-list">
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Timeline</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Advanced Search</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Custom fields</span><span class="badge badge-phoenix badge-phoenix-warning ms-2 fs-10">New</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-star text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Task dependencies</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center"><span class="text-body-secondary" style="--phoenix-text-opacity:.5;">Private teams &amp; projects</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 ps-xl-3">
              <div class="row g-0 h-100 justify-content-center">
                <div class="col-xl-12">
                  <div class="card h-100 mt-5 mt-md-0">
                    <div class="card-body">
                      <div class="px-5">
                        <div class="text-center pt-5"><img src="/assets/img/icons/illustrations/shield.png" width="48" height="48" alt="" />
                          <h3 class="fw-semibold my-4">Enterprise</h3>
                        </div>
                        <div class="text-center">
                          <h1 class="fw-semibold text-primary">$<span class="fw-bolder">40</span><span class="text-body-emphasis fs-7 ms-1 fw-bolder">USD</span></h1>
                          <h5 class="mb-4 text-body"></h5>
                          <button class="btn btn-lg mb-6 w-100 btn-outline-primary">Buy</button>
                        </div>
                      </div>
                      <ul class="fa-ul pricing-list">
                        <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Timeline</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Advanced Search</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-check text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Custom fields</span><span class="badge badge-phoenix badge-phoenix-warning ms-2 fs-10">New</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-star text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Task dependencies</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center"><span class="fa-li"><span class="fas fa-star text-primary"></span></span><span class="text-body-secondary" style="--phoenix-text-opacity:1;">Private teams &amp; projects</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 text-center mt-8">
              <p>For Enterprise Solution with Managed SMTP, Custom API setup, Dedicated Support, and more - <a href="#!"> Contact us</a></p>
            </div>
          </div>
        </div>
      </section>

      <div class="position-relative">
        <div class="bg-holder footer-bg" style="background-image:url(/assets/img/bg/bg-19.png);background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder" style="background-image:url(/assets/img/bg/bg-right-20.png);background-position:right;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder" style="background-image:url(/assets/img/bg/bg-left-20.png);background-position:left;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="position-relative">
          <svg class="w-100 text-white dark__text-gray-1100" preserveAspectRatio="none" viewBox="0 0 1920 368" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1920 0.44L0 367.74V0H1920V0.44Z" fill="currentColor"></path>
          </svg>


          <!-- ============================================-->
          <!-- <section> begin ============================-->
          <section class="footer-default">

            <div class="container-small px-lg-7 px-xxl-3">
              <div class="row position-relative">
                <div class="col-12 col-sm-12 col-lg-5 mb-4 order-0 order-sm-0"><a href="#"><img class="mb-3" src="/assets/img/icons/logo-white.png" height="48" alt="" /></a>
                  <h3 class="text-white">phoenix</h3>
                  <p class="text-white opacity-50">All over the world. Alice in <br />wonderland and other places.</p>
                </div>
                <div class="col-lg-7">
                  <div class="row justify-content-between">
                    <div class="col-6 col-sm-4 col-lg-3 mb-3 order-2 order-sm-1">
                      <div class="border-dashed border-start border-primary-light ps-3" style="--phoenix-border-opacity: .2;">
                        <h5 class="fw-bolder mb-2 text-light">Help</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">About</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Contact</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Developers</a></li>
                        </ul>
                      </div>
                      <div class="border-dashed border-start border-primary-light ps-3" style="--phoenix-border-opacity: .2;">
                        <h5 class="lh-lg fw-bolder mb-2 text-light">Follow</h5>
                        <ul class="list-unstyled mb-2">
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Facebook</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Twitter</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Linkedin</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 mb-3 order-3 order-sm-2">
                      <div class="border-dashed border-start border-primary-light ps-3" style="--phoenix-border-opacity: .2;">
                        <h5 class="lh-lg fw-bold text-light mb-2">Support</h5>
                        <ul class="list-unstyled mb-md-2">
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Privacy</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Community</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Contact</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Blog</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">FAQ</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Project</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Team</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 mb-3 order-3 order-sm-2">
                      <div class="border-dashed border-start border-primary-light ps-3" style="--phoenix-border-opacity: .2;">
                        <h5 class="lh-lg fw-bold text-light mb-2"> Info</h5>
                        <ul class="list-unstyled mb-md-2">
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Personal</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">NFT System</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Agency</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">Contact</a></li>
                          <li class="mb-1"><a class="text-body-quaternary" href="#!" data-bs-theme="light">About</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of .container-->

          </section>
          <!-- <section> close ============================-->
          <!-- ============================================-->


        </div>
      </div>
      <div class="support-chat-container">
        <div class="container-fluid support-chat">
          <div class="card bg-body-emphasis">
            <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
              <h5 class="mb-0 d-flex align-items-center gap-2">Demo widget<span class="fa-solid fa-circle text-success fs-11"></span></h5>
              <div class="btn-reveal-trigger">
                <button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h text-body"></span></button>
                <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item" href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show history</a><a class="dropdown-item" href="#!">Report to Admin</a><a class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
              </div>
            </div>
            <div class="card-body chat p-0">
              <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
                <div class="text-end mt-6"><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">I need help with something</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">I can’t reorder a product I previously ordered</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">How do I place an order?</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="false d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">My payment method not working</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a>
                </div>
                <div class="text-center mt-auto">
                  <div class="avatar avatar-3xl status-online"><img class="rounded-circle border border-3 border-light-subtle" src="/assets/img/team/30.webp" alt="" /></div>
                  <h5 class="mt-2 mb-3">Eric</h5>
                  <p class="text-center text-body-emphasis mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
              <div class="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4">
                <input class="form-control outline-none border-0 flex-1 fs-9 px-0" type="text" placeholder="Write message" />
                <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatPhotos"><span class="fa-solid fa-image"></span></label>
                <input class="d-none" type="file" accept="image/*" id="supportChatPhotos" />
                <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatAttachment"> <span class="fa-solid fa-paperclip"></span></label>
                <input class="d-none" type="file" id="supportChatAttachment" />
              </div>
              <button class="btn p-0 border-0 send-btn"><span class="fa-solid fa-paper-plane fs-9"></span></button>
            </div>
          </div>
        </div>
        <button class="btn btn-support-chat p-0 border border-translucent"><span class="fs-8 btn-text text-primary text-nowrap">Chat demo</span><span class="ping-icon-wrapper mt-n4 ms-n6 mt-sm-0 ms-sm-2 position-absolute position-sm-relative"><span class="ping-icon-bg"></span><span class="fa-solid fa-circle ping-icon"></span></span><span class="fa-solid fa-headset text-primary fs-8 d-sm-none"></span><span class="fa-solid fa-chevron-down text-primary fs-7"></span></button>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
        <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
          <div>
            <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
            <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
          </div>
          <button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-8"> </span></button>
        </div>
        <button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
      </div>
      <div class="offcanvas-body scrollbar px-card" id="themeController">
        <div class="setting-panel-item mt-0">
          <h5 class="setting-panel-item-title">Color Scheme</h5>
          <div class="row gx-2">
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherLight"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/assets/img/generic/default-light.png" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherDark"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/assets/img/generic/default-dark.png" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio" value="auto" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherAuto"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/assets/img/generic/auto.png" alt=""/></span><span class="label-text"> Auto</span></label>
            </div>
          </div>
        </div>
        <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="setting-panel-item-title mb-1">RTL </h5>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixIsRTL" />
            </div>
          </div>
          <p class="mb-0 text-body-tertiary">Change text direction</p>
        </div>
        <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixSupportChat" />
            </div>
          </div>
          <p class="mb-0 text-body-tertiary">Toggle support chat</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Navigation Type</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarPositionVertical" name="navigation-type" type="radio" value="vertical" data-theme-control="phoenixNavbarPosition" data-page-url="/documentation/layouts/vertical-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionVertical"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/default-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/default-dark.png" alt=""/></span><span class="label-text">Vertical</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionHorizontal" name="navigation-type" type="radio" value="horizontal" data-theme-control="phoenixNavbarPosition" data-page-url="/documentation/layouts/horizontal-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionHorizontal"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/top-default-dark.png" alt=""/></span><span class="label-text"> Horizontal</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionCombo" name="navigation-type" type="radio" value="combo" data-theme-control="phoenixNavbarPosition" disabled="disabled" data-page-url="/documentation/layouts/combo-navbar.html" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionCombo"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/nav-combo-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/nav-combo-dark.png" alt=""/></span><span class="label-text"> Combo</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionTopDouble" name="navigation-type" type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition" disabled="disabled" data-page-url="/documentation/layouts/dual-nav.html" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionTopDouble"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/dual-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/dual-dark.png" alt=""/></span><span class="label-text"> Dual nav</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation type in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-default" type="radio" name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" />
              <label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/default-dark.png" alt="" /><span class="label-text d-dark-none"> Default</span><span class="label-text d-light-none">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-dark" type="radio" name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" />
              <label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-dark"> <img class="img-fluid img-prototype d-dark-none" src="/assets/img/generic/vertical-darker.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="/assets/img/generic/vertical-lighter.png" alt="" /><span class="label-text d-dark-none"> Darker</span><span class="label-text d-light-none">Lighter</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical navbar appearance in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio" value="default" data-theme-control="phoenixNavbarTopShape" data-page-url="/documentation/layouts/horizontal-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="/assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="/assets/img/generic/top-default-dark.png" alt=""/></span><span class="label-text">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim" data-theme-control="phoenixNavbarTopShape" data-page-url="/documentation/layouts/horizontal-navbar.html#horizontal-navbar-slim" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="/assets/img/generic/top-slim.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="/assets/img/generic/top-slim-dark.png" alt=""/></span><span class="label-text"> Slim</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar shape in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio" value="default" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="/assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="/assets/img/generic/top-style-darker.png" alt=""/></span><span class="label-text">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="/assets/img/generic/navbar-top-style-light.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="/assets/img/generic/top-style-lighter.png" alt=""/></span><span class="label-text d-dark-none">Darker</span><span class="label-text d-light-none">Lighter</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar appearance in this page</p>
        </div><a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary" href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase template</a>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center px-2 py-1">
        <div class="position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-body-tertiary fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>


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
    <script src="/vendors/mapbox-gl/mapbox-gl.js"></script>
    <script src="/assets/js/phoenix.js"></script>
    <script src="/vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/vendors/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="/vendors/bigpicture/BigPicture.js"></script>
    <script src="/vendors/countup/countUp.umd.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbaQGvhe7Af-uOMJz68NWHnO34UjjE7Lo&callback=initMap" async></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

  </body>

</html>