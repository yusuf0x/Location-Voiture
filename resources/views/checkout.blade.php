@extends("layout")
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
                  <h2 class="rq-title">{{__('Verification')}}</h2>
                  <ol class="breadcrumb rq-subtitle">
                     <li><a href="/">{{__('home')}}</a></li>
                     <li class="active">{{__('Verification')}}</li>
                  </ol>
               </div>
               <div class="rq-cart-items">
                  <h4>{{__('Your chosen car')}}</h4>
                  <form action="/confirm" method="POST" enctype="multipart/form-data">
                     @csrf
                  
                     <div class="row">
                        <div class="col-md-12">
                           <div class="cart-items-table">
                              <div class="table-responsive">
                                 <table>
                                    <thead>
                                       <tr class="table-head">
                                          <th>{{__('car name')}}</th>
                                          <th>{{__('Price')}}</th>
                                          <th>{{__('Quantity')}}</th>
                                          <th>TOTAL</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <!-- <a href=""><img src="storage/{{$data['image']}}" alt="item"></a> -->
                                             <a href=""><img src="storage/{{$data['image']}}" alt="item"></a>
                                             <div class="details">
                                                <h5>{{$data['name']}}</h5>
                                                <ul class="items">
                                                   <li>{{__('DEPARTURE DATE')}}:<span>{{$data['startdate']}}</span></li>
                                                   <li>{{__('RETURN DATE')}}:<span>{{$data['enddate']}}</span></li>
                                                </ul>
                                               
                                             </div>
                                          </td>
                                          <td>  {{App\Helpers\CurrencyHelper::convertCurrency($data['prix']) }}  {{Session::get("currency")}}</td>
                                          <td>{{$data['nbrejours']}} {{__('day')}}(s)</td>
                                          <td>
                                          {{App\Helpers\CurrencyHelper::convertCurrency($data['total']) }}  {{Session::get("currency")}}
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
                                 <h4>{{__('Fill in your information')}}</h4>
                              </div>
                              <input type="text" name="nameC" class="rq-form-control small" placeholder="Votre nom" required>
                              <input type="email" name="email" class="rq-form-control small" placeholder="Adresse mail" required>
                              <input type="tel" name="phone" class="rq-form-control small" placeholder="Téléphone" required>
                              <input type="file" name="id_image" class="rq-form-control small" placeholder="Passport/CIN/" required>
                              
                           </div>
                        </div>
                        <div class="col-md-4" style="margin-top:2rem;">
                           <div class="rq-grand-total">
                              <div class="rq-cart-options-title">
                                 <h4>{{__("AMOUNT TO BE PAID")}} :  {{App\Helpers\CurrencyHelper::convertCurrency($data['total']) }}  {{Session::get("currency")}}</h4>
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
                                 <input type="hidden" name="client_id" value="{{Auth::user() ? Auth::user()->id : null }}">
                                 <input type="hidden" name="nbrejours" value="{{$data['nbrejours']}}">
                                 <button type="submit" class="rq-btn rq-btn-primary btn-large fluid">{{__('Validate your reservation')}}</button>
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
