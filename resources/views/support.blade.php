@extends('layouts.adminlayouts')



@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Support Center/Support Tickets</h2>
             
                </div>
       <!--          <div class="col-sm-8">
                    <div class="title-action">
                        <a href="{{('viewrecipients')}}" class="btn btn-sm btn-primary">/</a>
                    </div>
                </div> -->
            </div>

            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">

                   
                  <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Raise Ticket</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Raised Tickets</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Please Post your question here and Our Team will Respond Back</strong>
                                        <hr>
                                        <form method="post" action="{{url ('raiseticket') }}">
                                          {{ csrf_Field() }}
                                   <div class="form-group col-md-12">
                                        <label class="control-label">Support Type</label>
                                       <select class="form-control" name="type">
                                           <option value="">Select the Support Type</option>
                                           <option value="Assignments">Assignments</option>
                                           <option value="Course Notes">Course Notes</option>
                                           <option value="Payment">Payment</option>
                                           <option value="System Error">System Error</option>
                                            <option value="Other">Other</option>
                                       </select>
                                   </div>

                                   <div class="form-group col-md-12">
                                    <label class="control-label">Description</label>
                                       <textarea class="form-control" name="enquiry" rows="8"></textarea>
                                   </div>
                                   <div class="form-group">
                                   <button type="submit" class="btn btn-primary btn-lg">
                                       Raise Ticket
                                   </button>
                               </div>
                             </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Your Tickets</strong>
                    <table class="table">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Ticket Type</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Reply</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($tickets as $tick)
                            <tr>
                                <td>{{$tick->id}}</td>
                                <td>{{$tick->type}}</td>
                                <td>{{$tick->description}}</td>
                                <td> <label class="btn btn-clear btn-xs">{{$tick->status}}</label> </td>
                                @if($tick->status == "Pending")
                                 <td> <label class="btn btn-clear btn-xs">No Reply</label> </td>
                                 @else
                                  <td> <a href="{{ url('viewreply') }}/{{$tick->id}}" class="btn btn-clear btn-xs">View Reply</a> </td>
                                  @endif
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