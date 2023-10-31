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
            <label>size: </label><br>
            <input type="text" required name="size" placeholder="size..." value="{{$size->size}}" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
            <button class="btn btn-primary">Update</button>
        </fieldset>
    </form>
@endsection
