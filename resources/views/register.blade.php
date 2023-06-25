@extends("layout")
@section("some_css")
<link href="{{Vite::asset('resources/css/style1.css')}}" rel="stylesheet">

@endsection
@section("body")
<div id="main-wrapper">
   <header class="header">
      <nav class="navbar navbar-default" id="sticker">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="/"><img src="{{Vite::asset('resources/img/logo-palaciocar.png')}}" alt="" /></a>
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
                  <li class="login-register-link right-side-link"><a href="/login">
                     <i class="icon_lock-open_alt"></i>Connexion</a>
                  </li>
                  <li class="dropdown right-side-link">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FR<span class="ion-chevron-down"></span></a>
                     <ul class="dropdown-menu with-language">
                        <li><a href="#">ES</a></li>
                     </ul>
                  </li>
                  <li class="dropdown right-side-link">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAD<span class="ion-chevron-down"></span></a>
                     <ul class="dropdown-menu with-language">
                        <li><a href="#"> EUR </a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
</div>
<div class="wrapper">
        <div class="head">Créer mon compte</div>
        <form action="/register" method="post">
               @csrf
            <div class="field name">
                <div class="input-area">
                    <input type="text" name="name" placeholder="Nom d'utilisateur">
                    <i class="icon fa fa-user"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Le nom ne peut pas être vide</div>
            
            </div>
            <div class="field email">
                <div class="input-area">
                    <input type="email" name="email" placeholder="E-mail">
                    <i class="icon fa fa-envelope"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">L'e-mail ne peut pas être vide</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <i class="icon fa fa-lock"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Le mot de passe ne peut pas être vide</div>
            </div>
            <input type="submit" value="Créer un compte">
        </form>
        <div class="sign-txt">Vous disposez déjà d’un compte? <a href="/login">Connexion</a></div>
</div>

@endsection
@section("script_js")
<!-- <script type="text/javascript" src="{{ Vite::asset('resources/js/script1.js')}}"></script> -->
@endsection