
@extends('layouts.adminlayouts')
<style type="text/css">
    #chartdiv {
  width: 100%;
  height: 435px;
  font-size: 11px;
}
</style>
@section('content')
<div class="wrapper wrapper-content">
            <div class="row">
                   <div class="col-lg-3">
                      <a href="{{url('viewassignments')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Submitted</span>
                                <h5>Assignments</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-success">{{ $assignments[0]->assignments }} <i class="fa fa-b"></i></div>
                                <small>Total Assignments</small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="{{url('manageusers')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Registered</span>
                                <h5>Students</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-inf">{{$students[0]->students}} <i class="fa fa-level-up"></i></div>
                                <small>Registered Students</small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="{{url('viewcourses')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Ongoing</span>
                                <h5>Courses</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-navy">6<i class="fa fa-level-up"></i></div>
                                <small>Active Courses</small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="{{url('chatview')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">5 New Messages</span>
                                <h5>Messages</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-danger">15 <i class="fa fa-level-down"></i></div>
                                <small>Total Inbox</small>
                            </div>
                        </div>
                      </a>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Assignment Submissions Statistics</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                   <div>
                                     <canvas id="bar-chart-grouped" width="" height=""></canvas>
                                    </div>
                                </div>
                               
                                </div>
                                </div>

                            </div>
                        </div> 
                                <div class="col-lg-4">
                                
                                <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                  <h3><strong><u>Upcoming Event Schedules</u></strong></h3>
                                </div>
                                  <div class="ibox-content">
                                <div class="row">
                              <div id="bootstrapModalFullCalendar"></div>
    
                                    </div>
                                  </div>
                                </div>
                                </div>
                                </div>
                              


                                </div>

                      
                
             

     



   



<div id="createEventModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                <h4>Add a Schedule</h4>
            </div>
            <div  class="modal-body">
                <form method="post" action="postevent">
                    {{ csrf_field() }}
              
                <div class="form-group form-inline">
                    <div class="input-group date" data-provide="datepicker">
                    
                       Schedule Start Date: <input type="text"  name="enddate" class="form-control" id="apptStartTime" placeholder="Due">
                       
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="input-group date" data-provide="datepicker">
                    
                       Schedule End Date: <input type="date"  name="enddate" class="form-control" id="apptEndTime" placeholder="Due Date mm/dd/yyyy">
                        
                    </div>
                </div>

                 <div class="form-group">
                    <input class="form-control" type="text" placeholder="Event Name" id="eventName">
                </div>

                <div class="form-group">
                    <textarea class="form-control" type="text" rows="4" placeholder="Event Description" name="description" id= "eventDescription"></textarea>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            </div>
        </div>
    </div>
</div>

<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
            
    
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script> 
<script src="{{ asset('bootstrapmodal.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() { 
    $('#bootstrapModalFullCalendar').fullCalendar({

   events:[ 

        {

        "title":"Default schedule",
        "allday":"true",
        "borderColor":"#5173DA",
        "color":"#009a46",
        "textColor":"white",
        "description":"<p>System Initialization</p>",
        "start":"2016-10-12",
        "end":"2016-10-12",
        "url":"#"
    }
        ],

        header: {
            left: '',
                center: 'prev title next',
                right: ''

        },

        defaultView: 'month',
        editable: true,
        selectable: true,

         //When u select some space in the calendar do the following:
        select: function (start, end, allDay) {
            //do something when space selected
            //Show 'add event' modal
      endtime = end.format();
      starttime = start.format();
      var mywhen = starttime + ' - ' + endtime;
      $('#createEventModal #apptStartTime').val(starttime);
      $('#createEventModal #apptEndTime').val(endtime);
      $('#createEventModal #apptAllDay').val(allDay);
      $('#createEventModal #when').text(mywhen);
      $('#createEventModal').modal('show');

        // alert(endtime);
      // console.log(endtime);
        },


        //When u drop an event in the calendar do the following:
        eventDrop: function (event, delta, revertFunc) {
            //do something when event is dropped at a new location
        },

        //When u resize an event in the calendar do the following:
        eventResize: function (event, delta, revertFunc) {
            //do something when event is resized

        },

        eventRender: function(event, element) {
            $(element).tooltip({title: event.title});             
        },



        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
        }
    });

     $('#submitButton').on('click', function(e){
         // We don't want this to act as a link so cancel the link action
            e.preventDefault();

            doSubmit();
          });

       function doSubmit(){
    $("#createEventModal").modal('hide');
    console.log($('#apptStartTime').val());
    console.log($('#apptEndTime').val());
    console.log($('#eventName').val());
    console.log($('#eventDescription').val());
    alert("form submitted");
        
    $("#bootstrapModalFullCalendar").fullCalendar('renderEvent',
        {
            title: $('#eventName').val(),
            start: new Date($('#apptStartTime').val()),
            end: new Date($('#apptEndTime').val()),
           
        },
        true);

        $.ajax({

           // title:$('#eventName').val();

              url: 'postevent',
              data: '&title='+ $('#eventName').val() + '&description='+ $('#eventDescription').val() + '&start='+ $('#apptStartTime').val() +'&end='+ $('#apptStartTime').val(),                                                    
              type: "get",
              success: function(json) {
                $( "#getReason" ).modal('hide');
                $('#mydiv').hide();
                $('body').removeClass('blockMask');//calendar.fullCalendar( 'refetchEvents');
                $('#calendar').fullCalendar('refetchEvents');
              }
});
   }
});
    
</script>

<div class="footer">
            <div class="pull-right">
                Powered by ITdolls Investments ltd.
            </div>
            <div>
                 <strong>2017 &copy; Online Resource Center<a href="https://itdolls.com">  Need any Help?</strong>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
      
<script type="text/javascript">
    new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Computing",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Science",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Management",
        borderColor: "#3cba9f",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'E-Learning Enrollment Progress By Faculty'
    }
  }
});
</script>

<script type="text/javascript">
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Computing", "Science", "Management"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
        data: [2478,5267,734]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Faculties Summarries'
      }
    }
});
</script>
<script>
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["Assignment 1", "Assignment 2", "Assignment 3", "Assignment 4"],
      datasets: [
        {
          label: "Submitted",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478,785]
        }, {
          label: "UnSubmitted",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734,256]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Assignment Submission Statistics'
      }
    }
});

</script>
<script type="text/javascript">

  $.getJSON('jobchart', function(jobsummarry){
     $.each(jobsummarry, function (month, jobs) {
    var jobscount =  [];
    var jobmonth =   [];
    var jobstatus = [];
    for (var i = 0; i < jobsummarry.length; i++) {  

        jobscount.push(jobsummarry[i].jobs);
        jobmonth.push(jobsummarry[i].month);
        // console.log(jobstatus);
    }

    var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "startDuration": 2,
  "dataProvider": [{
    "month": "January",
    "jobs": jobscount[0],
    "color": "#009a46"
  }, {
    "month": "February",
    "jobs": jobscount[1],
    "color": "#009a63"
  }, {
    "month": "March",
    "jobs": jobscount[2],
    "color": "#00949a"
  }, {
    "month": "April",
    "jobs": jobscount[3],
    "color": "#008a59"
  }, {
    "month": "May",
    "jobs": jobscount[4],
    "color": "green"
  }, {
    "month": "June",
    "jobs": jobscount[5],
    "color": "#009a46"
  }, {
    "month": "July",
    "jobs": jobscount[6],
    "color": "#009a46"
  }, {
    "month": "August",
    "jobs": jobscount[7],
    "color": "#009a46"
  }, {
    "month": "September",
    "jobs": jobscount[8],
    "color": "#0D52D1"
  }, {
    "month": "October",
    "jobs": jobscount[9],
    "color": "#2A0CD0"
  },
  {
    "month": "November",
    "jobs": jobscount[10],
    "color": "#2A0CD0"
  },
    {
    "month": "December",
    "jobs": jobscount[10],
    "color": "#2A0CD0"
  }],
  "graphs": [{
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "colorField": "color",
    "fillAlphas": 0.85,
    "lineAlpha": 0.1,
    "type": "column",
    "topRadius": 1,
    "valueField": "jobs"
  }],
  "depth3D": 40,
  "angle": 30,
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "gridAlpha": 0

  },
  "exportConfig": {
    "menuTop": "20px",
    "menuRight": "20px",
    "menuItems": [{
      "icon": '/lib/3/images/export.png',
      "format": 'png'
    }]
  }
}, 0);

jQuery('.chart-input').off().on('input change', function() {
  var property = jQuery(this).data('property');
  var target = chart;
  chart.startDuration = 0;

  if (property == 'topRadius') {
    target = chart.graphs[0];
  }

  target[property] = this.value;
  chart.validateNow();
});

   });

 });
</script>
   
<script type="text/javascript">
    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["CPA", "CICT", "MANAGEMENT", "BSINESS SECURITY", "PROJECT MANAGEMENT"],
      datasets: [
        {
          label: "Student Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Students Distribution by course'
      }
    }
});
</script>

<!-- 03 – Footer -->
<!-- Bootsrap JS -->
<!-- jQuery -->

<!-- Mainly scripts -->

    <script src="{{ asset('spiniastuff/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('spiniastuff/js/plugins/flot/flot.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/flot/spline.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/flot/resize.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/flot/pie.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/flot/symbol.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/flot/time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('spiniastuff/js/plugins/peity/peity.min.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('spiniastuff/js/inspinia.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('spiniastuff/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('spiniastuff/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('spiniastuff/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('spiniastuff/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('spiniastuff/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    {{-- <script src="{{ asset('spiniastuff/js/demo/sparkline-demo.js') }}"></script> --}}
     <!--<script src="dist/sweetalert.min.js"></script> -->
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endsection

