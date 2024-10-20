
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row" style="margin-top: 0px;">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>@lang('Course Notes')</h5>
              
        </div>
         <div class="ibox-content">

            <div class="row">
                <div class="col-md-4" >

              <div class="col-lg-12 animated fadeInRight">
                    <div class="row">

                        <div class="col-lg-12">
                
   
             
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">

                            

                            <h4><u>@lang('Course Manuals') <small>@lang('Click to View and Download')</small></u></h4>
                            <hr>
                            <ol style="list-style-type:none; ">
                                <li>
                                    <button  value="{{ asset('briefs') }}/{{$coursedata->course_brief}}" id="course_notes" class="col-md-12  btn btn-xs btn-success">{{$coursedata->course_brief}}</button>
                                </li>
                                @foreach($coursenotes as $nts)
                            <li>

                                <button value="{{ asset('coursenotes') }}/{{$nts->notes}}" id="course_notes"  class="col-md-12 btn btn-xs btn-primary">{{ $nts->notes }}</button>
                           
                           </li>
                                @endforeach
               

                         </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                         
                      

                        </div>
                    </div>
                    </div>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">

                            

                            <h4><u>@lang('Course Description')</u></h4>
                            <hr>
                            <h5>Course Code: {{ $coursedata->course_code}}</h5>
                            <h5>Course Name: {{ $coursedata->course_name}}</h5>
                            <p>
                                {{ $coursedata->description }}
                            </p>
                           
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <div class="col-lg-8" >
                  <div class="ibox float-e-margins" >

                        <div class="ibox-content" >
                                   <div class="pull-left">
                  <button id="prev" class="btn btn-success btn-sm">@lang('Previous')</button>
                  <button id="next" class="btn btn-success btn-sm">@lang('Next')</button>
                  &nbsp; &nbsp;
                  <span>@lang('Page'): <span id="page_num"></span> / <span id="page_count"></span></span>
                   <a href="#" id="download-link" class="btn btn-primary btn-sm" download >@lang('Download PDF')</a>
                </div>
                <canvas id="the-canvas"  ></canvas>
                    </div>
                </div>
            </div>

            </div>

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
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
      <script type="text/javascript">
$(document) .ready(function(){
$(document) .on('click','#course_notes',function(){

    $val = $(this).val();

    // alert($val);
         // If absolute URL from the remote server is provided, configure the CORS
// header on that server.
$('#download-link').attr('href',$val);
var url = $val;

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1.2,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport(scale);
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});
});
});
</script>

@endsection

