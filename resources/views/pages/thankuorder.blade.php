@extends('layout.lay')

@section('content')
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-sm-6">
               <br>
                @if(Request::query('status') == 'successful')
                <p>Thank You {{ Auth::user()->firstname }} for shopping with us</p>
                <p class="alert alert-success">Your order is under way! <a href="{{ route('home') }}">Browse more!</a></p>
                <p>Call 0801 5419 456</p>
                @else
                <p>Sorry {{ Auth::user()->firstname }}</p>
                <p class="alert alert-failed">A problem was encountered while processing your order <a href="{{ route('home') }}">Home!</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection