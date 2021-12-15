<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EditEmployee</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">

            <div class="card">
                <div class="card-header">
                    Edit Employee
                </div>
            </div>
        <form action="{{route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input name="name" type="text" class="form-control" placeholder="enter name" value="{{$employee->name}}">

            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" class="form-control" placeholder="enter email"value="{{$employee->email}}">
            </div>
            <div class="form-group">
                <label for="">Post</label>
                <input name="post"type="text" class="form-control" placeholder="enter post" value="{{$employee->post}}">
            </div>
            <div class="form-group">
                <div class="custom-file">


                    <input type="file" name="image" src="" value="{{$employee->image}}">

                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    const inputElement = document.querySelector('input[type="file"]');
    const pond = FilePond.create( inputElement );
    </script>
</body>
</html>
