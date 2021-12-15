<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

</head>
<body>
<section style="padding-top:60px;">
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Edit Post


                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('update.post')}}">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" value="{{$posts->id}}" >

                                <label for="title">Post Title</label>
                                <input type="text" name="title" class="form-control" value="{{$posts->title}}" >
                            </div>
                            <div class="form-group">
                                <label for="body">Post body</label>
                                <textarea name="body" id="" rows="6" class="form-control"  >{{$posts->body}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success "> Edit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
