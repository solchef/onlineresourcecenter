
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add a New Item</h5>
        </div>
        <div class="ibox-content">
 <form role="form" method="post" action="{{ url('additems') }}">
                {{ csrf_field() }}
                    

                    

                    <div class="form-group">
                        <p ><u>Instructions</u><br>
                            Add the items to be included in the fee structure here. They will be displayed on the right pane. You will then Click on the <b><strong>Complete Structure </strong></b>Button to fill the Course details
                        </p>
                        
                       
                    </div>

                    <div class="form-group">
                      
                        <input type="hidden" name="course" class="form-control" id="message" value="{{$courses}}" required>
                        
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Item Description</label>
                        <input type="text" name="itemname" class="form-control" id="message" placeholder="Type description of the Item" required>
                        
                    </div>


                     <div class="form-group"> 

                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter the Amount">
                     </div>
                 
                  
                    <button type="Add" class="btn btn-default">Submit</button>
                    
          </form>
</div>
</div>
</div>

      
    <!--/span-->
     

     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Fee structure Items</h5>
        </div>
        <div class="ibox-content">

             <table class="table table-responsive table-stripped table-bordered">
                <th>#</th>
                 <!-- <th>Item Reference</th> -->
                 <th>Item Name</th>
                 <th>Amount</th>
                 @if(empty($itemstemp))
                 <tr>
                <td colspan="3"> <p>You have not added any items</p></td>
                </tr>
                 @else
                 <tbody>
             <?php
              $index=0;
              $total_amount = 0;
               ?>
                    @php($count = 1)
                     @foreach($itemstemp as $items)
                 <tr>
                     <td>{{ $count }}</td>
                     <!-- <td>{{ $items->id }}</td> -->
                     <td><input type="text" name="itemname[]" value="{{ $items->itemname }}" style="display: none;">{{ $items->itemname }}</td>
                     <td><input type="text" name="amount[]" value="{{ $items->amount }}" style="display: none;">{{ $items->amount }}</td>
                    

                

                 <?php $index++;
                    $total_amount+=$items->amount;
                   ?>
                   
                   
                 </tr>

                     
                     @php($count ++)
                
                     @endforeach
                     <tr>
                         <td colspan="4" ><span class="pull-right"> Total Amount: {{$total_amount}}</span></td>
                     </tr>
                 </tbody>
            @endif

             
             </table>
          <button id="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModalActivate">Complete Structure</button>
               
        </div>
 
    </div>

</div>
</div>
</div>


    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
                    <h4 class="modal-title">Complete Fee Structure</h4>
                
                </div>
                <div class="modal-body">
                 
                        <div class="modal-body">
                <form role="form" method="post" action="{{ url('generatestructure') }}">
                {{ csrf_field() }}


             <table class="table table-responsive table-stripped table-bordered " style="display: none;">
                <th>#</th>
                 <!-- <th>Item Reference</th> -->
                 <th>Item Name</th>
                 <th>Amount</th>
                 @if(empty($itemstemp))
                 <tr>
                <td colspan="3"> <p>You have not added any items</p></td>
                </tr>
                 @else
                 <tbody>
             <?php
              $index=0;
              $total_amount = 0;
               ?>
                    @php($count = 1)
                     @foreach($itemstemp as $items)
                 <tr>
                     <td>{{ $count }}</td>
                     <!-- <td>{{ $items->id }}</td> -->
                     <td><input type="text" name="itemname[]" value="{{ $items->itemname }}" style="display: none;">{{ $items->itemname }}</td>
                     <td><input type="text" name="amount[]" value="{{ $items->amount }}" style="display: none;">{{ $items->amount }}</td>
                    

                 <?php $index++;
                    $total_amount+=$items->amount;
                   ?>
                   
                   
                 </tr>

                     
                     @php($count ++)
                
                     @endforeach
                     <tr>
                         <td colspan="4" ><span class="pull-right"> Total Amount: {{$total_amount}}</span></td>
                     </tr>
                 </tbody>
            @endif

             
             </table>

                    <input type="hidden" name="totalamount" value="{{$total_amount}}">
                          <div class="form-group">
                    <div class="form-group"> 
                        <label>Please ascertain that all the fee structure items are correct.</label>

                     </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail1">Enter the Structure Duration</label>
                        <input type="hidden" name="course" value="{{$courses}}" required>
                         <input type="text" name="duration" class="form-control" id="message"  required>
                       
                    </div>
                 
                  
                    <button type="Add" class="btn btn-default">Submit</button>
                    
          </form>
                        </div>
                       
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                   
                </div>

            </div>
        </div>
    </div>


    @include('layouts.adminfooter')
@endsection

