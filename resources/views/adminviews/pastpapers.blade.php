
@extends('layouts.adminlayouts')
<style type="text/css">
    body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>
@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Upload Past Papers</h5>
        </div>
        <div class="ibox-content">
            <form role="form" method="post" action="{{ url('uploadpapers') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Past Paper Name</label>
                         <input type="text" name="papername" class="form-control" id="message" placeholder="Type Paper Name" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target Course</label>
                       <select class="form-control" name="targetgroup">
                           <option value="">Select Target Course</option>
                          @foreach($target as $tar)
                             <option value="{{$tar->id}}">{{$tar->course_name}}</option>
                          @endforeach
                           </select>
                    </div>

                 <div class="form-group">
                     <div class="file-upload">
                  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Past Papers</button>

                  <div class="image-upload-wrap">
                    <input class="file-upload-input" name="videofile" type='file' multiple onchange="readURL(this);" accept=".pdf,.doc"/>
                    <div class="drag-text">
                      <h3>Drag and drop a file or select add File</h3>
                    </div>
                  </div>
                  <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                    <div class="image-title-wrap">
                      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Paper</span></button>
                    </div>
                  </div>
                </div>
                 </div>
                  
                    <button type="Submit" class="btn btn-lg blue-bg">Submit</button>
                    
                </form>
 
                     </div>
                 </div>
              </div>

      
    <!--/span-->

     
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
        function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[1].name);
    };

    reader.readAsDataURL(input.files[1]);
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});

    </script>
@endsection

