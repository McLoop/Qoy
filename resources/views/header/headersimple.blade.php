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
                    @guest
                    <a class="brand" href="{{route('index')}}"><img class="brand-logo-dark" src="{{ asset('images/LOGO.png') }}" alt="" width="198" height="66"/></a>
                    @else
                    <a class="brand" href="{{route('feed')}}"><img class="brand-logo-dark" src="{{ asset('images/LOGO.png') }}" alt="" width="198" height="66"/></a>
                    @endguest
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
                      <li class="rd-nav-item {{setActive('login')}}"><a class="rd-nav-link text-theme text-a-no-hover" href="{{ route('login')}}">Inicia Sesión</a>
                      </li>
                      <li class="rd-nav-item {{setActive('register')}}"><a class="rd-nav-link text-theme text-a-no-hover" href="{{ route('register')}}">Registrarse</a>
                      </li>
                    </ul>
                    
                  </div>
                </div>
                
              </div>
            </div>
          </nav>
        </div>
      </header>