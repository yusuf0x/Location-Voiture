@extends("layout")
@section("body")
<div id="example"></div>
<div id="main-wrapper">
<header class="header">
@include("nav")
</header>
<div class="inner-page-banner" style="background: url('storage/images/cars/palaciocar_banner.jpg') center center no-repeat; background-size: cover;">
   <div class="rq-overlay"></div>
   <div class="container">
      <div class="rq-title-container bredcrumb-title text-center">
         <h2 class="rq-title">Nos Véhicules</h2>
         <ol class="breadcrumb rq-subtitle secondary">
            <li><a href="/">Accueil</a></li>
            <li class="active">Nos Véhicules</li>
         </ol>
      </div>
   </div>
</div>
<div class="rq-page-content">
   <div class="rq-content-block gray-bg small-padding-top">
      <div class="container">
         <div class="listing-search-container">
            <form action="/checkout" method="GET" id="reservation">
               <input type="hidden" name="_token" value="">
               <input type="hidden" name="car_id">
               <div class="rq-search-container with-border">
                  <div class="rq-search-single">
                     <div class="rq-search-content">
                        <span class="rq-search-heading">Date départ</span>
                        <input autocomplete="off" type="text"  name="startdate" class="rq-form-element datepicker" id="startdate" value="{{$data['startdate']}}" placeholder="Du" required />
                        <i class="ion-chevron-down datepicker-arrow"></i>
                     </div>
                  </div>
                  <div class="rq-search-single">
                     <div class="rq-search-content">
                        <span class="rq-search-heading">Date retour</span>
                        <input autocomplete="off" type="text" name="enddate" class="rq-form-element" id="enddate" value="{{$data['enddate']}}" placeholder="Au" required />
                        <i class="ion-chevron-down datepicker-arrow"></i>
                     </div>
                  </div>
                  <div class="rq-search-single">
                     <div class="rq-search-content last-child">
                        <span class="rq-search-heading">Votre âge</span>
                        <select name="age" class="year-option">
                           @if($data['age'] == 23 )
                              <option value="23"  selected >23</option>
                           @else
                              <option value="23">23</option>
                           @endif
                           @if($data['age'] == 24 )
                              <option value="24" selected >24</option>
                           @else
                              <option value="24">24</option>
                           @endif
                           @if($data['age'] == 25 )
                              <option value="25" selected >25</option>
                           @else
                              <option value="25">25</option>
                           @endif
                           @if($data['age'] == 26 )
                              <option value="26" selected >26</option>
                           @else
                              <option value="26">26</option>
                           @endif
                           @if($data['age'] == 27 )
                              <option value="27" selected >27</option>
                           @else
                              <option value="27">27</option>
                           @endif
                           @if($data['age'] >= 28 )
                              <option value="28" selected >28</option>
                           @else
                              <option value="28">28</option>
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="rq-search-single search-btn">
                     <div class="rq-search-content">
                        <a href="/checkout?startdate={{$data['startdate']}}&enddate={{$data['enddate']}}">
                           <button type="button" class="rq-btn rq-btn-primary fluid-btn" id="search">Chercher <i class="arrow_right"></i></button></a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="rq-listing-top-bar-filter-option">
            <div class="filter-list">
               <span> </span>
               <form method="POST"   style="display: flex; flex-direction: row; align-items: center;">
                  @csrf
                  <label for="marque" style="margin-left: 10px;">marque:</label>
                  <select id="marque" name="marque"   style="margin-left: 20px;">
                     <option value="tous">Tous</option>
                     <option value="Renault">Renault</option>
                     <option value="Citroën">Citroën</option>
                     <option value="Hyundai">Hyundai</option>
                     <option value="Peugeot">Peugeot</option>
                     <option value="Kia">Kia</option>
                     <option value="Range Rover">Range Rover</option>
                     <option value="Dacia">Dacia</option>
                  </select>
                  <label for="gasoil" style="margin-left: 10px;">Gasoil:</label>
                  <select name="gasoil" id="gasoil" style="margin-left: 20px;margin-right: 20px;">
                     <option value="tous">Tous</option>
                     <option value="Essence">Essence</option>
                     <option value="Diesel">Diesel</option>
                  </select>
                  <input type="submit" value="Filter" style="background-color: #4CAF50; color: white; padding: 5px 25px; border: none; border-radius: 4px; cursor: pointer;">
               </form>
            </div>
            <div class="rq-grid-list-view-option">
               <a href="#" data-class="rq-listing-grid"><i class="ion-grid"></i></a>
               <a class="active" href="#" data-class="rq-listing-list"><i class="ion-navicon"></i></a>
            </div>
         </div>
         <div class="data">
            <div class="rq-car-listing-wrapper">
               <div class="rq-listing-choose rq-listing-list">
                  <form id="reservation-form" action="/checkout" method="POST">
                     @csrf
                     <div class="row">
                        @foreach($data['cars'] as $car ) 
                        <div class="col-md-4 col-sm-6">
                           <div class="listing-single">
                              <div class="listing-img">
                                 <img src="storage/{{ $car->image }}" alt="{{ $car->name }}">
                              </div>
                              <div class="listing-details">
                                 <h3 class="car-name"><a href="/checkout">{{$car->name}}</a></h3>
                                 <ul class="rating-list">
                                    <li><i class="ion-star"></i></li>
                                    <li><i class="ion-star"></i></li>
                                    <li><i class="ion-star"></i></li>
                                    <li><i class="ion-star"></i></li>
                                    <li><i class="ion-star"></i></li>
                                 </ul>
                                 <ul>
                                    <li>Gasoil: <span>{{ $car->gasoil }}</span></li>
                                    <li>Boite de vitesse: <span>{{ $car->boite_vitesse }}</span></li>
                                    <li>Climatisation: <span>{{ $car->climatisation }}</span></li>
                                    <li>
                                       <i class="fa fa-users"></i> <span style="margin-right:1rem;">{{ $car->places }} Places</span>
                                       <i class="fa fa-suitcase"></i> <span style="margin-right:1rem;">{{ $car->valises }} Valises</span>
                                       <i class="fa fa-car"></i> <span style="margin-right:1rem;">{{ $car->portes }} Portes</span>
                                    </li>
                                 </ul>
                                 <div class="listing-footer text-center">
                                    <span class="text-center"> <span class="price">{{$car->prix }} DH</span> par jour </span>
                                 </div>
                                 <input type="hidden" name="image" value="{{$car->image}}">
                                 <input type="hidden" name="name" value="{{$car->name}}">
                                 <input type="hidden" name="prix" value="{{$car->prix}}">
                                 <input type="hidden" name="startdate" value="{{$data['startdate']}}">
                                 <input type="hidden" name="enddate" value="{{$data['enddate']}}">
                                 <input type="hidden" name="id" value="{{$car->id}}">
                                 <input type="hidden" name="selected_car_id" value="">
          
                                 <input href="/checkout"
                                    style="display: inline-block; background-color: orange; color: white; padding: 10px 20px; text-align: center; text-decoration: none; font-size: 15px; border-radius: 5px; border: none; transition: background-color 0.3s ease;" type="submit" value="Réserver"> 
                                 <script>
                                    function selectCar(carId) {
                                    document.querySelector('input[name="selected_car_id"]').value = carId;
                                    }
                                 </script>
                              </div>
                           </div>
                        </div>
                        @endforeach
                       
                  </form>
                  </div>
                  <!-- Afficher la pagination -->
                  <?php 
                     // Calculer le nombre total de pages
                     //?id={{$car->id}}&name={{$car->name}}&prix={{$car->prix}}&image={{$car->image}}&startdate={{$data['startdate']}}&enddate={{$data['enddate']}}" 
                    //  $total_pages = ceil(count($cars) / $cars_per_page);
                     
                    //  // Afficher la pagination uniquement si le nombre de pages est supérieur à 1
                    //  if ($total_pages > 1): 
                    ?>
                  <div class="text-center">

                     <!-- <div class="pagination">
                        <?php //if ($page > 1): ?>
                        <a href="?page=<?php //echo ($page - 1); ?>&startdate=<?php //echo $startdate; ?>&enddate=<?php //echo $enddate; ?>&age=<?php //echo $age; ?>" class="prev">&laquo; Précédent</a>
                        <?php //endif; ?>
                        <?php //for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php //if ($i == $page): ?>
                        <span class="current"><?php //echo $i; ?></span>
                        <?php //else: ?>
                        <a href="?page=<?php //echo $i; ?>&startdate=<?php //echo $startdate; ?>&enddate=<?php //echo $enddate; ?>&age=<?php //echo $age; ?>"><?php // echo $i; ?></a>
                        <?php //endif; ?>
                        <?php //endfor; ?>
                        <?php //if ($page < $total_pages): ?>
                        <a href="?page=<?php //echo ($page + 1); ?>&startdate=<?php //echo $startdate; ?>&enddate=<?php //echo $enddate; ?>" class="next">Suivant &raquo;</a>
                        <?php //endif; ?>
                     </div>
                     <?php //endif; ?> -->
                     @if(isset($data['cars']))
                        @if($data['cars']->currentPage() > 1)
                           <a href="{{ $data['cars']->previousPageUrl() }}">&laquo; Précédent</a>
                        @endif
                     
                        @if($data['cars']->hasMorePages())
                           <a href="{{ $data['cars']->nextPageUrl() }}">Suivant &raquo;</a>
                        @endif
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection