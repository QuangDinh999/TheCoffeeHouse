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
            <label>Drink: </label><br>
            <select name="drink_id" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 14%">
                @foreach($drinks as $drink)
                    <option
                        @if($drinksizes->drink_id == $drink->id)
                            {{'selected'}}
                        @endif
                        value="{{$drink->id}}">{{$drink->drink_name}}</option>
                @endforeach
            </select><br>
            <label>Price: </label><br>
            <input type="text" required name="price_each_size" placeholder="Price..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%" value="{{$drinksizes->price_each_size}}"><br>
            <label>Size: </label><br>
            <select name="size_id" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 14%">
                @foreach($sizes as $size)
                    <option
                        @if($drinksizes->size_id == $drink->id)
                            {{'selected'}}
                        @endif
                        value="{{$size->id}}">{{$size->size}}</option>
                @endforeach
            </select><br>

            <button class="btn btn-primary">Add New</button>
        </fieldset>
    </form>
@endsection
