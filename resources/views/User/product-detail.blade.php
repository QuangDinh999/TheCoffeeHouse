<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>E Shop - Bootstrap Ecommerce Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap Ecommerce Template" name="keywords">
    <meta content="Bootstrap Ecommerce Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css_web/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('css_web/lib/slick/slick-theme.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css_web/style.css')}}" rel="stylesheet">
</head>

<body>
@include('user.header.header')


<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">product details</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach($drinks as $drink)
                    <div class="row align-items-center product-detail-top" style="margin-bottom: 250px">
                        <div class="col-md-5">
                            <div class="product-slider-single">
                                <img src="{{asset('storage/Drink/'. $drink->image)}}" width="180px" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title"><h2>{{$drink->drink_name}}</h2></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                @foreach($price as $pricedrink)
                                    <div class="price">{{number_format($pricedrink->price_each_size)}} VNĐ</div>
                                @endforeach
                                <div class="details">
                                    <p>{{$drink->description}}</p>
                                </div>
                                <form action="{{route('add_cart_product_detail')}}">
                                    <div class="action" style="margin-bottom: 12px; ">
                                        <h4 style="color: black; display: inline-block">Đặt Hàng</h4><button style="background:#CDA566; color: #FFFFFF; border: solid 2px #CDA566; padding: 6px">Đặt Giao Tận Nơi <i class="fa fa-cart-plus"></i></button>
                                    </div>
                                    <div class="option-size">
                                        <h4>Chọn Size:</h4>
                                        <div class="opt">
                                            <select name="id" style="width: 180px">
                                                @foreach($drinksizes as $drinksize)
                                                    <option value="{{$drinksize->id}}">{{$drinksize->size}} - {{number_format($drinksize->price_each_size)}} VNĐ</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Product Detail End -->


@include('User.footer.footer')


<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('css_web/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('css_web/lib/slick/slick.min.js')}}"></script>


<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
