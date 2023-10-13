@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Invoices</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <fieldset>
            <legend>ADD NEW</legend>
                <label>Date: </label><br>
                <input type="date" name="date" placeholder="Date..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
                <label>Tên Khách Hàng: </label><br>
                <input type="text" name="customer" placeholder="Tên Khách..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
                <label>Địa Chỉ: </label><br>
                <input type="text" name="address" value="70 Phố Huế" placeholder="Địa Chỉ..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
                <label>PTTT: </label><br>
                <select name="payment" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 20%">
                   @foreach($payments as $payment)
                       <option value="{{$payment->id}}">{{$payment->payment_name}}</option>
                   @endforeach
                </select><br>
            <button class="btn btn-primary">Add New</button>
        </fieldset>
    </form>
@endsection
