import {getElement} from "../core/index.js";
import YouTubePlayer from 'youtube-player';

export default function initYoutube() {
    if (!getElement('.video_wrapper')) return;
    let players = {};

    const video = getElement('.video_wrapper .iframe');
    const image = getElement('.video_img');
    getElement('.video_wrapper button')?.addEventListener('click', () => {
        if (video) {
            setTimeout(() => {
                getElement('.video_wrapper').classList.toggle('active');
            }, 300)

            if (!players[video.id]) {
                players[video.id] = YouTubePlayer(video.id, {
                    'autoplay': 0,
                    'controls': 0,
                    'showinfo': 0,
                    "enablejsapi": 1,
                    "cookieless": 'domain',
                    'rel': 0,
                    'loop': 1,
                    'mute': 0,
                    "playsinline": 1,
                    "modestbranding": 1
                });
                players[video.id].loadVideoById(video.id);

            } else {
                // players[video.id].pauseVideo();
                setTimeout(() => {
                    players[video.id].playVideo();
                }, 350)
            }
        }

    })

}