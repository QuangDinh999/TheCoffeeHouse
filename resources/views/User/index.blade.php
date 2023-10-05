<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Shop - Bootstrap Ecommerce Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('storage/logo/coffee.png')}}">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('css_web/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('css_web/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link rel="stylesheet" href="css_4/style.css">
        <link href="{{asset('css_web/style.css')}}" rel="stylesheet">
        <link href="{{asset('css_web/other.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>

    <body>
        @include('user.header.header')


        <!-- Main Slider Start -->
        <div class="home-slider">
            <div class="main-slider">
                <div class="main-slider-item"><img src="{{asset('storage/banner/banner_3.jpg')}}" alt="Slider Image" /></div>
                <div class="main-slider-item"><img src="{{asset('storage/banner/banner_1.jpg')}}" alt="Slider Image" /></div>
                <div class="main-slider-item"><img src="{{asset('storage/banner/banner_2.jpg')}}" alt="Slider Image" /></div>
<!--                <div class="main-slider-item"><img src="#" alt="Slider Image" /></div>-->
            </div>
        </div>
        <!-- Main Slider End -->







        <!-- Featured Product Start -->
        <div class="featured-product">
            <div class="container">
                <div class="section-header">
                    <h3>Featured Product</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                    </p>
                </div>

                <div class="row align-items-center product-slider">
                    @foreach($drinks as $drink)
                        <div class="col-lg-3" style="margin-bottom: 20px">
                            <div class="product-item">
                                <div class="product-image">
                                    <a href="{{route('product-detail', $drink->drink_id)}}">
                                        <img src="{{asset('storage/Drink/'. $drink->image)}}" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="{{route('add_cart', $drink->id)}}"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="title"><a href="{{route('product-detail', $drink->drink_id)}}" style="text-decoration: none">{{$drink->drink_name}}</a></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">{{number_format($drink->price_each_size)}} VNĐ</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Featured Product End -->


        <div style="text-align: center; margin-bottom: 100px">
            <a href="{{route('drink-list')}}" style="background:#CDA566; padding: 12px; color: #ffffff; border:#b78637 2px solid; text-decoration: none ">Xem Thêm</a>
        </div>

        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('storage/banner/banner_1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/banner/banner_2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/banner/banner_3.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Recent Product Start -->
        <div class="recent-product">
            <div class="container">
                <div class="section-header">
                    <h3>Recent Product</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                    </p>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/bacsiu.webp" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">Phasellus Gravida</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$22 <span>$25</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/caramel_Macchiato.webp" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">Phasellus Gravida</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$22 <span>$25</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/Americano_ICe.webp" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">Phasellus Gravida</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$22 <span>$25</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/Latte_Ice.webp" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">Phasellus Gravida</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$22 <span>$25</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/HongTraSTC.webp" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">Phasellus Gravida</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$22 <span>$25</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->


<!--        &lt;!&ndash; Brand Start &ndash;&gt;-->
<!--        <div class="brand">-->
<!--            <div class="container">-->
<!--                <div class="section-header">-->
<!--                    <h3>Our Brands</h3>-->
<!--                    <p>-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="brand-slider">-->
<!--                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>-->
<!--                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>-->
<!--                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>-->
<!--                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>-->
<!--                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>-->
<!--                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; Brand End &ndash;&gt;-->


       @include('User.footer.footer')


<!--        &lt;!&ndash; Footer Bottom Start &ndash;&gt;-->
<!--        <div class="footer-bottom">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6 copyright">-->
<!--                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>-->
<!--                    </div>-->

<!--                    <div class="col-md-6 template-by">-->
<!--                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; Footer Bottom End &ndash;&gt;-->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('css_web/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('css_web/lib/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>



        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
