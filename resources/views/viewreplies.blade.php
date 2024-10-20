@extends('layouts.adminlayouts')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tickey Reply</h2>
             
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="{{ url('support')}}" class="btn btn-sm btn-primary">Back To Support</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                   
                  <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Ticket Reply</a></li>
                            <!-- <li class=""><a data-toggle="tab" href="#tab-2">Other Tickets By User</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   
                                   <div class="form-group col-md-12">
                                    <label class="control-label"><u>Ticket Description</u></label>
                                       <p><b>Ticket Type: </b> {{$ticket->type}} <br>
                                       <b> Ticket By: </b>{{$ticket->name}} <br>
                                       <b> Mobile: </b> {{$ticket->mobile}} <br>
                                       <b> Email: </b> {{$ticket->email}} <br>
                                        <b>Description:</b> {{$ticket->description}}</p>
                                   </div>
                                   <input type="hidden" name="id" value="{{$ticket->id}}">  

                                      <div class="form-group col-md-12">
                                    <label class="control-label">Ticket Reply</label>
                                       <textarea class="form-control" disabled  name="#" rows="8">{{ $ticket->reply}}</textarea>
                                   </div>
                                   <div class="form-group">
                      
                               </div>
                            
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                

                                </div>
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