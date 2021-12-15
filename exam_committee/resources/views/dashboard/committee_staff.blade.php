@extends('layouts.dashboard')

@section('content')

<div class="main-content container-fluid" style="transform: translateY(-35px)">
  

                <div class="row justify-content-center mb-5">
                    <div class="col-4 ">
                    <h3 class="text-dark pl-5">{{ $academic_year->academic_year }}  </h3>
                
                    <h6 class=" text-dark"> {{ ucfirst($academic_year->semester) }} Semester And {{ ucfirst($academic_year->trail) }} Trail</h6>
                    </div>

                </div>
                    
<div class="card pr-5 mt-2">



    <div class="table-responsive mt-3">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Department</th>

                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $item)

                    <tr>
                        <td class="text-bold-500">{{ $item->staff_name }}</td>
                        <td>{{ $item->staff_email }}</td>
                        <td class="text-bold-500">{{ $item->staff_phone }}</td>
                        <td>{{ $item->dp_name }}</td>
                        <td>{{ $item->role }}</td>

                    </tr>
               @endforeach







            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
@endsection
