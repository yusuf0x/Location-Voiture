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
        <div class="head">{{__('login')}}</div>
        <form action="/login" method="POST">
            @csrf
            <div class="field email">
                <div class="input-area">
                    <input type="text" name="email" placeholder="{{__('Email')}}">
                    <i class="icon fa fa-envelope"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">{{__('Email cannot be empty.')}}</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" name="password" placeholder="{{__('Password')}}">
                    <i class="icon fa fa-lock"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">{{__('Password cannot be empty')}}</div>
            </div>
            <div class="pass-txt"><a href="#">{{__('Forgot your password ?')}}</a></div>
            <input type="submit" value="{{__('login')}}">
        </form>
        <div class="sign-txt">{{__('You do not have an account?')}}<a href="/register">{{__('Sign up')}}</a></div>
</div>

@endsection