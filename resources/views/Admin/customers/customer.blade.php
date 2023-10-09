@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">User</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('customer.create')}}" style="text-decoration: none; color: white">Add User</a>
            </button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>address</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->cus_name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>
                                    <form action="{{route('customer.edit', $customer)}}">
                                        <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('customer.destroy', $customer)}}">
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
