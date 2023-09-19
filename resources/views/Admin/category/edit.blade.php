@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        @method('PUT')
        Name: <input type="text" name="category_name" style="border:solid #337ab7 2px" value="{{$category->category_name}}">
        <button>Update</button>
    </form>
@endsection
