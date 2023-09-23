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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none; color: #CDA566">My Account</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">My Account</a>
                            <a href="{{route('customer.login')}}" class="dropdown-item">Login</a>
                        </div>
                    </div>
                    <div class="cart">
                        <i class="fa fa-cart-plus"></i>
                        <span>(0)</span>
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
            <a href="#" class="navbar-brand">MENU</a>
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

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a href="product-list.html" class="dropdown-item">Product</a>
                            <a href="product-detail.html" class="dropdown-item">Product Detail</a>
                            <a href="cart.html" class="dropdown-item">Cart</a>
                            <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                            <a href="checkout.html" class="dropdown-item">Checkout</a>
                            <a href="login.html" class="dropdown-item">Login & Register</a>
                            <a href="my-account.html" class="dropdown-item">My Account</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Header End -->
