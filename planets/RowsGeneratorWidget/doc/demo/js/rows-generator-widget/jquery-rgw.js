(function ($) {

    /**
     * Some principles used in this class.
     *
     * - When you click an object, you often want to retrieve data as well.
     *      For instance, if you click on a pagination link, you probably want
     *      to access the page number associated with it.
     *
     *      Yet we have to deal with the template's markup, and sometimes
     *      the element you click on is not the same as the one exposing the
     *      info (via the data-* attributes), but a nested element of it.
     *
     *      Therefore, our technique is the following: we add some css classes
     *      on elements that can potentially be clicked, and we add an extra
     *      "-top" suffix on the element that contains the data, in addition
     *      to the regular class.
     *
     *      Read the source code for implementation details.
     *
     *
     * - before using this object, you need to define the refreshWidget
     *          option, which is used to refresh the widget.
     *
     *
     * - this js file controls the whole appearance of the widget.
     *      It basically collects all the params and send them to the service as one pack.
     *
     *          - page
     *          - nipp
     *          - sortValues
     *          - searchItems
     *
     *      So for instance, whether you use one unique sort or allow multiple columns sorting
     *      is decided by this object.
     *
     *
     * - this object listens to events, which shape the rows displayed.
     * You can disable/enable the listening of events by using the configuration keys that
     * start with the "use" prefix.
     *      Each listener implies that the widget uses a certain markup.
     *      You should read the documentation and find if there is a markup example for a
     *      particular listener you would like to activate.
     *      There should be an example for every listener.
     *
     *      Otherwise, you can still rely on the source code and figure it yourself, it shouldn't be too hard.
     *
     *
     *
     *
     *
     *
     *
     */

    function execute(onSuccess) {
        if ('undefined' !== typeof onSuccess) {
            console.log(Array.prototype.slice.call(args, 1));
            onSuccess.apply(this, Array.prototype.slice.call(args, 1));
        }
    }

    function getWidgetNameByTarget(jTarget) {
        return jTarget.closest(".rgw-widget").attr("data-name");
    }

    $.rowsGeneratorWidget = function (element, options) {


        this.o = $.extend({}, {
            uriRgwService: "/service/rgw.php",
            onError: function (msg) {
                console.log("rowsGeneratorWidget error: " + msg);
            },
            /**
             * - rows: array of rows
             * - nbItems: int
             * - nbPages: int
             * - nipp: int
             * - page: int, the current page
             */
            refreshWidget: function (data) {

            },
            /**
             * This function return the params to use to shape the rows.
             * It must return an array with the following data:
             *
             * - page
             * - nipp
             * - sortValues
             * - searchItems
             *
             *
             *
             */
            collectWidgetParams: null,
            usePageLinks: true,
            useSortSelector: true,
            //
            page: 1,
            nipp: 20,
            sortValues: {},
            searchItems: {}
        }, options);

        var jElement = $(element);
        var widgetName = jElement.attr("data-name");
        var zis = this;
        var currentPage = 1;
        var currentNipp = zis.o.nipp;
        var currentSortValues = zis.o.sortValues;
        var currentSearchItems = zis.o.searchItems;


        function getWidgetParams(action) {
            var params = {};
            if (null !== zis.o.collectWidgetParams) {
                params = zis.o.collectWidgetParams();
            }
            else {
                params.page = currentPage;
                params.nipp = currentNipp;
                params.sortValues = currentSortValues;
                params.searchItems = currentSearchItems;
            }
            params.name = widgetName;
            return params;
        }


        function request(data, onSuccess) {
            $.post(zis.o.uriRgwService, data, function (d) {
                if ('success' === d.type) {
                    var data = d.data;
                    execute(onSuccess, data);
                    zis.o.refreshWidget(data);
                }
                else if ('error' === d.type) {
                    zis.o.onError(d.data);
                }
            }, 'json');
        }


        jElement.on('click', function (e) {
            var jTarget = $(e.target);

            if (true === zis.o.usePageLinks) {
                if (jTarget.hasClass('rgw-page')) {
                    currentPage = jTarget.closest(".rgw-page-top").attr("data-id");
                    request(getWidgetParams());
                    return false;
                }
            }
        });


        if (true === zis.o.useSortSelector) {
            var jSortSelector = jElement.find(".unique-sort-selector");
            jSortSelector.on('change', function () {

                var jOption = $(this).find(":selected");
                var dir = jOption.attr('data-sort-dir');
                var column = jOption.attr('data-sort-column');

                if ('undefined' !== typeof dir) {
                    currentSortValues = {};
                    currentSortValues[column] = dir;
                    request(getWidgetParams());
                }

            });
        }


    };

    $.rowsGeneratorWidget.prototype = {};

    $.fn.rowsGeneratorWidget = function (options) {

        return this.each(function () {
            if (undefined == $(this).data("rowsGeneratorWidget")) {
                var plugin = new $.rowsGeneratorWidget(this, options);
                $(this).data("rowsGeneratorWidget", plugin);
            }
        });
    };

})(jQuery);