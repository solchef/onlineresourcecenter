<div class="footer">
    
    <div>
        <strong>2022 &copy; ONLINE RESOURCE CENTER<a href="https://capacityafrica.com"> Need any Help?</a></strong>
    </div>
</div>




<!-- 03 – Footer -->
<!-- Bootsrap JS -->
<!-- jQuery -->

<!-- Mainly scripts -->

<script src="<?php echo e(asset('spiniastuff/js/jquery-3.1.1.min.js')); ?>"></script>
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

<!--<script src="dist/sweetalert.min.js"></script> -->
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>



<meta name="_token" content="<?php echo csrf_token(); ?>" />
<div class="modal fade" id="jobsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Job Details</h4>
            </div>
            <div class="modal-body">
                <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Job Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error " id="task_id" name="task"
                                placeholder="Task" value="Sparaying">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Job Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " id="job_type" name="description"
                                placeholder="Description" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Client Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " id="clientname" name="description"
                                placeholder="Description" value="">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-large" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">Close</span></button>

            </div>
        </div>
    </div>
</div>
    <script type = "text/javascript">

        $('#myModalActivate').on('show.bs.modal', function(e) {
            var $modal = $(this),
                esseyId = e.relatedTarget.id;
            $modal.find('.recordId').html(
                function() {
                    return "<input class='form-control'  name='recordID' type='text'  value=" + esseyId + ">";
                });


        });

    $('#myModalEdit').on('show.bs.modal', function(e) {
        var $modal = $(this),
            esseyId = e.relatedTarget.id;
        $modal.find('.recordId').html(
            function() {
                return "<input class='form-control'  name='recordID' type='text'  value=" + esseyId + ">";
            });


    });

    $(document).ready(function() {

        var url = "/PROLEARN/public/assdet";
        //display modal form for task editing
        $('.open-modal').click(function() {
            var task_id = $(this).val();

            $.get(url + '/' + task_id, function(data) {
                //success data
                console.log(data);
                $('#task_id').val(data.id);
                $('#job_type').val(data.submissionname);
                $('#clientname').val(data.assfile);


                $('#btn-save').val("update");

                $('#jobsModal').modal('show');
            })
        });

        //display modal form for creating new task
        $('#btn-add').click(function() {
            $('#btn-save').val("add");
            $('#frmTasks').trigger("reset");
            $('#jobsModal').modal('show');

        });

        //delete task and remove it from list
        $('.delete-task').click(function() {
            var task_id = $(this).val();

            $.ajax({

                type: "DELETE",
                url: url + '/' + task_id,
                success: function(data) {
                    console.log(data);

                    $("#task" + task_id).remove();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        //create new task / update existing task
        $("#btn-save").click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault();

            var formData = {
                task: $('#task').val(),
                description: $('#description').val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();

            var type = "POST"; //for creating new resource
            var task_id = $('#task_id').val();;
            var my_url = url;

            if (state == "update") {
                type = "PUT"; //for updating existing resource
                my_url += '/' + task_id;
            }

            console.log(formData);

            $.ajax({

                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' +
                        data.task + '</td><td>' + data.description + '</td><td>' + data
                        .created_at + '</td>';
                    task +=
                        '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' +
                        data.id + '">Edit</button>';
                    task +=
                        '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' +
                        data.id + '">Delete</button></td></tr>';

                    if (state == "add") { //if user added a new record
                        $('#tasks-list').append(task);
                    } else { //if user updated an existing record

                        $("#task" + task_id).replaceWith(task);
                    }

                    $('#frmTasks').trigger("reset");

                    $('#jobsModal').modal('hide')
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        (function($) {
            $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');

            $('.tab ul.tabs li a').click(function(g) {
                var tab = $(this).closest('.tab'),
                    index = $(this).closest('li').index();

                tab.find('ul.tabs > li').removeClass('current');
                $(this).closest('li').addClass('current');

                tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index +
                    ')').slideUp();
                tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

                g.preventDefault();
            });
        })(jQuery);

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#coursecategory', function() {

            // alert("success")
            $('#coursename').empty();

            var studentid = $(this).val();
            var div = $(this).parent();
            var op = " ";

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('getcourses'); ?>',
                data: {
                    'id': studentid
                },
                // dataType:'json',
                success: function(data) {
                    // console.log('success');
                    // console.log(data);
                    // console.log(data.length);

                    op += '<option value="0" selected disabled>Select the Course</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].course_name +
                            '</option>';
                    }

                    $('#coursename').append(op)
                    // div.find('#coursename').html(" ");
                    // div.find('#coursename').append(op);

                },
                error: function() {

                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#coursefaculty', function() {

            // alert("success")
            $('#courselist').empty();

            var studentid = $(this).val();
            var div = $(this).parent();
            var op = " ";

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('getlist'); ?>',
                data: {
                    'id': studentid
                },
                // dataType:'json',
                success: function(data) {
                    // console.log('success');
                    // console.log(data);
                    // console.log(data.length);

                    op += '<option value="0" selected disabled>Select the Course</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].course_name +
                            '</option>';
                    }

                    $('#courselist').append(op)
                    // div.find('#coursename').html(" ");
                    // div.find('#coursename').append(op);

                },
                error: function() {

                }
            });
        });

    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>

<script type="text/javascript">
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            datasets: [{
                data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                label: "Certificate",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                label: "Diploma",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
                label: "PostGraduate",
                borderColor: "#3cba9f",
                fill: false
            }]
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
   
</script>
<script>
  
</script>

<script type="text/javascript">
 
</script>

<script type="text/javascript">
    $(document).ready(function() {


        //display modal form for task editing
        $('.manage-user').click(function() {
            // alert("jawiwy");
            var task_id = $(this).val();


            srcfile = $(this).val();

            alert(srcfile);

            $('#delete-user').attr('src', srcfile);

            $('#manageuser').modal('show');
        })
    });



    //display modal form for creating new task
</script>

<script src="spiniastuff/js/plugins/steps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="spiniastuff/js/plugins/validate/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {


        var url = <?php echo json_encode(url('/nots')); ?>;
        count = 0;
        //display modal form for task editing
        $.get(url, function(data) {
            // console.log(data);
            count = data.length;
            // console.log(count);
            cnt = $('#notcount');
            cnt.append(count);
            nots = $('#notificationsboard');

            for (var i = 0; i < data.length; i++) {

                // console.log(data.notification);
                nots.append($(



                    '<li><div class="dropdown-messages-box"> <i class="fa fa-bell"></i> <div class="media-body"> <small class="pull-right"></small><strong>' +
                    data[i].notification + ' </strong> <br> <small class="text-muted">' + data[
                        i].created_at + '</small> </div> </div></li> <li class="divider"></li> '
                ));
            }
        });


    });
</script>
<?php /**PATH C:\xampp\htdocs\onlineresource\resources\views/layouts/adminfooter.blade.php ENDPATH**/ ?>