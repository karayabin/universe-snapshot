(function ($) {


    var jDebug = null;
    var handles = {};


    window.screenDebug = function (vars) {
        if (null === jDebug) {
            createDebugBox(vars);
        }
        update(vars);
    };


    function createDebugBox(vars) {
        jDebug = $('<div id="screendebug"></div>');
        $('body').append(jDebug);
        for (name in vars) {
            var jHandle = $('<span class="' + name + '"></span>');
            handles[name] = jHandle;
            jDebug.append(name + ': ');
            jDebug.append(jHandle);
            jDebug.append('<br>');
        }
    }

    function update(vars) {
        for (var name in vars) {
            handles[name].html(vars[name]);
        }
    }


})(jQuery);