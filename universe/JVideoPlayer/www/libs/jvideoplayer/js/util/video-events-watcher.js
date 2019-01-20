(function () {
    // http://www.w3schools.com/tags/ref_av_dom.asp
    var events = [
        'abort',
        'canplay',
        'canplaythrough',
        'durationchange',
        'emptied',
        'ended',
        'error',
        'loadeddata',
        'loadedmetadata',
        'loadstart',
        'pause',
        'play',
        'progress',
        'ratechange',
        'seeked',
        'seeking',
        'stalled',
        'suspend',
        'timeupdate',
        'volumechange',
        'waiting',
    ];

    window.videoEventWatcher = {
        watch: function (video) {
            for (var i in events) {
                let eventName = events[i];
                video.addEventListener(eventName, function (...args) {
                    console.log(eventName, ...args);
                });
            }

        }
    };
})();