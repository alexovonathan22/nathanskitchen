@extends('layout.lay')


@section('content')

      
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0"  class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> 
    
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img id="carImg" class="d-block w-100" src="{{asset('img/alireza-etemadi-422369-unsplash.jpg')}}" alt="First slide">
              <div class="carousel-caption">
                  <h3 id="caption">Order now</h3>
                  <a href="/register"><button id="sUp" type="button" class="btn"><strong>Sign up</strong></button></a> 
              </div>
          </div>
        <div class="carousel-item">
          <img id="carImg" class="d-block w-100" src="{{asset('img/austin-moncada-186841-unsplash.jpg')}}" alt="Second slide">
            <div class="carousel-caption">
                <h3 id="caption">And have it</h3>
                
              <a href="/register"><button id="sUp" type="button" class="btn"><strong>Sign up</strong></button></a> 
            </div>
        </div>
        <div class="carousel-item">
          <img id="carImg" class="d-block w-100" src="{{asset('img/cel-lisboa-60315-unsplash.jpg')}}" alt="Third slide">
          <div class="carousel-caption">
              <h3 id="caption">Delivered hot</h3>             
             <a href="/register"><button id="sUp" type="button" class="btn"><strong>Sign up</strong></button></a> 
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>    
    {{-- On offer --}}
    <br>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <a href="/breakfast" role="button"><img class="rounded-circle" src="{{asset('img/1eiliv-aceron-1041092-unsplash.jpg')}}" alt="Generic placeholder image" width="240" height="140"></a>
              <h4 id="blc"><a href="/breakfast" role="button">Breakfast</a></h4><br>
             
                {{-- <p>Go for Breakfast &raquo;</a></p> --}}
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <a href="/lunch" role="button"><img class="rounded-circle" src="{{asset('img/1thomas-tucker-391058-unsplash.jpg')}}" alt="Generic placeholder image" width="240" height="140"></a>
                 <h4 id="blc"><a href="/lunch" role="button">Lunch</a></h4><br>
                  
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <a href="/cake" role="button"><img class="rounded-circle" src="{{asset('img/1madeline-tallman-44555-unsplash.jpg')}}" alt="Generic placeholder image" width="240" height="140"></a>
                <h4 id="blc"><a href="/cake" role="button">Cakes & Desserts</a></h4><br>
             
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div>

{{-- how it works --}}
{{-- <br> --}}
{{-- <div id="how" class="container-fluid center">
    <div class="row">
      <div class="col-lg-4">
          <i id="how2" class="fas fa-search"></i><br>

        <h6>Browse your favorite meal</h6>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
              <i id="how2" class="fas fa-cookie-bite"></i>
            <h6>Place your Order</h6>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
              <i id="how2" class="fas fa-money-bill-alt"></i>
            
              <h6>make payments</h6>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div> --}}
  




    <script>$('.carousel').carousel({
            interval:2500
            })</script>
@endsection
   