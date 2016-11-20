(function () {


    /**
     * Internal cache, array of tplAlias => tplContent
     */

    var loadedTpls = {};


    window.htpl = {
        /**
         * string, the url of the directory where templates reside.
         */
        dir: "/templates",
        /**
         *
         * Load the given templates and execute the given callback.
         *
         *
         * @param templates - map, the templates to load.
         *                          It's an array of alias => template relative url
         * @param fnLoaded - callback, the callback to execute once the templates are ready.
         * @param staticContainerId - undefined|string, the css id of a (hidden) div containing the static templates.
         *                                  If this string is undefined, htpl will attempt to fetch the templates via http.
         *                                  If this string is defined, htpl will search in the html document (no http requests)
         *
         *
         *
         */
        loadTemplates: function (templates, fnLoaded, staticContainerId) {
            if ('undefined' === typeof staticContainerId) {

                var n = 0;
                for (var i in templates) {
                    n++;
                }

                function decrementAndFire() {
                    n--;
                    if (0 === n) {
                        fnLoaded();
                    }
                }

                for (var alias in templates) {
                    loadTemplate(alias, templates[alias], decrementAndFire);
                }
            }
            else {

                var dContainer = document.querySelector('#' + staticContainerId);
                if (null !== dContainer) {
                    var hasError = false;
                    for (var alias in templates) {
                        var relPath = templates[alias];
                        var dTpl = dContainer.querySelector('[data-id="' + relPath + '"]');
                        if (null !== dTpl) {
                            loadedTpls[alias] = dTpl.innerHTML;
                        }
                        else {
                            hasError = true;
                            devError('static template not found with data-id=' + relPath);
                        }
                    }

                    if (false === hasError) {
                        fnLoaded();
                    }
                }
                else {
                    devError('static templates container not found: #' + staticContainerId);
                }
            }
        },
        /**
         * Inject data in the given template, using the given method.
         *
         * @param data - mixed, the data to inject into the template, can be of any type,
         *                      works along with the dataType parameter.
         * @param tpl - string, the alias of the template to use
         * @param dataType - string, represents the method used to inject the data into the template,
         *                          can be one of:
         *
         *                              - map (default), assumes that the data is a simple map of properties,
         *                                              which keys are the name of the placeholders (placeholders are used
         *                                              in the template),
         *                                              and which values are the values to replace them with.
         *
         *                              - rows, assumes that the data is an array of map (as described above).
         *                              - list, assumes that the data is an array or array object.
         *                                              Your template can use the $key and $value placeholders to
         *                                              access each array key and/or value.
         *                                              You can specify the separator (extra arg) between elements.
         *                                              The default separator is an empty string.
         *
         *
         *
         */
        getHtml: function (data, tpl, dataType, extra) {
            if (tpl in loadedTpls) {

                var raw = loadedTpls[tpl];
                dataType = dataType || 'map';

                switch (dataType) {
                    case 'map':
                        return processMap(raw, data);
                        break;
                    case 'rows':
                        return processRows(raw, data);
                        break;
                    case 'list':
                        return processList(raw, data, extra);
                        break;
                    default:
                        devError("Invalid dataType: " + dataType);
                        return "";
                        break;
                }
            }
            else {
                devError("Template not loaded: " + tpl);
                return "";
            }
        },
        utils: {
            /**
             * Check if the $key is in the $map, and if so,
             * return the html of a list.
             * The list is created using the template referred by the $listTplAlias alias,
             * and every item of the list uses the template referred by the $itemTplAlias alias.
             *
             * The list separator is $sep.
             * The list template must include the "$list" placeholder.
             *
             * If the $key is NOT in the $map, this method returns an empty string.
             *
             *
             *
             *
             * Note: This is a shorthand method based on personal experience.
             * See the documentation examples to see when it makes sense to use it.
             *
             */
            getListIf: function (key, map, listTplAlias, itemTplAlias, sep) {
                var s = "";
                if (key in map) {
                    s = htpl.getHtml({list: htpl.getHtml(map[key], itemTplAlias, 'list', sep)}, listTplAlias);
                }
                return s;
            },
            /**
             *
             * Return string.
             *
             * Call the callback on each element of the map,
             * concatenate all output to a string
             * using the given separator between each element,
             * and return the result.
             *
             *
             * @param map - a map
             * @param fn - callback
             *      string       callback ( key, value )
             *
             * @param sep - string=''
             */
            map2List: function (map, fn, sep) {
                var s = "";
                var n = 0;
                if ('undefined' === typeof sep) {
                    sep = '';
                }
                for (var k in map) {
                    if (0 !== n) {
                        s += sep;
                    }
                    s += fn(k, map[k]);
                    n++;
                }
                return s;
            }
        }
    };


    function fetchTemplate(t, fnSuccess) {
        if (null !== t) {
            var url = htpl.dir + "/" + t;
            $.get(url, fnSuccess).fail(function () {
                devError("template not found: " + url);
            });
        }
        else {
            devError("template not set");
        }
    }

    function processMap(raw, data) {
        for (var name in data) {
            var value = data[name];
            var reg = new RegExp('\\$' + name, 'g');
            raw = raw.replace(reg, value);
        }
        return raw;
    }

    function processRows(raw, data) {
        var s = '';
        for (var i in data) {
            s += processMap(raw, data[i]);
        }
        return s;
    }

    function processList(raw, data, sep) {
        var s = '';
        sep = sep || '';
        var n = 0;
        for (var i in data) {
            if (0 !== n) {
                s += sep;
            }
            s += processMap(raw, {
                key: i,
                value: data[i]
            });
            n++;
        }
        return s;
    }

    function loadTemplate(alias, relativePath, fnLoaded) {
        if (alias in loadedTpls) {
            fnLoaded && fnLoaded();
        }
        else {
            fetchTemplate(relativePath, function (content) {
                loadedTpls[alias] = content;
                fnLoaded && fnLoaded();
            });
        }
    }

    function devError(m) {
        throw new Error(m);
    }
})();