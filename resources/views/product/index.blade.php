@extends('product.layout')

@section('content')
<br><br><br><br>
<div class="row">
    <div class="col-lg-12 ">
        <div class="pull-left">
            <h2>Laravel Product List</h2>
        </div>
        <div class="pull right">

            <a href="{{route('product.create')}}" class="btn btn-success">Create New Product</a>
        </div>

    </div>
    @if ($message =Session::get('success'))

    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="150px">Product Name</th>
            <th width="150px">Product code</th>
            <th width="200px">Details</th>
            <th width="100px">Product Logo</th>
            <th width="250px">Action</th>
        </tr>
        <tr>
            @foreach ($product as $item)


            <td>{{$item->product_name}} </td>
            <td>{{$item->product_code}} </td>
            <td> {{$item->details}}</td>
            <td> {{$item->logo}}</td>
            <td>
                <a href="" class="btn btn-info">Show</a>
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Delet</a>
            </td>
            @endforeach
        </tr>
    </table>
</div>
@endsection
