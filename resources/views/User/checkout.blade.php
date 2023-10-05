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
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="checkout">
    <div class="container">
        <form action="{{route('order')}}">
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        @foreach($customers as $customer)
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" value="{{$customer->cus_name}}" name="cus_name" placeholder="First Name">
                                </div>

                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" value="{{$customer->phone}}" name="phone" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" value="{{$customer->address}}" name="address" placeholder="Address">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" value="" name="note" placeholder="Note">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="checkout-summary">
                        <h2>Cart Total</h2>
                        <div class="checkout-content">
                            <h3>Products</h3>
                            @foreach($drinks as $drink => $value)
                                <p>{{$value['drink_name']}} X {{$value['quantity']}}<span>{{number_format($value['price_subtotal'])}} VNĐ</span></p>
                            @endforeach
                            <p class="ship-cost">Shipping Cost<span>$1</span></p>
                            <h4>Grand Total
                                <span>
                                    @php
                                        if (empty(session('cart'))){

                                        }else{
                                            $total = 0;
                                            foreach ($drinks as $drink => $value){
                                                $final = $total += $value['price_total'];
                                            }
                                            echo number_format($final).' VNĐ';
                                        }
                                    @endphp
                                </span></h4>
                        </div>
                    </div>
                    <div class="checkout-payment">
                        <h2>Payment Methods</h2>
                        <div class="payment-methods">
                            @foreach($payments as $payment)
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="{{$payment->id}}" value="{{$payment->id}}" name="payment">
                                        <label class="custom-control-label" for="{{$payment->id}}">{{$payment->payment_name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="checkout-btn">
                            <button>Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout End -->


@include('User.footer.footer')


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
