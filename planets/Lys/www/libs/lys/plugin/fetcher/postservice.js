(function () {


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * This fetcher fetches data from a service, using POST method.
     * A separate handler is used to handle the communication between the service and this object:
     * so that you can use tim protocol, or classical protocol, without changing THIS object code.
     */
    window.LysFetcherPostService = function (options) {
        this.d = Lys.extend({
            url: '/service/app/myservice.php',
            /**
             * id: the id provided by the needData event
             */
            getParams: function (id) {

            },
            /**
             * Any object with the following methods:
             *
             * - void   post ( str:url, map:params, fn:onSuccess )
             */
            handler: null,
            autoIncParamName: 'inc',
            autoIncStartValue: 0,
        }, options);

        this.autoInc = this.d.autoIncStartValue;
        this.handler = this.d.handler;
    };

    LysFetcherPostService.prototype = {
        init: function (lys) {

            var zis = this;

            lys.on('needData', function (id) {
                var params = zis._onNeedDataGetParams(id);
                zis.handler.post(zis.d.url, params, function (data) {
                    lys.trigger('dataReady', id, data);
                });
            });
        },
        setAutoIncrementedValue: function (v) {
            this.autoInc = v;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        /**
         * Only use this method if you are actually processing a needData event,
         * otherwise the autoInc value might be desynchronized.
         */
        _onNeedDataGetParams: function (id) {
            var params = this.d.getParams(id);
            if ('undefined' === typeof params) {
                params = {};
            }
            params[this.d.autoIncParamName] = this.autoInc++;
            return params;
        },
    };

})();