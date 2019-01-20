(function () {

    /**
     * Depends on:
     *
     * - jquery
     * - dragSlider https://github.com/lingtalfi/jDragSlider
     * - vswitch https://github.com/lingtalfi/VSwitch
     */

    window.Mantis = function (jSurface) {

        // when duration is ready (not 0), mantis is ready
        this.duration = 0;
        this.listeners = [];


        /**
         * From 0 to 100, the VISUAL percentage of the volume slider.
         */
        this.currentNonMutedVolume = 100;
        /**
         * When hovering the timeline, we need the sliderOffset
         * to get the distance of the mouse relative to the timeline.
         * Also, we need to get the width (the right boundary), so that we can place our cursor
         * within the slider with confidence.
         *
         * We also need the halfPreviewWidth to adjust the center of the preview image to the timeline mark.
         */
        this.sliderOffset = 0;
        this.sliderWidth = 0;
        this.halfPreviewWidth = 0;
        this.isFullScreen = false;

        /**
         * The maximum time in seconds to which the user can scrub
         */
        this.scrubLimit = null;
        
        

        this.jSurface = jSurface;
        this.jPlayer = $('.player_controls', this.jSurface); // contains all css actions/transitions/states classes 

        // timeline
        this.jTimeLine = $('> .timeline', this.jPlayer);
        this.jTimeLineTimeInfoBox = $('> label', this.jTimeLine);
        this.jTimeLineScrubber = $('.scrubber', this.jTimeLine);
        this.jTimeLineProgress = $('.progress', this.jTimeLineScrubber);


        this.jTimeLineHandle = $('.target .handle', this.jTimeLineScrubber);
        this.jSliderCompleted = $('.completed', this.jTimeLine);
        this.jSliderBuffered = $('.buffered', this.jTimeLine);
        this.jTimeLineMark = $('.mark.guide', this.jTimeLineScrubber);
        this.jTimeLineMarkArrow = $('.mark.arrow', this.jTimeLineScrubber);
        this.jTimeLinePreview = $('.preview', this.jTimeLineScrubber);

        // control bar
        this.jControlBar = $('.control_bar', this.jPlayer);
        this.jVolume = $('.control_volume', this.jControlBar);
        this.jVolumeCompleted = $('.completed', this.jVolume);
        this.jVolumeTarget = $('.target', this.jVolume);
        this.jVolumeHandle = $('.handle', this.jVolumeTarget);
        this.jTitle = $('.video_title > span', this.jControlBar);
        this.jFullScreen = $('.control_fullscreen', this.jControlBar);

        // bubble bar
        this.jBubble = $('.bubble_bar .bubble', this.jPlayer);


        if (true === ('webkitRequestAnimationFrame' in window)) {
            this.jPlayer.addClass('ua-webkit');
        }

        this.vswitch = new vswitch(this.jSurface, [
            'control_play_resume',
            'control_pause',
            'volume_panel',
        ], {mode: 'css', starter: "control_play_resume"});


        this.init();
    };


    window.Mantis.prototype = {
        init: function () {
            var mantis = this;
            var zis = this;
            //------------------------------------------------------------------------------/
            // EVENTS LISTENERS
            //------------------------------------------------------------------------------/
            this.jSurface.on('mousedown', '.control', function (e) {
                var jTarget = $(e.target);
                if (1 === e.which) {
                    if (jTarget.hasClass('control_play_resume')) {
                        mantis.play();
                    }
                    else if (jTarget.hasClass('control_pause')) {
                        mantis.pause();
                    }
                    else if (jTarget.hasClass('control_volume')) {
                        mantis.toggleVolume();
                    }
                    else if (jTarget.hasClass('completed') || jTarget.hasClass('progress')) {
                        mantis.startDragVolume();
                    }
                    else if (jTarget.hasClass('control_fullscreen')) {
                        if (true === zis.isFullScreen) {
                            mantis.exitFullscreen();
                        }
                        else {
                            mantis.enterFullscreen();
                        }
                    }
                    return false;
                }
            });

            this.jSurface.on('mousedown.mantis', '.handle', function (e) {
                if (1 === e.which) {
                    var jTheHandle = $(this);
                    if (jTheHandle.hasClass('vertical')) {
                        mantis.startDragVolume();
                    }
                    else {
                        mantis.startDragPlayHead(e);
                    }
                    return false;
                }
            });


            this.jControlBar.on('mouseenter', '.control', function () {
                if ($(this).hasClass('control_volume')) {
                    mantis.openVolumePanel();
                }
            });


            this.jControlBar.on('mouseleave', '.control', function () {
                if ($(this).hasClass('control_volume')) {
                    mantis.closeVolumePanel();
                }
            });


            this.jTimeLineProgress
                .on('mouseenter', function (e) {
                    mantis.startHoverMode();
                })
                .on('mouseleave', function (e) {
                    mantis.stopHoverMode();
                })
                .on('mousedown', function (e) {
                    mantis.startDragPlayHead(e);
                })
                .on('mousemove', function (e) {
                    if (false === mantis.isPlayHeadDragging() && true === mantis.isHoverMode()) {
                        mantis.hoverTimeLine(e);
                    }
                });


            this._refreshTimeLineValues();
        },
        //------------------------------------------------------------------------------/
        // SKIN API
        //------------------------------------------------------------------------------/
        play: function (triggerEvent) {
            this.vswitch.kickOut('control_play_resume').kickIn('control_pause');
            if (false !== triggerEvent) {
                this._trigger('play');
            }
        },
        pause: function (triggerEvent) {
            this.vswitch.kickOut('control_pause').kickIn('control_play_resume');
            if (false !== triggerEvent) {
                this._trigger('pause');
            }
        },
        /**
         * bufferedRanges: array or <range>s.
         * <range>: array:
         * - 0: start time in seconds of the buffered range
         * - 1: end time in seconds  of the buffered range
         *
         */
        setBufferedRanges: function (bufferedRanges) {
            if (bufferedRanges.length > 0) {
                var maxTime = bufferedRanges.pop()[1];
                var percent = maxTime / this.duration * 100;
                this.jSliderBuffered.css('width', percent + '%');
            }
        },
        setDuration: function (d) {
            this.duration = d;
        },
        setPlayHeadPositionByTime: function (t, alsoMovePreview) {
            var p = t / this.duration * 100;
            this._setTimeLinePositionByPercent(p, alsoMovePreview);
        },
        setVolume: function (percent, triggerEvent) {
            this.jVolumeCompleted.css('height', percent + '%');
            this.jVolumeTarget.css('bottom', percent + '%');

            if (0 === percent) {
                setVolumeClass(this.jVolume, 'jvp-icon-volume-mute');
            }
            else if (percent < 35) {
                setVolumeClass(this.jVolume, 'jvp-icon-volume-low');
            }
            else if (percent < 70) {
                setVolumeClass(this.jVolume, 'jvp-icon-volume-medium');
            }
            else {
                setVolumeClass(this.jVolume, 'jvp-icon-volume-high');
            }
            if (false !== triggerEvent) {
                this._trigger('volumedrag', percent);
            }
        },

        //------------------------------------------------------------------------------/
        // MANTIS API
        //------------------------------------------------------------------------------/
        attachPlugin: function (p) {
            p.init(this);
        },
        on: function (eventId, fn) {
            if (false === (eventId in this.listeners)) {
                this.listeners[eventId] = [];
            }
            this.listeners[eventId].push(fn);
        },
        getSurface: function () {
            return this.jSurface;
        },
        setTitle: function (title) {
            this.jTitle.html(title);
        },
        setInfoBoxText: function (t) {
            this.jTimeLineTimeInfoBox.html(t);
        },
        openVolumePanel: function () {
            this.vswitch.kickIn('volume_panel hide_timeline');
        },
        closeVolumePanel: function () {
            this.vswitch.kickOut('volume_panel hide_timeline');
        },
        setBubbleContent: function (content) {
            this.jBubble.find('> label').empty().append(content);
        },
        showBubble: function () {
            this.vswitch.kickIn('with_bubble');
        },
        hideBubble: function () {
            this.vswitch.kickOut('with_bubble');
        },
        enterFullscreen: function () {
            this.jFullScreen.removeClass("jvp-icon-enlarge").addClass('jvp-icon-shrink');
            this._trigger('enterfullscreen');
            this.isFullScreen = true;
        },
        exitFullscreen: function () {
            this.jFullScreen.removeClass("jvp-icon-shrink").addClass('jvp-icon-enlarge');
            this._trigger('exitfullscreen');
            this.isFullScreen = false;
        },
        toggleVolume: function () {
            if (false === this.jVolume.hasClass('jvp-icon-volume-mute')) {
                this.setVolume(0);
            }
            else {
                this.setVolume(this.currentNonMutedVolume);
            }
        },
        isHoverMode: function () {
            return this.jSurface.hasClass('preview_mode');
        },
        isPlayHeadDragging: function () {
            return this.jSurface.hasClass('scrub_mode');
        },
        hideTimeline: function(){
            this.vswitch.kickIn('no_timeline');  
        },
        showTimeline: function(){
            this.vswitch.kickOut('no_timeline');  
        },
        //------------------------------------------------------------------------------/
        // SPECIAL 
        //------------------------------------------------------------------------------/
        startDragPlayHead: function (e) {
            this.vswitch.kickIn('scrub_mode');
            var val = this._getTimeLineMousePosition(e);
            this._refreshTimeLineValues();
            this.jTimeLineMarkArrow.css('left', val + 'px');
            var zis = this;
            dragSlider(this.jTimeLineHandle, '.scrubber', true, function (v, p) {
                p = zis._applyScrubLimit(p);
                zis._setTimeLinePositionByPercent(p);
                zis._trigger("timelinedrag", p);

            }, function (v, p) {
                p = zis._applyScrubLimit(p);
                zis._setTimeLinePositionByPercent(p);
                zis._trigger("timelineupdated", p);
                zis.vswitch.kickOut('scrub_mode');
            });
        },
        startHoverMode: function () {
            this.vswitch.kickIn('preview_mode');
            this._refreshTimeLineValues();
        },
        stopHoverMode: function () {
            this.vswitch.kickOut('preview_mode');
        },
        hoverTimeLine: function (e) {
            var val = this._getTimeLineMousePosition(e);
            this._setPreviewPositionByValue(val);
            this._trigger("timelinehover", this._getTimeLinePercent(val));
        },
        startDragVolume: function () {
            var zis = this;
            var fn = function (v, p) {
                zis.setVolume(p);
                zis.currentNonMutedVolume = p;
            };
            dragSlider(this.jVolumeHandle, '.scrubber', false, fn, fn);
        },
        setScrubLimit: function (t) {
            this.scrubLimit = t;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _applyScrubLimit: function (p) {
            if (null === this.scrubLimit) {
                return p;
            }
            var t = p * this.duration / 100;
            if (t > this.scrubLimit) {
                return this.scrubLimit / this.duration * 100;
            }
            return p;
        },
        _getTimeLineMousePosition: function (e) {
            var val = e.pageX - this.sliderOffset;
            if (val < 0) {
                val = 0;
            }
            if (val > this.sliderWidth) {
                val = this.sliderWidth;
            }
            return val;
        },
        _getTimeLinePercent: function (val) {
            return (val / this.sliderWidth * 100);
        },
        _refreshTimeLineValues: function () {
            this.sliderOffset = this.jTimeLineScrubber.offset().left;
            this.sliderWidth = this.jTimeLineScrubber.width();
            this.halfPreviewWidth = this.jTimeLinePreview.outerWidth() / 2;
        },
        _setTimeLinePositionByPercent: function (p, alsoMovePreview) {
            var v = this.sliderWidth * p / 100;
            this.jSliderCompleted.css('width', p + '%');
            this.jTimeLineHandle.parent().css('left', p + '%');
            if (false !== alsoMovePreview) {
                this.jTimeLinePreview.css('left', (v - this.halfPreviewWidth) + 'px');
            }
        },
        _trigger: function (method, ...args) {
            if (method in this.listeners) {
                this.listeners[method].forEach(function (fn) {
                    fn.call(this, ...args);
                }, this);
            }
        },
        _setPreviewPositionByValue: function (val) {
            this.jTimeLineMark.css('left', val + 'px');
            this.jTimeLinePreview.css('left', (val - this.halfPreviewWidth) + 'px');
        },
    };


    function setVolumeClass(jTarget, newClass) {
        jTarget.removeClass("jvp-icon-volume-high jvp-icon-volume-medium jvp-icon-volume-low jvp-icon-volume-mute").addClass(newClass);
    }


})();