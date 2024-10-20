
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

            <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Raised Tickets</h5>
        </div>
        <div class="ibox-content">
               <nav class="navigation">{{$tickets->links()}}</nav>

                    <div class="wrapper wrapper-content animated fadeInRight">

                
                 @foreach($tickets as $reff)
                        <div class="faq-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <a data-toggle="collapse" href="#{{$reff->id}}" class="faq-question">{{ $reff->id }}.{{$reff->description}}</a>
                                    <small>Raised by <strong>{{$reff->name}} : {{$reff->email}}</strong> <i class="fa fa-clock-o"></i> {{$reff->created_at}}</small>
                                </div>
                                <div class="col-md-2">
                                    <span class="small font-bold">{{$reff->type}}</span>
  
                                    <div class="tag-list">
                                         @if($reff->status == "Received")
                                         <span class="tag-item">Replied</span>
                                       
                                        @else
                                          <span class=""><a href="{{ url('replyticket') }}/{{$reff->id}}" class="btn btn-xs btn-primary">Reply</a></span>
                                        @endif

                                        <span class=""><a href="{{ url('viewhistory') }}/{{$reff->userid}}" class="btn btn-xs btn-warning">View History</a></span>
                                    </div>
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="{{$reff->id}}" class="panel-collapse collapse ">
                                        <div class="faq-answer">
                                            <p>
                                                {{$reff->reply}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endforeach

     

                 
                    </div>
                </div>
            </div>


 
</div>
</div>
</div>

      
    <!--/span-->

     




    @include('layouts.adminfooter')

@endsection

