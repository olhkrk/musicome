/*document.addEventListener("DOMContentLoaded", function() { startplayer(); }, false);
var videoPlayer;
var startButton;
var pauseButton;
var oldValue = 100;

function startplayer()
{
    startButton = document.getElementById("play_video_button");
    pauseButton = document.getElementById("pause_video_button");
    videoPlayer = document.getElementById('my-video');
    videoPlayer.controls = false;

    videoPlayer.on('fullscreenchange', function(e) {
        videoPlayer.controls(false);
    });
}


function sound_aud() {
    let videoVolumeElement = document.getElementById("change_vol");
    if (videoPlayer.volume > 0) {
        oldValue = videoPlayer.volume;
        videoVolumeElement.value = 0;
        videoPlayer.volume = 0;
    } else {
        videoVolumeElement.value = oldValue;
        videoPlayer.volume = oldValue;
    }
}

function fullscreenVideo() {
    videoPlayer.requestFullscreen();
}

function smallscreenVideo() {
    videoPlayer.exitFullscreen();
}

function play_vid()
{
    startButton.hidden = true;
    pauseButton.hidden = false;
    videoPlayer.play();
}

function pause_vid()
{
    startButton.hidden = false;
    pauseButton.hidden = true;
    videoPlayer.pause();
}

function change_vol()
{
    videoPlayer.volume = document.getElementById("change_vol").value;
}*/