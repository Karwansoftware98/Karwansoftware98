@extends('layouts.dashboard')

@section('content')
<div class="main-content container-fluid" >

    <section class="section">
        <div class="row ">
            <div class="col-12 col-md-8">



                <form method="POST" action="{{route('store_academic_year')}}" class="form form-vertical">
                    @csrf
                    <div class=" ">

                        <label for="exampleInputPassword1"> Acdemic Year</label>
                        <input type="text"  class="input-group" id="name" name="academic_year" placeholder="academic year">
                     <b>   <label for="exampleInputPassword1" style="color:rgb(228, 38, 38);">please fill academic year like 2020-2021 !</label></b>
                    </div>




                <label for="exampleInputPassword1" style="margin-top: 15px; "> Semister</label>
                <select class="form-control" name="semester">


                <option>first</option>
                <option>second </option>



                </select>
                <label for="exampleInputPassword1" style="margin-top: 15px; "> trail </label>
                <select class="form-control" name="trail">


                <option>first</option>
                <option>second </option>



                </select>
                <div id="datepicker">
                <label for="exampleInputName" style="margin-top: 15px">start date</label>
                  <input type="date"  name="start"   class="input-group form-control datepicker">

                      <label for="exampleInputName" style="margin-top: 15px">end date</label>
                      <input type="date"  name="end"  class="input-group form-control datepicker">
                </div>

                <button type="submit" style="margin-left:90vh" class="btn btn-primary mr-10 mt-4 mb-10">Submit</button>
                </form>
                    <!-- form-->
            </div>
        </div>
    </section>
</div>


</div>

<script>
    $(function(){
        $('#datepicker').datetimepicker();
    })
</script>
@endsection
