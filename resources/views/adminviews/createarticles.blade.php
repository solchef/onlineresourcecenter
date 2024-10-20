
@extends('layouts.adminlayouts')
<style type="text/css">
 

       

        #panels{
            padding: 10%;
        }

        .avator{ 
            border-color: #989898;
            border-width: 5px; 
        }

        .avator:hover{
            padding:5px;
            background-color: #938F8F;
        }
        #white
        {
            background-color:#ffffff;
        }
        #white a:hover
        { 
            background-color:rgba('0,0,0,0.5');
        }
        #white a
        { 
            color:#78CF61;
        }
         .show-on-hover:hover > ul.dropdown-menu {
            display: block;    
        }  

        #height{
        height:300px;
        margin-top:0px;
        margin-bottom:10px;
        overflow-y:hidden; 
        background-image: url(../../../img/defaults/stock.jpg);
        background-size: cover;
          background-position: 50% 50%;
        }

        .disp{
          border-radius: 10px 0 10px 0;
          background-color: rgba( 255,255,255,0.85);
          padding :10px;
          margin: 10px;
          height: 95%;
        }

        .btn-circle{
          border-radius: 5%;
          padding: 10px;
        }

        .btn-circle:hover{
          background-color: #FFFFFF;
          color: #3BBAFC;
        }
        .text-plain{
          color: #3BBAFC;
        }
        #active{

          background-color:rgba(0, 0, 0, 0.3);
          padding:5px;

        }
        #active a{
          color:#FFFFFF;
        }
        .active1{
          background-color:#454545; 
        }
        .active1 *{
          color:#FFFFFF;
        }
        #search {
            float: right;
            margin-top: 9px;
            width: 250px;
        }

        .search {
            padding: 5px 0;
            width: 230px;
            height: 43px;
            position: relative;
            left: 10px;
            float: left;
            line-height: 22px;
        }

        .search input {
            position: absolute;
            width: 0px;
            float: Left;
            margin-left: 210px;
            -webkit-transition: all 0.7s ease-in-out;
            -moz-transition: all 0.7s ease-in-out;
            -o-transition: all 0.7s ease-in-out;
            transition: all 0.7s ease-in-out;
            height: 43px;
            line-height: 18px;
            padding: 0 2px 0 2px;
            border-radius:1px;
        }

        .search:hover input, .search input:focus {
            width: 200px;
            margin-left: 0px;
        }

      .search .btn {
          height: 43px;
          position: absolute;
          right: 0;
          top: 5px;
          border-radius:1px;
      }

        .back-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 30px;
            left: 20px;
            z-index:10;
            display:none;
            opacity: 0.65;
        }

        .like {
            cursor: pointer;
            position: fixed;
            bottom: 30px;
            right: 20px;
            z-index:15;
            opacity: 0.65;            
        }

        .bookmark {
            cursor: pointer;
            position: fixed;
            bottom: 30px;
            right: 110px;
            z-index:15;
            opacity: 0.65;            
        }

        .loading {
          z-index: -20;
        }

      #formation
      {
        background-color:rgba(255,255,255,0.9);
        padding:20px;
        margin-top: 15%;
        color: #000000;
      }

      #formation > a *{
        color:#61C0F6;
      }

    /* Credit to bootsnipp.com for the css for the color graph */

    .colorgraph {
      height: 5px;
      border-top: 0;
      background: #c4e17f;
      border-radius: 5px;
      background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
</style>
@section('content')
                <div class="wrapper wrapper-content">

                <div class="row">

                        <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                  
                        <div class="ibox-content">

                                <div class="row">
                <div class="panel panel-primary" style="margin-top:0%;">
                <form action="{{ url('postarticle') }}" method="post" role="form" id="formation" style="margin-top:0px;">
                       {{ csrf_field() }}
                <div class="panel-heading">
                <h2 class="text-warning text-center">WRITE NEWS ARTICLE <hr class="colorgraph"></h2>
                </div>
                <div class="form-group col-md-6">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Article's Title" required>
                </div>
                <div class="form-group col-md-6">
                <label>Category</label>
                        <select class="form-control" name="category">
                        <option value="1">Entertainment</option>
                        <option value="2">News</option>
                        <option value="3">Notice</option>
                        <option value="4">Gossip</option>
                        <option value="5">Advertisement</option>
                        </select>
                </div>
                <div class="form-group col-md-6">
                <label>Type</label>
                <select class="form-control" name="type">
                <option value="1">Regular</option>
                <option value="2">No Image</option>
                <option value="3">Quote</option>
                </select>
                </div>
                <div class="form-group col-md-6">
                <label>Tags</label>
                <input list="tags" name="tags" placeholder="Article tags ( Optional ) e.g news notice entertainment" multiple class="form-control">
                <datalist id="tags">
                </datalist>
                </div>
                <div class="form-group col-md-12">
                <label>Body</label>
                <textarea class="ckeditor" name="details" id="body"></textarea>
                </div>
                <p><hr class="colorgraph"></p>
                <a href="{{ ('viewarticles') }}" class="btn btn-primary">
                <span class="fa fa-newspaper-o"></span>
                Other Articles&nbsp;
                </a>
                <div class="form-group pull-right">
                <button type="submit" class="btn btn-success">
                <span class="fa fa-check-circle"></span>
                Post Article
                </button>
                </div>

                </form>
                </div>
                </div>
                </div>
                </div>
                </div>

                      
                    <!--/span-->

                </div>
                </div>




    @include('layouts.adminfooter')
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
@endsection

