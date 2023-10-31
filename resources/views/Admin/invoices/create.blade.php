@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Invoices</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="{{route('invoice.add_detail_invoice')}}">
        @csrf
        <fieldset>
            <legend>ADD NEW</legend>
               <div class="col-md-6">
                   <label>Date: </label><br>
                   <input type="date" required name="date" placeholder="Date..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 85%"><br>
                   <label>Tên Khách Hàng: </label><br>
                   <input type="text" required name="customer" placeholder="Tên Khách..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 85%"><br>
                   <label>Địa Chỉ: </label><br>
                   <input type="text" required name="address" value="70 Phố Huế" placeholder="Địa Chỉ..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 85%"><br>
                   <label>PTTT: </label><br>
                   <select name="payment" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 45%">
                       @foreach($payments as $payment)
                           <option value="{{$payment->id}}">{{$payment->payment_name}}</option>
                       @endforeach
                   </select><br>
                   <button class="btn btn-primary">Add New</button>
                   <a href="{{route('invoice.create_detail')}}" style="padding: 9px; background-color: #0a53be; text-decoration: none; color: #FFFFFF; border-radius: 4px; margin-left: 10px">Thêm sản phẩm vào hóa đơn</a>
               </div>

                <div class="col-md-6">
                    <table class="table table-striped table-bordered table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <td>Sản Phẩm</td>
                                <td>Ảnh sản phẩm </td>
                                <td>size</td>
                                <td>Số Lượng</td>
                                <td>Thanh Toán</td>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($drinks as $drink)
                                <tr>
                                    <td>{{$drink['name']}}</td>
                                    <td><img width="50px" height="50px" src="{{asset('storage/Drink/'. $drink['image'])}}"></td>
                                    <td>{{$drink['size']}}</td>
                                    <td>{{$drink['quantity']}}</td>
                                    <td>{{number_format($drink['price_subtotal'])}} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </fieldset>
    </form>
@endsection
