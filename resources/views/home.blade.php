@extends("layout")
@section("body")

<div id="main-wrapper">
         <header class="header">
            @include("nav")
            <div class="header-body" style="background: url('storage/images/cars/palaciocar_banner.jpg') top center no-repeat; background-size: cover;">
               <div class="header-overlay"></div>
               <div class="container">
                  <h1>RENTAL <span style="color:#f4d40c;">CAR</span></h1>
                  <p>{{_('Rental cars at Mohammed V Casablanca International Airport')}}</p>
                  <form action="/cars" method="GET">
                     <div class="rq-search-container">
                        <div class="rq-search-single">
                           <div class="rq-search-content">
                              <span class="rq-search-heading">{{_('DEPARTURE DATE')}}</span>
                              <input autocomplete="off" type="text" name="startdate" class="rq-form-element datepicker" id="startdate" placeholder="Du" required />
                              <i class="ion-chevron-down datepicker-arrow"></i>
                           </div>
                        </div>
                        <div class="rq-search-single">
                           <div class="rq-search-content">
                              <span class="rq-search-heading">{{_('RETURN DATE')}}</span>
                              <input autocomplete="off" type="text" name="enddate" class="rq-form-element" id="enddate" placeholder="Au" required />
                              <i class="ion-chevron-down datepicker-arrow"></i>
                           </div>
                        </div>
                        <div class="rq-search-single">
                           <div class="rq-search-content last-child">
                              <span class="rq-search-heading">{{_('YOUR AGE')}}</span>
                              <select name="age" class="category-option" >
                                 <option value="23">23</option>
                                 <option value="24" >24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28 {{__("OR MORE")}}</option>
                              </select>
                           </div>
                        </div>
                        <div class="rq-search-single search-btn">
                           <div class="rq-search-content">
                              <button class="rq-btn rq-btn-primary fluid-btn">{{__('Search')}} <i class="arrow_right"></i></button>
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="rq-counting-list">
                     <ul class="list-unstyled">
                        <li>
                           <span class="count-result" data-from="25" data-to="1623" data-speed="5000" data-refresh-interval="50"></span>
                           <span class="count-category">{{__('Satisfied Customers')}}</span>
                        </li>
                        <li>
                           <span class="count-result" data-from="1" data-to="2048" data-speed="5000" data-refresh-interval="10"></span>
                           <span class="count-category">{{__('Vehicles Delivered')}}</span>
                        </li>
                        <li>
                           <span class="count-result" data-from="25" data-to="1760" data-speed="5000" data-refresh-interval="50"></span>
                           <span class="count-category">{{__('Confirmed Reservations')}}</span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </header>
         <div class="rq-page-content">
            <div class="rq-content-block gray-bg">
               <span class="bg-large-text">Palaciocar</span>
               <div class="container">
                  <div class="row">
                     <div class="col-md-11">
                        <div class="rq-mission-block">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="mission-content">
                                    <h1 class="rq-title">{{__('WHO ARE WE ?')}}<span class="rq-dot">.</span><i class="rq-line"></i></h1>
                                    <p style="text-align: justify;" class="mission-text">
                                    {{__('CAR RENTAL is a car rental agency at Mohammed V International Airport in Casablanca. since 2016, Specialized in the rental of cars for personal and professional use. the quality of our service, the friendliness of our agents and the good condition of our cars are the assets that set us apart.')}}
                                  
                                    </p>
                                    <address>
                                       <a href="#">Mohammed Alaoui</a>
                                       <cite>- CEO Founder</cite>
                                    </address>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="mission-image">
                                    <img src="{{Vite::asset('resources/img/fiesta-dark-block.png')}}" alt="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="rq-browse-section">
                     <h1 class="rq-title">{{__('Our Best Vehicles')}}<span class="rq-dot">.</span></h1>
                     <a href="#">{{__('See all vehicles')}} <i class="ion-ios-arrow-right"></i></a>
                  </div>
               </div>
            </div>
            <div class="rq-content-block with-border-bottom vertical-line">
               <div class="rq-car-listing-tab">
                  <ul class="nav nav-tabs parent-tab" role="tablist">
                     <li role="presentation" class="active">
                        <a href="#moins-cher" role="tab" data-toggle="tab">{{__('CHEAPER')}}</a>
                     </li>
                     <li role="presentation">
                        <a href="#recommander" role="tab" data-toggle="tab">{{__('RECOMMEND')}}</a>
                     </li>
                     <li role="presentation">
                        <a href="#luxueux" role="tab" data-toggle="tab">{{__('LUXURIOUS')}}</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="moins-cher">
                     <div class="child-tab-wrapper">
                           <ul class="nav nav-tabs" role="tablist">
                              @foreach($data['cars_moins_cher'] as $car )
                                 @if($car->id == $data['id1'])
                                    <li role="presentation" class="active">
                                       <a href="#car-{{$car->id}}" role="tab" data-toggle="tab">
                                       <img src="storage/{{$car->image}}" alt="">
                                       <span class="tittle">{{$car->name}}</span>
                                       <span class="car-des">{{$car->gasoil}},{{$car->boite_vitesse}}</span>
                                       <span class="rent-price"><b>À partir de</b> {{$car->prix}} DH <b> par Jour</b></span>
                                       </a>
                                    </li>
                                 @else
                                    <li role="presentation" class="">
                                       <a href="#car-{{$car->id}}" role="tab" data-toggle="tab">
                                       <img src="storage/{{$car->image}}" alt="">
                                       <span class="tittle">{{$car->name}}</span>
                                       <span class="car-des">{{$car->gasoil}},{{$car->boite_vitesse}}</span>
                                       <span class="rent-price"><b>À partir de</b> {{$car->prix}} DH <b> par Jour</b></span>
                                       </a>
                                    </li>
                                 @endif
                              @endforeach
                              
                           </ul>
                           <div class="tab-content">
                              @foreach($data['cars_moins_cher'] as $car)
                                 @if($car->id == $data['id1'])
                                    <div role="tabpanel" class="tab-pane fade in active " id="car-{{$car->id}}">
                                       <div class="rq-tab-car-details">
                                          <h3>{{$car->name}}</h3>
                                          <div class="large-image-wrapper">
                                             <div class="image-bg"></div>
                                             <img src="storage/{{$car->image}}" alt="">
                                          </div>
                                          <div class="car-details-option">
                                             <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                             <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                             <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                             <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                             <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                          </div>
                                       </div>
                                    </div>
                                 @else
                                    <div role="tabpanel" class="tab-pane fade in " id="car-{{$car->id}}">
                                          <div class="rq-tab-car-details">
                                             <h3>{{$car->name}}</h3>
                                             <div class="large-image-wrapper">
                                                <div class="image-bg"></div>
                                                <img src="storage/{{$car->image}}" alt="">
                                             </div>
                                             <div class="car-details-option">
                                                <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                                <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                                <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                                <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                                <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                             </div>
                                          </div>
                                       </div>
                                 @endif
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="recommander">
                        <div class="child-tab-wrapper">
                           <ul class="nav nav-tabs" role="tablist">
                           @foreach($data['cars_recommended'] as $car)
                                 <!-- @if($car->id == $data['id1']) -->
                                    <li role="presentation">
                                       <a href="#car-{{$car->id}}-recommanded" role="tab" data-toggle="tab">
                                       <img src="storage/{{$car->image}}" alt="">
                                       <span class="tittle">{{$car->name}}</span>
                                       <span class="car-des">{{$car->gasoil}},{{$car->boite_vitesse}}</span>
                                       <span class="rent-price"><b>À partir de</b> {{$car->prix}} DH<b> par Jour</b></span>
                                       </a>
                                    </li>
                                 <!-- @else -->

                                 <!-- @endif -->
                           @endforeach
                           </ul>
                           <div class="tab-content">
                              @foreach($data['cars_recommended'] as $car)
                                 @if($car->id == $data['id2'])
                                    <div role="tabpanel" class="tab-pane fade in active" id="car-{{$car->id}}-recommanded">
                                       <div class="rq-tab-car-details">
                                          <h3>{{$car->name}}</h3>
                                          <div class="large-image-wrapper">
                                             <div class="image-bg"></div>
                                             <img src="storage/{{$car->image}}" alt="">
                                          </div>
                                          <div class="car-details-option">
                                             <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                             <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                             <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                             <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                             <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                          </div>
                                    </div>
                                    </div>
                                 @else
                                  <div role="tabpanel" class="tab-pane fade in" id="car-{{$car->id}}-recommanded">
                                       <div class="rq-tab-car-details">
                                          <h3>{{$car->name}}</h3>
                                          <div class="large-image-wrapper">
                                             <div class="image-bg"></div>
                                             <img src="storage/{{$car->image}}" alt="">
                                          </div>
                                          <div class="car-details-option">
                                             <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                             <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                             <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                             <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                             <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                          </div>
                                    </div>
                                    </div>
                                 @endif
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="luxueux">
                        <div class="child-tab-wrapper">
                           <ul class="nav nav-tabs" role="tablist">
                           @foreach($data['cars_LUXUEUX'] as $car)
                              <li role="presentation">
                                 <a href="#car-{{$car->id}}-lux" role="tab" data-toggle="tab">
                                 <img src="storage/{{$car->image}}" alt="">
                                 <span class="tittle">{{$car->name}}</span>
                                 <span class="car-des">{{$car->gasoil}},{{$car->boite_vitesse}}</span>
                                 <span class="rent-price"><b>À partir de</b> {{$car->prix}} DH<b> par Jour</b></span>
                                 </a>
                              </li>
                           @endforeach
                           </ul>
                           <div class="tab-content">
                           @foreach($data['cars_LUXUEUX'] as $car)
                                 @if($data['id3'] == $car->id)
                                 <div role="tabpanel" class="tab-pane fade in active" id="car-{{$car->id}}-lux">
                                    <div class="rq-tab-car-details">
                                       <h3>{{$car->name}}</h3>
                                       <div class="large-image-wrapper">
                                          <div class="image-bg"></div>
                                          <img src="storage/{{$car->image}}" alt="">
                                       </div>
                                       <div class="car-details-option">
                                          <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                          <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                          <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                          <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                          <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                       </div>
                                    </div>
                                 </div>
                                 @else
                                 <div role="tabpanel" class="tab-pane fade in " id="car-{{$car->id}}-lux">
                                    <div class="rq-tab-car-details">
                                       <h3>{{$car->name}}</h3>
                                       <div class="large-image-wrapper">
                                          <div class="image-bg"></div>
                                          <img src="storage/{{$car->image}}" alt="">
                                       </div>
                                       <div class="car-details-option">
                                          <span><i class="fa fa-users"></i>{{$car->places}} Places</span>
                                          <span><i class="fa fa-suitcase"></i>{{$car->valises}} Valises</span>
                                          <span><i class="fa fa-car"></i>{{$car->portes}} Portes</span>
                                          <span><i class="fa fa-snowflake"></i> Climatisation : {{$car->climatisation}}</span>
                                          <span>À partir de <span class="red-section">{{$car->prix}} DH </span> par Jour</span>
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                           @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="rq-content-block gray-bg">
               <div class="container">
                  <div class="rq-partners-section">
                     <div class="partners-wrapper">
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/dacia.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/hyundai.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/peugeot.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/renault.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/kia.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/citroen.png')}}" alt=""></a></div>
                        <div class="partner-single"><a href="#"><img src="{{ Vite::asset('resources/img/range-rover.png')}}" alt=""></a></div>
                     </div>
                  </div>
                  <div class="rq-testimonial-section">
                     <div class="rq-testimonial-content">
                        <h1 class="rq-title">{{__('What Our Customers Are Saying.')}}<span class="rq-dot">.</span></h1>
                        <div class=" owl-carousel testimonial-wrapper">
                           <div class="item">
                              <p class="testimoinal-text">
                                 Tout était parfait ponctualité 10/10 fiabilité 10/10 propreté 10/10 bonne communication on cetais donner rendez-vous au T2 et il etai present a l’heure a mon arrivé a casablanca pareille pour mon retours à montréal. Amical et gentil merci pour le service je recommande fortement!
                              </p>
                              <span class="author-name-title">
                              <a href="#">Youssef Elbouachraoui <i class="ion-ios-minus-empty"></i>
                              <span>
                              <i class="ion-android-star text-warning"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              </span>
                              </a>
                              </span>
                           </div>
                           <div class="item">
                              <p class="testimoinal-text">
                                 Consiglio la seria agenzia di noleggio che abbiamo prenotato con il numero di telefono sul sito all'arrivo Habib il commesso disponibile e puntuale.
                                 L'auto era molto pulita e in ottime condizioni e il prezzo molto ragionevole.
                                 Alla prossima volta, grazie Habib.
                                 <br /> <br />Spain ✌
                              </p>
                              <span class="author-name-title">
                              <a href="#">fatima tayaf <i class="ion-ios-minus-empty"></i>
                              <span>
                              <i class="ion-android-star text-warning"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              </span>
                              </a>
                              </span>
                           </div>
                           <div class="item">
                              <p class="testimoinal-text">
                                 Vraiment très belle voiture avec un très bon service merci beaucoup pour tous vos efforts pour notre satisfaction
                                 جزاكم الله خيرا على حسن الاستقبال و حسن المعاملة
                                 You  are  the best rent car  in casablanca
                              </p>
                              <span class="author-name-title">
                              <a href="#">Younes Grini
                              <i class="ion-ios-minus-empty"></i>
                              <span>
                              <i class="ion-android-star text-warning"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              <i class="ion-android-star"></i>
                              </span>
                              </a>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="rq-contact-us-map"> 
                  <iframe id="map" style="border:0;"  src="https://maps.google.com/maps?q=safi,ensa&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                  <!-- <iframe style="width: 100%; height: 250px;" src="https://maps.google.com/maps?q=safi,ensa&t=&z=13&ie=UTF8&iwloc=&output=embed" -->
               <!-- frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
               </div>
            </div>
            <div class="rq-call-to-action">
               <div class="container">
                  <h2>{{__('Need help renting online? #')}} <a href="tel:#"># </a> </h2>
               </div>
            </div>
         </div>
</div>
<div id="example"></div>
@endsection

