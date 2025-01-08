const video = document.getElementById('filmVideo');
const playPauseButton = document.getElementById('playPauseButton');
const playPauseIcon = document.getElementById('playPauseIcon');
const rewindButton = document.getElementById('rewindButton');
const forwardButton = document.getElementById('forwardButton');
const speedControl = document.getElementById('speedControl');
const muteButton = document.getElementById('muteButton');
const muteIcon = document.getElementById('muteIcon');
const fullScreenButton = document.getElementById('fullScreenButton');

playPauseButton.addEventListener('click', togglePlayPause);
document.addEventListener('keydown', (e) => {
    if (e.code === 'Space') {
        e.preventDefault();
        togglePlayPause();
    }
    if (e.code === 'KeyM') {
        e.preventDefault();
        toggleMute();
    }
    if (e.code === 'Enter') {
        e.preventDefault();
        toggleFullScreen();
    }

    if (e.code === 'KeyF') {
        e.preventDefault();
        toggleFullScreen();
    }
    if (e.code === 'ArrowRight') {
        e.preventDefault();
        video.currentTime += 10;
    }
    if (e.code === 'ArrowLeft') {
        e.preventDefault();
        video.currentTime -= 10;
    }
});

function togglePlayPause() {
    if (video.paused) {
        video.play();
        playPauseIcon.classList.replace('bx-play', 'bx-pause');
        playPauseButton.querySelector('span').textContent = "إيقاف";
    } else {
        video.pause();
        playPauseIcon.classList.replace('bx-pause', 'bx-play');
        playPauseButton.querySelector('span').textContent = "تشغيل";
    }
}

forwardButton.addEventListener('click', () => {
    video.currentTime += 10;
});

rewindButton.addEventListener('click', () => {
    video.currentTime -= 10;
});

muteButton.addEventListener('click', toggleMute);

function toggleMute() {
    video.muted = !video.muted;
    muteIcon.classList.toggle('bx-volume-mute');
    muteIcon.classList.toggle('bx-volume-full');
    muteButton.querySelector('span').textContent = video.muted ? "إلغاء الكتم" : "كتم الصوت";
}

fullScreenButton.addEventListener('click', toggleFullScreen);

function toggleFullScreen() {
    if (video.requestFullscreen) {
        video.requestFullscreen();
    } else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen();
    } else if (video.msRequestFullscreen) {
        video.msRequestFullscreen();
    }
}

speedControl.addEventListener('change', (e) => {
    video.playbackRate = parseFloat(e.target.value);
});
