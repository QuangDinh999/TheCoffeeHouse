<!-- Top Header Start -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{route('CoffeeHouse')}}">
                        <img src="{{asset('storage/logo/coffee.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <form action="{{route('search')}}">
                        <input type="text" placeholder="Search" name="search_word" value="">
                        <button style="height: 40px; right: 13px; padding: 0px 15px; top: 0px"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none; color: #CDA566">
                            @if(session()->has('customer'))
                                {{session('customer.email')}}
                            @else My Account
                            @endif
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{route('my-account')}}" class="dropdown-item">My Account</a>
                            @if(session()->has('customer'))
                                <a href="{{route('customer.logout')}}" class="dropdown-item">Logout</a>
                            @else
                                <a href="{{route('customer.login')}}" class="dropdown-item">Login</a>
                            @endif
                        </div>
                    </div>
                    <div class="cart">
                        <a href="{{route('cart')}}"><i class="fa fa-cart-plus"></i></a>
                            @if(session()->has('cart'))
                                <span>({{count(session('cart'))}})</span>
                            @else
                                <span>(0)</span>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Header End -->


<!-- Header Start -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="{{route('CoffeeHouse')}}" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a href="{{route('category', $category->id)}}" class="dropdown-item">{{$category->category_name}}</a>
                            @endforeach

                        </div>
                    </div>

                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Header End -->
