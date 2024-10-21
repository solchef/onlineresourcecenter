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
                      <a href="{{url('manageusers')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">@lang('Registered')</span>
                                <h5>@lang('Students')</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-inf">{{$students[0]->students}}</div>
                                <small>@lang('Registered Students')</small>
                            </div>
                        </div>
                      </a>
                    </div>

                    <div class="col-lg-3">
                      <a href="{{url('viewpayments')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Paid</span>
                                <h5>Fees</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-success">USD {{$totalpaid}}</div>
                                <small>Total Paid</small>
                            </div>
                        </div>
                      </a>
                    </div>

                    <div class="col-lg-3">
                      <a href="{{url('viewbalances')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">UnPaid</span>
                                <h5>Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-success">USD {{ $balance }}</div>
                                <small>Unpaid Balance</small>
                            </div>
                        </div>
                      </a>
                      <!-- mysqldump -uroot -h localhost -p enterprisesms > /var/www/html/dbase.sql -->
                                    
                      <!-- !Td07s3 -->

            </div>

                    <div class="col-lg-3">
                      <a href="{{url('viewbalances')}}">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">With arrears</span>
                                <h5>Students</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-success"> {{$arr}}</div>
                                <small>Total Students</small>
                            </div>
                        </div>
                      </a>
                    </div>

        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>@lang('Student Distribution Chart')</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <b>@lang('Calender Schedule')</b>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-8">
                                  <canvas id="line-chart" width="" height=""></canvas>
                                </div>
                                <div class="col-lg-4">
                                  <h3><strong><u>@lang('Upcoming Event Schedules')</u></strong></h3>
                                  <hr>
                              <div id="bootstrapModalFullCalendar"></div>
    
                                    </div>
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
                Powered by Crispecol Limited.
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
        label: "Certificate",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Diploma",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "PostGraduate",
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
      labels: ["Certificate", "Diploma", "Post-Graduate"],
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

                 <script type="text/javascript">
  $(document).ready(function(){


    var url = {!! json_encode(url('/nots')) !!};
    count = 0;
    //display modal form for task editing
   $.get(url, function (data) {
        // console.log(data);
        count = data.length;
        // console.log(count);
              cnt = $('#notcount');
              cnt.append(count);
              nots = $('#notificationsboard');

           for(var i=0;i<data.length;i++){
              
             // console.log(data.notification);
                nots.append($(
                   
      '<li><div class="dropdown-messages-box"> <i class="fa fa-bell"></i> <div class="media-body"> <small class="pull-right"></small><strong>'+data[i].notification+' </strong> <br> <small class="text-muted">'+data[i].created_at+'</small> </div> </div></li> <li class="divider"></li> '
       ));
                        }
     }) ;


});

    </script>
@endsection

