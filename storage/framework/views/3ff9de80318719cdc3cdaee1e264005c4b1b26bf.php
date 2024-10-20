<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">
         <div class="row"">
                    <div class="col-lg-3">
                      <a href="<?php echo e(url('viewreferences')); ?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-danger pull-right">3 New</span> -->
                                <h5><i class="fa fa-rouble"></i> <?php echo app('translator')->getFromJson('View References'); ?> </h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-success">9 </div>
                                <small><?php echo app('translator')->getFromJson('References'); ?></small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="<?php echo e(url('studentnotes')); ?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-danger pull-right">2 New</span> -->
                                <h5><i class="fa fa-book"></i> <?php echo app('translator')->getFromJson('Notes'); ?></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-info"><?php echo e($notes[0]->notes); ?></div>
                                <small> <?php echo app('translator')->getFromJson('Notes Uploaded'); ?></small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="<?php echo e(url('viewassignments')); ?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-danger pull-right"><?php echo e($assignments[0]->assignments - $sub[0]->counter); ?> Pending</span> -->
                                <h5> <i class="fa fa-quora"></i> <?php echo app('translator')->getFromJson('Assignments'); ?></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-navy"><?php echo e($assignments[0]->assignments); ?></div>
                                <small><?php echo app('translator')->getFromJson('Total assignments'); ?></small>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="<?php echo e(url ('studentstatement')); ?>/<?php echo e(Auth::user()->id); ?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right"></span>
                                <h5><i class="fa fa-briefcase"></i> <?php echo app('translator')->getFromJson('Fees'); ?></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>  
                                <div class="stat-percent font-bold text-danger"> <?php echo e($feebal); ?> </div>
                                <small><?php echo app('translator')->getFromJson('Current Balance'); ?></small>
                            </div>
                        </div>
                      </a>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               <h3><strong><u><i class="fa fa-list"></i> <?php echo app('translator')->getFromJson('My Course'); ?></u></strong></h3>
                                
                           
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                          <h5><?php echo app('translator')->getFromJson('Welcome'); ?> <?php echo e(Auth::user()->name); ?></h5>

           <div id="myTabContent" class="tab-content">
               <ol class="nav nav-pills nav-stacked main-menu">
             
                         
                        
                            <a href="<?php echo e(url('studentnotes')); ?>"><i class=""></i><span style="color: #3c763d">  <b> <?php echo e($cou->course_code); ?> - <?php echo e($cou->course_name); ?> </b></span></a>
                            <ul class="nav nav-pills nav-stacked">
                               
                   <H5><u><?php echo app('translator')->getFromJson('OVERVIEW'); ?></u></H5>
                      <li><?php echo e($cou->description); ?></li>
                                     
                            </ul>
                       
                        <br>         
                 
                </ol>                          
               </div>
                                </div>
                                </div>

                            </div>
                        </div>

                    <div class="col-lg-4">
                                
                                <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                  <h3><strong><u><i class="fa fa-clock-o"></i> <?php echo app('translator')->getFromJson('My Schedules'); ?></u></strong></h3>
                                </div>
                                  <div class="ibox-content">
                                <div class="row">
                                  <table class="table">
                                    <th><?php echo app('translator')->getFromJson('Date'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Type'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Description'); ?></th>
                                    <tbody>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($sch->start); ?></td>
                                      <?php if($sch->type == 1): ?>
                                      <td>Assignment</td>
                                      <?php else: ?>
                                      <td>Other</td>
                                      <?php endif; ?>
                                      <td><?php echo e($sch->description); ?></td>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tr>
                                  </tbody>
                                  </table>
    
                                    </div>
                                  </div>
                                </div>
                      </div>


                    <div class="col-lg-4" ">
                        <div class="ibox float-e-margins">
                               <li class="dropdown pull-right" style="list-style-type: none; margin-top: 18px; margin-right: 5px;">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                      <i class="fa fa-users"></i>  <?php echo app('translator')->getFromJson('Members'); ?> (<?php echo e($memcount); ?>)   <span class="label label-success" id="notcount"></span>
                    </a>
                    <ul class="dropdown-menu " style="list-style-type: disc; list-style-position: inside;">

                      <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($mem->name); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                    </ul>
                </li>
                            <div class="ibox-title">
                               <h3><strong><u><i class="fa fa-weixin"></i> <?php echo app('translator')->getFromJson('Study Group Chat'); ?> </u><br> </strong>(<?php echo e($chatscount); ?> Messages)</h3>
        
                            </div>
                            <div class="ibox-content">
                                <div class="row" id="messages" style="height: 250px; overflow: scroll;">
                              
                               <div style="" class=" alert alert-success col-md-9">
                                 <p><?php echo app('translator')->getFromJson('Hey there, It seems there is no conversation in your group. Start a conversation to for your group members to join.'); ?> <br>
                                    <span style="color: grey;"><?php echo app('translator')->getFromJson('Today'); ?> - Online Resource Center</span></p>
                                   
                             </div>

                             
                            <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($chat->sender == Auth::user()->id): ?>
                            <div style="" class="pull-right alert alert-warning col-md-8 col-md-offset-1">
                                 <p><?php echo e($chat->message); ?> <br>
                                    <span style="color: grey;"><?php echo e($chat->created_at); ?> - <?php echo e($chat->name); ?></span></p>
                                   
                             </div>
                             <?php else: ?>
                               <div class="alert alert-danger col-md-8">
                                  <p><?php echo e($chat->message); ?> <br>
                                    <span style="color: grey;"><?php echo e($chat->created_at); ?> - <?php echo e($chat->name); ?></span></p>
                                     
                             </div>

                             <?php endif; ?>
                             
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                                  
                                
                                </div>
                                </div>
                                <form method="post" action="<?php echo e(url('groupchat')); ?>">
                                  <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                  <label><?php echo app('translator')->getFromJson('Type Message'); ?></label>
                                <textarea class="form-control" name="message" autofocus placeholder="Type Message">
                                    
                                  </textarea>
                                </div>
                                  <br>
                                <a href="<?php echo e(url('home')); ?>" class="btn btn-success btn-sm"><?php echo app('translator')->getFromJson('Refresh'); ?></a>
                                 <button type="submit" href="#" class="btn btn-primary btn-sm pull-right"><?php echo app('translator')->getFromJson('Send Message'); ?></button>
                               </form>
                            </div>

                </div>
                                

                                </div>
                              


                                </div>

                      
<div id="createEventModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only"><?php echo app('translator')->getFromJson('close'); ?></span></button>
                <h4><?php echo app('translator')->getFromJson('Add a Schedule'); ?></h4>
            </div>
            <div  class="modal-body">
                <form method="post" action="postevent">
                    <?php echo e(csrf_field()); ?>

              
                <div class="form-group form-inline">
                    <div class="input-group date" data-provide="datepicker">
                    
                       <?php echo app('translator')->getFromJson('Schedule Start Date'); ?>: <input type="text"  name="enddate" class="form-control" id="apptStartTime" placeholder="Due">
                       
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="input-group date" data-provide="datepicker">
                    
                       <?php echo app('translator')->getFromJson('Schedule End Date'); ?>: <input type="date"  name="enddate" class="form-control" id="apptEndTime" placeholder="Due Date mm/dd/yyyy">
                        
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
                <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo app('translator')->getFromJson('Cancel'); ?></button>
                <button type="submit" class="btn btn-primary" id="submitButton"><?php echo app('translator')->getFromJson('Save'); ?></button>
            </div>
        </div>
    </div>
</div>

<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only"><?php echo app('translator')->getFromJson('close'); ?></span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('Close'); ?></button>
                
            </div>
        </div>
    </div>
</div>
            
    
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script> 
<script src="<?php echo e(asset('bootstrapmodal.min.js')); ?>"></script>
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
                Powered by  <a href="http://www.decasys.co.ke">Decasys Solutions</a>
            </div>
            <div>
                 <strong>2017 &copy; Online Resource Center<a href="https://www.decasys.co.ke">  Need any Help?</strong>
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

    <script src="<?php echo e(asset('spiniastuff/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Flot -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/flot.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/spline.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/resize.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/pie.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/symbol.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/flot/time.js')); ?>"></script>

    <!-- Peity -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/peity/peity.min.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/demo/peity-demo.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('spiniastuff/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <!-- Jvectormap -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('spiniastuff/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>

    <!-- EayPIE -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/easypiechart/jquery.easypiechart.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(asset('spiniastuff/js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo e(asset('spiniastuff/js/demo/sparkline-demo.js')); ?>"></script>
     <!--<script src="dist/sweetalert.min.js"></script> -->
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
          $('#messages').scrollTop($('#messages')[0].scrollHeight);
        </script>

                 <script type="text/javascript">
  $(document).ready(function(){


    var url = <?php echo json_encode(url('/nots')); ?>;
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>