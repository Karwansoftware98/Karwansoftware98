@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
<div class="main-content container-fluid">

    <section class="section">
        <div class="row mb-2">


            <div class="col-12 ">
                <div class="d-flex justify-content-end mb-1 mr-1">
                    <a href="javascript:void(0)" class="btn btn-success "  data-toggle="modal" data-target="#InsertModal">Add Teacher</a>
                </div>

                <div class="card pr-5">



                    <div class="modal fade" id="InsertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Adding Teacher</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="form form-vertical" id="addForm">
                                    @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="name">Full Name</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Input with icon left" id="name" name="name">
                                                            <div class="form-control-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p style="color: red" id="InsertNameError"></p>
                                                </div>
                                                <div class="col-12">

                                                    <div class="form-group has-icon-left">
                                                        <label for="email">Email</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                                            <div class="form-control-icon">
                                                                <i data-feather="mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p style="color: red" id="InsertEmailError"></p>

                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="phone">Mobile</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="phone number" id="phone" name="phone">
                                                            <div class="form-control-icon">
                                                                <i data-feather="phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p style="color: red" id="InsertPhoneError"></p>

                                                </div>



                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="department">Department</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="new_department" name="department" >

                                                                    @foreach ($department as $item)

                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>


                                                                    @endforeach

                                                                </select>
                                                            </fieldset>

                                                        </div>
                                                    </div>
                                                    <p style="color: red" id="InsertDepartmentError"></p>
                                                </div>









                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->


                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">

                        <table class="table table-hover mb-0" id="teacherTable">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Department</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>



                                    @foreach ($staff as $item)

                                     <tr id="tid{{$item->staff_id}}">

                                        <td class="text-bold-500 O_name">{{$item->staff_name}}</td>
                                        <td class="O_email">{{$item->email}}</td>
                                        <td class="text-bold-500 O_phone">{{ $item->phone }}</td>
                                        <td class="O_department" >{{ $item->dp_name }} </td>
                                        <td>
                                            <div class='d-flex'>
                                                 <a href="javascript:void(0)" data-id="{{$item->staff_id}}"  class="btn btn-info  btn-sm mr-2 teacher_update" data-toggle="modal" data-target="#updatingModal"  >Edit</a>
                                                     <form method="POST" action="{{route('deleting.teacher',$item->staff_id)}}" class="deleteform">
                                                        @csrf
                                                        @method('DELETE')


                                                    <button type="submit" class="btn btn-danger ">Delete</a>

                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updatingModal">
            <div class="modal-dialog modal-dialog-centered" id="modalDialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Updating Teacher</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form form-vertical"  id="editForm">
                        @csrf
                        <input type="hidden" id="id_tech" name="id">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="name">Full Name</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="full name"   name="name" id="U_name">


                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>

                                            </div>
                                            <p style="color: red" id="nameError"></p>
                                        </div>


                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Email"  name="email" id="U_email">
                                                <div class="form-control-icon">
                                                    <i data-feather="mail"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <p style="color: red" id="emailError" ></p>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="phone">Mobile</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="phone number"  name="phone" id="U_phone">
                                                <div class="form-control-icon">
                                                    <i data-feather="phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p style="color: red" id="phoneError"></p>

                                    </div>



                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="department">Department</label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="department" name="department">

                                                        <option >Departments</option>

                                                        @foreach ($department as $dep)

                                                            <option value="{{ $dep->id }}" id="U_department_id{{ $dep->id }}">{{ $dep->name }}</option>


                                                        @endforeach

                                                    </select>
                                                </fieldset>

                                            </div>
                                        </div>
                                        <p style="color: red" id="departmentError"></p>
                                    </div>







                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" >Submit</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->


                </div>
            </div>
        </div>
    </section>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>

$(document).on('click','.teacher_update',function(e){
        var _this = $(this).parents('tr');
        $('#U_name').val(_this.find('.O_name').text ());
        $('#U_email').val(_this.find('.O_email').text());
        $('#U_phone').val(_this.find('.O_phone').text());
        $('#U_department_id').val(_this.find('.O_department').text());
       $('#id_tech').val( $(this).attr("data-id"));


    $('#editForm').submit(function(e){

       e.preventDefault();

       let id_staff = $('#id_tech').val();

       let name = $('#U_name').val();
       let email = $('#U_email').val();
       let phone = $('#U_phone').val();
       let department_id = $('#department').val();
       let _token = $("input[name=_token]").val();
       let _url ='{{ route('teacher.update') }}';

       $.ajax({
           url: _url,
           dataType: 'JSON',
           type: 'GET',
           data: {
               _token:_token,
               name:name,
               email:email,
               phone:phone,
               department_id:department_id,
               id:id_staff,
           },
           success: function(response) {
            toastr.success('success',{timeOut:1500});
            $('#editForm')[0].reset();
            //    $('#updatingModal').modal('hide');
            //    $('#modalDialog').modal('hide');
                $('#nameError').text('');
                $('#emailError').text('');
                $('#phoneError').text('');
                location.reload();
           },
           error:function(response){
            toastr.error('Error',{timeOut:1500});
            console.log(response.responseJSON.errors.email);
            if(typeof(response.responseJSON.errors.name) === 'undefined'){
                $('#nameError').text('');
                $('#U_name').css('border-color','');
            }else{
                $('#nameError').text(response.responseJSON.errors.name);
                $('#U_name').css('border-color','red');
            }
            if(typeof(response.responseJSON.errors.email) === 'undefined'){
                $('#emailError').text('');
                $('#U_email').css('border-color','');
            }else{

                $('#emailError').text(response.responseJSON.errors.email);
                $('#U_email').css('border-color','red');
            }
            if(typeof(response.responseJSON.errors.phone) === 'undefined'){
                $('#phoneError').text('');
                $('#U_phone').css('border-color','');
            }else{

                $('#phoneError').text(response.responseJSON.errors.phone);
                $('#U_phone').css('border-color','red');
            }








           }
           });

 });
});
</script>

<script>



        $('#addForm').submit(function(e){

e.preventDefault();

let name = $('#name').val();
let email = $('#email').val();
let phone = $('#phone').val();
let department = $('#new_department').val();
let _token = $("input[name=_token]").val();
let _url ='{{route('teachers.update')}}';

$.ajax({
    url: _url,
    dataType: 'JSON',
    type: 'POST',
    data: {
        _token:_token,
        name:name,
        email:email,
        phone:phone,
        department:department,

    },
    success: function(response) {

      //  $('#InsertModal').toggle();
        location.reload();
        toastr.success('success',{timeOut:1500});
        $('#InsertNameError').text('');
        $('#InsertEmailError').text('');
        $('#InsertPhoneError').text('');
        $('#InsertDepartmentError').text('');
        $('#addForm')[0].reset();
    },
    error:function(response){

        toastr.error('Error',{timeOut:1500});

                    if(typeof(response.responseJSON.errors.name) === 'undefined'){
                        $('#InsertNameError').text('');
                        $('#name').css('border-color','');

                    } else{
                        $('#InsertNameError').text(response.responseJSON.errors.name);
                        $('#name').css('border-color','red');
                    }

                    if(typeof(response.responseJSON.errors.email) === 'undefined'){
                        $('#InsertEmailError').text('');
                        $('#email').css('border-color','');
                    }else{
                        $('#InsertEmailError').text(response.responseJSON.errors.email);
                        $('#email').css('border-color','red');
                        }

                    if(typeof(response.responseJSON.errors.phone) === 'undefined'){
                        $('#InsertPhoneError').text('');
                        $('#phone').css('border-color','');
                    }else{
                        $('#InsertPhoneError').text(response.responseJSON.errors.phone);
                        $('#phone').css('border-color','red');
                    }

                    if(typeof(response.responseJSON.errors.department) === 'undefined'){
                        $('#InsertDepartmentError').text('');
                        $('#new_department').css('border-color','');
                    }else{
                        $('#InsertDepartmentError').text(response.responseJSON.errors.department);
                        $('#new_department').css('border-color','red');
                    }


    }
    });

});

</script>
<script>
    //deleting sweet alert
    $('.deleteform').submit(function (e){
        e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to reover this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'delete ',

    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
        Swal.fire(
          'Deleted',
          'Your file has been deleted.',
          'success',
          500
        )
      }

    })
    })
    //end of deleting

 </script>

@endsection
