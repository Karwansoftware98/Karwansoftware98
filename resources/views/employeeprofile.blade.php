<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

@if (Session::get('employee'))
<div class="alert alert-success">
    {{Session::get('employee')}}
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>post</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

        @foreach ($employee as $item)
        <tr>
        <td>{{$item->id}} </td>
        <td>{{$item->name}} </td>
        <td>{{$item->email}} </td>
        <td> {{$item->post}}</td>
        <td><img src="{{asset('uploads/')}}/{{$item->image}}" alt="" style="max-width: 60px"> </td>
        <td>

            <a href="{{route('employee.edit',$item->id)}}" class="btn btn-success" >Edit</a>
            <a href="{{route('delete',$item->id)}}" class="btn btn-danger"
                onclick="return confirm('Are you sure?')"
                >Delete</a>

        </td>
    </tr>
        @endforeach

</table>
</body>
</html>
@if (Session::has('success'))
<script>
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
</script>

@endif

