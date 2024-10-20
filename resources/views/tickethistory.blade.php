@extends('layouts.adminlayouts')

@section('content')


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-12 ">
                    <div class="ibox float-e-margins">
                   
                  <div class="col-lg-12">

                    <div class="col-lg-12" ">
                        <div class="ibox float-e-margins">

                            <div class="ibox-title">
                               <h3><strong><u><i class="fa fa-envelope"></i> Student Tickets </u> </strong></h3>
        
                            </div>
                            <div class="ibox-content" >
                                <div class="row" id="messages" style="height: 400px;  overflow: scroll;">
                              
                               <div style="" class=" alert alert-success col-md-9">
                                 <p>Raised Tickets by the student will appear here<br>
                                   
                                   
                             </div>

                             
                        @foreach($tickets as $tick)                            
                            <div style="" class="pull-right alert alert-warning col-md-8 col-md-offset-1">
                                 <p>{{$tick->description}} <br>
                                    <span style="color: grey;">{{$tick->created_at}}</span></p>
                                   
                             </div>
                       @if(!$tick->reply)

                       @else
                               <div class="alert alert-danger col-md-8">
                                  <p>{{$tick->reply}} <br>
                                    <span style="color: grey;">{{$tick->created_at}} - ORC Support</span></p>
                                     
                             </div>
                        @endif

                             
                             
                       @endforeach 
                        
                        
                                  
                                
                                </div>
                                </div>
                                <form method="post" action="{{url('postreply') }}">
                                  {{ csrf_field() }}
                                   <input type="hidden" name="id" value="{{$lastticket}}"> 
                                   <input type="hidden" name="ticketuser" value="{{$ticketuser}}">
                                <div class="form-group">
                                  <label>Type a Reply</label>
                                <textarea class="form-control" name="reply" autofocus placeholder="Type a Reply">
                                    
                                  </textarea>
                                </div>
                                  <br>
                                <a href="{{url('#')}}" class="btn btn-success btn-sm">Refresh</a>
                                 <button type="submit" href="#" class="btn btn-primary btn-sm pull-right">Send Resply</button>
                               </form>
                            </div>

                </div>
                </div>

                 
                </div>
            </div>
            </div>
        </div>

        
         <script type="text/javascript">
          $('#messages').scrollTop($('#messages')[0].scrollHeight);
        </script>

    @include('layouts.adminfooter')
@endsection