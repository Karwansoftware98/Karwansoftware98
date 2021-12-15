@extends('layouts.dashboard')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="main-content container-fluid">

    <section class="section">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="soft-tab" data-toggle="tab" href="#soft" role="tab" aria-controls="soft" aria-selected="true">Software </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="arch-tab" data-toggle="tab" href="#arch" role="tab" aria-controls="arch" aria-selected="false">Architecture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="civil-tab" data-toggle="tab" href="#civil" role="tab" aria-controls="civil" aria-selected="false">Civil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="geo_tab" data-toggle="tab" href="#geo" role="tab" aria-controls="geo" aria-selected="false">Geotecnical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="manu_tab" data-toggle="tab" href="#manu" role="tab" aria-controls="manu" aria-selected="false">Manufacture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="oil_tab" data-toggle="tab" href="#oil" role="tab" aria-controls="oil" aria-selected="false">Petroluem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chem_tab" data-toggle="tab" href="#chem" role="tab" aria-controls="chem" aria-selected="false">chemichal</a>
            </li>
        </ul>
        <div class="d-flex justify-content-end">
            <button href="" class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal">Add Student</button>
        </div>



        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Adding student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                            <form class="form form-vertical" action="{{ route('store_student') }}" method="POST">
                            <div class="form-body">

                                    @csrf
                                <div class="row">
                                    <div class="col-12">



                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon"> Name</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="First Name" id="name" name="name">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Last Name</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Last Name" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                                <div class="form-control-icon">
                                                    <i data-feather="mail"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="mobile-id-icon">Mobile</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}



                                    {{--  <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Department</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input with icon left" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Department</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="password" id="password" name="password">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>

                                    </div>
                                </div>
                              </form>
                            </div>

                    </div>

                    <!-- Modal footer -->


                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="soft" role="tabpanel" aria-labelledby="soft-tab">
                <div class="row mt-3">





                    <div class="col-12 ">
                        <div class="card pr-5">




                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                 @foreach ($students as $student)
                                        @if ($student->department_id == 1)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>Software </td>
                                            <td>fourth</td>

                                            <td>
                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>

                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="arch" role="tabpanel" aria-labelledby="arch-tab">
                <div class="row mt-3">

                    <div class="col-12 ">
                        <div class="card pr-5">

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        @if ($student->department_id == 4)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>Architecture </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="tab-pane fade" id="chem" role="tabpanel" aria-labelledby="chem-tab">
                <div class="row mt-3">





                    <div class="col-12 ">
                        <div class="card pr-5">




                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        @if ($student->department_id == 3)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>chemichal </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="tab-pane fade" id="manu" role="tabpanel" aria-labelledby="manu-tab">
                <div class="row mt-3">





                    <div class="col-12 ">
                        <div class="card pr-5">




                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        @if ($student->department_id == 5)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>Manufacture </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div class="tab-pane fade" id="geo" role="tabpanel" aria-labelledby="geo-tab">
                <div class="row mt-3">





                    <div class="col-12 ">
                        <div class="card pr-5">




                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        @if ($student->department_id == 6)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>Geotechnical </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-pane fade" id="oil" role="tabpanel" aria-labelledby="oil-tab">
                <div class="row mt-3">
                      <div class="col-12 ">
                        <div class="card pr-5">
                             <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>



                                        @foreach ($students as $student)
                                        @if ($student->department_id == 7)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>Petroleum </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="civil" role="tabpanel" aria-labelledby="civil-tab">
                <div class="row mt-3">





                    <div class="col-12 ">
                        <div class="card pr-5">




                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        @if ($student->department_id == 2)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}} </td>
                                            <td>{{$student->phone}} </td>
                                            <td>civil </td>
                                            <td>fourth</td>
                                            <td>

                                                <div class='d-flex'>
                                                    <a href="" class="btn btn-info btn-sm mr-2 ">Edit</a>
                                                    <form method="POST" action="{{route('student.delete',$student->id)}}" class="deletestudent">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ">Delete</a>

                                                    </form>
                                                </div>

                                            </td>

                                        </tr>
                                        @endif

                                 @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>

<script>
    //deleting sweet alert
    $('.deletestudent').submit(function (e){
        e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to reover this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'delete '
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }

    })
    })
    //end of deleting




    </script>

@endsection
