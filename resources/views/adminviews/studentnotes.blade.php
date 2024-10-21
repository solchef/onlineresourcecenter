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
                        <!-- Sidebar with Course Manuals and Description -->
                        <div class="col-md-4">
                            <div class="col-lg-12 animated fadeInRight">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="file-manager">
                                            <h4><u>@lang('Course Manuals') <small>@lang('Click to View and Download')</small></u></h4>
                                            <hr>
                                            <ol style="list-style-type:none;">
                                                <!-- Course Brief -->
                                                <li>
                                                    <button value="{{ asset('briefs') }}/{{ $coursedata->course_brief }}"
                                                        id="course_notes"
                                                        class="col-md-12 btn btn-xs btn-success">{{ $coursedata->course_brief }}</button>
                                                </li>

                                                <!-- Additional Course Notes -->
                                                @foreach ($coursenotes as $nts)
                                                    <li>
                                                        <button value="{{ asset('coursenotes') }}/{{ $nts->notes }}"
                                                            id="course_notes"
                                                            class="col-md-12 btn btn-xs btn-primary">{{ $nts->notes }}</button>
                                                    </li>
                                                @endforeach
                                            </ol>
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
                                            <h5>Course Code: {{ $coursedata->course_code }}</h5>
                                            <h5>Course Name: {{ $coursedata->course_name }}</h5>
                                            <p>{{ $coursedata->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content Area for PDF Viewer -->
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="pull-left">
                                        <!-- PDF Controls -->
                                        <button id="prev" class="btn btn-success btn-sm">@lang('Previous')</button>
                                        <button id="next" class="btn btn-success btn-sm">@lang('Next')</button>
                                        &nbsp;&nbsp;
                                        <span>@lang('Page'): <span id="page_num"></span> / <span id="page_count"></span></span>
                                        <a href="#" id="download-link" class="btn btn-primary btn-sm" download>@lang('Download PDF')</a>
                                    </div>
                                    <!-- Canvas for Rendering PDF Pages -->
                                    <canvas id="the-canvas" style="border:1px solid black; width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the PDF.js library from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.3.122/pdf.min.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 1.5,  // Adjust the scale for larger PDFs
                canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d');

            function renderPage(num) {
                pageRendering = true;
                pdfDoc.getPage(num).then(function(page) {
                    let viewport = page.getViewport({scale: scale});
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    let renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    let renderTask = page.render(renderContext);

                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                document.getElementById('page_num').textContent = num;
            }

            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);
            }

            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);
            }

            document.getElementById('prev').addEventListener('click', onPrevPage);
            document.getElementById('next').addEventListener('click', onNextPage);

            document.getElementById('course_notes').addEventListener('click', function() {
                let url = this.value;

                document.getElementById('download-link').href = url;

                let loadingTask = pdfjsLib.getDocument(url);
                loadingTask.promise.then(function(pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    document.getElementById('page_count').textContent = pdfDoc.numPages;
                    renderPage(pageNum);
                });
            });
        });
    </script>
@endsection
