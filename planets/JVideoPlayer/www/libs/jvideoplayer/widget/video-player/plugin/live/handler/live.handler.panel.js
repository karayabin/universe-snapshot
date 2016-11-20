window.liveHandlerPanel = function (options) {
    this.d = $.extend({
        match: function (event) {
            return false;
        },
        /**
         * The name of the property that allows us to distinguish between two events.
         * Assuming all events are unique.
         */
        idKey: 'id',
        textKey: 'text',
        /**
         * Wraps the text of the panel into a .panel div, which by default has a black background.
         */
        usePanelWrap: true,
    }, options);

    /**
     * The keys of this map are the events[idKey] values,
     * and the values are true.
     *
     * If the key is set, it means that the content of the panel is currently loaded.
     * If the key is NOT set, it means that the content of the panel is not currently loaded (or has been unloaded).
     */
    this.contents = {};
    this.vp = null;

};

liveHandlerPanel.prototype = {
    prepare: function (pluginLive, vp) {

        var zis = this;
        this.vp = vp;
        vp.createLayer("panel", 100, '');

        vp.on("liveresume", function (event) {
            if (true === zis._match(event)) {
                var id = zis._id(event);
                if (false === zis.contents.hasOwnProperty(id)) {
                    var layer = vp.lm.getJLayer('panel');

                    var content = event[zis.d.textKey];
                    if (true === zis.d.usePanelWrap) {
                        content = '<div class="panel">' + content + '</div>';
                    }
                    layer.append(content);
                    zis.contents[id] = true;
                }
            }
        });

        vp.on("livekill", function (event) {
            if (true === zis._match(event)) {
                zis._removeEvent(event);
            }
        });
        vp.on("livestop", function (event) {
            if (true === zis._match(event)) {
                zis._removeEvent(event);
            }
        });
    },
    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    _removeEvent: function (event) {
        var id = this._id(event);
        if (true === this.contents.hasOwnProperty(id)) {
            this._clean();
            delete this.contents[id];
        }
    },
    _clean: function () {
        var layer = this.vp.lm.getJLayer('panel');
        layer.empty();
    },
    _id: function (event) {
        return event[this.d.idKey];
    },
    _match: function (event) {
        return (true === this.d.match(event));
    },
};