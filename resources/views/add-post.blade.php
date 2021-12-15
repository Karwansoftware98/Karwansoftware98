<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<section style="padding-top:60px;">
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Add Post
                    @if (Session::get('post_created'))

                        <div class="alert alert-success">
                            {{Session::get('post_created')}}
                        </div>

                    @endif

                </div>
                <div class="card-body">
                    <form action="{{route('post.create')}}" method="POST" >
                        @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="body">Post body</label>
                                <textarea name="body" id="" rows="6" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success "> Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
