<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">

        <form action="{{route('addImage')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input name="name" type="text" class="form-control" placeholder="enter name">

            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" class="form-control" placeholder="enter email">
            </div>
            <div class="form-group">
                <label for="">Post</label>
                <input name="post"type="text" class="form-control" placeholder="enter post">
            </div>
            <div class="form-group">
                <div class="custom-file">

                        @if (Session::get('emptyimage'))
                            <div class="alert alert-danger">
                                {{Session::get('emptyimage')}}
                            </div>
                        @endif
                     
                    <input type="file" name="image" >
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Insert Data</button>
        </form>
    </div>
</div>
</body>
</html>
