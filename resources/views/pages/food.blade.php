@extends('layout.cartlay')

@section('content')

      
 

 @foreach($fooditems as $item)
 <br>
 <br>
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <div id= "food" style="text-color: rgb(230, 0 , 0)">
                <img src="/img/{{$item->photo}}"><br>
                {{ $item->name }}<br>
                {{ "N". $item->price }}<br>
                {{ $item->description }}<br>
        </div>
        <div id="addtocart">
           <form action="/cart" method="POST" class="form-inline">
             @csrf
        
        {{-- <div class="quantity">
                <input type="hidden" name="qty" value="qty">
                <a href="#" class="quantity-minus">-</a>
                <input title="Qty" class="email input-text qty text" type="number" value="1">
                <a href="#" class="quantity-plus">+</a>
            </div> --}}
             <input type="hidden" name="item_id" value="{{ $item->id }}">
             <button type="submit" class="btn btn-medium btn-primary" data-toggle="modal" data-target="#cart-modal"> <i class="fa fa-cart-plus"></i> Add to cart</button>
            </form>      
            </div>
        </div>
        {{--  --}}
        <div class="col-sm-6">
                <div id= "food" style="text-color: rgb(230, 0 , 0)">
                        <img src="/img/{{$item->photo}}"><br>
                        {{ $item->name }}<br>
                        {{ "N". $item->price }}<br>
                        {{ $item->description }}<br>
                </div>
                <div id="addtocart">
                   <form action="/cart" method="POST" class="form-inline">
                     @csrf
                
                {{-- <div class="quantity">
                        <input type="hidden" name="qty" value="qty">
                        <a href="#" class="quantity-minus">-</a>
                        <input title="Qty" class="email input-text qty text" type="number" value="1">
                        <a href="#" class="quantity-plus">+</a>
                    </div> --}}
                     <input type="hidden" name="item_id" value="{{ $item->id }}">
                     <button type="submit" class="btn btn-medium btn-primary" data-toggle="modal" data-target="#cart-modal"> <i class="fa fa-cart-plus"></i> Add to cart</button>
                    </form>      
                    </div>
                </div>
    </div> 
</div>
@endforeach

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/crum-mega-menu.js"></script>
<script src="js/swiper.jquery.min.js"></script>
<script src="js/theme-plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/form-actions.js"></script>

<script src="js/velocity.min.js"></script>
<script src="js/ScrollMagic.min.js"></script>
<script src="js/animation.velocity.min.js"></script>

@endsection
   