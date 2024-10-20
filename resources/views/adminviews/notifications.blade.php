@extends('layouts.adminlayouts')



@section('content')


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="wrapper wrapper-content animated fadeInRight">
                                    
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                          <div class="row">
                            <form action="{{('createnotification')}}" method="post">
                                {{ csrf_field() }}
                            <h4>Enter Notification below:</h4>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <textarea class="form-control" name="notification" rows="8">
                                        
                                    </textarea>
                                </div>
                                <button class="btn btn-success btm-sm pull-right">Add +</button>
                            </div>

                            </form>
                            </div>
                        <div class="table-responsive">
                          <h4>View Notifications</h4>
                    
                    <table class="table" >
                    <thead>
                        <th>#</th>
                        <th>Date</th>
                    
                        <th>Delete</th>  
                    </thead>
                    <tbody>
                        @php($count = 1)

                        @foreach($notification as $not)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $not->notification }}</td>
                            <td><a href="{{ url('deletenotification') }}/{{ $not->id }}" class="btn btn-sm btn-default">Delete Notification</a></td>
                        </tr>
                        @php($count++)
                        @endforeach
 
                    </tbody>
         
                    </table>
                    <nav class="navigation"></nav>
                        </div>

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

