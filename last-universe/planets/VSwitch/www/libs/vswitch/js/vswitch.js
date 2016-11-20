(function () {

    if ('undefined' === typeof window.vswitch) {


        /**
         * - Ecma5+
         * - jquery
         *
         */

        function devError(m) {
            throw new Error("vswitch error: " + m);
        }

        function getClassesAsArray(cssClasses) {
            if ('string' === typeof cssClasses) {
                return cssClasses.split(" ");
            }
            else if (Array.isArray(cssClasses)) {
                return cssClasses;
            }
            else {
                devError("Invalid cssClasses type");
            }
        }

        function getClassesAsCsv(cssClasses, prefixWithDot) {
            if ('' === cssClasses) {
                return cssClasses;
            }
            if (true === prefixWithDot) {
                return '.' + getClassesAsArray(cssClasses).join(', .');
            }
            return getClassesAsArray(cssClasses).join(', ');
        }

        /**
         * Return css classes as space separated values
         * If prefixWithDot argument is true, all classes are prefixed with dot.
         */
        function getClassesAsSsv(cssClasses, prefixWithDot) {
            if ('' === cssClasses) {
                return cssClasses;
            }
            if (true === prefixWithDot) {
                return '.' + getClassesAsArray(cssClasses).join(' .');
            }
            return getClassesAsArray(cssClasses).join(' ');
        }


        function isHidden(jEl) {
            if ('none' === jEl.css('display')) {
                return true;
            }
            return false;
        }

        function hasAnyClass(jEl, aViews) {
            for (var i in aViews) {
                if (true === jEl.hasClass(aViews[i])) {
                    return true;
                }
            }
            return false;
        }

        function diff(orig, minus) {
            return $(orig).not(minus).get();
        }


        /**
         * stolen from html template
         */
        function processMap(raw, data) {
            for (var name in data) {
                var value = data[name];
                var reg = new RegExp('\\$' + name, 'g');
                raw = raw.replace(reg, value);
            }
            return raw;
        }

        function inArray(k, arr) {
            return (-1 !== arr.indexOf(k));
        }

        window.vswitch = function (jSurface, views, options) {
            this.surface = jSurface;
            /**
             * views can be:
             *
             * - string: space separated classes (exactly one space between each class)
             * - array: or an array
             */
            this.viewClasses = views;

            this.o = $.extend(true, {
                /**
                 * @param mode - string (css|show|fade).
                 *      Default value is css.
                 *      When mode is set to css, the object assumes that the
                 *      show/hide mechanisms and transitions are handled by you.
                 *      It's the "Do it yourself" mode.
                 *
                 *      When mode is set to show, the object handles the show/hide
                 *      strategy for you, using jquery's show/hide method when appropriate.
                 *
                 *      When mode is set to fade, it does the same as when it's set
                 *      to show, except that the transitions used are jquery's fadeIn and
                 *      fadeOut methods.
                 *
                 *
                 *
                 */
                mode: 'css',
                /**
                 * @param starter - string|array
                 * A space (exactly one) separated string of classes that should be displayed on instantiation.
                 * Or, can be an array of classes.
                 */
                starter: "",
                /**
                 * @param fadeSpeed - int,
                 *              Default = 250
                 *              the speed of the fadeIn and fadeOut for the following methods (only if mode=fade):
                 *              kickIn, kickOut, toggle.
                 */
                fadeSpeed: 250,
                /**
                 * @param callbacks - map:
                 *                      - viewName:
                 *                      ----- callbackName: function ( jHandle:jView, mixed:callbacksArg )
                 *                      ----- ...
                 *
                 *               callbackName can be one of:
                 *               - init (triggered for every views that kicks in for the first time)
                 *               - in (triggered for every views that kicks in during a call to the following methods: switchView, kickIn, toggle)
                 *               - out (triggered for every views that kicks out during a call to the following methods: switchView, kickIn, toggle)
                 *
                 *              callbacksArg:
                 *                  - init: undefined
                 *                  - in/out: mixed, the second argument that you passed to the
                 *                                  switchView, kickIn, kickOut or toggle methods.
                 *
                 *
                 *              Note: callbacks are executed BEFORE the visual transition occurs.
                 */
                callbacks: {},
            }, options);


            this._initialized = []; // keeping track of initialized views


            this.init();
            jSurface.data('vswitch', this);

        };
        vswitch.prototype = {
            init: function () {
                if ('css' === this.o.mode) {
                    this.surface.addClass(this.o.starter);
                }
                // if not in css mode, hide all view elements except for the starter ones
                else if ('show' === this.o.mode || 'fade' === this.o.mode) {
                    this._getViews(this.viewClasses).hide();
                    this._getViews(this.o.starter).show();
                }

                this._trigger('init', this.o.starter);

            },
            switchView: function (views, callbacksArg, mode) {
                if ('undefined' === typeof mode) {
                    mode = this.o.mode;
                }


                this._trigger('in', views, callbacksArg);
                this._trigger('out', diff(this.viewClasses, views), callbacksArg);

                if ('css' === mode) {
                    this.surface.removeClass(getClassesAsSsv(this.viewClasses)).addClass(getClassesAsSsv(views));
                }
                else if ('show' === mode) {
                    var aViews = getClassesAsArray(views);
                    this._getViews().each(function () {
                        if (true === hasAnyClass($(this), aViews)) {
                            $(this).show();
                        }
                        else {
                            $(this).hide();
                        }
                    });
                }
                else if ('fade' === mode) {
                    var zis = this;
                    this._getViews(this.viewClasses, views).fadeOut(100, function () {
                        zis._getViews(views).fadeIn();
                    });
                }
                else {
                    devError("Invalid mode: " + mode);
                }
                return this;
            },
            kickIn: function (views, callbacksArg, mode) {
                if ('undefined' === typeof mode) {
                    mode = this.o.mode;
                }
                this._trigger('in', views, callbacksArg);
                if ('css' === mode) {
                    this.surface.addClass(getClassesAsSsv(views));
                }
                else if ('show' === mode) {
                    this._getViews(views).show();
                }
                else if ('fade' === mode) {
                    this._getViews(views).fadeIn(this.o.fadeSpeed);
                }
                else {
                    devError("Invalid mode: " + mode);
                }
                return this;
            },
            kickOut: function (views, callbacksArg, mode) {
                if ('undefined' === typeof mode) {
                    mode = this.o.mode;
                }

                this._trigger('out', views, callbacksArg);
                if ('css' === mode) {
                    this.surface.removeClass(getClassesAsSsv(views));
                }
                else if ('show' === mode) {
                    this._getViews(views).hide();
                }
                else if ('fade' === mode) {
                    this._getViews(views).fadeOut(this.o.fadeSpeed);
                }
                else {
                    devError("Invalid mode: " + mode);
                }
                return this;
            },
            toggle: function (views, callbacksArg, mode) {

                if ('undefined' === typeof mode) {
                    mode = this.o.mode;
                }

                var aViews = getClassesAsArray(views);
                for (var i in aViews) {
                    var cssClass = aViews[i];
                    var jView = this.surface.find('.' + cssClass);
                    if (jView.length) {

                        if (isHidden(jView)) {
                            this._triggerByElement('in', cssClass, jView, callbacksArg);
                            switch (mode) {
                                case "css":
                                    jView.toggleClass(cssClass);
                                    break;
                                case "show":
                                    jView.show();
                                    break;
                                case "fade":
                                    jView.fadeIn(this.o.fadeSpeed);
                                    break;
                                default:
                                    devError("Invalid mode: " + mode);
                                    break;
                            }
                        }
                        else {
                            this._triggerByElement('out', cssClass, jView, callbacksArg);
                            switch (mode) {
                                case "css":
                                    jView.toggleClass(cssClass);
                                    break;
                                case "show":
                                    jView.hide();
                                    break;
                                case "fade":
                                    jView.fadeOut(this.o.fadeSpeed);
                                    break;
                                default:
                                    devError("Invalid mode: " + mode);
                                    break;
                            }
                        }
                    }
                }
                return this;
            },
            _getViews: function (viewsOrNull, notViews) {
                if ('undefined' === typeof viewsOrNull) {
                    return this.surface.find(getClassesAsCsv(this.viewClasses, true));
                }
                else {
                    if ('undefined' === typeof notViews) {
                        return this.surface.find(getClassesAsCsv(viewsOrNull, true));
                    }
                    return this.surface.find(getClassesAsCsv(viewsOrNull, true)).not(getClassesAsCsv(notViews, true));
                }
            },
            _trigger: function (cbName, views, args) {
                var aViews = getClassesAsArray(views);
                for (var i in aViews) {
                    if (aViews[i] in this.o.callbacks) {

                        var jView = this.surface.find('.' + aViews[i]);
                        this._triggerInitMaybe(cbName, aViews[i], jView, args);

                        if (cbName in this.o.callbacks[aViews[i]]) {
                            if ('init' !== cbName) {
                                var cb = this.o.callbacks[aViews[i]][cbName];
                                cb(jView, args);
                            }
                        }
                    }
                }
            },
            _triggerByElement: function (cbName, viewName, jView, args) {
                if (viewName in this.o.callbacks) {

                    this._triggerInitMaybe(cbName, viewName, jView, args);

                    if (cbName in this.o.callbacks[viewName]) {
                        var cb = this.o.callbacks[viewName][cbName];
                        cb(jView, args);
                    }
                }
            },
            _triggerInitMaybe: function (cbName, viewName, jView, callArg) {
                if ('out' !== viewName) {
                    if ('init' in this.o.callbacks[viewName]) {
                        if (false === inArray(viewName, this._initialized)) {
                            if ('init' === cbName || 'in' === cbName) {
                                this.o.callbacks[viewName]['init'](jView, callArg);
                                this._initialized.push(viewName);
                            }
                        }
                    }
                }
            }
        };


        /**
         * Replaces the content (inner html) of the jView using simple tag replacement mechanism.
         */
        vswitch.template = function (jView, tags) {
            if (tags && 'object' === typeof tags) {
                var html = jView.html();
                html = processMap(html, tags);
                jView.html(html);
            }
        };
    }
})();