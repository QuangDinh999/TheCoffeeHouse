@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">Admins</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('admin.create')}}" style="text-decoration: none; color: white">Add admin</a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->admin_email}}</td>
                            <td>{{$admin->admin_name}}</td>
                            <td>{{$admin->admin_password}}</td>

                            <td>
                                <form action="{{route('admin.edit', $admin)}}">
                                    <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.destroy', $admin)}}">
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
