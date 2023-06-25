@extends('layout')
@section('body')
<div id="example"></div>
<div id="main-wrapper">
   <header class="header">
   @include("nav")
   </header>
   <div class="rq-page-content">
      <div class="inner-page-banner" style="background: url('storage/palaciocar_banner.jpg') center center no-repeat; background-size: cover;">
         <div class="rq-overlay"></div>
         <div class="container">
            <div class="rq-title-container bredcrumb-title text-center">
               <h2 class="rq-title">Qui sommes-nous ?</h2>
               <ol class="breadcrumb rq-subtitle">
                  <li><a href="#">Accueil</a></li>
                  <li class="active">Qui sommes-nous ?</li>
               </ol>
            </div>
         </div>
      </div>
      <div class="rq-content-block">
         <div class="rq-about-us-content-wrapper">
            <div class="container">
               <div class="about-us-content-single">
                  <div class="row">
                     <div class="col-md-4">
                        <h2 class="brand-title">Palacio <span class="dot">Car.</span></h2>
                     </div>
                     <div class="col-md-8">
                        <div class="about-us-text">
                           <p style="text-align: justify;">
                              CAR RENTAL est une Agence de location de voitures au Maroc. depuis 2016, Spécialisée dans la location de voitures à usage personnel, professionnel. la qualité de notre service, l&#039;amabilité de nos agents et le bon état de nos voitures sont les atouts qui nous distinguent.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="about-us-content-single">
                  <div class="row">
                     <div class="col-md-4">
                        <h2 class="brand-title">Contactez-nous<span class="dot">.</span></h2>
                     </div>
                     <div class="col-md-8">
                        <div class="contact-single">
                           <i class="icon_pin"></i>
                           <p>Aéroport Casablanca Mohammed V, Nouasseur 29003</p>
                        </div>
                        <div class="contact-single">
                           <i class="icon_mail_alt"></i>
                           <p><a href="mailto:contact@palaciocar.com">contact@palaciocar.com</a></p>
                        </div>
                        <div class="contact-single">
                           <i class="icon_phone"></i>
                           <p><a href="tel:+"># </a></p>
                        </div>
                        <div class="contact-single">
                           <i class="icon_mobile"></i>
                           <p><a href="tel:+"># </a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection