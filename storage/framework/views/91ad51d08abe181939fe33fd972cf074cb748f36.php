<?php $__env->startSection('content'); ?>



<div class="wrapper wrapper-content animated fadeInRight">
  
    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted"></small>
                         Chat room


                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion" id="outgoing">

                               

                                 


                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">


                                    <div class="users-list">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a4.jpg" alt="" >
                                            <div class="chat-user-name">
                                                <input type="radio" name="radio" id="chatperson" value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?>

                                                
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     


                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                        
                            <input type="hidden" name="chatrecipient" id="chatrecipient">
                            <div class="col-lg-7">
                                <div class="chat-message-form">

                                    <div class="form-group">

                                        <textarea class="form-control message-input" id="messagename" name="messagename" placeholder="Enter message text"></textarea>
                                    </div>

                                </div>
                            </div>

                            <button type="Submit" id="sendmessage" class="btn btn-success btn-xl ">Send</button>
                        
                        </div>


                    </div>
                          <div class="small-chat-box fadeInRight animated">

        <div class="heading" draggable="true">
            <small class="chat-date pull-right">
                02.19.2015
            </small>
            Small chat
        </div>

        <div class="content">

            <div class="left">
                <div class="author-name">
                    Monica Jackson <small class="chat-date">
                    10:02 am
                </small>
                </div>
                <div class="chat-message active">
                    Lorem Ipsum is simply dummy text input.
                </div>

            </div>
            <div class="right">
                <div class="author-name">
                    Mick Smith
                    <small class="chat-date">
                        11:24 am
                    </small>
                </div>
                <div class="chat-message">
                    Lorem Ipsum is simpl.
                </div>
            </div>
            <div class="left">
                <div class="author-name">
                    Alice Novak
                    <small class="chat-date">
                        08:45 pm
                    </small>
                </div>
                <div class="chat-message active">
                    Check this stock char.
                </div>
            </div>
            <div class="right">
                <div class="author-name">
                    Anna Lamson
                    <small class="chat-date">
                        11:24 am
                    </small>
                </div>
                <div class="chat-message">
                    The standard chunk of Lorem Ipsum
                </div>
            </div>
            <div class="left">
                <div class="author-name">
                    Mick Lane
                    <small class="chat-date">
                        08:45 pm
                    </small>
                </div>
                <div class="chat-message active">
                    I belive that. Lorem Ipsum is simply dummy text.
                </div>
            </div>


        </div>
        <div class="form-chat">
            <div class="input-group input-group-sm"><input type="text" class="form-control"> <span class="input-group-btn"> <button
                    class="btn btn-primary" type="button">Send
            </button> </span></div>
        </div>

    </div>
    <div id="small-chat">

        <span class="badge badge-warning pull-right">5</span>
        <a class="open-small-chat">
            <i class="fa fa-comments"></i>

        </a>
    </div>

                </div>
        </div>

    </div>


</div>


  


    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript">
        $(document) .ready(function(){

    $(document) .on('click','#chatperson',function(){
        $('#outgoing').empty();


    var persons=$(this).val();
    var div=$(this).parent();
    var op=" ";
    var opp=" ";
        // $('#chatperson').checked = false;
    // alert(persons);

    $.ajax ({
        type:'get',
        url:'<?php echo URL::to('messagestrans'); ?>',
        data:{'id':persons},
        // dataType:'json',
        success:function(data){
        console.log('success');
        console.log(data);
        console.log(data.length);

      for(var i=0;i<data.length;i++){
         

            
            if (data[i].chattype == 1 ) {
             op+=' <div class="chat-message left" > <img class="message-avatar" src="img/a4.jpg" alt="" ><div class="message"> <a class="message-author" href="#"> Michael Smith </a> <span  class="message-date"> Mon Jan 26 2015 - 18:39:23 </span> <span class="message-content">'+data[i].message+'</span></div></div>'
         }

         else {
             op+=' <div class="chat-message right" ><img class="message-avatar" src="img/a4.jpg" alt="" ><div class="message"> <a class="message-author" href="#"> Michael Smith </a> <span  class="message-date"> Mon Jan 26 2015 - 18:39:23 </span> <span class="message-content">'+data[i].message+'</span></div></div>'
         }
        }

     $('#outgoing').append(op);
     
    
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

    <script type="text/javascript">
    $(document) .ready(function(){
        // $(document) .on('click','#sendmessage',function(){
        //     var recepient = $('#chatrecipient').val();

        //    alert(recepient);

        // $.ajax({

        //       url: 'createchat',
        //       data: '&message='+ $('#messagename').val() + '&id='+ $('#chatrecipient').val()  ,                                                    
        //       type: "get",
        //       success: function(json) {
        //          document.getElementById("messagename").value='';
        //       }
        //     });
        // });
    });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>