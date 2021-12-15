@extends('layouts.dashboard')

@section('content')

<div class="row mb-2 align-items-center" style="height: 50vh;">

    <div class=" col-8 text-center ml-auto mr-auto">
        <h4>Adding Student </h4>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all(); as $erro)
                <li>{{$erro}}</li>
            @endforeach
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

    <form action="{{route('student.import')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-file">

            <input type="file" class="form-file-input" id="customFile" name="studentfile" >
            <label class="form-file-label" for="customFile" >
                        <span class="form-file-text">Choose file...</span>
                        <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                    </label>


        </div>
        <div class="ml-auto text-right">
           <input type="submit" class="btn btn-primary mt-4 ">
        </div>
    </form>

    </div>
</div>

@endsection
