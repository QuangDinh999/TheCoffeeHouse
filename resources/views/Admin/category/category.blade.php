@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('category.create')}}" style="text-decoration: none; color: white">Add Category</a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category name</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="odd gradeX">
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <form action="{{route('category.edit', $category)}}">
                                    <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('category.destroy', $category)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.category-responsive -->
        </div>
    </div>
@endsection
