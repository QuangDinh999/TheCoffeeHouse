@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Customers</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <fieldset>
            <legend>ADD NEW</legend>
            <label>Name: </label><br>
            <input type="text" name="cus_name" placeholder="Name..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Email: </label><br>
            <input type="email" name="cus_email" placeholder="Email..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Password: </label><br>
            <input type="password" name="cus_password" placeholder="Password..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <label>Phone: </label><br>
            <input type="text" name="phone" placeholder="Phone..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <button class="btn btn-primary">Add New</button>
        </fieldset>
    </form>
@endsection
