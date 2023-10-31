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
            <label>Email: </label><br>
            <input type="email" required name="admin_email" placeholder="Email..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%" value="{{$admin->admin_email}}"><br>
            <label>Name: </label><br>
            <input type="text" required name="admin_name" placeholder="Name..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%" value="{{$admin->admin_name}}"><br>
            <label>Password: </label><br>
            <input type="password" required name="admin_password" placeholder="Password..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%" value="{{$admin->admin_password}}"><br>
            <button class="btn btn-primary">Update</button>
        </fieldset>
    </form>
@endsection
