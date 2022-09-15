<!-- xs offer car tabs Start -->
<style>
    .card{
        border-color: #222 !important;
    }
    .card-header {
        background-color: #fff !important;
        border-bottom: 1px solid #222 !important;
    }
    .card-body{
        border-bottom: 1px solid #222 !important;
    }
    .card-header button{
        color: #222 !important;
        font-weight: 600;
        text-decoration: none !important;
    }
</style>
@php
$faq=$faq;
$halfFaq = count($faq)/2;
@endphp
@if(count($faq)>0)
<div class="x_offer_car_main_wrapper float_left pb5">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="x_offer_car_heading_wrapper float_left">
            <h4>FAQ</h4>
            <h3>Frequently Asked Questions</h3>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="accordion mt15" id="accordionExample">
            @forEach($faq as $k=>$v)
            @if($k+1<=$halfFaq)
            <div class="card">
              <div class="card-header" id="headingOne{{$v->id}}">
                <h2 class="mb-0">
                  <button style="overflow: hidden" class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$v->id}}" aria-expanded="true" aria-controls="collapseOne{{$v->id}}">
                    <p>{{$v->question}}</p> <span style="float: right;color:#3097fe;"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne{{$v->id}}" class="collapse  {{$k+1==1?'show':''}}" aria-labelledby="headingOne{{$v->id}}" data-parent="#accordionExample">
                <div class="card-body">
                    {!!$v->answer!!}
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
    </div>
    <div class="col-lg-6 col-md-12">

        <div class="accordion mt15" id="accordionExample2">
            @forEach($faq as $k=>$v)
            @if($k+1>=$halfFaq)
            <div class="card">
              <div class="card-header" id="headingOne{{$v->id}}">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$v->id}}" aria-expanded="true" aria-controls="collapseOne{{$v->id}}">
                    {{$v->question}} <span style="float: right;color:#3097fe;"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne{{$v->id}}" class="collapse {{$k+1==round($halfFaq)?'show':''}}" aria-labelledby="headingOne{{$v->id}}" data-parent="#accordionExample2">
                <div class="card-body">
                    {!!$v->answer!!}
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
@endif