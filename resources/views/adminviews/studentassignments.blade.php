
@extends('layouts.adminlayouts')
<style type="text/css">
    .cssload-loading {
    position: absolute;
    left: 30%;
    width: 19px;
    height: 19px;
    top: 95px;
    transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
}
.cssload-loading .cssload-dot {
    position: absolute;
    border-radius: 50%;
    left: 1px;
    top: 1px;
    width: 18px;
    height: 18px;
    background: red;
    animation: cssload-spin 2.88s 0s infinite both;
        -o-animation: cssload-spin 2.88s 0s infinite both;
        -ms-animation: cssload-spin 2.88s 0s infinite both;
        -webkit-animation: cssload-spin 2.88s 0s infinite both;
        -moz-animation: cssload-spin 2.88s 0s infinite both;
}
.cssload-loading .cssload-dot2 {
    position: absolute;
    border-radius: 50%;
    width: 19px;
    height: 19px;
    background: green;
    animation: cssload-spin2 2.88s 0s infinite both;
        -o-animation: cssload-spin2 2.88s 0s infinite both;
        -ms-animation: cssload-spin2 2.88s 0s infinite both;
        -webkit-animation: cssload-spin2 2.88s 0s infinite both;
        -moz-animation: cssload-spin2 2.88s 0s infinite both;
}




@keyframes cssload-spin {
    0%, 100% {
        box-shadow: 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0);
    }
    50% {
        transform: rotate(180deg);
    }
    25%, 75% {
        box-shadow: 27px 0 0 rgb(0,0,0), -27px 0 0 rgb(0,0,0), 0 27px 0 rgb(0,0,0), 0 -27px 0 rgb(0,0,0), 19px -19px 0 rgb(0,0,0), 19px 19px 0 rgb(0,0,0), -19px -19px 0 #000, -19px 19px 0 #000;
    }
    100% {
        transform: rotate(360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-o-keyframes cssload-spin {
    0%, 100% {
        box-shadow: 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0);
    }
    50% {
        -o-transform: rotate(180deg);
    }
    25%, 75% {
        box-shadow: 27px 0 0 rgb(0,0,0), -27px 0 0 rgb(0,0,0), 0 27px 0 rgb(0,0,0), 0 -27px 0 rgb(0,0,0), 19px -19px 0 rgb(0,0,0), 19px 19px 0 rgb(0,0,0), -19px -19px 0 #000, -19px 19px 0 #000;
    }
    100% {
        -o-transform: rotate(360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-ms-keyframes cssload-spin {
    0%, 100% {
        box-shadow: 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0);
    }
    50% {
        -ms-transform: rotate(180deg);
    }
    25%, 75% {
        box-shadow: 27px 0 0 rgb(0,0,0), -27px 0 0 rgb(0,0,0), 0 27px 0 rgb(0,0,0), 0 -27px 0 rgb(0,0,0), 19px -19px 0 rgb(0,0,0), 19px 19px 0 rgb(0,0,0), -19px -19px 0 #000, -19px 19px 0 #000;
    }
    100% {
        -ms-transform: rotate(360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-webkit-keyframes cssload-spin {
    0%, 100% {
        box-shadow: 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0);
    }
    50% {
        -webkit-transform: rotate(180deg);
    }
    25%, 75% {
        box-shadow: 27px 0 0 rgb(0,0,0), -27px 0 0 rgb(0,0,0), 0 27px 0 rgb(0,0,0), 0 -27px 0 rgb(0,0,0), 19px -19px 0 rgb(0,0,0), 19px 19px 0 rgb(0,0,0), -19px -19px 0 #000, -19px 19px 0 #000;
    }
    100% {
        -webkit-transform: rotate(360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-moz-keyframes cssload-spin {
    0%, 100% {
        box-shadow: 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0), 0 0 0 rgb(0,0,0);
    }
    50% {
        -moz-transform: rotate(180deg);
    }
    25%, 75% {
        box-shadow: 27px 0 0 rgb(0,0,0), -27px 0 0 rgb(0,0,0), 0 27px 0 rgb(0,0,0), 0 -27px 0 rgb(0,0,0), 19px -19px 0 rgb(0,0,0), 19px 19px 0 rgb(0,0,0), -19px -19px 0 #000, -19px 19px 0 #000;
    }
    100% {
        -moz-transform: rotate(360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@keyframes cssload-spin2 {
    0%, 100% {
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
    50% {
        transform: rotate(-180deg);
    }
    25%, 75% {
        box-shadow: 51px 0 0 #000, -51px 0 0 #000, 0 51px 0 #000, 0 -51px 0 #000, 37px -37px 0 #000, 37px 37px 0 #000, -37px -37px 0 #000, -37px 37px 0 #000;
        background: transparent;
    }
    100% {
        transform: rotate(-360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-o-keyframes cssload-spin2 {
    0%, 100% {
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
    50% {
        -o-transform: rotate(-180deg);
    }
    25%, 75% {
        box-shadow: 51px 0 0 #000, -51px 0 0 #000, 0 51px 0 #000, 0 -51px 0 #000, 37px -37px 0 #000, 37px 37px 0 #000, -37px -37px 0 #000, -37px 37px 0 #000;
        background: transparent;
    }
    100% {
        -o-transform: rotate(-360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-ms-keyframes cssload-spin2 {
    0%, 100% {
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
    50% {
        -ms-transform: rotate(-180deg);
    }
    25%, 75% {
        box-shadow: 51px 0 0 #000, -51px 0 0 #000, 0 51px 0 #000, 0 -51px 0 #000, 37px -37px 0 #000, 37px 37px 0 #000, -37px -37px 0 #000, -37px 37px 0 #000;
        background: transparent;
    }
    100% {
        -ms-transform: rotate(-360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-webkit-keyframes cssload-spin2 {
    0%, 100% {
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
    50% {
        -webkit-transform: rotate(-180deg);
    }
    25%, 75% {
        box-shadow: 51px 0 0 #000, -51px 0 0 #000, 0 51px 0 #000, 0 -51px 0 #000, 37px -37px 0 #000, 37px 37px 0 #000, -37px -37px 0 #000, -37px 37px 0 #000;
        background: transparent;
    }
    100% {
        -webkit-transform: rotate(-360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}

@-moz-keyframes cssload-spin2 {
    0%, 100% {
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
    50% {
        -moz-transform: rotate(-180deg);
    }
    25%, 75% {
        box-shadow: 51px 0 0 #000, -51px 0 0 #000, 0 51px 0 #000, 0 -51px 0 #000, 37px -37px 0 #000, 37px 37px 0 #000, -37px -37px 0 #000, -37px 37px 0 #000;
        background: transparent;
    }
    100% {
        -moz-transform: rotate(-360deg);
        box-shadow: 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000, 0 0 0 #000;
    }
}
</style>
@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>View Course Notes</h5>
        </div>
         <div class="ibox-content">

            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                               @if(Auth::user()->roleid == 1)
                               <h2 class="no-margins">
                                    {{$units->unit_code}}
                                </h2>
                                <h4>{{$units->unit_name}}</h4>
                                <small>
                                  {{ $units->description }}
                                </small>
                                <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="faculty">
                                    <option value="">Select Course</option>
                                    @foreach($target as $tar)
                                     <option value="{{$tar->id}}">{{$tar->course_name}}</option>
                                   @endforeach
                                </select>
                               </div>
                               @endif
                                <div class="hr-line-dashed"></div>
                               <h4>My Unit Folders<small>(click on a folder to view its files)</small></h4>
                                <div class="hr-line-dashed"></div>
                                @foreach($units as $unit)
                                    <input type="radio" name="id" id="unitId" value="{{$unit->id}}">{{$unit->unit_name}}<br>
                                @endforeach
                                
                           
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 animated fadeInRight">
                    <div class="row">
                        <div class="cssload-loading" id="jawiwyloader">
    <div class="cssload-dot"></div>
    <div class="cssload-dot2"></div>
</div>
                        <div class="col-lg-12" id="notessection">
                
   
             
                <table class="table table-responsive table-stripped">
                <th>Assignment Unit</th>
                <th>Assignment</th>
                 <th>Deadline</th>
                  <th>Submit</th>
                  <th>Download</th>
                 <th>View</th>
     
               
  

             <tbody id="assignments">
                     
                 </tbody>
             </table>
                         
                      

                        </div>
                    </div>
                    </div>

            </div>
           

      
    <!--/span-->

     

</div>
</div>
</div>
</div>



    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
                    <h4 class="modal-title">Reference Details</h4>
                
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body recordId" hidden >
                            
                        </div>
                       
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


      @include('layouts.adminfooter')
    <script type="text/javascript">
        $(document) .ready(function(){
        $('#jawiwyloader').hide();
    $(document) .on('click','#unitId',function(){
           $('#jawiwyloader').show();
        $('#assignments').empty();
    var unit=$(this).val();
    var div=$(this).parent();
    var op=" ";
    var opp=" ";

    $.ajax ({
        type:'get',
        url:'{!!URL::to('assignmentsnavigation')!!}',
        data:{'id':unit},
        // dataType:'json',
        success:function(data){
               $('#jawiwyloader').hide();
        // console.log('success');
        // console.log(data);
        // console.log(data.length);
           if (data.length > 0) {
             $tr = $('#assignments'); 
      for(var i=0;i<data.length;i++){

         console.log(data);
               $tr.append($('<tr><td>'+i+' </td><td>'+data[i].unit_name+' </td><td>'+data[i].uploadassignment+' </td><td>'+data[i].submitby+' </td><td> <a href="submitassignment/'+data[i].id+'" <button  class="btn btn-xs btn-success">Full Profile</button></a> </td><td>  <button  class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalActivate">Delete</button> </td></tr>'));
            

           
        }



    }

     else{

                op+='<p>There are no assignments Uploaded Yet for this unit. Pease Consult with Your Instructor';
            }

     $('#notessection').append(op);
     
    
    },
    error:function(){

    }
    });
        $(document) .on('click','#sendmessage',function(){
            var recepient = persons;

           alert(recepient);

        $.ajax({

              url: 'createchat',
              data: '&message='+ $('#messagename').val() + '&id='+ (persons)  ,                                                    
              type: "get",
              success: function(json) {
                 document.getElementById("messagename").value='';
              }
                    });
                });

        });

                
        });
    </script>
@endsection

