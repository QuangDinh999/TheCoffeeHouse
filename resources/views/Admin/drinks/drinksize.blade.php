@extends('Admin.tables')
@section('heading')
    <div class="col-lg-12">
        <h1 class="page-header">DrinkSize</h1>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary">
                <a href="{{route('drink.index')}}" style="text-decoration: none; color: white">Back</a>
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
                        <th>Drink size</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($drinksizes as $drinksize)
                        <tr>
                            <td>{{$drinksize->id}}</td>
                            <td>{{$drinksize->drink->drink_name}}</td>
                            <td>{{$drinksize->size->size}}</td>
                            <td>{{number_format($drinksize->price_each_size)}} VNĐ</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.category-responsive -->
        </div>
    </div>
@endsection
