(function () {


    /**
     * This implementation uses different concepts.
     *
     *
     * The current video
     * --------------------
     *
     * This is the current video being played.
     * Be aware that we can have an (video) ad interrupting the video being played.
     * While the ad is playing, the ad is the current video.
     *
     * Whenever the current video is set, the setcurrentvideo event is triggered.
     * That is, the current video is first updated, and THEN the setcurrentvideo event is triggered.
     *
     *
     *
     * The videoInfo
     * ------------------
     *
     * This is a js map that carries information about a video.
     * It is generally used to know which video is currently playing.
     *
     *
     * At the very least, the videoInfo map contains the information necessary to play the video (url, title).
     * The user can add any number of properties to it.
     *
     * Internally, the videoInfo map is decorated by some methods.
     *
     * The loadVideo method will add the following properties to the videoInfo map:
     *
     * - title, if not already set
     * - _videoElement: the video element instance (available when the video loaded)
     * - duration: in seconds (available when the video loaded)
     *
     *
     * The playLoadedVideo will add the following properties to the videoInfo map:
     *
     * - _layer: the name of the layer inside which the video is played
     *
     *
     * Examples of use:
     * When the cue plugin displays subtitles, it needs to know which video is currently playing.
     * Typically, if there is an ad interrupting the video, the subtitles must pause until the video resumes.
     * In order to know if the current video is an ad or the main video, the cue plugin tests some
     * properties of the videoInfo map.
     *
     * The ad plugin also use the videoInfo map to know which video is playing.
     *
     *
     *
     * Public properties
     * ---------------------
     *
     * - lm: the layer manager
     *
     *
     *
     * Events
     * ------------
     *
     * ### triggered events
     *
     *
     *
     * - resume ( videoInfo ): signal that the current video resumes
     * - pause ( videoInfo ): signal that the current video pauses
     * - settime ( t, videoInfo ): signal that the current video's time has been manually set (typically by scrubbing the timeline)
     * - setvolume ( v, videoInfo ): signal that the volume has been manually set
     *
     * - timeupdate: signal that the current video's time has been updated (either by time flowing, or manually)
     * - progress: signal when the browser is downloading video, used to update the remote's bufferedRanges
     * - ended (videoInfo): signal that the current video has ended.
     * - videoloaded: signal that the current video is ready to play. Used for debug purposes.
     *
     * - setcurrentvideo ( videoInfo ): signal that the current video has been updated.
     *                              Used to refresh the remote text and duration (mantis remote needs duration to start with)
     * - createlayer ( name, zIndex, appearance ): signal that a layer has been created using the createLayer method.
     *                              Used for debug purposes.
     *
     *
     * ### listened to events:
     *
     * - resume: resume the current video element
     * - pause: pause the current video element
     * - settime: set the time of the current video element
     * - setvolume: set the volume of the current video element
     *
     *
     *
     *
     *
     *
     *
     *
     */
    window.videoPlayer = function (options) {

        this.d = $.extend({
            /**
             * The jquery element representing the video player
             */
            element: null,
            plugins: [],
            isSameVideoInfo: function (vA, vB) {
                return (vA.hasOwnProperty('url') && vB.hasOwnProperty('url') && vA.url === vB.url);
            },
        }, options);


        this.lm = null;
        this.currentVideoInfo = null;
        this.listeners = {};
        this.listenerIndex = 0;
        this.plugins = this.d.plugins;

        this._init();
    };

    videoPlayer.prototype = {
        //------------------------------------------------------------------------------/
        // BASIC API
        //------------------------------------------------------------------------------/
        /**
         * Load a video and play it asap when the given timeout expires.
         *
         * Note: THIS particular method uses html5 video element only, for now.
         *
         *
         * videoInfo: map
         *      - url: string, the url of the video to load
         *      - ?title: the title of the video to display in the remote or wherever it seems adequate
         *      - ...
         *      - _videoElement: will be added automatically when the video is loaded
         *      - _layer: will be added automatically when the video is played
         *
         * timeout: number|array
         *                          0: preloadTimeout
         *                          1: playTimeout
         *
         *
         * Callbacks are listeners attached to the video.
         * They are used by some plugins.
         * They all receive the video player instance as their sole argument:
         *
         *      - playBefore: triggered when and just before the video is played
         *      - playAfter: triggered when and just after the video is played
         *
         *      - timeupdate: triggered every time the video time is updated (naturally as time flow, or manually when the user scrubs the timeline)
         *      - ended: triggered when the video ends
         *      - load: triggered when the video is loaded (i.e. ready to play)
         *
         * layer: string, the name of the layer where to play the video when the video ready
         *
         */
        prepareVideo: function (videoInfo, timeout = 0, callbacks = null, layer = 'video') {
            var zis = this;

            var preloadTimeout = 0;
            if ('object' == typeof timeout) {
                preloadTimeout = timeout[0];
                timeout = timeout[1];
                if (preloadTimeout >= timeout) {
                    preloadTimeout = 0;
                }
            }
            setTimeout(function () {
                var promise = zis.loadVideo(videoInfo, callbacks);
                zis.playLoadedVideo(promise, timeout, layer);
            }, preloadTimeout);
        },
        /**
         * Triggers the resume event if the current video is not playing
         */
        resume: function () {
            /**
             * null === this.currentVideoInfo, allow non video events to be managed by the videoPlayer (used by the live plugin).
             */
            if (null === this.currentVideoInfo || false === this.getCurrentVideo().isPlaying()) {
                this.trigger('resume');
            }
        },
        /**
         * Triggers the pause event if the current video is playing
         */
        pause: function () {
            /**
             * null === this.currentVideoInfo, allow non video events to be managed by the videoPlayer (used by the live plugin).
             */
            if (null === this.currentVideoInfo || true === this.getCurrentVideo().isPlaying()) {
                this.trigger('pause');
            }
        },
        /**
         * Triggers the settime event with the time argument is seconds
         */
        setTime: function (t) {
            this.trigger('settime', t);
        },
        /**
         * Triggers the setvolume event with the volume argument in the range of 0 to 1 (both included)
         */
        setVolume: function (v) {
            this.trigger('setvolume', v);
        },
        //------------------------------------------------------------------------------/
        // PROTECTED API
        //------------------------------------------------------------------------------/
        /**
         * Load a video in the background.
         * Plugins should use this to load a video.
         *
         * It returns a loadedPromise (the promise that the video is loaded).
         * The loadedPromise has two special properties used for internal purposes, you shouldn't have to use them often:
         *
         * - videoInfo: the videoInfo
         * - callbacks: the callbacks
         *
         *
         * callbacks: see prepareVideo method
         *
         *
         * Once the method is loaded, the videoloaded event is triggered,
         * and the following events will be triggered as the video plays and ends:
         *
         * - timeupdate
         * - progress
         * - ended
         *
         *
         * The loadVideo method decorates the videoInfo map with the following properties:
         *
         * - title: if not already set
         * - _videoElement: the video element instance
         * - duration: in seconds
         *
         *
         *
         */
        loadVideo: function (videoInfo, callbacks = null) {
            var zis = this;
            if (null === callbacks) {
                callbacks = {};
            }

            if (false === ('title' in videoInfo)) {
                videoInfo.title = "";
            }
            var title = videoInfo.title;


            // pre-load the video
            var layerName = getLayerNameByVideoInfo(videoInfo);
            zis.createLayer(layerName, -1, '<video src="' + videoInfo.url + '"></video>');
            var videoTag = zis.lm.getJLayer(layerName).find('video')[0];
            var videoElement = new jvpVideoElement();
            var loadedPromise = new Promise(function (resolve, reject) {
                videoElement.load(videoTag, function () {
                    videoElement.on('timeupdate', function () {
                        zis.trigger('timeupdate');
                        if ('timeupdate' in callbacks) {
                            callbacks.timeupdate(videoInfo);
                        }
                    });
                    videoElement.on('progress', function () {
                        zis.trigger('progress');
                    });
                    videoElement.on('ended', function () {
                        /**
                         * To ensure that videoInfo is always passed with the ended event,
                         * this should be the only place where the ended event is triggered.
                         */
                        zis.trigger('ended', videoInfo);
                        if ('end' in callbacks) {
                            callbacks.end(videoInfo);
                        }
                    });
                    videoInfo._videoElement = videoElement;
                    videoInfo.duration = videoElement.getDuration();
                    zis.trigger('videoloaded', videoInfo);
                    resolve(videoElement);
                    if ('load' in callbacks) {
                        callbacks.load(videoInfo);
                    }
                });
            });

            loadedPromise.videoInfo = videoInfo;
            loadedPromise.callbacks = callbacks;
            return loadedPromise;
        },
        /**
         * Play a loaded video (video loaded with the loadVideo method) asap after the given timeout expires.
         *
         * The video is (transferred and) played to the given layer when the play timeout expires.
         *
         * The following events are transferred:
         *
         * - setcurrentvideo
         * - resume
         *
         *
         * The videoInfo map is decorated with the following properties:
         *
         * - _layer: the name of the layer to which the video is played
         *
         *
         */
        playLoadedVideo: function (loadedPromise, timeout = 0, layer = "video") {
            var zis = this;
            // play the video in the future
            setTimeout(function () {
                loadedPromise.then(function () {
                    var callbacks = loadedPromise.callbacks;
                    var videoInfo = loadedPromise.videoInfo;
                    videoInfo._layer = layer;
                    var layerName = getLayerNameByVideoInfo(videoInfo);


                    if ('playBefore' in callbacks) {
                        callbacks.playBefore(videoInfo);
                    }

                    // todo: test with cloning rather than transfering, in order to cache loaded videos (for slow connections)?
                    zis.lm.transfer(layerName, layer, false);
                    zis.currentVideoInfo = videoInfo;
                    zis.trigger("setcurrentvideo", videoInfo);

                    if (false === loadedPromise.hasOwnProperty('noResume') || fa) {
                        zis.trigger("resume");
                    }

                    if ('playAfter' in callbacks) {
                        callbacks.playAfter(videoInfo);
                    }

                });

            }, timeout);
        },
        /**
         * Set the current videoInfo to the given videoInfo,
         * then trigger the setcurrentvideo event
         */
        setCurrentVideoInfo: function (videoInfo) {
            this.currentVideoInfo = videoInfo;
            this.trigger('setcurrentvideo', videoInfo);
        },
        /**
         * Get the current videoInfo
         */
        getCurrentVideoInfo: function () {
            return this.currentVideoInfo;
        },
        /**
         * Sugar method to return the current videoInfo's videoElement instance
         */
        getCurrentVideo: function () {
            if (null !== this.currentVideoInfo) {
                return this.currentVideoInfo._videoElement;
            }
            return null;
        },
        /**
         * Sugar method to return whether or not videoInfoA and videoInfoB are the same
         */
        isSameVideoInfo: function (videoInfoA, videoInfoB) {
            return (true === this.d.isSameVideoInfo(videoInfoA, videoInfoB));
        },
        /**
         * Recommended way to create a layer.
         * It triggers the createlayer method.
         */
        createLayer: function (name, zIndex, appearance = "") {
            this.trigger('createlayer', name, zIndex, appearance);
            this.lm.createLayer(name, zIndex, appearance);
        },
        /**
         * This method is meant to be overridden by plugins.
         * It is used whenever an event is triggered.
         */
        watchTriggeredEvent: function (eventName, ...args) {

        },
        //------------------------------------------------------------------------------/
        // DISPATCHER
        //------------------------------------------------------------------------------/
        on: function (eventName, fn, position = 0) {
            if (false === (eventName in this.listeners)) {
                this.listeners[eventName] = {};
            }

            if (false === (position in this.listeners[eventName])) {
                this.listeners[eventName][position] = {};
            }
            this.listeners[eventName][position][this.listenerIndex++] = fn;
            return this;
        },
        once: function (eventName, fn, position = 0) {
            var zis = this;
            var _fn = function () {
                fn();
                zis.off(eventName, position, _fn);
            };
            this.on(eventName, _fn, position);
            return this;
        },
        off: function (eventName, position, fn = '') {
            if (eventName in this.listeners) {
                if (position in this.listeners[eventName]) {
                    if ('' === fn) {
                        delete this.listeners[eventName][position];
                    }
                    else {
                        for (var i in this.listeners[eventName][position]) {
                            if (fn === this.listeners[eventName][position][i]) {
                                delete this.listeners[eventName][position][i];
                            }
                        }
                    }
                }
            }
        },
        trigger: function (eventName, ...args) {
            this.watchTriggeredEvent(eventName, ...args);
            if (eventName in this.listeners) {
                for (var pos in this.listeners[eventName]) {
                    for (var i in this.listeners[eventName][pos]) {
                        var info = {
                            stopPropagation: false,
                            position: pos,
                            index: i,
                        };
                        this._doTrigger(this.listeners[eventName][pos][i], info, eventName, ...args);
                        if (true === info.stopPropagation) {
                            return;
                        }
                    }
                }
            }
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _init: function () {

            var zis = this;


            //------------------------------------------------------------------------------/
            // LAYERED MANAGER
            //------------------------------------------------------------------------------/
            var jLayerManager = this.d.element;
            this.lm = new layeredManager({
                element: jLayerManager,
            });


            //------------------------------------------------------------------------------/
            // BUILD THE WIDGET. We use layer manager internally.
            //------------------------------------------------------------------------------/
            /**
             * Our layers look like this:
             *
             * - video (20)
             * - ground (10)
             * - buffer (-1)
             *
             *
             *
             *
             * This object handles one layer called video, on which the main video (the one that the user
             * is looking at) should be displayed.
             */
            this.createLayer('ground', 10, '<div style="background: black; width: 100%; height: 100%"></div>');
            this.createLayer('video', 20, '');


            //------------------------------------------------------------------------------/
            // AUTO-REGISTERING INTERNAL EVENTS
            //------------------------------------------------------------------------------/
            this.on('resume', function () {
                if (null !== zis.currentVideoInfo) {
                    zis.getCurrentVideo().resume();
                }
            });
            this.on('pause', function () {
                if (null !== zis.currentVideoInfo) {
                    zis.getCurrentVideo().pause();
                }
            });
            this.on('settime', function (t) {
                if (null !== zis.currentVideoInfo) {
                    zis.getCurrentVideo().setTime(t);
                }
            }, 100);
            this.on('setvolume', function (v) {
                if (null !== zis.currentVideoInfo) {
                    zis.getCurrentVideo().setVolume(v);
                }
            });


            //------------------------------------------------------------------------------/
            // INIT PLUGINS
            //------------------------------------------------------------------------------/
            for (var i in this.plugins) {
                this.plugins[i].prepare(this);
            }


        },
        _doTrigger: function (fn, info, eventName, ...args) {
            fn.call(info, ...args);
        },


    };


    //------------------------------------------------------------------------------/
    // TOOLS    
    //------------------------------------------------------------------------------/
    function getLayerNameByVideoInfo(vi) {
        return vi.url;
    }


})();