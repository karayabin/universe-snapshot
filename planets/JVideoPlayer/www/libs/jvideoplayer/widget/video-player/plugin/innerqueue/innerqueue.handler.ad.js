(function () {

    /**
     * Definition
     * ---------------
     * 
     * This object is an handler for the innerQueue plugin (plugin.innerqueue).
     * It allows us to attach ad videos to a given video.
     * 
     * 
     * Overview
     * ----------------
     * 
     * The ad videos are created on top of the "normal" videos.
     * This is done by using the layer manager system (see default video player public documentation).
     * 
     * In optimal conditions, the ad is first preloaded 30 seconds before it has to play (using the innerQueue's prepare callback),
     * and then when it's time to play the ad, this handler uses the insert pattern (see public documentation) which
     * basically pause the OLD video, plays the ad video, remove the ad video when it ends, and eventually resume the OLD video.
     * 
     * 
     * 
     * Plugins
     * -----------
     * 
     * This handler accept plugins.
     * A plugin is any object with the following optional methods:
     * 
     * - init: to initialize the plugin
     * - playBefore ( videoPlayer, videoInfo ): called just before the video is played (and 
     *                                          the currentVideo has not been changed yet).
     * - timeupdateAfter ( videoPlayer, videoInfo, time ): called after the ad's current time is updated
     * - kill ( videoPlayer, videoInfo ): called when the ad ends or is killed.
     * 
     * 
     * Built-in plugins are:
     * 
     * - ../ad/plugin.ad.minplay.js: decide WHEN an user is authorized to skip the ad
     * - ../ad/plugin.ad.skipadbutton.js: tells the remote to display the skip ad button
     * 
     * 
     * Events
     * ------------
     * 
     * ### triggered
     * 
     * - resume, to resume the OLD video
     * - pause, to pause the OLD video
     * - setcurrentvideo, to switch to the ad video, and back to the OLD video again
     * - createlayer, to create the ad layers
     * 
     * ### listened to
     * 
     * - kill: absolute events friendly
     * 
     * 
     * 
     */

    window.pluginInnerQueueHandlerAd = function (options) {
        this.d = $.extend({
            plugins: [],
            bufferTime: 30,
            getKeyByEvent: function (event) {
                return event.url;
            }
        }, options);
        this.vp = null;
        this.bufferTime = this.d.bufferTime * 1000;
        this.event2LoadedPromise = {};
        this.currentAdVideoInfo = null;
    };

    pluginInnerQueueHandlerAd.prototype = {
        init: function (vp) {
            this.vp = vp;
            var zis = this;
            vp.createLayer('adground', 29, {cssClass: 'black'});
            vp.lm.hideLayer('adground');
            vp.createLayer('ad', 30, '');
            
            
            
            vp.on('kill', function(){
                zis._kill();
            });
            
        },
        prepare: function (event, curTime) {
            var key = this.d.getKeyByEvent(event);
            // load only once is enough
            if (false === this.event2LoadedPromise.hasOwnProperty(key)) {
                var zis = this;
                var playTime = event.start - curTime;
                var bufferTime = this.bufferTime;
                if (bufferTime >= playTime) {
                    bufferTime = 0;
                }
                setTimeout(function () {
                    zis.event2LoadedPromise[key] = zis._loadAdVideo(event);
                }, bufferTime);
            }
        },
        fire: function (event) {
            var key = this.d.getKeyByEvent(event);
            var loadedPromise = this.event2LoadedPromise[key];
            this.vp.playLoadedVideo(loadedPromise, 0, 'ad');
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _loadAdVideo: function (videoInfo) {
            var vp = this.vp;
            var zis = this;
            var oldVideoInfo = null;
            this._call('init', vp, videoInfo);

            return vp.loadVideo(videoInfo, {
                playBefore: function () {
                    vp.lm.showLayer('adground');
                    oldVideoInfo = vp.getCurrentVideoInfo();
                    vp.pause(); // pause the current video if one is playing
                    zis._call('playBefore', vp, videoInfo);
                },
                playAfter: function () {
                    zis.currentAdVideoInfo = vp.getCurrentVideoInfo();
                },
                timeupdate: function () {
                    var time = vp.getCurrentVideo().getTime();
                    zis._call('timeupdateAfter', vp, videoInfo, time);
                },
                end: function () {
                    vp.setCurrentVideoInfo(oldVideoInfo);
                    zis._kill();
                    vp.resume();
                },
            });
        },
        _call: function (method, ...args) {
            for (var i in this.d.plugins) {
                var plugin = this.d.plugins[i];
                if (method in plugin) {
                    plugin[method](...args);
                }
            }
        },
        _kill: function () {
            this.vp.lm.clearLayer('ad');
            this.vp.lm.hideLayer('adground');
            this._call('kill', this.vp, this.currentAdVideoInfo);
            var key = this.d.getKeyByEvent(this.currentAdVideoInfo);
            if (this.event2LoadedPromise.hasOwnProperty(key)) {
                delete this.event2LoadedPromise[key];
            }
            this.currentAdVideoInfo = null;
        },
    };
    
})();
