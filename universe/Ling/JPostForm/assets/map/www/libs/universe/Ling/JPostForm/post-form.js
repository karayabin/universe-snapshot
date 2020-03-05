if ('undefined' === typeof window.postForm) {


    /**
     * Original code found here: https://github.com/mgalante/jquery.redirect/blob/master/jquery.redirect.js
     * I just simplified it for my own taste.
     *
     * Related topic on stack overflow:
     * https://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit
     *
     */
    window.postForm = function (parameters, url) {

        // generally we post the form with a blank action attribute
        if ('undefined' === typeof url) {
            url = '';
        }


        //----------------------------------------
        // SOME HELPER FUNCTIONS
        //----------------------------------------
        var getForm = function (url, values) {

            values = removeNulls(values);

            var form = $('<form>')
                .attr("method", 'POST')
                .attr("action", url);

            iterateValues(values, [], form, null);
            return form;
        };

        var removeNulls = function (values) {
            var propNames = Object.getOwnPropertyNames(values);
            for (var i = 0; i < propNames.length; i++) {
                var propName = propNames[i];
                if (values[propName] === null || values[propName] === undefined) {
                    delete values[propName];
                } else if (typeof values[propName] === 'object') {
                    values[propName] = removeNulls(values[propName]);
                } else if (values[propName].length < 1) {
                    delete values[propName];
                }
            }
            return values;
        };

        var iterateValues = function (values, parent, form, isArray) {
            var i, iterateParent = [];
            Object.keys(values).forEach(function (i) {
                if (typeof values[i] === "object") {
                    iterateParent = parent.slice();
                    iterateParent.push(i);
                    iterateValues(values[i], iterateParent, form, Array.isArray(values[i]));
                } else {
                    form.append(getInput(i, values[i], parent, isArray));
                }
            });
        };

        var getInput = function (name, value, parent, array) {
            var parentString;
            if (parent.length > 0) {
                parentString = parent[0];
                var i;
                for (i = 1; i < parent.length; i += 1) {
                    parentString += "[" + parent[i] + "]";
                }

                if (array) {
                    name = parentString + "[" + name + "]";
                } else {
                    name = parentString + "[" + name + "]";
                }
            }

            return $("<input>").attr("type", "hidden")
                .attr("name", name)
                .attr("value", value);
        };


        //----------------------------------------
        // NOW THE SYNOPSIS
        //----------------------------------------
        var generatedForm = getForm(url, parameters);

        $('body').append(generatedForm);
        generatedForm.submit();
        generatedForm.remove();
    };

}
