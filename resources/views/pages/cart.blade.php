@extends('layout.cartlay')

    @section('content')
    <br>


    <div class="container-fluid">
            <div class="row pt120">
                <div class="col-lg-8 col-lg-offset-2 align-center">
                    <div class="heading align-center mb60">
                        <h3 class="h1 heading-title align-center ">Check Out Page</h3>       
                                           
                     </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
        
                    <div class="row">
        
                        <div class="col-lg-12">
                    <div class="order" >
                        <h5 class="h1 order-title text-center">Your Order</h5>
                        @if($cart_items === false)
                        <h6 class="h1 order-title text-center">No Items in cart</h6>
                        @else
                        <form class="cart-main">
                            <table class="shop_table cart">
                                <thead class="cart-product-wrap-title-main">
                                <tr>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                    

                                   

                                        @foreach($cart_items as $item)
                                        <tr class="cart_item">
            
                                                <td class="product-thumbnail">
                    
                                                    <div class="cart-product__item">
                                                        <div class="cart-product-content">
                                                            <h5 class="cart-product-title">{{$item->name}}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                    
                                                <td class="product-quantity">
                    
                                                    <div class="quantity">
                                                            {{$item->qty}}
                                                    </div>
                    
                                                </td>
                    
                                                <td class="product-subtotal">
                                                    <h5 class="total amount">{{"N".$item->price}}</h5>
                                                </td>
                    
                                            </tr>
                                        
                                        
                                        @endforeach
        
                                
    
                    
                                            <tr class="cart_item total">
                    
                                                <td >
                    
                    
                                                    <div class="cart-product-content">
                                                        <h5 class="cart-product-title">Total:</h5>
                                                    </div>
                    
                    
                                                </td>
                    
                                                <td class="product-quantity">
                    
                                                </td>
                    
                                                <td class="product-subtotal">
                                                    <h5 class="total amount">{{"N" . $total }}</h5>
                                                </td>
                                            </tr>
                    
                                            </tbody>
                                        </table>
                    
                                        <div id="payButton">

                                        <button type="button" id="pay" class="btn btn-medium"> PAY </button>

                                            </div>
                                    
                            </div>
        
                            </form>
                        @endif
                    </div>
                </div>
        
                    </div>
                </div>
            </div>
        </div>
        
       
        
        
        
        </div>
        
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/crum-mega-menu.js"></script>
        <script src="js/swiper.jquery.min.js"></script>
        <script src="js/theme-plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/form-actions.js"></script>
        
        <script src="js/velocity.min.js"></script>
        <script src="js/ScrollMagic.min.js"></script>
        <script src="js/animation.velocity.min.js"></script>
               
              <script>
                  // A $( document ).ready() block.
                    $( document ).ready(function() {
                        
                        function payWithPaystack(){
                            var handler = PaystackPop.setup({
                                key: 'pk_test_fa0d537b756789a46c11e0667d14495c161f9884',
                                email: '{{ Auth::user()->email }}',
                                amount: {{$total}} * 100,
                                // metadata: {
                                // custom_fields: [
                                //     {
                                //         display_name: "Mobile Number",
                                //         variable_name: "mobile_number",
                                //         value: "+2348012345678"
                                //     }
                                // ]
                                // },
                                callback: function(response){
                                 
                                       $.get('/handle_payment?reference=' + response.reference 
                                            + '&cart_id=' + '{{$cart_id}}' + '&amount=' + '{{$total}}',
                                        function(data, status){
                                            console.log("Data: " + data + "\nStatus: " + status + '\nCart: ' + '{{$cart_id}}');
                                            window.location = '/order_status?status=' + data;
                                        })
                                        .fail(function( jqXhr, status, errorThrown ){
                                                console.log( errorThrown + " Status: " + status);
                                                window.location = '/order_status?status=failed'
                                        });                                                                    
    
                                            
                                    },
                                onClose: function(){
                                    // alert('window closed');
                                }
                            });
                            
                            handler.openIframe();
                            }

                            $("#pay").click(function(){
                                payWithPaystack();
                            });
                        
                        });

                
              </script>
    @endsection