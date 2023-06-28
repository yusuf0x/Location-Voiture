@extends('layout')
@section('body')
<div id="example"></div>
<div id="main-wrapper">
   <header class="header">
   @include("nav")
   </header>
   <div class="rq-page-content">
      <div class="inner-page-banner" style="background: url('storage/images/cars/palaciocar_banner.jpg') center center no-repeat; background-size: cover;">
         <div class="rq-overlay"></div>
         <div class="container">
            <div class="rq-title-container bredcrumb-title text-center">
               <h2 class="rq-title">{{__('WHO ARE WE ?')}}</h2>
               <ol class="breadcrumb rq-subtitle">
                  <li><a href="#">{{__('home')}}</a></li>
                  <li class="active">{{__('WHO ARE WE ?')}}</li>
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
                              {{__('CAR RENTAL is a car rental agency at Mohammed V International Airport in Casablanca. since 2016, Specialized in the rental of cars for personal and professional use. the quality of our service, the friendliness of our agents and the good condition of our cars are the assets that set us apart.')}}
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="about-us-content-single">
                  <div class="row">
                     <div class="col-md-4">
                        <h2 class="brand-title">{{__('Contact us')}}<span class="dot">.</span></h2>
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