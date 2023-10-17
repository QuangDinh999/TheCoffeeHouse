@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Drinks</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('drink.create')}}" style="text-decoration: none; color: white">Add new Drink</a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Drink ID</th>
                        <th>Drink name</th>
                        <th>image</th>
                        <th>category</th>
                        <th>description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($drinks as $drink)
                        <tr>
                            <td>{{$drink->id}}</td>
                            <td>{{$drink->drink_name}}</td>
                            <td><img src="{{asset('storage/Drink/'.$drink->image)}}" width="150px" height="150px"></td>
                            <td>{{$drink->category->category_name}}</td>
                            <td>{{$drink->description}}</td>

                            <td>
                                <form action="{{route('drink.edit', $drink)}}">
                                    <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('drink.destroy', $drink)}}">
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
