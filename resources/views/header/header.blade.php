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
                        <!--guest-->
                         @guest
                            <div class="unit unit-spacing-xs">
                              <div class="unit-left"><i class="icon-y fas fa-info-circle fa-lg"></i></div>
                              <div class="unit-body"><a class="text-theme" href="#">El sitio donde puede encontrar todo ¡GRATIS!</a></div>
                            </div>
                          @else
                            <div class="unit unit-spacing-xs">
                              @if(auth()->user()->user_type==1)
                              <img class="img-circle" src="{{Storage::url(auth()->user()->avatar)}}" alt="" width="25" height="25">
                              @else
                              <img class="img-circle" src="{{auth()->user()->avatar}}" alt="" width="25" height="25">
                              @endif
                              
                              <div class="unit-body"><a class="text-theme" href="{{route('editar_perfil')}}">{{auth()->user()->name}}</a></div>
                            </div>
                          @endguest
                        <!-- guest -->
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
                      <li class="rd-nav-item {{request()->routeIs('feed') ? 'active' : ''}}"><a class="rd-nav-link text-theme text-a-no-hover" href="{{route('feed')}}">Inicio</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link text-theme text-a-no-hover" href="#">Categorias</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                  <div class="project-hamburger"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                  </div>
                </div>
                <div class="rd-navbar-project">
                  <div class="rd-navbar-project-header">
                    <h5 class="rd-navbar-project-title text-theme">Qoy Menu</h5>
                    <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-content">
                    <div>
                      <div class="row gutters-20">
                        <div class="col-12">
                          <!-- Thumbnail Creative-->
                          <ul>
                            <li class="rd-nav-item li-menu-der"><a hidden="true" href="#">Opciones</a></li>
                            <li class="rd-nav-item li-menu-der"><a href="#">Tu perfil</a></li>
                            <li class="rd-nav-item li-menu-der"><a href="#">Tus publicaciones</a></li>
                            <li class="rd-nav-item li-menu-der"><a href="#">Solicitudes enviadas</a></li>
                            <li class="rd-nav-item li-menu-der"><a href="#">Configuración</a></li>
                            <li class="rd-nav-item li-menu-der"><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <!-- Thumbnail Creative-->
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>