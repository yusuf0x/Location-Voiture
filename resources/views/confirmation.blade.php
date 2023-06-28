@extends("layout")
@section("body")
<div id="main-wrapper">
   <header class="header">
      @include("nav")
   </header>
</div>
<!-- <div ><img width="100px" height="400px" src="images/logo1.jpeg" alt=""/></div> -->
<div class="rq-cart-items">
      <form action="" method="">
         <div class="row">
         <div class="col-md-12">
            <div class="cart-items-table">
               <div class="table-responsive">
                  <table>
                     <thead>
                        <tr class="table-head">
                           <th>{{__('Name of car')}}</th>
                           <th>{{__('Status')}}</th>
                           <th>{{__("Price")}}</th>
                           <th>{{__('Quantity')}}</th>
                           <th>{{__('Total')}}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <img src="storage/{{$data['image']}}" alt="item">
                              <div class="details">
                                 <h5>{{$data['name']}}</h5>
                                 <ul class="items">
                                    <li>{{__('DEPARTURE DATE')}}:<span>{{$data['startdate']}}</span></li>
                                    <li>{{__('RETURN DATE')}}:<span>{{$data['enddate']}}</span></li>
                                 </ul>
                                 <?php
                                    // Récupération des dates de départ et d'arrivée du formulaire
                                    // $datedebut = new DateTime($startdate);
                                    // $datefin = new DateTime($enddate);
                                    // $interval = $datedebut->diff($datefin);
                                    // $nbrejours = $interval->days + 1;
                                    ?>
                              </div>
                           </td>
                           <td>{{$data['reservation']['etat_reservation']}}</td>
                           <td>{{$data['prix']}} DH </td>
                           <td>{{$data['interval']}} {{__('day')}}(s)</td>
                           <td>
                              {{$data['total']}} DH 
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <ul>
                  <li><strong>{{__('Name')}}:</strong> <span>{{$data['user']['name']}}</span></li>
                  <li><strong>{{__('Phone')}}:</strong><span>{{$data['user']['phone']}}</span></li>
                  <li><strong>{{__('Email')}}:</strong> <span>{{$data['user']['email']}}</span></li>
                  <li><strong>{{__('ID Reservation')}}:</strong> <span>{{$data['reservation']['id']}}</span></li>
                  
                  <ul>
               </div>
               <!-- <div>
                  <button onclick="print()">print</button>
               </div> -->
            </div>
         </div>
      </form>
</div>
      
@endsection