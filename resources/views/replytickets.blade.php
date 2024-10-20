@extends('layouts.adminlayouts')



@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Reply to Raised Ticket</h2>
             
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="{{ url('viewtickets')}}" class="btn btn-sm btn-primary">Back To Tickets</a>
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
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Raised Tickets</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Other Tickets By User</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Please Post your Reply to the ticket here.</strong>
                                        <hr>
                                        <form method="post" action="{{url ('postreply') }}">
                                          {{ csrf_Field() }}
                    

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
                                    <label class="control-label">Send Reply</label>
                                       <textarea class="form-control"  name="reply" rows="8"></textarea>
                                   </div>
                                   <div class="form-group">
                                   <button type="submit" class="btn btn-primary btn-lg">
                                       Reply Ticket
                                   </button>
                               </div>
                             </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Other Tickets By User</strong>
                    <table class="table">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Ticket Type</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($tickets as $tick)
                            <tr>
                                <td>{{$tick->id}}</td>
                                <td>{{$tick->type}}</td>
                                <td>{{$tick->description}}</td>
                                <td> <label class="btn btn-clear btn-xs">{{$tick->status}}</label> </td>
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
        </div>

    @include('layouts.adminfooter')
@endsection