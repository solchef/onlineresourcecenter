
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Students Balances</h5>
        </div>
             <h4>Filter Criteria</h4>
      <form method="get" action="viewbalances">

             <div class="col-md-3 pull-left">
                <label>Filter By Student Name</label>
              <input type="text" name="student" class="form-control">
            </div>


             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>
        </form>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Student</th>
                 <th>Email</th>
                 <th>Paid</th>
                 <th>Balance</th>
                 <th>History</th>

                     
              <tbody>
                @foreach($balances as $payment)
              
                     <tr>
                         <!-- <td>{{$payment->id}}</td> -->
                         <td>{{$payment->name}}</td>
                         <td>{{$payment->email}}</td>
                         <td>{{$payment->paid}}</td>
                         <td>{{$payment->balance}}</td>
                         <td><a href="studentstatement/{{$payment->id}}" ><button class="btn btn-xs btn-primary col-md-12">Previous Payments</button></a></td>
                
                      
                     </tr>
                   
                     @endforeach
                 </tbody>
                
             </table>
             
               <nav>{{ $balances->links() }}</nav>
        </div>
 
    </div>

</div>
</div>
</div>

    @include('layouts.adminfooter')
@endsection

