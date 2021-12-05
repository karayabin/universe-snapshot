if ('undefined' === typeof window.LingHelpers) {


    window.LingHelpers = {

        /**
         * Available options are:
         * - message: the message of the toast
         *
         *
         *
         * Type can be by default one of:
         * - error
         * - success
         * - info
         *
         *
         * Customization is available using the LingHelpers._toastOptions property (do this once for the whole application).
         *
         *
         *
         * @param message
         * @param type
         */
        addToast: function (message, type) {
            var jContext = $(this._toastOptions.contextSel);
            var jContainer = jContext.find(".toast-container");
            var jTpl = jContext.find(".tpl-toast .toast");
            var jToast = jTpl.clone();
            jContainer.append(jToast);
            jToast.find('.toast-body').html(message);


            var jTypeMarker = jToast.find('.type-marker');
            if (jTypeMarker.length > 0) {
                var typeClass = this._toastOptions.types[type];
                jTypeMarker.addClass(typeClass);
            }


            var jTimeMarker = jToast.find('.time-marker');
            if (jTimeMarker.length > 0) {
                var datetime = this.getMysqlDatetimeByDate(new Date());
                // jTimeMarker.attr('data-time', time);

                setInterval(() => {
                    jTimeMarker.text(this.timeAgo(datetime));
                }, 1000);
            }

            var toast = new bootstrap.Toast(jToast[0], {
                autohide: false,
            });
            toast.show();

        },
        /**
         * Returns the mysql datetime from the given date object.
         *
         * @param date
         * @returns string
         */
        getMysqlDatetimeByDate: function (date) {
            return date.toISOString().split('T')[0] + ' '
                + date.toTimeString().split(' ')[0];
        },
        /**
         * A generic alcp call that use toasts to show errors.
         *
         * A generic loader is assumed with css id: toast-generic-loader.
         * It should be "display: none" by default, and we handle its visibility from there (i.e., display:block/none).
         *
         * For the toasts, we use the addToast method from this object, with type error for
         * all alcp errors, and http errors.
         *
         * The success callback is passed as it to the AlcpHelper.post method.
         *
         *
         * @param url
         * @param data
         * @param success
         */
        postAlcpToast: function (url, data, success) {
            var zis = this;
            var jLoader = $('#toast-generic-loader');

            var error = function (error, response, textStatus, jqXHR) {
                zis.addToast(error, "error");
            };
            var httpError = function (jqXHR, textStatus, errorThrown) {
                zis.addToast("Http error: " + errorThrown, "error");
            };


            AlcpHelper.post(url, data, {
                loader: jLoader,
                success: success,
                error: error,
                httpError: httpError,
            });
        },
        /**
         * Returns a human friendly hint about how far in the past the given date was.
         *
         * Example of returned strings:
         *
         * - just now
         * - 10 seconds ago
         * - about a minute ago
         * - 25 minutes ago
         * - Today at 10:20
         * - Yesterday at 10:20
         * - 2021-08-03 at 09:10
         *
         *
         *
         * @param date
         * @returns {string}
         */
        timeAgo: function (date) {

            // https://muffinman.io/blog/javascript-time-ago-function/
            function getFormattedDate(date, prefomattedDate = false, hideYear = false) {

                // https://stackoverflow.com/questions/6040515/how-do-i-get-month-and-date-of-javascript-in-2-digit-format
                const day = ("0" + date.getDate()).slice(-2);
                const month = ("0" + (date.getMonth() + 1)).slice(-2);
                const year = date.getFullYear();
                const hours = ("0" + date.getHours()).slice(-2);
                let minutes = ("0" + date.getMinutes()).slice(-2);


                if (prefomattedDate) {
                    // Today at 10:20
                    // Yesterday at 10:20
                    return `${prefomattedDate} at ${hours}:${minutes}`;
                }

                if (hideYear) {
                    // 10. January at 10:20
                    return `${day}. ${month} at ${hours}:${minutes}`;
                }

                // 2017-01-01 at 10:20
                return `${year}-${month}-${day} at ${hours}:${minutes}`;
            }


            function timeAgo(dateParam) {
                if (!dateParam) {
                    return null;
                }

                const date = typeof dateParam === 'object' ? dateParam : new Date(dateParam);
                const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
                const today = new Date();
                const yesterday = new Date(today - DAY_IN_MS);
                const seconds = Math.round((today - date) / 1000);
                const minutes = Math.round(seconds / 60);
                const isToday = today.toDateString() === date.toDateString();
                const isYesterday = yesterday.toDateString() === date.toDateString();
                // const isThisYear = today.getFullYear() === date.getFullYear();


                if (seconds < 5) {
                    return 'just now';
                } else if (seconds < 60) {
                    return `${seconds} seconds ago`;
                } else if (seconds < 90) {
                    return 'about a minute ago';
                } else if (minutes < 60) {
                    return `${minutes} minutes ago`;
                } else if (isToday) {
                    return getFormattedDate(date, 'Today'); // Today at 10:20
                } else if (isYesterday) {
                    return getFormattedDate(date, 'Yesterday'); // Yesterday at 10:20
                }
                return getFormattedDate(date); // 2021-08-03 at 09:10
            }


            return timeAgo(date);
        },


        //----------------------------------------
        //
        //----------------------------------------
        _toastOptions: {
            contextSel: '#toast-context',
            /**
             * A map of toastType => css class to add to the type marker (if any)
             */
            types: {
                warning: "bg-warning",
                info: "bg-primary",
                success: "bg-success",
                error: "bg-danger",
            }
        },
    }


}