if ('undefined' === typeof window.jGoodies) {
    window.jGoodies = {
        /**
         * http://stackoverflow.com/questions/494035/how-do-you-pass-a-variable-to-a-regular-expression-javascript?rq=1
         */
        regexQuote: function (str) {
            return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        },
        selectorEscape: function (sExpression) {
            return sExpression.replace(/[!"#$%&'()*+,.\/:;<=>?@\[\\\]^`{|}~]/g, '\\$&');
        }
    };
}



