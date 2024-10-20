
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Campus Payments</h5>
        </div>

<!--      <h4>Filter Criteria</h4>
      <form method="get" action="campuspayments">

            <div class="col-md-3 pull-left">
                <label>Start Date</label>
              <input type="date" name="startdate" class="form-control">
            </div>

            <div class="col-md-3 pull-left">
                <label>End Date</label>
              <input type="date" name="enddate" class="form-control">
            </div>

             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>               
            </div>
        </form> -->
        <div class="ibox-content">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6">
                <h5>Campus Payments</h5>
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Campus Name</th>
                 <th>Amount Paid</th>
             

                     
              <tbody>
                @foreach($payments as $payment)
              
                     <tr>
                  
                         <td>{{$payment->campusname}}</td>
                         <td>{{$payment->total}}</td>
                       
                
                      
                     </tr>
                   
                     @endforeach
                 </tbody>
                
             </table>
           </div>

           <div class="col-md-6">
            <h5>Campus Balances</h5>
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Campus Name</th>
                 <th>Balance</th>
           

                     
              <tbody>
                @foreach($balances as $payment)
              
                     <tr>
                         <!-- <td>{{$payment->id}}</td> -->
                         <td>{{$payment->campusname}}</td>
                         <td>{{$payment->total}}</td>            
                      
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
</div>
</div>

    @include('layouts.adminfooter')
@endsection

