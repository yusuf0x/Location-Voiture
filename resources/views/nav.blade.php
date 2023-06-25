<nav class="navbar navbar-default" id="sticker">
               <div class="container">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="/"><img src="{{ Vite::asset('resources/img/logo-palaciocar.png')}}" alt="" /></a>
                  </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                           <a href="/">Accueil</a>
                        </li>
                        <li class="dropdown">
                           <a href="/cars">Nos Véhicules</a>
                        </li>
                        <li class="dropdown">
                           <a href="/about">Qui sommes-nous ?</a>
                        </li>
                        <li class="dropdown">
                           <a href="/contact">Contact</a>
                        </li>
                        @if(Auth::check())
                            <li class=" right-side-link">
                            <a href="#"><i class=""></i>Bienvenue, {{ Auth::user()->name }}!</a>
                           </li>
                           <li class=" right-side-link">
                              <a href="/logout"><i class=""></i>Se déconnecter</a>
                           </li>
                        
                          
                        @else
                           <li class="login-register-link right-side-link">
                              <a href="/login"><i class="icon_lock-open_alt"></i>Connexion</a>
                           </li>
                           
                        @endif
                       
                        <li class="dropdown right-side-link">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FR<span class="ion-chevron-down"></span></a>
                           <ul class="dropdown-menu with-language">
                              <li><a href="#lang/es">ES</a></li>
                           </ul>
                        </li>
                        <li class="dropdown right-side-link">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAD<span class="ion-chevron-down"></span></a>
                           <ul class="dropdown-menu with-language">
                              <li><a href="#curr/EUR"> EUR </a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
</nav>