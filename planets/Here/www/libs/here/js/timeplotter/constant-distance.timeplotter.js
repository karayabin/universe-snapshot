(function () {
    window.constantDistance = function (options) {
        var jContainer, currentPlotUnit, plotUnits, plugin;
        var defaults = {
            //------------------------------------------------------------------------------/
            // REQUIRED
            //------------------------------------------------------------------------------/
            /**
             * jquery handle to the plot container, which is the html element containing all
             * the time plots.
             * Time plots will be dynamically placed by using their left property's value.
             * Time plots are absolute positioned, make sure your css does that.
             *
             */
            jPlotContainer: null,
            //------------------------------------------------------------------------------/
            // OPTIONAL
            //------------------------------------------------------------------------------/
            /**
             * The minimum distance between two plots in pixels.
             * This distance will remain constant throughout zooming
             */
            minimumDistance: 100,
            /**
             * An array of minimum durations between two plots, in seconds.
             * This plugin works with a zooming system which has a "zoom in" and "zoom out" buttons.
             * Those buttons switch the plot units.
             * plotUnit is involved in the ratio formulae: we have
             *
             *          ratio = minimumDistance / plotUnit
             *
             *
             * The ratio is that magic number used to convert the duration to a a length.
             *
             * So, basically the zooming system of this plugin is manually triggered.
             *
             */
            plotUnits: [3600, 1800, 600, 300, 120, 60],
            /**
             * The plot unit to start with
             */
            defaultPlotUnit: 3600,
            /**
             * Render the html of a plot.
             * Use this to style your plots.
             */
            getPlotHtml: function (text) {
                return '<span>' + text + ' </span>';
            }
        };
        var zis = this;
        this.settings = $.extend(defaults, options);
        function sortNumber(a, b) {
            return b - a;
        }
        function nbSecondsToHourAndMinute(nbSeconds) {
            var nbHour = Math.floor(nbSeconds / 3600);
            var nbMinutes = Math.floor((nbSeconds % 3600) / 60);
            if (1 === ('' + nbHour).length) {
                nbHour = '0' + nbHour;
            }
            if (1 === ('' + nbMinutes).length) {
                nbMinutes = '0' + nbMinutes;
            }
            return nbHour + ':' + nbMinutes;
        }
        function formatPlotText(offset) {
            return nbSecondsToHourAndMinute(offset);
        }
        this.init = function (hereInstance) {
            jContainer = this.settings.jPlotContainer;
            plotUnits = this.settings.plotUnits;
            plotUnits.sort(sortNumber);
            plugin = hereInstance;
            currentPlotUnit = this.settings.defaultPlotUnit;
            plugin.setRatio(this.settings.minimumDistance / currentPlotUnit);
            hereInstance.zoomIn = function () {
                var next = false;
                var plotUnit = currentPlotUnit;
                for (var i in plotUnits) {
                    if (true === next) {
                        plotUnit = plotUnits[i];
                        break;
                    }
                    else if (currentPlotUnit === plotUnits[i]) {
                        next = true;
                    }
                }
                if (currentPlotUnit !== plotUnit) {
                    currentPlotUnit = plotUnit;
                    plugin.zoom(zis.settings.minimumDistance / plotUnit);
                }
            };
            hereInstance.zoomOut = function () {
                var next = false;
                var plotUnit = currentPlotUnit;
                var m = plotUnits.length - 1;
                for (var i = m; i >= 0; i--) {
                    if (true === next) {
                        plotUnit = plotUnits[i];
                        break;
                    }
                    else if (currentPlotUnit === plotUnits[i]) {
                        next = true;
                    }
                }
                if (currentPlotUnit !== plotUnit) {
                    currentPlotUnit = plotUnit;
                    plugin.zoom(zis.settings.minimumDistance / plotUnit);
                }
            };
        };
        this.refresh = function (ratio) {
            var distance = ratio * currentPlotUnit;
            jContainer.empty();
            var start = 0;
            var dist = 0;
            while (start < 86400) {
                var text = formatPlotText(start);
                var jPlot = $(this.settings.getPlotHtml(text));
                jPlot.css({left: dist + 'px'});
                jContainer.append(jPlot);
                start += currentPlotUnit;
                dist += distance;
            }
        };
    };
})();
