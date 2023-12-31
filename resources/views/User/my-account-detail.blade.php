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
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css_web/other.css')}}" rel="stylesheet">
</head>

<body>
@include('user.header.header')


<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none; color: #6c757d" href="{{route('CoffeeHouse')}}">Home</a></li>
            <li class="breadcrumb-item"><a style="text-decoration: none; color: #6c757d" href="{{route('my-account')}}">My Account</a></li>
            <li class="breadcrumb-item active">Chi Tiết Đơn Hàng</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- My Account Start -->
<div class="my-account">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#orders-tab"
                       role="tab">Orders</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab">Payment
                        Method</a>
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab">address</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab">Account
                        Details</a>
                    <a class="nav-link" href="index.html">Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Sản Phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số Lượng</th>
                                    <th>Gía mỗi loại</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_history as $history)
                                    <tr>
                                        <td style="color: black">{{$history->id}}</td>
                                        <td style="color: black">{{$history->drink_name}}</td>
                                        <td style="color: black"><img width="50px" height="50px" src="{{asset('storage/Drink/'. $history->image)}}" alt="Image"></td>
                                        <td style="color: black">{{$history->quantity}}</td>
                                        <td style="color: black">{{number_format($history->price_each_size)}} VNĐ</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in
                            faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu
                            rhoncus scelerisque.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Address</h5>
                                <p>123 Payment Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button>Edit Address</button>
                            </div>
                            <div class="col-md-6">
                                <h5>Shipping Address</h5>
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button>Edit Address</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Mobile">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Address">
                            </div>
                            <div class="col-md-12">
                                <button>Update Account</button>
                                <br><br>
                            </div>
                        </div>
                        <h4>Password change</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" placeholder="Current Password">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="New Password">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12">
                                <button>Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->


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
