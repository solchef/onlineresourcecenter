
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Students Perfomance</h5>
        </div>

        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Student</th>
                 <th>Email</th>
                 <th>Assignment/Exam</th>
                 <th>Score</th>
                 <!-- <th>History</th> -->

                     
              <tbody>
                @foreach($results as $payment)
              
                     <tr>
                         <td>{{$payment->name}}</td>
                         <td>{{$payment->uploadassignment}}</td>
                         <td>{{$payment->submissionname}}</td>
                         <td>{{$payment->grade}}</td>
                         
                
                      
                     </tr>
                   
                     @endforeach
                 </tbody>
                
             </table>
             
               <nav></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    @include('layouts.adminfooter')
@endsection

