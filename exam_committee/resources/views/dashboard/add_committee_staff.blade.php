@extends('layouts.dashboard')

@section('content')

<div class="main-content container-fluid" style="transform: translateY(-35px)">
    <form id="form" method="post" action="javascript:void(0)">
        @csrf

                <div class="row justify-content-center mb-5">
                    <div class="col-4 ">
                    <h3 class="text-dark pl-5">{{ $academic_year->academic_year }}  </h3>
                
                    <h6 class=" text-dark"> {{ ucfirst($academic_year->semester) }} Semester And {{ ucfirst($academic_year->trail) }} Trail</h6>
                    </div>

                </div>
                <input type="hidden" id="academic_year" name="academic_year" value="{{ $academic_year->id }}">
                    
        <div class="row ">
            <div class="col-12">
               



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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',1) as $item)
                           
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                         
                                            
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp
                   
                                        
                                      
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',3)  as $item)
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',6)  as $item)
                           
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp 
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',7)  as $item)
                           
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp 
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',2)  as $item)
                           
            
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',5)  as $item)
                             <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
            
                                <th>Assign as member</th>
                                <th>Assign as Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($staff->where('department_id',4)  as $item)
                           
            
                            <tr>
                                <td class="text-bold-500">{{$item->name }}</td>
                                <td>{{$item->email }}</td>
                                <td class="text-bold-500">7500000000</td>
                                <td>{{$item->department->name }}</td>
            
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $item->id }}" class="form-check-input form-check-success member"
                                             name="member"  id="member{{$item->id }}" 
                                             @php
                                             if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                 $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                     if($role->pivot->role=='member'){
                                                         print 'checked';
                                                     }
                                            
                                               } 
                                              
                                             @endphp
                                             >
                                            <label class="form-check-label" for="customColorCheck3">Member</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='form-check'>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio"   class="form-check-input form-check-success leader"
                                        
                                        
                                            @php
                                            if ($item->academic_year->where('id',$academic_year->id)->first()) {
                                                $role=$item->academic_year->where('id',$academic_year->id)->first();
                                                    if($role->pivot->role=='leader'){
                                                        print 'checked';
                                                    }
                                           
                                              } 
                                             
                                            @endphp
                                       
                                             id="leader{{$item->id }}"  name="leader" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="customColorCheck3">Leader</label>
                                        </div>
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
   
</div>


</div>


              <div class="d-flex">
                <button type="submit" class="btn btn-primary submit w-25 ml-auto mr-auto submit">
                    
                    Submit
                    <span class="spinner-border spinner-border-sm loader" style='display: none'></span>
                </button>
            </div>
        </div>

            </div>
            
        
  
</div>


</div>
</form>
</div>


   <script>
$('.submit').click(function(){
    $('.submit').prop("disabled", true);
    $('.loader').show();
    var members = [];
    var unchecks = [];
    var leader;
    var academic_year= $('#academic_year').val();
    

    $('.leader').each(function() {
        var leaders = $(this).val();
        if($(this).is(':checked')){
             leader=leaders;
        }
    });
    


    $('.member').each(function() {
        var x = $(this).val();
        if($(this).is(':checked')){
            var member=x;
        }
        else{
            var uncheck=x;
        }
    if (member) {
        members.push(member);
    }
    else{
        unchecks.push(uncheck); 
    }
  
    });

    let _url ='{{ route('assign_committee_staff') }}';
       
        
    
    $.ajax({
      url: _url,
      dataType: 'html',
      type: 'GET',
      data: {
       "_token": "{{ csrf_token() }}",
        members:members,
        unchecks:unchecks,
        leader:leader,
        academic_year:academic_year,
      },
      success: function(response) {
        $('.submit').prop("disabled", false);
        $('.loader').hide();
     
      }
    });
    
    
});
   </script>


     {{--  <script>
    
    
        $('.member').change(function(){
        var id= $(this).val();
        
        if($(`#leader${id}`).is(':checked')){
            var type='leader';
        }
        else{
           if($(this).is(':checked')){
                var type='member';
            }
            else{
                var type='teacher';
            }
          }
      

        let _url ='{{ route('assign_committee_staff') }}';
       
        
    
          $.ajax({
            url: _url,
            dataType: 'html',
            type: 'GET',
            data: {
             "_token": "{{ csrf_token() }}",
              id:id,
              type:type,
            },
            success: function(response) {
                $("#mobile").html(response);  
           
            }
          });
        });


       


        

            $('.leader').change(function(){
                var id= $(this).val();
                var member=$(`#member${id}`).prop( "disabled", true ); 
              
                var type="leader";
        
                let _url ='{{ route('assign_committee_staff') }}';
               
                
            
                  $.ajax({
                    url: _url,
                    dataType: 'html',
                    type: 'GET',
                    data: {
                     "_token": "{{ csrf_token() }}",
                      id:id,
                      type:type,
                    },
                    success: function(response) {
                      
                      alert(1);
                    }
                  });
                }); 
    </script>   --}}


@endsection
