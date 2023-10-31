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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css" rel="stylesheet">
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


<!-- Cart Start -->
<div class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <form action="{{route('update_cart')}}">
                        <div class="cart-summary">
                            <div class="cart-btn">
                                <div class="row " style="text-align: center; margin-bottom: 16px">
                                    <div class="col-md-4">
                                        <button class="update_cart" style="width: 80%; background: #cda566; color: #FFFFFF">Update Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody class="align-middle">
                            @foreach($drinks as $drink => $value)

                                <tr>
                                    <td>{{$value['drink_name']}}</td>
                                    <td><img src="{{asset('storage/Drink/'.$value['image'])}}" alt="Image"></td>
                                    <td>{{number_format($value['price'])}} VNĐ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="number" name="quantity[{{$drink}}]" value={{$value['quantity']}}>
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>{{$value['size']}}</td>
                                    <td>
                                        <a href="{{route('delete_one', $drink)}}" onclick="Confirmation(event)" style="padding: 8px 12px; background: #cda566; color: #FFFFFF"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="cart-summary">

                </div>
            </div>
            <div class="col-md-8" style="margin-top: 20px">
                <div class="cart-summary">
                    <div class="cart-content">
                        <h3>Cart Summary</h3>
                        @foreach($drinks as $drink => $value)
                            <p>Sub Total<span>{{number_format($value['price_subtotal'])}} VNĐ</span></p>
                        @endforeach
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
                    <div class="cart-btn">
                        <a  href="{{route('delete_all')}}" onclick="ConfirmationAll(event)" style="padding: 12px 144px; border:solid #cda566 2px ">Delete Cart</a>
                            <button style="background: #cda566; color: #FFFFFF"><a href="{{route('checkout')}}" style="text-decoration: none; color: #FFFFFF">Checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


@include('User.footer.footer')


<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<script>
    document.querySelector('.update_cart').addEventListener('click', function (){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Bạn Đã Cập Nhật Giỏ Hàng Thành Công !',
            showConfirmButton: false,
            timer: 1500
        })
    });


    function ConfirmationAll(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Bạn có muốn Xóa Tất cả sản phẩm ra Khỏi Giỏ Hàng ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#cda566',
            cancelButtonColor: '#85570d',
            confirmButtonText: 'Xóa Tất Cả '
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        })
    }

    function Confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Bạn có muốn Xóa sản phẩm này ra Khỏi Giỏ Hàng ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#cda566',
            cancelButtonColor: '#85570d',
            confirmButtonText: 'Xóa Sản Phẩm '
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        })
    }
</script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.js"></script>
<script src="{{asset('css_web/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('css_web/lib/slick/slick.min.js')}}"></script>


<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
