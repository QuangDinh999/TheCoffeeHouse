@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Sizes</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <fieldset>
            <legend>ADD NEW</legend>
            <label>Payment Method: </label><br>
            <input type="text" required name="payment_name" placeholder="payment..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <button class="btn btn-primary">Add New</button>
        </fieldset>
    </form>
@endsection
