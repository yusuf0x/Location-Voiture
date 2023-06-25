@extends('layout')
@section('body')
<div id="example"></div>
<div id="main-wrapper">
   <header class="header">
   @include("nav")
   </header>
   <div class="inner-page-banner" style="background: url('storage/palaciocar_banner.jpg') center center no-repeat; background-size: cover;">
      <div class="rq-overlay"></div>
      <div class="container">
         <div class="rq-title-container bredcrumb-title text-center">
            <h2 class="rq-title">Contactez-nous</h2>
            <ol class="breadcrumb rq-subtitle">
               <li><a href="/">Accueil</a></li>
               <li class="active">Contactez-nous</li>
            </ol>
         </div>
      </div>
   </div>
   <div class="rq-page-content">
      <div class="rq-content-block">
         <div class="container">
            <div class="rq-contact-us-grid-block">
               <div class="row">
                  <div class="col-md-4">
                     <div class="grid-block-single">
                        <i class="icon_mail_alt"></i>
                        <h3>E-mail</h3>
                        <p><a href="mailto:contact@palaciocar.com">contact@rentalcar.com</a></p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="grid-block-single">
                        <i class="icon_pin_alt"></i>
                        <h3>Adresse</h3>
                        <p>Aéroport Casablanca Mohammed V,</p>
                        <p>Nouasseur 29003</p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="grid-block-single">
                        <i class="icon_mobile"></i>
                        <h3>Téléphone</h3>
                        <p><a href="tel:+"># </a></p>
                        <p><a href="tel:+"># </a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="rq-contact-us-map"> 
               <iframe id="map" style="border:0;" src="" allowfullscreen="" loading="lazy"></iframe>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection