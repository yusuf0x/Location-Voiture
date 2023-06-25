@extends("layout")
@if(Auth::check())
@section("body")

<div id="example"></div>
<div id="main-wrapper">
   <header class="header">
   @include("nav")
   </header>
   <div class="rq-page-content">
      <div class="rq-content-block">
         <div class="rq-shopping-content-block">
            <div class="container">
               <div class="rq-title-container bredcrumb-title small">
                  <h2 class="rq-title">Vérification</h2>
                  <ol class="breadcrumb rq-subtitle">
                     <li><a href="/">Accueil</a></li>
                     <li class="active">Vérification</li>
                  </ol>
               </div>
               <div class="rq-cart-items">
                  <h4>Votre voiture choisie</h4>
                  <form action="/confirm" method="POST">
                     @csrf
                  
                     <div class="row">
                        <div class="col-md-12">
                           <div class="cart-items-table">
                              <div class="table-responsive">
                                 <table>
                                    <thead>
                                       <tr class="table-head">
                                          <th>Nom de voiture</th>
                                          <th>Prix</th>
                                          <th>Quantité</th>
                                          <th>TOTAL</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <a href=""><img src="storage/{{$data['image']}}" alt="item"></a>
                                             <a href=""><img src="storage/{{$data['image']}}" alt="item"></a>
                                             <div class="details">
                                                <h5>{{$data['name']}}</h5>
                                                <ul class="items">
                                                   <li>Date départ:<span>{{$data['startdate']}}</span></li>
                                                   <li>Date retour:<span>{{$data['enddate']}}</span></li>
                                                </ul>
                                               
                                             </div>
                                          </td>
                                          <td>{{$data['prix']}} DH </td>
                                          <td>{{$data['nbrejours']}} Jour(s)</td>
                                          <td>
                                             {{$data['total']}} DH 
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <div class="info-single mt-4">
                              <div class="rq-cart-options-title">
                                 <h4>Remplir vos informations</h4>
                              </div>
                              <input type="text" name="nameC" class="rq-form-control small" placeholder="Votre nom" required>
                              <input type="email" name="email" class="rq-form-control small" placeholder="Adresse mail" required>
                              <input type="tel" name="phone" class="rq-form-control small" placeholder="Téléphone" required>
                           </div>
                        </div>
                        <div class="col-md-4" style="margin-top:2rem;">
                           <div class="rq-grand-total">
                              <div class="rq-cart-options-title">
                                 <h4>MONTANT À PAYER :{{$data['total']}} DH </h4>
                              </div>
                              <div class="rq-cart-options-content">
                                 <input type="hidden" name="price" value="280">
                                 <input type="hidden" name="image" value="{{$data['image']}}">
                                 <input type="hidden" name="name" value="{{$data['name']}}">
                                 <input type="hidden" name="prix" value="{{$data['prix']}}">
                                 <input type="hidden" name="startdate" value="{{$data['startdate']}}">
                                 <input type="hidden" name="enddate" value="{{$data['enddate']}}">
                                 <input type="hidden" name="interval" value="{{$data['nbrejours']}}">
                                 <input type="hidden" name="total" value="{{$data['total']}}">
                                 <input type="hidden" name="client_id" value="{{Auth::user()->id}}">
                                 <input type="hidden" name="days" value="9">
                                 <button type="submit" class="rq-btn rq-btn-primary btn-large fluid">Valider votre réservation</button>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@else
<script>window.location = "/login";</script>
@endif