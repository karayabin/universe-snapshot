(function () {
    /**
     * Dependencies:
     *
     * - jquery
     * - tim
     */
    window.LysFetcherPostServiceTimHandler = function (options) {
        this.d = Lys.extend({
            /**
             * Triggered when the request has resolved, but the server responded with a tim error
             */
            onTimError: function (data) {

            },
            /**
             * Triggered when the server didn't respond to the request as expected
             */
            onRequestFailure: function () {

            },
        }, options);
    };

    LysFetcherPostServiceTimHandler.prototype = {
        post: function (url, data, onSuccess) {

            var zis = this;
            timPost(url, data, onSuccess, this.d.onTimError).fail(function (jqXHR, textStatus, errorThrown) {
                zis.d.onRequestFailure();
            });
        },
    };
})();