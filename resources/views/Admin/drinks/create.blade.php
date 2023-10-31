@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Drinks</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>ADD NEW</legend>
            <div class="col-lg-6">
                <label>Drink Name: </label><br>
                <input type="text" required name="drink_name" placeholder="Name..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>

                <label>Description: </label><br>
                <input type="text" required name="description" placeholder="description..." style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 40%"><br>
                <label>Category: </label><br>

                <select name="category_id" style="border:solid #337ab7 2px; margin-bottom: 15px; ; padding: 5px; width: 14%">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select><br>
            </div>

            <div class="col-lg-6">
                <label>Image: </label><br>
                <input type="file" required name="image" ><br>
                <img src="" style="width: 300px; height: 300px; border: #286090 2px solid">
            </div>

            <div class="row">
                <button class="btn btn-primary">Add New</button>
            </div>
        </fieldset>
    </form>
@endsection
