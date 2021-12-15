@extends('layouts.dashboard')

@section('content')

    <div class="container mt-5">
    <div class="row">
    <div class="col-xs-6 col-md-4 ">

    <div class="selects-container">
    <p>Departments:</p>
    <select name="quality" class="form-select">
    <option value="all">All</option>
    <option value="720p">Software Engineering</option>
    <option value="1080p">Architecture Engineering</option>
    <option value="2160p">Civil Engineering</option>
    <option value="3D">Petroleum Engineering</option>
    <option value="3D">Chemical Engineering</option>
    <option value="3D">Geotechnical Engineering</option>
    <option value="3D">Manufacturing Engineering</option>

    </select>
    </div>
    </div>




<div class="col-xs-4 col-md-2">

    <div class="selects-container">
    <p>Teacher:</p>
    <select name="quality" class="form-select">
    <option value="all">All</option>
    <option value="720p">Saman</option>
    <option value="1080p">Haval</option>

    </select>
    </div>

</div>
<div class="col-xs-4 col-md-2">

    <div class="selects-container">
    <p>Hall:</p>
    <select name="quality" class="form-select">
    <option value="all">All</option>
    <option value="720p">F2L2</option>
    <option value="1080p">F2L3</option>

    </select>
    </div>

</div>

    </div>
    </div>



</div>

@endsection
