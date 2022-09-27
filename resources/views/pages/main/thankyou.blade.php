{{-- @extends('layouts.main.index') --}}

<style>

.wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
.mb5 {
    margin-bottom: 30px !important;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:52px;
  letter-spacing:3px;
  color:#3197fb ;
  margin:50px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
  color:#aaa;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.wrapper-2 a {
    text-decoration: none;
}
.go-home{
  color:#fff;
  background:#3197fb;
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
}
.footer-like{
  margin-top: auto; 
  background:#010101;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#ffffff;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#3197fb;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:52px;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:50px;
  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
  border-radius: 15px;
}
  
}
</style>
{{-- 
@section('css')
<title>Tejas Travels</title>
@stop


@section('content')

@include('includes.main.breadcrumb') --}}

<div class="content">
    <div class="wrapper-1">
      <div class="wrapper-2">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/images/tejas-logo.png') }}" class="img-responsive logo-img" alt="logo"
                title="Logo" />
        </a>
        <h1>Thank you !</h1>
        <p>Thanks for Contacting to Tejas Travel.  </p>
        <p class="mb5"> !! Our Team will be get back you soon !!  </p>
        <a href="/" class="go-home">
        go home
        </a>
      </div>
      {{-- <div class="footer-like">
        <p>Email not received?
         <a href="/">Click here to send again</a>
        </p>
      </div> --}}
  </div>
  </div>
  
  
  
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">


{{-- @include('includes.main.brands')

@include('includes.main.newsletter')

@stop --}}