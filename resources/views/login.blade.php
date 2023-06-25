@extends("layout")
@section("some_css")
<link href="{{Vite::asset('resources/css/style1.css')}}" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->

@endsection
@section("body")
<div id="main-wrapper">
   <header class="header">
      @include("nav")
   </header>
</div>
<div class="wrapper">
        <div class="head">Connexion</div>
        <form action="/login" method="POST">
            @csrf
            <div class="field email">
                <div class="input-area">
                    <input type="text" name="email" placeholder="E-mail">
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
            <div class="pass-txt"><a href="#">Mot de passe oublié ?</a></div>
            <input type="submit" value="Connexion">
        </form>
        <div class="sign-txt">Vous n’avez pas de compte?<a href="/register">Inscrivez-vous</a></div>
</div>

@endsection