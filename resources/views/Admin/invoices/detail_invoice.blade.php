@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Hoá Đơn Chi Tiết</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('invoice.index')}}" style="text-decoration: none; color: white"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
{{--                        <th>ID</th>--}}
                        <th>ID Hóa Đơn</th>
                        <th>Tên</th>
                        <th>size</th>
                        <th>Số Lượng</th>
                        <th>Giá Từng Sản Phẩm</th>
                        <th>Tổng Giá</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detail_invoice as $detail)
                        <tr>
{{--                            <td>{{$detail->detailed_invoice.id}}</td>--}}
                            <td>{{$detail->invoice_id}}</td>
                            <td>{{$detail->drink_name}}</td>
                            <td>{{$detail->size}}</td>
                            <td>{{$detail->quantity}}</td>
                            <td>{{number_format($detail->price_each_size)}} VNĐ</td>
                            <td>{{number_format($detail->price)}} VNĐ</td>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
