@extends('frontend_theme.frontend_layout') 
@section('content')
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product zoom"  >
                            <img id="product_image" src="{{ asset($products->product_image->last()->name) }}" alt="" />
							
						
						</div>
					
			<?php $images=$products->product_image->pluck('name'); ?>
						

			




					<!-- Modal -->
					



					
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
						
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

								@foreach ($products->product_image as $key => $image )
						
                                <div class="item {{ $key == 0 ? ' active' : '' }}">
									@foreach ($images as $image)
									<img  class="image" src="{{ asset($image) }}" width="100" height="100" alt="">
									@endforeach
                                   

                                </div>
								@endforeach
                               
                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>

                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
							<img src="images/product-details/new.jpg" class="newarrival" alt="" />
							
                            <h2>{{$products->name}}</h2>
                            <p>Web ID: 1089772</p>
							<img src="images/product-details/rating.png" alt="" />
							
                            <span>

							
								<span>{{$products->rate}}</span>
							<?php /*
								<label>Quantity:</label>

                            <input type="text" value="{{ $products->qty_left }}" />
							*/	?>
                            <a href="{{ url('cart/detail',$products->id) }}" class="btn btn-warning add-to-cart" style="margin-left='20px;'"><i class="fa fa-plus-square"></i>Add To Cart</a>

							</span>
						
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                        </div>
                        <!--/product-information-->
					</div>
					
				
                </div>
                <!--/product-details-->

            </div>
        </div>
    </div>
</section>
@endsection 
@push('scripts')

<script>
	
    $('document').ready(function() {


		
        $('.image').click(function() {
			
            var image = $(this).attr('src');
            $('#product_image').attr('src', image);
        });
    });
</script>
@endpush
