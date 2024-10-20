
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>View Fee Structure</h5>
        </div>
         <div class="ibox-content">
            <div class="row">
                @if(Auth::user()->roleid == 1)
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                               
                               <div class="form-group">
                                <label>Select Faculty</label>
                                <select class="form-control" name="faculty">
                                    <option value="">Select Faculty</option>
                                </select>
                               </div>
                                <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="faculty">
                                    <option value="">Select Course</option>
                                    @foreach($target as $tar)
                                     <option value="{{$tar->id}}">{{$tar->course_name}}</option>
                                   @endforeach
                                </select>
                               </div>
                               
                                <div class="hr-line-dashed"></div>
                             
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->roleid == 1)
                <div class="col-lg-8 animated fadeInRight">
                 @elseif(Auth::user()->roleid == 3)
                <div class="col-lg-12 animated fadeInRight">
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
    
                            <center>
                             <u>  <b> <h2>ONLINE RESOURCE CENTER</h2></b></u>
                              <u>  <h3>FEE STRUCTURE FOR **course**</h3></u>
                             </center>
                                <hr>
                           <table class="table table-responsive table-stripped table-bordered">
                               <th>#</th>
                               <th>Mod</th>
                               <th>Amount</th>
                               <tbody>
                                   @php($count = 1)
                                   @foreach($structure as $str)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$str->itemname}}</td>
                                        <td>2000</td>
                                    </tr>
                                    @php($count ++)
                                   @endforeach
                                   <tr>
                                       <td colspan="3"><span class="pull-right"><b>Total Amount:</b>16000</span></td>
                                   </tr>
                               </tbody>

                           </table>


                        </div>
                    </div>
                    </div>

            </div>
           

      
    <!--/span-->

     

</div>
</div>
</div>
</div>



    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
                    <h4 class="modal-title">Reference Details</h4>
                
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body recordId" hidden >
                            
                        </div>
                       
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @include('layouts.adminfooter')
@endsection

