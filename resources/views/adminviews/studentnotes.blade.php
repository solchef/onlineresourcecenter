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
                        <!-- Left Sidebar for Course Notes -->
                        <div class="col-md-4">
                            <div class="animated fadeInRight">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="file-manager">
                                            <h4><u>@lang('Course Manuals') <small>@lang('Click to View and Download')</small></u></h4>
                                            <hr>
                                            <div>
                                                <button style="width:100%; text-align:left;"
                                                    value="{{ asset('briefs') }}/{{ $coursedata->course_brief }}"
                                                    id="course_notes" class="btn-full btn btn-xs btn-success">
                                                    {{ '1. ' }}Course
                                                    Brief</button>
                                            </div>
                                            @php($count = 2)
                                            @foreach ($coursenotes as $nts)
                                                <div>
                                                    <button style="width:100%; text-align:left;"
                                                        value="{{ asset('coursenotes') }}/{{ $nts->notes }}"
                                                        id="course_notes" class="btn-full btn btn-xs btn-primary">
                                                        {{ $count }}
                                                        {{ '. ' }} {{ $nts->notes }}
                                                        </button>
                                                </div>
                                                @php($count++)
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Course Description -->
                            <div class="">
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
                        <div class="col-lg-8">
                            <div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="pull-left">
                                            <button id="prev" class="btn btn-success btn-sm">@lang('Previous')</button>
                                            <button id="next" class="btn btn-success btn-sm">@lang('Next')</button>
                                            &nbsp; &nbsp;
                                            <span>@lang('Page'): <span id="page_num"></span> / <span
                                                    id="page_count"></span></span>
                                            <a href="#" id="download-link" class="btn btn-primary btn-sm"
                                                download>@lang('Download PDF')</a>
                                        </div>
                                        <canvas id="pdfCanvas" style=" width:100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.3.122/pdf.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            let defaultPdfUrl = "{{ asset('briefs') }}/{{ $coursedata->course_brief }}", // Default PDF URL
                pageNum = 1, // The current page number
                scale = 1.5, // Adjust the scale to control the zoom level
                canvas = document.getElementById('pdfCanvas'),
                ctx = canvas.getContext('2d'),
                pdfDoc = null; // Holds the PDF document

            // Function to render a page
            function renderPage(num) {
                pdfDoc.getPage(num).then(function(page) {
                    const viewport = page.getViewport({
                        scale: scale
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    page.render(renderContext);

                    // Update page counters
                    document.getElementById('page_num').textContent = num;
                });
            }

            // Load the default PDF on page load
            function loadPdf(url) {
                pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    document.getElementById('page_count').textContent = pdfDoc.numPages;
                    pageNum = 1; // Always start at the first page when loading a new document
                    renderPage(pageNum); // Render the first page of the loaded PDF
                }).catch(function(error) {
                    console.error("Error loading PDF: ", error);
                });
            }

            // Load the default PDF when the page loads
            loadPdf(defaultPdfUrl);

            // Event listener for clicking a course note button
            $(document).on('click', '#course_notes', function() {
                const url = $(this).val(); // Get the URL from the button's value attribute
                if (url) {
                    $('#download-link').attr('href', url); // Set the download link to the selected PDF URL
                    loadPdf(url); // Load the clicked PDF
                } else {
                    console.error("No URL found for the selected PDF.");
                }
            });

            // Navigate to the previous page
            $('#prev').on('click', function() {
                if (pageNum <= 1) return;
                pageNum--;
                renderPage(pageNum);
            });

            // Navigate to the next page
            $('#next').on('click', function() {
                if (pageNum >= pdfDoc.numPages) return;
                pageNum++;
                renderPage(pageNum);
            });
        });
    </script>

    @include('layouts.adminfooter')
@endsection
