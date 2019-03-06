(function () {

    /**
     *
     * This plugins draws marks on the timeline of the mantis remote.
     *
     *
     *
     * Events
     * ===========
     *
     * listened to
     * ----------------
     * - setcurrentvideo, update the duration, used internally for positioning the <visualMark>s.
     *
     *
     */

    window.pluginMantisTimelineMark = function (options) {
        this.d = $.extend({
            /**
             * Array of <mark>s.
             * A <mark> is an object with the following properties:
             *
             *          - start: int, when does the mark start, in milliseconds
             *          - ?appearance: string|jHandle|map
             *                      By default, a <visualMark> will be created with css class defined by the cssClassMark option.
             *                      If appearance is a string, it is the inner html of the <visualMark>.
             *
             *                      If you pass a jquery handle, the <visualMark> will be emptied, then
             *                      the jHandle will be appended to the <visualMark>.
             *
             *                      If you pass a map, you have more possibilities:
             *
             *                              - ?content: string|jHandle, the content of the <visualMark>.
             *                              - ?cssClass: a css class to add to the default <visualMark> container
             *
             *
             *          - ?click: function, a handled triggered when the user clicks on the <visualMark>
             *          - ?mouseenter: function, a handled triggered when the user mouse enters the <visualMark>
             *          - ?mouseleave: function, a handled triggered when the user mouse leaves the <visualMark>
             *
             *
             *
             * Css integration:
             * ---------------------
             *
             * A <visualMark> should have absolute positioning, as it is positioned inside the scrubber element of
             * mantis, which has position: relative.
             *
             *
             */
            marks: [],
            cssClassMark: 'timeline_mark',
            matchVideo: function(videoInfo){
                return (videoInfo.type && 'main' === videoInfo.type);
            },
        }, options);
    };

    pluginMantisTimelineMark.prototype = {
        prepare: function (vp, mantis) {
            this.tl = mantis.jTimeLineProgress;
            this.mantis = mantis;

            var zis = this;
            vp.on('setcurrentvideo', function (info) {

                zis.removeVisualMarks();

                if (true === zis.d.matchVideo(info)) {
                    zis.duration = info.duration;
                    for (var i in zis.d.marks) {
                        zis.drawMark(zis.d.marks[i], zis.tl);
                    }
                }
            });


        },
        drawMark: function (mark, jContainer) {
            var p = mark['start'] / (this.duration * 1000) * 100;
            var jHtml = null;
            if ('appearance' in mark) {
                var app = mark['appearance'];
                if ('string' === typeof app || app instanceof jQuery) {
                    jHtml = this.getMarkHtml(p, app);
                }
                else {
                    var c = '';
                    if ('content' in app) {
                        c = app.content;
                    }
                    jHtml = this.getMarkHtml(p, c, app.cssClass);
                }
            }
            else {
                jHtml = this.getMarkHtml(p, '');
            }
            jContainer.append(jHtml);


            if ('click' in mark) {
                jHtml.on('click', function () {
                    mark.click();
                    return false;
                });
            }
            if ('mouseenter' in mark) {
                jHtml.on('mouseenter', function () {
                    mark.mouseenter();
                    return false;
                });
            }
            if ('mouseleave' in mark) {
                jHtml.on('mouseleave', function () {
                    mark.mouseleave();
                    return false;
                });
            }


        },
        removeVisualMarks: function () {
            this.tl.find('.' + this.d.cssClassMark).remove();
        },
        getMarkHtml: function (p, html, extraClass) {
            if ('undefined' === typeof extraClass) {
                extraClass = '';
            }
            var jMark = $('<div class="' + this.d.cssClassMark + ' ' + extraClass + '" style="left: ' + p + '%"></div>');
            jMark.append(html);
            return jMark;
        }
    };

})();
