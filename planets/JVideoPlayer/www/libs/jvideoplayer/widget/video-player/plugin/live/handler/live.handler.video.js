/**
 * This is html5 only video handler.
 * Other technologies (like flash) might use another handler, unless they also can initialize with
 * the url of the video.
 *
 *
 *
 * A video event must have the following properties:
 *
 *
 * - id: to identify the event (this key can be changed with the idKey option)
 * - url: required by the default videoplayer
 *
 * And of course:
 *
 * - start
 * - duration
 *
 * Both required by the plugin.live plugin.
 *
 *
 */
window.liveHandlerVideo = function (options) {
    this.d = $.extend({
        match: function (event) {
            return false;
        },
        /**
         * The name of the property that allows us to distinguish between two events.
         * Assuming all events are unique.
         */
        idKey: 'id',
        /**
         * Number of ideal buffer duration: how many microseconds be
         */
        bufferDuration: 30000,
    }, options);


    /**
     * The keys of this map are the events[idKey] values,
     * and the values are loadedPromises.
     */
    this.loadedPromises = {};
    this.vp = null;
    this.currentVideoElement = null;

};

liveHandlerVideo.prototype = {
    prepare: function (pluginLive, vp) {

        var zis = this;
        this.vp = vp;


        vp.on("liveprepare", function (event, timeout) {
            if (true === zis._match(event)) {

                var bufferTimeout = 20;
                if (timeout > zis.d.duration) {
                    bufferTimeout = zis.d.duration;
                }
                setTimeout(function () {
                    zis._prepareVideo(event);
                }, bufferTimeout);
            }
        });
        //
        //vp.on("livesettime", function (event, time) {
        //    if (true === zis._match(event)) {
        //        zis._getVideoElement(event).then(function (videoElement) {
        //            videoElement.setTime(time);
        //        });
        //    }
        //});
        //
        vp.on("liveresume", function (event) {
            if (true === zis._match(event)) {

                if (null === zis.currentVideoElement) {

                    var id = zis._id(event);
                    var loadedPromise = zis.loadedPromises[id];
                    loadedPromise.callbacks.playAfter = function (vInfo) {
                        vInfo._videoElement.resume();
                        zis.currentVideoElement = vInfo._videoElement;
                    };
                    vp.playLoadedVideo(loadedPromise);
                }
                else {
                    zis.currentVideoElement.resume();
                }
            }
        });

        vp.on("livepause", function (event) {
            if (true === zis._match(event)) {
                var id = zis._id(event);
                var loadedPromise = zis.loadedPromises[id];
                loadedPromise.then(function(){
                    loadedPromise.videoInfo._videoElement.pause();
                });
            }
        });

        vp.on("livekill", function (event) {
            if (true === zis._match(event)) {
                zis._removeEvent(event, false);
            }
        });
        //vp.on("livestop", function (event) {
        //    if (true === zis._match(event)) {
        //        zis._removeEvent(event);
        //    }
        //});
    },
    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    _prepareVideo: function (event) {
        var loadedVideo;
        var id = this._id(event);
        var zis = this;
        if (false === this.loadedPromises.hasOwnProperty(id)) {
            // event is videoInfo
            loadedVideo = this.vp.loadVideo(event, {
                playBefore: function () {
                    zis.currentEventId = id;
                },
            });
            loadedVideo.noResume = true;
            this.loadedPromises[id] = loadedVideo;
        }
        else {
            loadedVideo = this.loadedPromises[id];
        }
        return loadedVideo;
    },
    //_getPreparedVideoElement: function (event) {
    //    var zis = this;
    //    return new Promise(function (resolve, reject) {
    //        var id = zis._id(event);
    //        // video has already focus
    //        var loadedVideo;
    //        if (id === zis.currentEventId) {
    //            loadedVideo = zis.loadedPromises[zis.currentEventId];
    //            resolve(loadedVideo._videoElement);
    //        }
    //        // video has not the focus yet
    //        else {
    //            loadedVideo = zis._getLoadedVideo(event, function (videoElement) {
    //                resolve(videoElement);
    //            });
    //            zis.vp.playLoadedVideo(loadedVideo);
    //        }
    //    });
    //},
    _removeEvent: function (event, natural) {
        this.currentVideoElement = null;
        var id = this._id(event);
        if (this.loadedPromises.hasOwnProperty(id)) {

            if (true === natural) {
                var loadedPromise = this.loadedPromises[id];
                var videoElement = loadedPromise.videoInfo._videoElement;
                videoElement.setTime(videoElement.getDuration() + 100); // trigger the ended event of the video
            }
            delete this.loadedPromises[id];
        }
        this.vp.lm.clearLayer('video'); // remove the video visually too, hope it's not used by the ended listener...

    },
    _id: function (event) {
        return event[this.d.idKey];
    },
    _match: function (event) {
        return (true === this.d.match(event));
    },
};