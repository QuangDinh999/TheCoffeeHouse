@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Customers</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        @method('PUT')
        <fieldset>
            <legend>UPDATE</legend>
            <label>Name: </label><br>
            <input type="text" required name="cus_name" placeholder="Name..." value="{{$customer->cus_name}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Email: </label><br>
            <input type="email" required name="cus_email" placeholder="Email..." value="{{$customer->cus_email}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Password: </label><br>
            <input type="password" required name="cus_password" placeholder="Password..." value="{{$customer->cus_password}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Phone: </label><br>
            <input type="text" required name="phone" placeholder="Phone..." value="{{$customer->phone}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Address: </label><br>
            <input type="text" required name="address" placeholder="Address..." value="{{$customer->address}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <button class="btn btn-primary">Update</button>
        </fieldset>
    </form>
@endsection
