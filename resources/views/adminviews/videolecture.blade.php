
@extends('layouts.adminlayouts')
<script src="https://cdn.webrtc-experiment.com/socket.io.js"> </script>
<script src="https://cdn.webrtc-experiment.com/RTCPeerConnection-v1.5.js"> </script>
<script src="https://cdn.webrtc-experiment.com/video-conferencing/conference.js"> </script>
@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Video Lecture</h5>

        </div>

        <div class="ibox-content">
                <button id="setup-new-room" class="btn btn-success btn-lg">Setup New Conference</button>
                <table style="width: 100%;" id="rooms-list"></table>
                <div id="videos-container"></div>
               
        </div>
 
    </div>

</div>
</div>
</div>


<script type="text/javascript">
    var config = {
    openSocket: function (config) {
        var SIGNALING_SERVER = 'https://webrtcweb.com:9559/',
            defaultChannel = location.href.replace(/\/|:|#|%|\.|\[|\]/g, '');

        var channel = config.channel || defaultChannel;
        var sender = Math.round(Math.random() * 999999999) + 999999999;

        io.connect(SIGNALING_SERVER).emit('new-channel', {
            channel: channel,
            sender: sender
        });

        var socket = io.connect(SIGNALING_SERVER + channel);
        socket.channel = channel;
        socket.on('connect', function () {
            if (config.callback) config.callback(socket);
        });

        socket.send = function (message) {
            socket.emit('message', {
                sender: sender,
                data: message
            });
        };

        socket.on('message', config.onmessage);
    },
    onRemoteStream: function (media) {
        var video = media.video;
        video.setAttribute('controls', true);
        video.setAttribute('id', media.stream.id);
        videosContainer.insertBefore(video, videosContainer.firstChild);
        video.play();
    },
    onRemoteStreamEnded: function (stream) {
        var video = document.getElementById(stream.id);
        if (video) video.parentNode.removeChild(video);
    },
    onRoomFound: function (room) {
        var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
        if (alreadyExist) return;

        var tr = document.createElement('tr');
        tr.innerHTML = '<td><strong>' + room.roomName + '</strong> shared a conferencing room with you!</td>' +
            '<td><button class="join">JOIN VIDEO LECTURE</button></td>';
        roomsList.insertBefore(tr, roomsList.firstChild);

        var joinRoomButton = tr.querySelector('.join');
        joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
        joinRoomButton.setAttribute('data-roomToken', room.broadcaster);
        joinRoomButton.onclick = function () {
            this.disabled = true;

            var broadcaster = this.getAttribute('data-broadcaster');
            var roomToken = this.getAttribute('data-roomToken');
            captureUserMedia(function () {
                conferenceUI.joinRoom({
                    roomToken: roomToken,
                    joinUser: broadcaster
                });
            });
        };
    }
};

var conferenceUI = conference(config);
var videosContainer = document.getElementById('videos-container') || document.body;
var roomsList = document.getElementById('rooms-list');

document.getElementById('setup-new-room').onclick = function () {
    this.disabled = true;
    captureUserMedia(function () {
        conferenceUI.createRoom({
            roomName: 'ONLINE RESOURCE CENTER'
        });
    });
};

function captureUserMedia(callback) {
    var video = document.createElement('video');
    video.setAttribute('autoplay', true);
    video.setAttribute('controls', true);
    videosContainer.insertBefore(video, videosContainer.firstChild);

    getUserMedia({
        video: video,
        onsuccess: function (stream) {
            config.attachStream = stream;
            video.setAttribute('muted', true);
            callback();
        }
    });
}
</script>



    @include('layouts.adminfooter')
@endsection

