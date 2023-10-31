@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
    </div>
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        Name: <input type="text" required name="category_name" style="border:solid #337ab7 2px">
        <button>Add New</button>
    </form>
@endsection
