@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Invoice</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('invoice.create')}}" style="text-decoration: none; color: white">Add Invoice</a>
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
                        <th>PTTT</th>
                        <th>Info</th>
                        <th>Duyệt</th>
                        <th>Đã Giao</th>

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
                                   <span class="badge" style="background-color: #ffc107; color: black">{{'Đang Chờ'}}</span>
                                @elseif($invoice->invoice_status == 1)
                                    <span class="badge" style="background-color: #198754">{{'Đã Duyệt'}}</span>
                                @elseif($invoice->invoice_status == 2)
                                    <span class="badge" style="background-color: #1295bf">{{'Đã Giao Hàng'}}</span>
                                @else
                                    <span class="badge" style="background-color: #9b202f">{{'Đã Hủy Đơn Hàng'}}</span>
                                @endif
                            </td>
                            <td>
                                @if($invoice->invoice_type == 0)
                                    {{'Online'}}
                                @else
                                    {{'Tại cửa Hàng'}}
                                @endif
                            </td>
{{--                            <td>{{$invoice->admin_id}}</td>--}}
                            <td>{{$invoice->payment->payment_name}}</td>
                            <td>
                                <form action="{{route('invoice.detail', $invoice->id)}}" style="text-align: center">
                                    <button class="btn btn-warning" style="padding: 6px 18px"><i class="fa fa-info" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                    <form method="post" action="{{route('invoice.update', ['id' => $invoice->id, 'status' => $invoice->invoice_status])}}" style="text-align: center">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('invoice.shipping', ['id' => $invoice->id, 'status' => $invoice->invoice_status])}}" style="text-align: center">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-info"><i class="fa fa-truck" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
