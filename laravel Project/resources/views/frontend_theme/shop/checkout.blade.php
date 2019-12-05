@extends('frontend_theme.frontend_layout') 
@push('styles')

<style>
  .header
   {
       font-size: 20px;
       text-align: center !important;
   }
   .check_out
   {
	   margin-top: 0px;
   }
.form-two > input
{
	background: #F0F0E9;
    border: 0 none;
    margin-bottom: 10px;
    padding: 10px;
    width: 100%;
    font-weight: 300;
}
.form-one > input
{
	background: #F0F0E9;
    border: 0 none;
    margin-bottom: 10px;
    padding: 10px;
    width: 100%;
    font-weight: 300;
}
</style>

@endpush
@section('content')






















<section id="cart_items">











		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
	
			<div class="step-one">
				<h2 class="heading">Step1</h2>
					
			</div>
			
			<form id="myform"  method="POST" >
					{{ csrf_field() }}	
			<div class="form-group">
				
					
					<div class=" row ">
							<h3 class="text-info"><b>Billing Address</b></h3>
						<select id="bill"   name="bill"  style=" padding:10px;">
										<option value="" >Select Billing Address</option>
									@foreach($addresses->where('user_id',Auth()->user()->id) as $address)		

										<option value="{{ $address->id }}">{{ $address->fullname }}, {{ $address->address1 }}, {{ $address->state }},{{ $address->country }},{{ $address->pincode }} </option>
                                    @endforeach
									
									</select>
									</div>	
									

					</div>

					<div class=" row ">
							<h3 class="text-info"><b>Shipping Address</b></h3>
						<select id="ship_address"        name="ship"  style=" padding:10px;">
										<option value="" >Select Shipping Address</option>
										@foreach($addresses->where('user_id',Auth()->user()->id) as $address)		

										<option  value="{{ $address->id }}">{{ $address->fullname }}, {{ $address->address1 }}, {{ $address->state }},{{ $address->country }},{{ $address->pincode }} </option>
                                    @endforeach
									
									</select>
									</div>	
									

		
			@if(isset($totalPrice) && $totalPrice!=0)
			<div class="review-payment">
					<h2>Review & Payment</h2>
				</div>
			
				<div class="table-responsive cart_info">
						<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
											<td class="image">name</td>
										<td class="image">Item</td>
										<td class="description">Discription</td>
										<td class="price">Price</td>
										<td class="quantity">Quantity</td>
										<td class="total">Total</td>
									   
									</tr>
								</thead>
								<tbody>
				
										@foreach($products as $key => $product)
								   
				  
							  
					
						 
									<tr>
										@foreach ( $product['item']->product_image as $image )
											
										@endforeach
								   
										<td class="cart_product">
											<a href=""><img src="{{ asset($image->name) }}" alt="" width=100 height=100></a>
										</td>
										<td class="cart_description">
											<h4><a href=""> <strong class="text-danger">{{ $product['item']->name }}</strong></a></h4>
											<p>Web ID: 1089772</p>
										</td>
										<td class="cart_description">
											<strong class="text-info">${{ $product['item']->rate }}</strong>
										</td>
										<td class="cart_total">
												<p class="cart_total_price">${{ $product['item']->rate }}</p>
											</td>
									   
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" href="{{ url('cart/add', $product['item']->id) }}" id="up"> + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2">
												<a class="cart_quantity_down" href="{{ url('cart/minus', $product['item']->id) }}" id> - </a>
											</div>
										</td>
										<td class="cart_delete">

										 
										
											<a href={{ url('cart/delete', $product['item']->id) }} class="cart_quantity_delete" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-times"></i></a>
							
										</td>
								  
									 
									</tr>
							   
									@endforeach
							
								</tbody>
							</table>
				


				</div>

		
				<div class="row">
						<div class="col-sm-6">
						<div class="col-sm-6">

								<div class="panel panel-default">
										@if ($message = Session::get('apply'))
										<div class=" fade in">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
											<strong class="text-success">{!! $message !!}</strong>
										</div>
										<?php Session::forget('apply');?>
										@endif
										@if ($message = Session::get('error'))
										<div class=" fade in">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
											<strong class="text-danger">{!! $message !!}</strong>
										</div>
										<?php Session::forget('error');?>
										@endif
									
										
									</div>			

		<strong class="text-warning "> Coupon Code</strong>
		<input type="text"  class="form-group" id="coupon" name="coupon"    value="{{ isset(session()->get('coupon_used')['code']) ? session()->get('coupon_used')['code']:'' }}" {{ isset(session()->get('coupon_used')['code']) ? 'readonly':'' }}>
<br>

		<button {{ isset(session()->get('coupon_used')['code']) ? 'disabled':'' }} id="coupon_used" class="btn btn-warning" formaction="{{ route('coupon.search') }}"> Apply</button>

		<a href="{{ route('coupon.remove') }}" class="btn btn-warning" > Cancel </a>

						</div>
								
						<div class="col-sm-6 text-center ">
					<strong class="text-success ">Coupon List </strong>
					<br>
							<strong class="text-danger">Used Only one Time</strong>
						@if(isset($coupons))
						<ul class="list-group">
						@foreach ($coupons as $coupon)
						<strong class="text-info">{{ $coupon->code }}</strong>	<input  name="coupons" type="radio" id="status" value="{{ $coupon->code }}"    >  </li>
						<br>
							@endforeach
						</ul>
						@else
					
						@endif
						</div>

		



						
					
						</div>
						<div class="col-sm-6">
							
							<div class="total_area">
								
								<ul>
									<li>Cart Sub Total <span>
									
									
									{{ $totalPrice }}
									
									</span></li>
									<li>Eco Tax <span>$2</span></li>
								
									<li>Shipping Cost <span>{{ ($totalPrice > 500) ? '50':'free'  }}</span></li>
							
									<li>Total <span id="totalPrice">
										
											@if( isset($totalPrice ) &&  isset(session()->get('coupon')['discount']))
											<?php  $totalPrice=$totalPrice - session()->get('coupon')['discount'];
											($totalPrice > 500) ? $totalPrice+=50:$totalPrice;
											echo $totalPrice;
											?>
										@else
										<?php $totalPrice=session()->get('cart')->totalPrice;
											
										($totalPrice > 500) ? $totalPrice+=50:$totalPrice;
										echo $totalPrice;
										?>
										@endif
									
									</span></li>
								</ul>
									@if(session()->has('coupon'))
									{{ session()->forget('coupon') }}
									@endif
							</div>
						</div>
					</div>
			<div class="register-req">
				
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-7	 clearfix">
						<div class="bill-to">
							

					
								
					<div class="form-one">
					<p>Billing Address</p>
			
											<input  type="text" id="fullname" name="fullname" placeholder="Full Name *">
								
									<input  type="text" id="address1" name="address1" placeholder="Address 1 *" >
									<input  type="text" id="address2"  name="address2" placeholder="Address 2" >
									<input  type="text" id="pincode"  name="pincode" placeholder="Zip / Postal Code *" >
									<select  id="country" name="country"  style=" padding:10px;" >
										<option value="">-- Country --</option>
								
										<option value="india">India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select  id="state" name="state" style="margin-top:10px; padding:10px;" >
										<option value="">-- State / Province / Region --</option>
										<option  value="maharashtra">Maharashtra</option>
										
									</select>
								
							</div>
							
							<div class="form-two">
							<p>Shipping Address</p>
							
								
										<input   type="text" id="ship_fullname" name="ship_fullname" placeholder="Full Name *" >
								
									<input   type="text" id="ship_address1" name="ship_address1" placeholder="Address 1 *" >
									<input   type="text" id="ship_address2"  name="ship_address2" placeholder="Address 2" >
									<input   type="text" id="ship_pincode"  name="ship_pincode" placeholder="Zip / Postal Code *" > 
									<select  id="ship_country" name="ship_country" style=" padding:10px;" >
										<option value="">-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option value="india">India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select id="ship_state" name="ship_state" style="margin-top:10px; padding:10px;" >
										<option>Select State</option>
										<option value="maharashtra">Maharashtra</option>
										
									</select>
									{{--  <input type="password" placeholder="Confirm password" >
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">  --}}
							
							</div>


							
						</div>



						
					</div>
					<div class="col-sm-5">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			
			<div class="payment-options">
				
		
				<span>
						<label><input type="radio" id="cod"  name="paypal" value="COD"> COD</label>
					</span>
				
					<span>
						<label><input type="radio" id="paypal" name="paypal" value="Paypal"> Paypal</label>
					</span>
					 <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $totalPrice }}" autofocus>
				
					 <button type="submit" id="submit" formaction="{{ url('cod') }}" >
							
						
				</div>
		</div>
                    
                              
                        
                        
                          
                           
                    </form>



       
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
            
                
            </div>
     




	@else
	<div class="table-responsive cart_info">
			<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
								<td class="image">name</td>
							<td class="image">Item</td>
							<td class="description">Discription</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						   
						</tr>
					</thead>
					<tbody>
							<tr >
								<td class="text-danger" colspan="5"> <strong><h1 class="text-center">Cart Is Empty</strong></td>
							</tr>
					</tbody>
			</table>
	</div>



	@endif

	</section> <!--/#cart_items-->

    @endsection

    @push('scripts') 
    
    <script>









			



	$(function(){
      $("#submit").css('display','none'); // try to hide google navigation bar
   });




		
	





$(document).ready(function(){
	 var value=$('#coupon').val();
	 if(value)
	 {
		$('input[name=coupons][value='+value+']').prop("checked",true);
		$('input[name=coupons]').prop('disabled', function(){ return !this.checked; });
	 }

	$('#myform input').on('change', function() {
		var coupon=$('input[name=coupons]:checked', '#myform').val(); 
		$('#coupon').val(coupon);

		$('#coupon').click(function()
		{
			$('#coupon').attr('readonly');
			$('input[name=coupons]').prop('disabled', function(){ return !this.checked; });
		});;

	 });
				$('#ship_address').click(function(){
		
					if($('#ship_address :selected').val()){
			
						ship_id=$(this).val();
			
					}
				
					$.ajax({
					
						type:"GET",
						url:"{{url('checkout/address')}}/"+ship_id,
						success: function(data) {
			
					
				
						$('#ship_fullname').val(data.success.fullname);
						$('#ship_address1').val(data.success.address1);
						$('#ship_address2').val(data.success.address2);
						$('#ship_country ').val(data.success.country);
						$('#ship_state ').val(data.success.state);
					
						$('#ship_pincode').val(data.success.pincode);
			
			
								
					
					  
					 
						$('select[name="ship"]').val(ship_id).attr("selected",true);
			
					 
					}
					});
				
				});
			
			
				$('#bill').click(function(){
					
					if($('#bill :selected').val()){
			
						bill_id=$(this).val();
			
					}
				
					$.ajax({
					
						type:"GET",
						url:"{{url('checkout/address')}}/"+bill_id,
						success: function(data) {
							$('#fullname').val(data.success.fullname);
							$('#address1').val(data.success.address1);
							$('#address2').val(data.success.address2);
							$('#country ').val(data.success.country);
							$('#state ').val(data.success.state);
							
							$('#pincode').val(data.success.pincode);
							$('select[name="bill"]').val(bill_id).attr("selected",true);
						
					 
					}
					});
				
				});
			
			$('#cod').click(function(){
			
				
			








				$('#submit').show();
			$('#submit').removeClass('btn btn-info btn-lg');
			
			$('#submit').addClass('btn btn-danger btn-lg').html("Cash on Delivery");
			$('#submit').attr('formaction',"{{ url('cod') }}");
			});
			
			$('#paypal').click(function(){
					$('#submit').show();
			$('#submit').removeClass('btn btn-danger btn-lg');
			
			$('#submit').addClass('btn btn-info btn-lg').html("Paypal Payment");
			$('#submit').attr('formaction',"{{ route('addmoney.paypal') }}");
			
			});
			$('#submit').hide();
			
			
			
			
			
					$('input[type="checkbox"]').click(function(){
						if($(this).is(":checked")){
						  $("#address").removeAttr("style");
						   $("#address").show();
						  
						}
						else if($(this).is(":not(:checked)")){
				 $("#address").hide();
						}
					});

		

					$('#submit').click(function(e){


						var fullname=$('#fullname').val();
			
				
						var address1=$('#address1').val();
						var address2=$('#address2').val();
						var country=$('#country ').val();
						var state=$('#state ').val();
						
						var pincode=$('#pincode').val();
						var ship_fullname=$('#ship_fullname').val();
						var ship_address1=$('#ship_address1').val();
						var ship_address2=$('#ship_address2').val();
						var ship_country=$('#ship_country ').val();
						var ship_state=$('#ship_state ').val();
						
						var ship_pincode=$('#ship_pincode').val();
		
							if(fullname && address1 && address2 && country && state
								&& 
								ship_fullname && ship_address2 && ship_country && ship_country && ship_state && ship_pincode
							)
							{
								$('#form').submit();
							}
							else
							{
								alert('please Fill Billing Addresses And Shipping Addresses Field');
								e.preventDefault();
							}
					});

});



</script>
    @endpush