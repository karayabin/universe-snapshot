(function () {


    /**
     * Events
     * ===========
     *
     * listened to
     * ---------------
     *
     *
     * - setcurrentvideo: to ensure the video is ready (need duration for calculation)
     *
     */
    window.pluginMantisThumbnailPreview = function (options) {


        this.d = $.extend({
            /**
             * @param timeInterval - number in seconds,
             * Time interval between two screenshots.
             * The time interval, by convention, is constant for the whole video.
             */
            timeInterval: 1,
            /**
             * @param urlFormat - string
             * url template representing the screenshot url.
             * This plugin will dynamically replace the {n} tag by the adequate number.
             * The minimum length of n is defined by the nLength option.
             */
            urlFormat: '/video/screenshots/myvideo_{n}.png',
            /**
             * @param nLength - int,
             * the minimum number of digits of the {n} tag of the urlFormat option.
             * By default, this int is 3, so we numbers like 001,
             * 002, ... ,999 will be called.
             *
             */
            nLength: 3,
            /**
             * An arbitrary number to add to the segment number.
             * This is to sync the preview with the current video frame.
             */
            offset: 2,

        }, options);

        this.duration = 0;

    };

    pluginMantisThumbnailPreview.prototype = {
        prepare: function (vp, skin) {
            var zis = this;


            this.jTimeLinePreviewTime = $('<time>00:00:00</time>');
            this.jTimeLinePreviewImg = $('<img src="/img/compute.jpg">');
            skin.jTimeLinePreview.append(this.jTimeLinePreviewTime);
            skin.jTimeLinePreview.append(this.jTimeLinePreviewImg);


            vp.on('setcurrentvideo', function () {


                zis.duration = vp.getCurrentVideo().getDuration();
                var fnHover = function (percent) {
                    var url = zis.d.urlFormat.replace('{n}', pad(zis.getSegNumber(percent), zis.d.nLength));
                    var time = zis.getEllapsedTime(percent);
                    zis.setPreviewInfo(url, durationToString(time));
                };

                skin.on("timelinehover", fnHover);
                skin.on("timelinedrag", fnHover);
            });
        },
        getEllapsedTime(p){
            return Math.ceil((this.duration * p / 100));
        },
        getSegNumber(p){
            return this.d.offset + Math.ceil((this.duration * p / 100) / this.d.timeInterval);
        },
        setPreviewInfo: function (url, t) {
            this.jTimeLinePreviewImg[0].src = url;
            this.jTimeLinePreviewTime.html(t);
        },
    };


    //------------------------------------------------------------------------------/
    // PRIVATE TOOLS
    //------------------------------------------------------------------------------/
    function pad(n, width) {
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
    }

    function durationToString(d) {
        var hours = parseInt(d / 3600) % 24;
        var minutes = parseInt(d / 60) % 60;
        var seconds = d % 60;
        return (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    }


})();