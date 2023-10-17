@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">ADD DRINK IN INVOICE</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('invoice.create')}}" style="text-decoration: none; color: white"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </button>
            <button class="btn btn-primary">
                <a href="{{route('invoice.delete_detail')}}" style="text-decoration: none; color: white">Xóa Hóa Đơn chi tiết</a>
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
                        <th>Chi Tiết</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($drinks as $drink)
                        <tr>
                            <td>{{$drink->id}}</td>
                            <td>{{$drink->drink_name}}</td>
                            <td><img src="{{asset('storage/Drink/'.$drink->image)}}" width="150px" height="150px"></td>
                            <td>{{$drink->category->category_name}}</td>
                            <td>
                                <form action="{{route('invoice.drink_detail', $drink->id)}}">
                                    <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
