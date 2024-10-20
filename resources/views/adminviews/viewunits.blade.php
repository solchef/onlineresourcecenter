
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Units Listing For Course</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                <th>Unit Code</th>
                 <th>Unit Name</th>
                  <th>Topics</th>
                  <th>Notes</th>
                 <th>Assignments</th>
                 <th>View Profile</th>
               
  

             <tbody>
                     @foreach($units as $unit)
                     <tr>
                         <td>{{$unit->unit_code}}</td>
                         <td>{{$unit->unit_name}}</td>
                         <td>{{$unit->totaltopics}}</td>
                         <td>{{$unit->totalnotes}}</td>
                         <td>{{$unit->totalass}}</td>
                         <td><a href="unitprofile/{{$unit->id}}" ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-eye"></i> Profile</button></a></td>
                        
                     </tr>
                     @endforeach
                 </tbody>
             </table>
             <nav>{{ $units->links() }}</nav>
               
        </div>
 
    </div>

</div>
</div>
</div>




    @include('layouts.adminfooter')
@endsection

