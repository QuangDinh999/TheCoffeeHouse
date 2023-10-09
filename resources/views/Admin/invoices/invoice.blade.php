@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">User</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('customer.create')}}" style="text-decoration: none; color: white">Add Invoice</a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Người Đặt Hàng</th>
                        <th>Người Nhận</th>
                        <th>Địa Chỉ</th>
                        <th>SĐT</th>
                        <th>Ngày Đăt Hàng</th>
                        <th>Ghi Chú</th>
                        <th>Trạng Thái</th>
                        <th>Kiểu Đơn Hàng</th>
                        <th>Admin</th>
                        <th>PTTT</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->id}}</td>
                            <td>{{$invoice->customer->cus_name}}</td>
                            <td>{{$invoice->customer_name}}</td>
                            <td>{{$invoice->address}}</td>
                            <td>{{$invoice->phone}}</td>
                            <td>{{$invoice->invoice_date}}</td>
                            <td>
                                @if($invoice->invoice_note == null)
                                    {{'Không Có'}}
                                @else
                                    {{$invoice->invoice_note}}
                                @endif
                            </td>
                            <td>
                                @if($invoice->invoice_status == 0)
                                    {{'Đang Chờ'}}
                                @else
                                    {{'Đã Duyệt'}}
                                @endif
                            </td>
                            <td>
                                @if($invoice->invoice_type == 0)
                                    {{'Online'}}
                                @else
                                    {{'Tại cửa Hàng'}}
                                @endif
                            </td>
                            <td>{{$invoice->admin_id}}</td>
                            <td>{{$invoice->payment->payment_name}}</td>
                            <td>
                                <form action="{{route('invoice.detail', $invoice->id)}}">
                                    <button class="btn btn-warning"><i class="fa fa-info" aria-hidden="true"></i></button>
                                </form>
                            </td>
{{--                            <td>--}}
{{--                                <form method="post" action="{{route('invoice.destroy', $invoice)}}">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
