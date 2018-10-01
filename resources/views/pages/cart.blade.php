@extends('layout.cartlay')

    @section('content')
    <br>
        
        <div id="content" class="col-sm-9">      <h4 class="page-title">Check Out Page</h4>
            <form method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      {{-- <td class="text-center">Image</td> --}}
                      <td class="text-left">Product Name</td>                     
                      <td class="text-left">Quantity</td>                     
                      <td class="text-right">Price</td>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($cart_items as $item)
                    <tr>                    
                        <td class="text-right">{{$item->name}}</td>
                        <td class="text-right">{{$item->qty}} </td>     
                        <td class="text-right">{{$item->price}} </td>                      
                    </tr>
                    @endforeach
                   </tbody>
                </table>
              </div>
            </form>
                  <br />
            <div class="row ">
              <div class="col-sm-4 col-sm-offset-8">
                <table class="table table-bordered pull-justify">
                  <tr>
                    <td class="text-right"><strong>Total:</strong></td>
                  <td class="text-right"> {{"N" . $total }} </td>
                  </tr>
              </table>
              </div>
            </div>
            
              <div><button type="button" id="pay" class="btn btn-primary"> PAY </button></div>
          
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