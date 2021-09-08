<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Qoy</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body class="">
    <div class="lds-ring">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
              <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <a class="brand" href="index.html"><img class="brand-logo-dark" src="{{ asset('images/LOGO.png') }}" alt="" width="198" height="66"/></a>
                  </div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside">
                    <ul class="rd-navbar-contacts-2">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><i class="icon-y fas fa-info-circle fa-lg"></i></div>
                          <div class="unit-body"><a class="text-theme" href="#">El sitio donde puede encontrar todo ¡GRATIS!</a></div>
                        </div>
                      </li>
                    </ul>
                    <ul class="darkModeDiv">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <!-- dark mode-->
                          <button class="darkModeSwitch" id="switch">
                          <span><i class="fa fa-sun-o"></i></span>   
                          <span><i class="fa fa-moon-o"></i></span>
                          <!-- fin dark mode-->
                        </div>
                      </li>
                    </ul>
                    <ul class="list-share-2">
                      <li><a id="btn-rrss" class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a id="btn-rrss" class="icon mdi mdi-instagram" href="#"></a></li>
                    </ul>
                  </div>
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item active"><a class="rd-nav-link text-theme text-a-no-hover" href="#info1">¿Quienes somos?</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link text-theme text-a-no-hover" href="#info2">¿Qué hacemos?</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link text-theme text-a-no-hover" href="#info3">Unete</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--<div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                  <div class="project-hamburger"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                  </div>
                </div>-->
                
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- inicio body -->
      <section id="info1">
      </section>
      <section id="info2">
      </section>
      <section id="info3">
      </section>
     <!--fin del body-->

      <!-- Page Footer-->
      <footer class="section footer-modern context-dark footer-modern-2">
        <!--<div class="footer-modern-line">
          <div class="container">
            <div class="row row-50">
              
            </div>
          </div>
        </div>-->
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="{{ asset('images/LOGO.png') }}" alt="" width="198" height="66"/></a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                <div class="group-xmd group-sm-justify">
                  <div class="footer-modern-contacts wow slideInUp">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="text-a-white phone" href="tel:#">Comunícate con nosotros</a></div>
                    </div>
                  </div>
                  <div class="footer-modern-contacts wow slideInDown">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                      <div class="unit-body"><a class="text-a-white mail" href="mailto:qoybolivia@gmail.com">qoybolivia@gmail.com</a></div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-3">
          <div class="container">
            <div class="row row-10 justify-content-between">
              <div class="col-md-6"><i class="fas fa-map-marker"></i>&nbsp;&nbsp;<span>Cochabamba - Bolivia</span></div>
              <div class="col-md-auto">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>.&nbsp;</span><span>Todos los derechos reservados.</span></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- coded by Himic-->
  </body>
</html>