
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{ $details->title }}</h5>
        </div>
        <div class="ibox-content">
             {!! $details->details !!}
</div>
</div>
</div>

      
    <!--/span-->

     <div class="col-lg-4">
        <div class="ibox float-e-margins">


           <div class="ibox-title">
                                <h5>Activity Stream</h5>
               </div>

               <div class="ibox-content">
                                <div class="col-md-6">
                                     <form action="{{ url('like') }}/{{ $details->id }}" method="post">
                                         {{ csrf_field() }}
                                        <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-thumbs-o-up"> </i>  Like this article</button>

                                    </form>

                                </div>
                                <div class="col-md-6">
                                    <div class="small text-right">
                                        <h5>Stats:</h5>
                                        <div> <i class="fa fa-comments-o"> </i> {{ $details->comments }} comments </div>
                                       <div>  <i class="fa fa-eye"> </i> {{ $details->views }} views </div>
                                       <div> <i class="fa fa-thumbs-o-up"> </i> {{ $details->likes }} Likes </div>
                                    </div>
                                </div>
                              
                             <div class="form-group">
                                    <form action="{{ url('comment') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="articleid" value="{{$details->id}}">
                                        <label><u><strong>  Write a comment <i class="fa fa-commenting-o"></i> </strong></u></label>
                                        <textarea name="comment" rows="2" class="form-control" required></textarea>   
                                        <br>                                
                                        <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>
                                     </form>
                                </div>
                                <strong> <h5>Other Comments</h5> </strong>
                                @foreach($comment as $comments)
                                    <div class="social-feed-box">
                                        <div class="social-avatar">
                                            <a href="" class="pull-left">
                                                <img alt="image" src="img/a2.jpg">
                                            </a>
                                            <div class="media-body">
                                                <a href="#">
                                                    {{ $comments->name }} @ <small class="text-muted">{{ $comments->created_at }}</small>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="social-body">
                                            <p>
                                                {{$comments->comment}}
                                            </p>
                                        </div>
                                    </div>
                              @endforeach


                                </div>
                            </div>

                    </div>

      
               
        </div>
 
    </div>





    @include('layouts.adminfooter')
@endsection

