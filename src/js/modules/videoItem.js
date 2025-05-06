import {getElements} from "../core/index.js";

export default function videoItem() {
    getElements('.video-item').forEach(item => {
        if (!item) return;

        const videoContainer = item.querySelector('.video-container');
        const btn = item.querySelector('[data-video-play]');
        const image = item.querySelector('img');

        let videoElement = null;

        if (btn && videoContainer) {
            btn.addEventListener('click', () => {

                if (videoElement && !videoElement.paused) {
                    videoElement.pause();
                    btn.querySelector('svg').innerHTML = '<use href="#icon-play"></use>';
                    return;
                }

                const videoSrc = videoContainer.getAttribute('data-video');

                if (!videoElement) {
                    videoElement = document.createElement('video');
                    videoElement.classList = 'w-full h-full object-cover';
                    videoElement.src = videoSrc;
                    videoElement.controls = false;
                    videoElement.autoplay = true;
                    videoElement.addEventListener('play', () => {
                        image.style.opacity = '0';
                        image.style.visibility = 'hidden';
                        btn.querySelector('svg').innerHTML = '<use href="#icon-pause"></use>'; // Сменить на иконку паузы
                    });
                    videoElement.addEventListener('pause', () => {
                        image.style.opacity = '1';
                        image.style.visibility = 'visible';
                        btn.querySelector('svg').innerHTML = '<use href="#icon-play"></use>'; // Сменить на иконку play
                    });
                    videoContainer.appendChild(videoElement);
                }

                if (videoElement.paused) {
                    videoElement.play();
                }
            });
        }
    });
}