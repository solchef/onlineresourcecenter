
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>Send Bulk Mesages</h5>
        </div>
         <div class="ibox-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                         <form method="get" action="addnumber">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Select The Group toSend Messages</label>
                          <select name="groupid" class="form-control">
                              <option value="">Select Group</option>

                              @foreach($groups as $group)
                              <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                              @endforeach
                          </select>
                          <br>
                          <button class="btn btn-round btn-success pull-right">Submit</button>
                      </div>
                    </form>
                    <br>
                      <center>OR</center>
                 <div class="form-group">
               <form method="post" action="addnumber">
                   {{ csrf_field() }}
                   <label>Add New Number</label>
                <input type="text" name="recipient" class="form-control" placeholder=" 254712345678" autofocus="autofocus">
                <br>
                <div class="form-group">
              <button class="btn btn-round btn-success pull-right">Submit</button>
          </div>
              </form>
               
                 </div>
              <br>
                                
                              
                                <div class="hr-line-dashed"></div>
                                
                                
                                <h4><u>Added Groups and Numbers</u></h4>
                                
                                   <div style="max-height: 250px; overflow: scroll;">
                              <b> <u> <h5>Selected group list</h5></u></b>
                                <ol>
                                    @if(empty($session_group))
                                    <li>You have selected no groups</li>
                                    @else

                                    @foreach($session_group as $groupcontacts)
                                    <li>{{$groupcontacts->contact_name}}-{{$groupcontacts->mobile}}</li>
                                 
                                    @endforeach

                                    @endif
                                </ol>
                         </div>
                         <hr>
                           <div style="max-height: 250px; overflow: scroll;">
                    <b> <u> <h5>Added Numbers</h5></u></b>
                       <ol >
                       @if(empty($session_rec))
                           <li>Enter no and click add to add</li>
                        @else
                        @foreach($session_rec as $recipient)
                        <li>{{ $recipient }}</li>
                        @endforeach
                        @endif
                       </ol>
              </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                     
                            
                         <form role="form" method="post" action="sendbulk">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shortcode</label>
                        <select name="shortcode" class="form-control" id="Shortcode" >
                            
                            <option value="CAPACITYAFRICA">CAPACITYAFRICA</option>
                        </select>
                    </div>

                     
                      <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea type="" rows="3" name="message" class="form-control" id="message" placeholder="Type the message here" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Schedule</label>
                        <input type="date" name="schedule" class="form-control">
                    </div>
                  
                    <button type="submit" class="btn btn-default">Submit</button>
                    
                </form>

            </div>
        </div>
    </div>
    <!--/span-->


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

