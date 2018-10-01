    @extends('layout.lay')
    
        @section('content')
                <h1>connect with us</h1>
        @endsection

        <div class="order" >
                <h5 class="h1 order-title text-center">Your Order</h5>
               @if($cart_items === false)
                   <h6 class="h1 order-title text-center">No Items in cart</h6>
               @else
               <form class="cart-main">
                   <table>
                       <thead>
                       <tr>
                           <th>Product</th>
                           <th>Quantity</th>
                           <th>Total</th>
                       </tr>
                       </thead>
                       <tbody>              
                               @foreach($cart_items as $item)
                               <tr>            
                                   <td>                    
                                          
                                       <div class="cart-product-content">
                                           <h6>{{$item->name}}</h6>
                                       </div>
                                   
                                   </td>
           
                                       <td>
           
                                           <div class="quantity">
                                                   {{$item->qty}}
                                           </div>
           
                                       </td>
           
                                       <td class="product-subtotal">
                                           <h5>{{"N".$item->price}}</h5>
                                       </td>
           
                                   </tr>
                               
                               
                               @endforeach

                       

           
                                   <tr>                    
                                       <td>                  
                                           <div>
                                               <h6>Total:</h6>
                                           </div>
           
           
                                       </td>
           
                                       <td>
           
                                       </td>
           
                                       <td>
                                           <h5>{{"N" . $total }}</h5>
                                       </td>
                                   </tr>
           
                                   </tbody>
                               </table>
           
                               <div>

                                    <button type="button" id="pay" class="btn btn-primary"> PAY </button>

                                </div>
                           
                   </div>

               </form>
               @endif
           </div>