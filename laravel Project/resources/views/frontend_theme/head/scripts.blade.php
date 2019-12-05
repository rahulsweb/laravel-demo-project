  
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script> 




    <script src="{{ asset('js/jqzoom.js') }}"></script>

<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>


<script>
        
        $('document').load(function(){
            alert("Image loaded.");
          });
          $('.category_tab').click(function(){
            $('.p').remove();
           var  id=$(this).attr('name');
            $('#sub_categories').hide();
            $.ajax({
            type:'POST',
            url:"{{ route('sub_category.product') }}",
            data:{'_token':"{{ csrf_token() }}",'id':id},
            success:function(data) {
               var str="";
                
                $.each( data, function  ( key, value ) {
                 
                    var url = "{{ url('cart/detail',1) }}";
var url = url.replace('1', value.id);

var wishlist="";
wishlist_url="{{ url('wishlist/add') }}";
                            str+=' <div class="col-sm-3">';
                            str+=' <div class="product-image-wrapper">';
                                    str+='<div class="single-products">'; 
                                            str+='<div class="productinfo text-center">';
                                                    str+=' <img id="image" src="'+value.product_image[0].name+'" alt="" height="150" />';
                                                    str+='<strong id="rate">'+value.name+'</strong>';
                                                    str+='<h2 id="rate">'+value.rate+'</h2>';
                                                    var cart_if = "isset(Session::get('cart')->items[0123])";
                                                    var cart_if = cart_if.replace('0123', this.id);
                                             
                                               
                                                   
                                                    str+= '<a href="'+url+'"  class="btn btn-default add-to-cart" ><i class="fa fa-plus-square"></i>Add To Cart</a>';
                                                                                              
                                             
                                                    str+=' </div>';
                                                    str+=' </div>'; 
                                                    
                                                    

                                                    
                                                

                                                    


                                                    str+=' </div>';

                                                 
                                                   
                                                        
                                                    str+=' </div>';
                                                    






                                                    
                                               
                                                

                                                    
                                                                
                                                               
                                                               
                                                                                   
                                                           
                                                       

               
            });
            $('.p').remove();
            $('.new_p').html(str);
        }
         });
        
        });
        </script>