
	 

 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush
@section('content')
	 
	 
	
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
			
    		<div class="row">  	
			
	    		<div class="col-sm-8">
				 @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong class="text-center">{{ $message }}</strong>
</div>
@endif
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none">
						</div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{route('contactus.store')}}">
				         
						 {{csrf_field()}}
						 
						    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
				                <input type="text" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type-message="Name is Invalid"  data-parsley-required-message="Name field is required" name="name" class="form-control"  placeholder="Name">
				           {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
						    </div>
							       

				            <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
				                <input type="email" data-parsley-trigger="keyup" data-parsley-required="true"   data-parsley-type-message="Email is Invalid" data-parsley-type="email"  data-parsley-required-message="Email field is required" name="email" class="form-control"  placeholder="Email">
				           {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
						    </div>
				            <div class="form-group col-md-12 {{ $errors->has('subject') ? 'has-error' : ''}}">
				                <input type="text" data-parsley-trigger="keyup" data-parsley-required="true"  data-parsley-required-message="Subject field is required" name="subject" class="form-control" placeholder="Subject">
				             {!! $errors->first('subject', '<strong class="text-danger">:message</strong>') !!}
							</div>
							 <div class="form-group col-md-12 ">
				                <input type="text" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type-message="Contact No. is Invalid"   data-parsley-minlength="10" data-parsley-maxlength="10"	data-parsley-type="number" data-parsley-required-message="Contact field is required" name="contact" class="form-control"  placeholder="Contact">
				             {!! $errors->first('contact', '<strong class="text-danger">:message</strong>') !!}
							</div>
				            <div class="form-group col-md-12 {{ $errors->has('message') ? 'has-error' : ''}}">
				                <textarea name="message" data-parsley-trigger="keyup" data-parsley-required="true"  data-parsley-required-message="Message field is required" id="message"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				             {!! $errors->first('message', '<strong class="text-danger">:message</strong>') !!}
							</div>                        
				            <div class="form-group col-md-12 ">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	@endsection
	@push('scripts') 

<script>
        $('#main-contact-form').parsley();
</script>

@endpush