
@extends('layouts.adminlayouts')
<style type="text/css">
    .product-imitation {
  
         background-image: url(spiniastuff/img/articles.jpg);
         background-position: center;

    }
</style>
@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('view Articles')</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
<div class="container text-center">
<div class="well well-md col-md-12 hidden-sm hidden-xs">
<div class="row">
<div class="col-md-4">
<div class="text-primary">
<a href="viewarticles" title="" class="text-danger">
<span class="fa fa-2x fa-star-o"></span>
@lang('POPULAR')
</a>
</div>
</div>
<div class="col-md-4" id="active">
<div class="text-info">
<a href="viewarticles" title="" class="text-info">
<span class="fa fa-2x fa-clock-o"></span>
@lang('NEW')
</a>
</div>
</div>
<div class="col-md-4">
<div class="text-warning">
<a href="viewarticles" title="" class="text-warning">
<span class="fa fa-2x fa-thumbs-up"></span>
@lang('BEST')
</a>
</div>
</div>
</div>
</div>
<div class="visible-sm visible-xs" style="margin-top:5%;">
<div class="container">
<form method="get" action="#" role="search">
<div class="form-group col-xs-10">
<input type="text" name="key" class="form-control" placeholder="Search">
</div>
<input type="text" name="url" value="papers-new" style="display:none;">
<div class="form-group col-xs-2">
<button type="submit" class="btn btn-primary">
<span class="fa fa-search"></span>
</button>
</div>
</form>
</div>
</div>


<div class="row">
    @foreach($article as $articles)
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="">

                            <div class="product-imitation">
                                {{$articles->title}}<br>{{$articles->tags}}
                            </div>
                            <div class="product-desc">
                                <div class="small m-t-xs">
                                    {!! $articles->title !!}
                                </div>
                                <a href="{{ url('articledetails') }}/{{ $articles->id }}" class="btn btn-xs btn-outline btn-primary">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                @if(Auth::user()->roleid == 1)
                                 <a href="{{ url('removearticle') }}/{{ $articles->id }}" class="btn btn-xs btn-outline btn-primary">Delete <i class="fa fa-remove"></i> </a>
                                 @endif
                                <div class="m-t text-righ">

                                    
                                    <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-eye text-primary"></i>&nbsp;
                                        {{ $articles->views }}&nbsp;Views</a>
                                   
                                    <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-thumbs-o-up text-primary"></i>&nbsp;{{ $articles->likes }}&nbsp;Likes</a>

                                     <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-comments-o text-primary"></i>&nbsp;{{ $articles->comments }}&nbsp;Com</a>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>

     @endforeach



                                               
            </div>
           
            <nav>{{ $article->links() }}</nav>

                    </div>
                </div>
            </div>

              
            <!--/span-->


    </div>
</div>





    @include('layouts.adminfooter')
@endsection

