<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

    <section style="padding-top: 60px">
        <div class="container">

            <div class="row">
                <div class="col-md-12 offset-md-12">
                    <div class="card">
                        <div class="card-header">
                            Import
                        </div>
                        <div class="card-body">
                            @if (count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all(); as $erro)
                                    <li>{{$erro}}</li>
                                @endforeach
                            </div>

                            @endif
                            @if (Session::get('successimport'))
                            <div class="alert alert-danger">
                                {{Session::get('successimport')}}
                            </div>
                            @endif
                            @if (session()->has('failures'))
                                <table class="table table-danger">
                                    <tr>
                                        <th>Row</th>
                                        <th>Attribute</th>
                                        <th>Errors</th>
                                        <th>Value</th>
                                    </tr>
                                    @foreach (session()->get('failures') as $validation)
                                    <tr>
                                    <td><li>{{$validation->row()}}</li></td>
                                    <td><li>{{$validation->attribute()}}</li></td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$validation->values()[$validation->attribute()]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            @endif
                            <form  method="POST" enctype="multipart/form-data" action="{{route('student.import')}}">
                               @csrf
                                <div class="form-group">
                                    <input type="file" name="file" id="" class="form-control">

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
