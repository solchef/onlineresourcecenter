
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Outbox Messages</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
               <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Message</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Created_at</th>
                   
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(empty($outbox))
                    <tr>
                        <td colspan="8">You have no messages in your outbox yet</td>
                    </tr>
                    @else

                @foreach( $outbox as $outgoing )
                    <tr>
                        <td class="center">{{$outgoing->message_id}}</td>
                        <td class="center">{{$outgoing->shortcode}}</td>
                        <td class="center">{{$outgoing->recipient}}</td>
                         <td class="center">{{$outgoing->message}}</td>
                         <td class="center">{{$outgoing->clientcost}}</td>
                         <td class="center">{{$outgoing->status}}</td>
                         <td class="center">{{$outgoing->created_at}}</td>
                        <td class="center">
                          <center>  <a class="" href="#"><i class="glyphicon glyphicon-eye-open"></i> </a></center>    
                        </td>
                    </tr>
                @endforeach
                @endif
                    </tbody>
             </table>
             <nav>{{ $outbox->links() }}</nav>
               
        </div>
 
    </div>

</div>
</div>
</div>




    @include('layouts.adminfooter')
@endsection

