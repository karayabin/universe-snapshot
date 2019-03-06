/**
 * pea.
 *
 * Why the name pea?
 * Because p like in php.
 *
 * php like functions in js.
 * Most functions come from the phpjs library.
 *
 */

if ('undefined' === typeof window.pea) {
    var zis = this;

    window.pea = {
        inArray: function (needle, haystack, argStrict) {
            var key = '',
                strict = !!argStrict;

            if (strict) {
                for (key in haystack) {
                    if (haystack[key] === needle) {
                        return true;
                    }
                }
            } else {
                for (key in haystack) {
                    if (haystack[key] == needle) {
                        return true;
                    }
                }
            }
            return false;
        },
        isArray: function (mixed) {
            if (Object.prototype.toString.call(mixed) === '[object Array]') {
                return true;
            }
            return false;
        },
        isArrayObject: function (mixed) {
            if (pea.inArray(Object.prototype.toString.call(mixed), ['[object Object]'])) {
                return true;
            }
            return false;
        },
        isArrayOrObject: function (mixed) {
            if (pea.inArray(Object.prototype.toString.call(mixed), ['[object Array]', '[object Object]'])) {
                return true;
            }
            return false;
        },
        isFunction: function (mixed) {
            if (typeof mixed == 'function') {
                return true;
            }
            return false;
        },
        nl2br: function (str, is_xhtml) { // http://phpjs.org/functions/nl2br/
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>';
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }
    };
}
