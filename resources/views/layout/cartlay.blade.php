<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/styling.css')}}">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <script src="/js/jquery.min.js"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        {{-- cartPage --}}
        
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/crumina-fonts.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    {{-- <link rel="stylesheet" type="text/css" href="css/grid.css"> --}}
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/primary-menu.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

  <style>
    	.text-center{
    		text-align: center;
    	}
    </style>
        {{-- <link rel="icon" type="image/png" href="/img/favicon_findworka.png">  --}}
        <title>{{config('app.name', 'Food Express')}}</title>

    </head>
    <body>
            <nav class="navbar navbar-expand-md navbar-custom navbar-dark fixed-top " style="background-color: #ffcc00">
                    <div class="container-fluid">
                      <div class="page-scroll">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09"
                          aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <a class="navbar-brand" href="/">Nathan's Kitchen</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample09">
                        <ul class="nav navbar-nav  mr-auto  ">
                          {{-- <li class="hidden">
                            <a href="#page-top" class="nav-link"></a>
                                </li> --}}
                                <li class="page-scroll">
                                    <a href="/" class="nav nav-link">Home</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="/connect" class="nav nav-link">Connect</a>
                                </li>  
                                <li class="page-scroll">
                                    <a href="/about" class="nav nav-link">About</a>
                                </li> 
                                
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Order now<span class="caret"></span></a>
                          
                        @auth
                                <li class="page-scroll">
                                <a href="/" class="nav-link">{{ Auth::user()->firstname }}</a>
                                <span class="caret"></span>
                                </li>
                         @endauth
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="background-color: #ffcc00">
                                    <a class="dropdown-item" href="/breakfast">Breakfast</a>
                                    <a class="dropdown-item" href="/lunch">Lunch</a>
                                    <a class="dropdown-item" href="/cake">Cakes n Desserts</a> 
                          @auth
                                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                          @else
                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                          @endauth
                        
                        </ul>
                        {{-- login/register --}}
                      
                    </div>
                  </div>
                  


        <div class="container">
    
            <div>
    
                <ul class="nav-add  ">
                    <li class="cart">
    
                        <a href="#" class="js-cart-animate">
                            <i class="fa fa-cart-plus"></i>
                            <span class="cart-count"></span>
                        </a>
    
                        <div class="cart-popup-wrap">
                            <div class="popup-cart">
                                {{-- <h4 class="title-cart">No products in the cart!</h4>
                                <p class="subtitle">Please make your choice.</p> --}}
                                <div class="btn btn-small btn--light">
                                    <a href="/cart"><span class="text">view all catalog</span></a>    
                                </div>
                            </div>
                        </div>
    
                    </li>
                </ul> 
            </div>
    
        </div>
    

    
                  
        </nav>
                
        <br><br>
        <div class="container-fluid">
             @yield('content')
        </div>
        
        
    </body>
</html>
