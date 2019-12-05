<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>+9763362750</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> rahul.sonawane@neosofttech.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i  class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/home/logo.png ') }}" alt="" /></a>
                        </div>
                 
                    </div>
                    <div class="col-sm-8">
                      


  <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
              
                                @if(Auth::guest())
                                
                                <li><a href="{{ url('contact') }}"><i class="fa fa-star"></i> Contact Us</a></li>  
                                <li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ route('frontend.register.create') }}"><i class="fa fa-lock"></i> Register</a></li>
                          
                          
                          
                                   @if(Session::has('cart') )
                            <li><a href="{{ url('shopping/cart') }}"><i class="fa fa-shopping-cart"></i> Cart  
                         
                             @if(Session::get('cart')->totalQty > 0)
                                <span class="badge"> 
                                {{ Session::get('cart')->totalQty }}        
                                </span>
                                @else
                                <span class="badge" style="display:none"> 
                                        {{ Session::get('cart')->totalQty=0 }}

                                </span>
                            @endif 
                            </a>
                            
                          
                            
                            </li> 
                                         
                            @endif  
                            @else
                          
                                   
                                  
                             
                           
                                  
                                         
                            <li class="dropdown"><a href="#"><i class="fa fa-user"></i>Account</a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('address') }}">Address Manage</a></li><br>
                                    <li><a href="{{ url('profile') }}">Profile</a></li><br>
                                    <li><a href="{{ url('order') }}">Orders</a></li><br>
                                      <li><a href="{{ route('order.track') }}">Order Track</a></li><br>
                                        <li><a href="{{ route('profile.password') }}">Change Password</a></li>
                                </ul>
                            </li>
                                                  

                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li> 
                            <li><a href="{{ url('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                             

 @if(Session::has('cart') )
                            <li><a href="{{ url('shopping/cart') }}"><i class="fa fa-shopping-cart"></i> Cart  
                         
                             @if(Session::get('cart')->totalQty > 0)
                                <span class="badge"> 
                                {{ Session::get('cart')->totalQty }}        
                                </span>
                                @else
                                <span class="badge" style="display:none"> 
                                        {{ Session::get('cart')->totalQty=0 }}

                                </span>
                            @endif 
                            </a>
                            
                          
                            
                            </li> 
                                         
                            @endif  
                             
                                 <li class="dropdown"><a href="#"><i class="fa fa-user"></i> <strong class="text-danger">{{ ucfirst(auth()->user()->first_name)." ".ucfirst(auth()->user()->last_name)}}</strong></a>
                                    <ul role="menu" class="sub-menu">
                                        <li>     <a href="{{ route('frontend.logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <strong><span >Logout</span></strong>
                                            </a>
    
                                            <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form></li>
                                      

                                        
                                        
                                    </ul>
                                </li>
                                         
                                         
                                       
                              
                             
                                
                            @endif


                               
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                  
                                        {{--  <li><a href="product-details.html">Product Details</a></li>  --}}
                                        <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ url('shopping/cart') }}">Cart</a></li>

                                        
                                   
                                    </ul>
                                </li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
             <form method="GET" action="{{ url('/') }}" accept-charset="UTF-8" class="form-inline pull-right px-2 " role="search">
                <div class="input-group" style="margin-right:10px;">
                  <li  style="list-style-type:none;">  <input type="text" id="search"  name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </li>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
  