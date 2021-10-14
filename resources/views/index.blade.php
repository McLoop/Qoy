<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Qoy - Bolivia</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
                    <a class="brand" href="{{route('feed')}}"><img class="brand-logo-dark" src="{{ asset('images/LOGO.png') }}" alt="" width="198" height="66"/></a>
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
      <section id="info1" class="set-bg">
      <div class="container-full">  
        <div class="row">
          <div class="col-sm-3 col-md-3"></div>
          <div class="cuadro-centro col-sm-4 col-md-6">
            <h3 class="text-primary-yellow"><strong>Bienvenido a Qoy</strong></h3><br>
            <h5 class="text-theme">Qoy es un movimiento sin fines de lucro de personas que dan y reciben cosas gratis incentivando a reutilizar y donar articulos en buen estado, brinando ayuda a quien lo necesita y recibiendola de quien la ofrece. Ahora con una cuenta puedes compartir y recibir articulos de todo tipo totalmente gratis. <a href="#">Registrarse ahora.</a></h5>
          </div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      </div>
      </section>
      <section id="info2">
        <div class="row">
          <div class="col-sm-3 col-md-3"></div>
          <div class="cuadro-centro col-sm-4 col-md-6">
            <h3 class="text-primary-yellow"><strong>¿Qué hacemos?</strong></h3><br>
            <h6 class="text-theme">Qoy se encarga de organizar y categorizar los objetos que las personas de la comunidad desea regalar, tan facil como entrar y buscar lo que te interese!.</h6>
            <div class="product-figure">
              <img src="" hidden="" alt="" width="161" height="162">
              <img src="images/infos/lupa.png" id="buscar" alt="" width="161" height="162">
              <img src="images/infos/solicitar.png" alt="" width="161" height="162">
              <img src="images/infos/recoger.png" alt="" width="161" height="162">
            </div>
            <br><h4 class="text-primary-yellow"><strong>Busca, solicita y recibe.</strong></h4>
          </div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      </section>
      <section id="info3">
        
        <div class="row">
          <div class="cuadro-centro col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-primary-yellow"><strong>Unete a nosostros</strong></h3><br>
          <div class="row">
          <div class="col-sm-2 col-md-2"></div>
          <div class="col-sm-4 col-md-4">
            <h6 class="text-theme">Unirte a Qoy es muy sencillo, solo debes registrarte y seleccionar tus interes, asi de sencillo!</h6><br>
            <h6 class="text-primary-yellow">Necesitas una cuenta activa para publicar e interactuar en el sitio</h6>

          </div>
          <div class="col-sm-4 col-md-4">
            <a type="button" class="form-control btn-google text-a-black text-a-no-hover-black" href="#"><i class="text-red fas fa-google fa-1x"></i>&nbsp;&nbsp;&nbsp;Unirse con Google</a>
            <a type="button" class="form-control btn-facebook text-a-white text-a-no-hover-white" href="#"><i class="fas fa-facebook fa-1x"></i>&nbsp;Unirse con Facebook</a>
            <a type="button" class="form-control btn-correo text-a-white text-a-no-hover-white" href="#"><i class="fas fa-envelope fa-1x"></i>&nbsp;&nbsp;&nbsp;Unirse con correo</a>

          </div>
          <div class="col-sm-2 col-md-2"></div>

        </div>
          </div>
        </div>
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